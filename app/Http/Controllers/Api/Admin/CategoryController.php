<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\ChildCategory;
use App\Models\Brand;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    // ---------------- CATEGORY METHODS ----------------

    public function createCategory(Request $request)
    {
        $validator = Validator::make($request->all(), ['name' => 'required|string|max:255']);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        try {
            $category = Category::create(['category_name' => $request->name]);

            return response()->json([
                'status' => 'success',
                'message' => 'Category created successfully.',
                'data' => $category,
            ]);
        } catch (\Exception $e) {
            Log::error('Error creating category: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Failed to create category.'], 500);
        }
    }

    public function findCategory($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }

    public function findALLCategory()
    {
        $Subcategory = Category::all();
        return response()->json($Subcategory);
    }
    public function updateCategory(Request $request, $id)
    {
        $validator = Validator::make($request->all(), ['name' => 'required|string|max:255']);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        try {
            $category = Category::findOrFail($id);
            $category->update(['category_name' => $request->name]);

            return response()->json([
                'status' => 'success',
                'message' => 'Category updated successfully.',
                'data' => $category,
            ]);
        } catch (\Exception $e) {
            Log::error('Error updating category: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Failed to update category.'], 500);
        }
    }

    public function deleteCategory($id)
    {
        DB::beginTransaction();

        try {
            $category = Category::findOrFail($id);

            // Delete all related subcategories and child categories
            $category->subcategories()->each(function ($subcategory) {
                $subcategory->childCategories()->delete();
                $subcategory->delete();
            });

            $category->delete();

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Category deleted successfully.',
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error deleting category: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Failed to delete category.'], 500);
        }
    }

    // ---------------- SUBCATEGORY METHODS ----------------

    public function createSubcategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        try {
            $subcategory = Subcategory::create([
                'subcategory_name' => $request->name,
                'category_id' => $request->category_id,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Subcategory created successfully.',
                'data' => $subcategory,
            ]);
        } catch (\Exception $e) {
            Log::error('Error creating subcategory: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Failed to create subcategory.'], 500);
        }
    }

    public function findSubcategory($id)
    {
        $Subcategory = Subcategory::findOrFail($id);
        return response()->json($Subcategory);
    }

    public function findALLSubcategory()
    {
        $Subcategory = Subcategory::all();
        return response()->json($Subcategory);
    }

    public function updateSubcategory(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        try {
            $subcategory = Subcategory::findOrFail($id);
            $subcategory->update([
                'subcategory_name' => $request->name,
                'category_id' => $request->category_id,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Subcategory updated successfully.',
                'data' => $subcategory,
            ]);
        } catch (\Exception $e) {
            Log::error('Error updating subcategory: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Failed to update subcategory.'], 500);
        }
    }

    public function deleteSubcategory($id)
    {
        DB::beginTransaction();

        try {
            $subcategory = Subcategory::findOrFail($id);

            // Delete all related child categories
            $subcategory->childCategories()->delete();
            $subcategory->delete();

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Subcategory deleted successfully.',
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error deleting subcategory: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Failed to delete subcategory.'], 500);
        }
    }

    // ---------------- CHILD CATEGORY METHODS ----------------

    public function createChildCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'subcategory_id' => 'required|exists:subcategories,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        try {
            $childCategory = ChildCategory::create([
                'child_category_name' => $request->name,
                'subcategory_id' => $request->subcategory_id,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Child category created successfully.',
                'data' => $childCategory,
            ]);
        } catch (\Exception $e) {
            Log::error('Error creating child category: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Failed to create child category.'], 500);
        }
    }

    public function findChildCategory($id)
    {
        $ChildCategory = ChildCategory::findOrFail($id);
        return response()->json($ChildCategory);
    }
    public function findALLChildcategory()
    {
        $Subcategory = Childcategory::all();
        return response()->json($Subcategory);
    }

    public function updateChildCategory(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'subcategory_id' => 'required|exists:subcategories,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        try {
            $childCategory = ChildCategory::findOrFail($id);
            $childCategory->update([
                'child_category_name' => $request->name,
                'subcategory_id' => $request->subcategory_id,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Child category updated successfully.',
                'data' => $childCategory,
            ]);
        } catch (\Exception $e) {
            Log::error('Error updating child category: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Failed to update child category.'], 500);
        }
    }

    public function deleteChildCategory($id)
    {
        try {
            $childCategory = ChildCategory::findOrFail($id);
            $childCategory->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Child category deleted successfully.',
            ]);
        } catch (\Exception $e) {
            Log::error('Error deleting child category: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Failed to delete child category.'], 500);
        }
    }

    // ---------------- BRAND METHODS ----------------

    public function createBrand(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'brand_name' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'sub_category_id' => 'nullable|exists:subcategories,id',
            'child_category_id' => 'nullable|exists:child_categories,id',
            'slug' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        try {
            $brand = Brand::create($request->all());

            return response()->json([
                'status' => 'success',
                'message' => 'Brand created successfully.',
                'data' => $brand,
            ]);
        } catch (\Exception $e) {
            Log::error('Error creating brand: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Failed to create brand.'], 500);
        }
    }

    public function findBrand($id)
    {
        $Brand = Brand::findOrFail($id);
        return response()->json($Brand);
    }

    public function findALLBrand()
    {
        $Brand = Brand::all();
        return response()->json($Brand);
    }
    
    public function updateBrand(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'brand_name' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'sub_category_id' => 'nullable|exists:subcategories,id',
            'child_category_id' => 'nullable|exists:child_categories,id',
            'slug' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $brand = Brand::findOrFail($id);
            $data = $request->all();
            $brand->update($data);

            return response()->json([
                'status' => 'success',
                'message' => 'Brand updated successfully.',
                'data' => $brand,
            ]);
        } catch (\Exception $e) {
            Log::error('Error updating brand: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Failed to update brand.'], 500);
        }
    }

    public function deleteBrand($id)
    {
        try {
            $brand = Brand::findOrFail($id);
            $brand->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Brand deleted successfully.',
            ]);
        } catch (\Exception $e) {
            Log::error('Error deleting brand: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Failed to delete brand.'], 500);
        }
    }
}
