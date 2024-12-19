<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Attribute;
use App\Models\Category;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    // Method to show the category list
    public function index()
    {
        $categories = Category::all();
        return view('admins.category.index', [
            'title' => 'Categories',
            'categories' => $categories
        ]);
    }

    // Fetching categories with DataTables
    public function fetchCategory(Request $request)
    {
        $query = Category::with(['attributes' => function ($query) {
            // Load only the necessary columns (id and name) for attributes
            $query->select('id', 'name', 'category_id');
        }])
            ->select(['id', 'category_name', 'created_at']);

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('attributes', function ($row) {
                // Check if there are any attributes and pluck their names
                return $row->attributes->isEmpty() ? 'No attributes' : $row->attributes->pluck('name')->implode(', ');
            })
            ->addColumn('actions', function ($row) {
                return '<button class="btn btn-sm btn-primary edit-btn" data-id="' . $row->id . '">Edit</button> '
                    . '<button class="btn btn-sm btn-danger delete-btn" data-id="' . $row->id . '">Delete</button>';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    // Storing a new category
    public function store(Request $request)
    {
        // Step 1: Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'attributes' => 'required|array',
            'attributes.*' => 'required|string',
        ]);

        Log::info('Received data: ', $request->all());

        // Step 2: First transaction for category
        DB::beginTransaction();

        try {
            // Save the category
            $category = $this->createCategory($request->name);

            // Commit the category transaction
            DB::commit();
            Log::info('Category committed to the database: ', ['id' => $category->id]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error saving category: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to save category.',
            ], 500);
        }

        // Step 3: Second transaction for attributes
        try {
            $attributes = (array) $request->input('attributes', []);
            if (!empty($attributes)) {
                $this->addAttributesToCategory($category->id, $attributes);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Category and attributes created successfully.',
            ]);
        } catch (\Exception $e) {
            Log::error('Error saving attributes: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Category saved, but attributes failed to save.',
            ], 500);
        }
    }

    /**
     * Create a new category.
     */
    private function createCategory(string $name)
    {
        $category = Category::create(['category_name' => $name]);
        Log::info('Category created: ', ['id' => $category->id]);
        return $category;
    }

    /**
     * Create attributes for a category.
     */
    private function addAttributesToCategory(int $categoryId, array $attributes)
    {
        foreach ($attributes as $attributeName) {
            if (!empty($attributeName)) {
                Attribute::create([
                    'category_id' => $categoryId,
                    'name' => $attributeName,
                ]);
                Log::info("Attribute added: ", ['name' => $attributeName, 'category_id' => $categoryId]);
            } else {
                Log::warning("Skipped empty attribute for category ID: {$categoryId}");
            }
        }
    }



    // Editing an existing category
    public function edit($id)
    {
        try {
            $category = Category::with('attributes')->findOrFail($id);

            return response()->json([
                'status' => 'success',
                'category' => $category
            ]);
        } catch (\Exception $e) {
            Log::error('Category retrieval failed: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to retrieve category.'], 500);
        }
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'attributes' => 'nullable|array',
            'attributes.*.id' => 'nullable|integer|exists:attributes,id', // Validate attribute IDs
            'attributes.*.name' => 'required|string|max:255'          // Validate attribute names
        ]);

        DB::beginTransaction();

        try {
            // Fetch the category
            $category = Category::findOrFail($id);

            // Update the category name
            $category->update(['category_name' => $request->name]);
            Log::info('Category updated: ', ['id' => $category->id]);

            // Get the existing attributes for the category
            $existingAttributeIds = $category->attributes()->pluck('id')->toArray();

            // Prepare an array of attribute IDs that are being passed in the request
            $attributes = $request->input('attributes', []);
            $newAttributeIds = [];

            // Update or create attributes
            foreach ($attributes as $attributeData) {
                if (isset($attributeData['id'])) {
                    // Update existing attribute
                    $attribute = Attribute::where('id', $attributeData['id'])
                        ->where('category_id', $id) // Ensure it belongs to the category
                        ->first();

                    if ($attribute) {
                        $attribute->update(['name' => $attributeData['name']]);
                        $newAttributeIds[] = $attribute->id; // Keep track of updated attribute IDs
                    } else {
                        return response()->json([
                            'error' => "Attribute with ID {$attributeData['id']} does not belong to this category."
                        ], 400);
                    }
                } else {
                    // Create a new attribute
                    $attribute = Attribute::create([
                        'category_id' => $id,
                        'name' => $attributeData['name'],
                    ]);
                    $newAttributeIds[] = $attribute->id; // Keep track of new attribute IDs
                }
            }

            // Step 2: Delete attributes that are not included in the request
            $attributesToDelete = array_diff($existingAttributeIds, $newAttributeIds);
            if ($attributesToDelete) {
                Attribute::whereIn('id', $attributesToDelete)
                    ->where('category_id', $id) // Ensure they belong to the category
                    ->delete();
                Log::info('Deleted attributes: ', ['ids' => $attributesToDelete]);
            }

            DB::commit();

            // Reload category with its updated attributes for the response
            $category->load('attributes');

            return response()->json([
                'status' => 'success',
                'message' => 'Category and attributes updated successfully.',
                'category' => [
                    'id' => $category->id,
                    'category_name' => $category->category_name,
                    'attributes' => $category->attributes->map(function ($attribute) {
                        return [
                            'id' => $attribute->id,
                            'name' => $attribute->name,
                            'category_id' => $attribute->category_id,
                            'created_at' => $attribute->created_at,
                            'updated_at' => $attribute->updated_at,
                        ];
                    }),
                ],
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating category: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to update category and attributes.'], 500);
        }
    }


    // Deleting a category
    public function delete($id)
    {
        DB::beginTransaction();

        try {
            // Fetch the category
            $category = Category::findOrFail($id);

            // Delete all attributes associated with this category
            $category->attributes()->where('category_id', $id)->delete();

            // Now delete the category itself
            $category->delete();

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Category and its attributes deleted successfully.'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error deleting category: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to delete category and its attributes.'
            ], 500);
        }
    }


    // Fetching attributes for a specific category
    public function getAttributesByCategory($categoryId)
    {
        try {
            $attributes = Attribute::whereHas('category', function ($query) use ($categoryId) {
                $query->where('id', $categoryId);
            })->get();

            return response()->json(['status' => 'success', 'attributes' => $attributes]);
        } catch (\Exception $e) {
            Log::error('Failed to fetch attributes: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to fetch attributes.'], 500);
        }
    }
}
