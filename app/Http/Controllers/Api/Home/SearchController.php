<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ChildCategory;
use APp\Models\Brand;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;


class SearchController extends Controller
{
    public function search(string $title)
    {
        $products = Product::where('title', 'like', '%' . $title . '%')->get();
        if ($products) {
            return  response()->json(['status' => 'success', 'product' => $products], 200);
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
