<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Product;
use App\Models\ProductAttribute;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ChildCategory;
use APp\Models\Brand;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Method to show the product list
    public function index()
    {
        // Fetch and display all products
        $categories = Category::all(); // Retrieves all categories
        return view('admins.products.index', [
            'title' => 'Products'
        ], compact('categories')); // Adjust the view path as needed
    }
    public function fetchALLproduct()
    {
        // Fetch and display all products
        $categories = Category::all(); // Retrieves all categories
        return response()->json($categories); // Adjust the view path as needed
    }

    // Fetching products
    public function fetchProducts($id)
    {
        $query = Product::where('vendor_id', $id)->with('category:id,category_name')
            ->select(['id', 'category_name', 'title', 'image', 'price', 'description', 'negotiation', 'contact', 'created_at']);

        return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('image', function ($row) {
                // Decode the JSON array and select only the first image
                $images = json_decode($row->image, true);
                $firstImage = $images[0] ?? null; // Get the first image or null if not available

                // Return the first image in the array or a placeholder if there's no image
                return $firstImage
                    ? '<img src="' . asset('storage/' . $firstImage) . '" width="50" height="50"/>'
                    : '<img src="' . asset('images/placeholder.png') . '" width="50" height="50"/>';
            })
            ->editColumn('negotiation', function ($row) {
                return $row->negotiation ? 'Yes' : 'No';
            })
            ->editColumn('price', function ($row) {
                return '₦' . number_format($row->price, 2); // Adds Naira symbol and formats the price
            })
            ->addColumn('category', function ($row) {
                return $row->category->category_name ?? 'N/A';
            })
            ->rawColumns(['image']) // Allow HTML in the image column
            ->make(true); // This returns the formatted JSON response
    }

    public function createProduct(Request $request ,$id)
    {
        // Validate the form input

        $validator = Validator::make($request->all(), [            
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'nullable|exists:sub_categories,id',
            'child_category_id' => 'nullable|exists:child_categories,id',
            'brand_id' => 'nullable|exists:brands,id',
            'country_id' => 'nullable|exists:country,id',
            'state_id' => 'nullable|exists:state,id',
            'city_id' => 'nullable|exists:city,id',
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug',
            'description' => 'nullable|string',
            'image' => 'nullable|file|mimes:jpg,jpeg,png|max:5120', // Single image validation
            'gallary_images' => 'nullable|array',
            'gallary_images.*' => 'file|mimes:jpg,jpeg,png|max:5120',
            'video_url' => 'nullable|url',
            'price' => 'required|numeric|min:0',
            'negotiable' => 'nullable|boolean',
            'condition' => 'nullable|string',
            'authenticity' => 'nullable|string',
            'address' => 'nullable|string',
            'view' => 'nullable|integer',
            'is_featured' => 'nullable|boolean',
            'is_published' => 'nullable|boolean',
            'published_at' => 'nullable|date',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        DB::beginTransaction(); // Start the transaction
        try {
            // Handle the main image (if any)
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('products/', 'public');
            }
            // Handle gallery images (if any)
            $galleryImages = [];
            if ($request->hasFile('gallary_images')) {
                foreach ($request->file('gallary_images') as $image) {
                    $galleryImages[] = $image->store('products/gallery/', 'public');
                }
            }
            // Prepare the data
            $data = $request->all();
            $data['gallery_images'] = $galleryImages;
            $data['image'] = $imagePath;
            $data['vendor_id']=$id;
            // Create the product
            $product = Product::create($data);
            DB::commit(); // Commit the transaction
            return response()->json(['status' => 'success', 'message' => 'Product created successfully.', 'product' => $product], 200);
        } catch (\Exception $e) {
            DB::rollBack(); // Roll back the transaction if an error occurs
            // Log the exception for debugging
            Log::error('Product creation failed: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to create product. ' . $e->getMessage()], 500);
        }
    }

    public function find($id)
    {
        try {
            // Fetch the product by ID with related attributes
            $product = Product::find($id);

            // Check if the product exists
            if (!$product) {
                return response()->json([
                    'message' => 'Product not found.',
                ], 404);
            }

            // Return product details with attributes
            return response()->json([
                'message' => 'Product retrieved successfully.',
                'product' => $product,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while fetching the product.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);

        DB::beginTransaction();

        try {
            // Delete associated images from storage
            if (!empty($product->image)) {
                $images = json_decode($product->image, true);
                foreach ($images as $imagePath) {
                    Storage::disk('public')->delete($imagePath);
                }
            }

            // Delete associated attributes
            ProductAttribute::where('product_id', $product->id)->delete();

            // Finally, delete the product itself
            $product->delete();

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Product deleted successfully.']);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to delete product: ' . $e->getMessage());

            return response()->json(['success' => false, 'message' => 'Failed to delete product.']);
        }
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        // Validate the input
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'nullable|exists:sub_categories,id',
            'child_category_id' => 'nullable|exists:child_categories,id',
            'brand_id' => 'nullable|exists:brands,id',
            'country_id' => 'nullable|exists:country,id',
            'state_id' => 'nullable|exists:state,id',
            'city_id' => 'nullable|exists:city,id',
            'product_name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug,' . $product->id,
            'description' => 'nullable|string',
            'image' => 'nullable|file|mimes:jpg,jpeg,png|max:5120',
            'gallary_images' => 'nullable|array',
            'gallary_images.*' => 'file|mimes:jpg,jpeg,png|max:5120',
            'video_url' => 'nullable|url',
            'price' => 'required|numeric|min:0',
            'negotiable' => 'nullable|boolean',
            'condition' => 'nullable|string',
            'authenticity' => 'nullable|string',
            'address' => 'nullable|string',
            'view' => 'nullable|integer',
            'is_featured' => 'nullable|boolean',
            'is_published' => 'nullable|boolean',
            'published_at' => 'nullable|date',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        DB::beginTransaction();
        try {
            // Handle main image update
            $imagePath = $product->image;
            if ($request->hasFile('image')) {
                // Delete old image if it exists
                if ($product->image) {
                    Storage::disk('public')->delete($product->image);
                }
                // Store the new image
                $imagePath = $request->file('image')->store('products/', 'public');
            }
            // Handle gallery images update
            $galleryImages = json_decode($product->gallary_images, true) ?: [];
            if ($request->hasFile('gallary_images')) {
                // Delete old gallery images if they exist
                foreach ($galleryImages as $oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
                $galleryImages = [];
                foreach ($request->file('gallary_images') as $image) {
                    $galleryImages[] = $image->store('products/gallery/', 'public');
                }
            }
            // Prepare the data for update
            $data = $request->all();
            $data['image'] = $imagePath;
            $data['gallary_images'] = json_encode($galleryImages);
            // Update the product
            $product->update($data);
            DB::commit();
            return response()->json(['status' => 'success', 'message' => 'Product updated successfully.'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Product update failed: ' . $e->getMessage());

            return response()->json(['error' => 'Failed to update product. ' . $e->getMessage()], 500);
        }
    }


    public function getCategory()
    {
        $Category = Category::all();
        return response()->json($Category, 200);
    }

    public function getSubCategoriesByCategory($categoryId)
    {
        try {
            // Fetch subcategories for the selected category
            $subCategories = SubCategory::where('category_id', $categoryId)->get();
            return response()->json($subCategories);
        } catch (\Exception $e) {
            Log::error('Failed to fetch subcategories: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to fetch subcategories.'], 500);
        }
    }

    public function getChildCategoriesBySubCategory($subCategoryId)
    {
        try {
            // Fetch child categories for the selected subcategory
            $childCategories = ChildCategory::where('sub_category_id', $subCategoryId)->get();
            return response()->json($childCategories);
        } catch (\Exception $e) {
            Log::error('Failed to fetch child categories: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to fetch child categories.'], 500);
        }
    }

    public function getBrandsByCategory($categoryId)
    {
        try {
            // Fetch brands for the selected category
            $brands = Brand::where('category_id', $categoryId)->get();
            return response()->json($brands);
        } catch (\Exception $e) {
            Log::error('Failed to fetch brands: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to fetch brands.'], 500);
        }
    }

    public function getBrandsBySubCategory($subCategoryId)
    {
        try {
            // Fetch brands for the selected subcategory
            $brands = Brand::where('sub_category_id', $subCategoryId)->get();
            return response()->json($brands);
        } catch (\Exception $e) {
            Log::error('Failed to fetch brands: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to fetch brands.'], 500);
        }
    }

    public function getBrandsByChildCategory($childCategoryId)
    {
        try {
            // Fetch brands for the selected child category
            $brands = Brand::where('child_category_id', $childCategoryId)->get();
            return response()->json($brands);
        } catch (\Exception $e) {
            Log::error('Failed to fetch brands: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to fetch brands.'], 500);
        }
    }
}
