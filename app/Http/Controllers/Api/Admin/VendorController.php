<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\Attribute;
use App\Models\Category;
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

    // Fetching products
    public function fetchProducts(Request $request)
    {
        $query = Product::with('category:id,category_name')
            ->select(['id', 'category_id', 'title', 'image', 'price', 'description', 'negotiation', 'contact', 'created_at']);

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



    public function store(Request $request)
    {
        // Validate the form input
        $request->validate([
            'product_name' => 'required|string|max:255',
            'vendor_email' => 'required|email|max:255',
            'vendor_number' => 'required|numeric',
            'description' => 'nullable|string',
            'images' => 'nullable|array',
            'images.*' => 'file|mimes:jpg,jpeg,png|max:5120', // 5 MB max per image
            'base_price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'attributes' => 'nullable|array', // Attributes sent dynamically
            'attributes.*' => 'nullable|string', // Attribute values
            'negotiable' => 'nullable|boolean',
        ]);

        // Start a database transaction
        DB::beginTransaction();
        try {
            // Handle images (if any)
            $images = [];
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $imagePath = $image->store('products/', 'public');
                    $images[] = $imagePath;
                }
            }
            $negotiable = $request->negotiable ?? 0;
            // Save product details in `products` table
            $product = Product::create([
                'category_id' => $request->category_id,
                'title' => $request->product_name,
                'email' => $request->vendor_email,
                'contact' => $request->vendor_number,
                'description' => $request->description,
                'price' => $request->base_price,
                'negotiation' => $negotiable,
                'image' => !empty($images) ? json_encode($images) : null,
            ]);

            // Handle dynamic attributes
            if ($request->has('attributes')) {
                foreach ($request->attributes as $attributeId => $value) {
                    if (!empty($value)) {
                        ProductAttribute::create([
                            'product_id' => $product->id,
                            'attribute_id' => $attributeId,
                            'value' => $value,
                        ]);
                    }
                }
            }

            // Commit the transaction
            DB::commit();

            return response()->json(['status' => 'success', 'message' => 'Product created successfully.'], 200);
        } catch (\Exception $e) {
            DB::rollBack();

            // Log the exception for debugging
            Log::error('Product creation failed: ' . $e->getMessage());

            // Return a detailed error in the response
            return response()->json(['error' => 'Failed to create product. ' . $e->getMessage()], 500);
        }
    }



    public function edit($id)
    {
        try {
            // Fetch the product by ID with related attributes
            $product = Product::with(['attributes'])
                ->where('id', $id)
                ->first();

            // Check if the product exists
            if (!$product) {
                return response()->json([
                    'message' => 'Product not found.',
                ], 404);
            }

            // Return product details with attributes
            return response()->json([
                'message' => 'Product retrieved successfully.',
                'product' => [
                    'id' => $product->id,
                    'title' => $product->title,
                    'category_id' => $product->category_id,
                    'image' => $product->image,
                    'price' => $product->price,
                    'description' => $product->description,
                    'negotiation' => $product->negotiation,
                    'contact' => $product->contact,
                    'email' => $product->email,
                    'attributes' => $product->attributes->map(function ($attribute) {
                        return [
                            'id' => $attribute->id,
                            'name' => $attribute->name,
                            'value' => $attribute->pivot->value,
                        ];
                    }),
                ],
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while fetching the product.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    public function destroy($id)
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
        $request->validate([
            'product_name' => 'required|string|max:255',
            'vendor_email' => 'required|email|max:255',
            'vendor_number' => 'required|numeric',
            'description' => 'nullable|string',
            'images' => 'nullable|array',
            'images.*' => 'file|mimes:jpg,jpeg,png|max:5120', // 5 MB max per image
            'base_price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'attributes' => 'nullable|array', // Attributes sent dynamically
            'attributes.*' => 'nullable|string', // Attribute values
            'negotiable' => 'nullable|boolean',
        ]);

        // Start a database transaction
        DB::beginTransaction();
        try {
            // Handle image deletion if there are new images
            if ($request->hasFile('images')) {
                // Delete old images
                $oldImages = json_decode($product->image, true);
                
                if ($oldImages) {
                    foreach ($oldImages as $oldImage) {
                        // Delete each old image file from storage
                        Storage::disk('public')->delete($oldImage);
                    }
                }

                // Handle the new images
                $images = [];
                foreach ($request->file('images') as $image) {
                    $imagePath = $image->store('products/', 'public');
                    $images[] = $imagePath;
                }
            } else {
                $images = json_decode($product->image, true); // Keep the old images if no new images are uploaded
            }

            // Default 'negotiable' to 0 if not provided
            $negotiable = $request->negotiable ?? 0;

            // Update product details in the `products` table
            $product->update([
                'category_id' => $request->category_id,
                'title' => $request->product_name,
                'email' => $request->vendor_email,
                'contact' => $request->vendor_number,
                'description' => $request->description,
                'price' => $request->base_price,
                'negotiation' => $negotiable,
                'image' => !empty($images) ? json_encode($images) : null, // Update with new images or retain old ones if no new images
            ]);

            // Handle dynamic attributes
            if ($request->has('attributes')) {
                // Optionally, delete old attributes if you're replacing them
                ProductAttribute::where('product_id', $product->id)->delete();

                foreach ($request->attributes as $attributeId => $value) {
                    if (!empty($value)) {
                        ProductAttribute::create([
                            'product_id' => $product->id,
                            'attribute_id' => $attributeId,
                            'value' => $value,
                        ]);
                    }
                }
            }

            // Commit the transaction
            DB::commit();

            return response()->json(['status' => 'success', 'message' => 'Product updated successfully.'], 200);
        } catch (\Exception $e) {
            DB::rollBack();

            // Log the exception for debugging
            Log::error('Product update failed: ' . $e->getMessage());

            // Return a detailed error in the response
            return response()->json(['error' => 'Failed to update product. ' . $e->getMessage()], 500);
        }
    }

    public function getAttributesByCategory($categoryId)
    {
        try {
            // Fetch attributes for the selected category
            $attributes = Attribute::where('category_id', $categoryId)->get();
            return response()->json($attributes);
        } catch (\Exception $e) {
            Log::error('Failed to fetch attributes: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to fetch attributes.'], 500);
        }
    }
}
