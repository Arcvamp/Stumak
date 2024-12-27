<?php

namespace App\Http\Controllers\Api\Home;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class UserProductController extends Controller
{
    /**
     * Display a listing of products.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Product::query();

        // Filter by category
        if ($request->has('category')) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('name', $request->input('category'));
            });
        }

        // Filter by brand
        if ($request->has('brand')) {
            $query->whereHas('brand', function ($q) use ($request) {
                $q->where('name', $request->input('brand'));
            });
        }

        // Filter by subcategory
        if ($request->has('subcategory')) {
            $query->whereHas('subcategory', function ($q) use ($request) {
                $q->where('name', $request->input('subcategory'));
            });
        }

        // Filter by child category
        if ($request->has('child_category')) {
            $query->whereHas('childCategory', function ($q) use ($request) {
                $q->where('name', $request->input('child_category'));
            });
        }

        // Filter by country
        if ($request->has('country')) {
            $query->whereHas('country', function ($q) use ($request) {
                $q->where('name', $request->input('country'));
            });
        }

        // Filter by state
        if ($request->has('state')) {
            $query->whereHas('state', function ($q) use ($request) {
                $q->where('name', $request->input('state'));
            });
        }



        // Search by product name or description
        if ($request->has('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->input('search') . '%')
                    ->orWhere('description', 'like', '%' . $request->input('search') . '%');
            });
        }

        // Sort by price, popularity, or other criteria
        if ($request->has('sort')) {
            switch ($request->input('sort')) {
                case 'price_asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc');
                    break;
                default:
                    $query->orderBy('created_at', 'desc'); // Default sorting
            }
        } else {
            $query->orderBy('created_at', 'desc'); // Default sorting
        }

        $products = $query->paginate(12); // Pagination with 12 products per page

        return view('products.index', compact('products'));
    }

    public function fetchMoreProducts(Request $request)
    {
        $query = Product::query();

        // Apply filters (similar to the `index` method)
        if ($request->has('category')) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('name', $request->input('category'));
            });
        }
        // Filter by category
        if ($request->has('category')) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('name', $request->input('category'));
            });
        }

        // Filter by brand
        if ($request->has('brand')) {
            $query->whereHas('brand', function ($q) use ($request) {
                $q->where('name', $request->input('brand'));
            });
        }

        // Filter by subcategory
        if ($request->has('subcategory')) {
            $query->whereHas('subcategory', function ($q) use ($request) {
                $q->where('name', $request->input('subcategory'));
            });
        }

        // Filter by child category
        if ($request->has('child_category')) {
            $query->whereHas('childCategory', function ($q) use ($request) {
                $q->where('name', $request->input('child_category'));
            });
        }

        // Filter by country
        if ($request->has('country')) {
            $query->whereHas('country', function ($q) use ($request) {
                $q->where('name', $request->input('country'));
            });
        }

        // Filter by state
        if ($request->has('state')) {
            $query->whereHas('state', function ($q) use ($request) {
                $q->where('name', $request->input('state'));
            });
        }



        // Search by product name or description
        if ($request->has('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->input('search') . '%')
                    ->orWhere('description', 'like', '%' . $request->input('search') . '%');
            });
        }

        // Sort by price, popularity, or other criteria
        if ($request->has('sort')) {
            switch ($request->input('sort')) {
                case 'price_asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc');
                    break;
                default:
                    $query->orderBy('created_at', 'desc'); // Default sorting
            }
        } else {
            $query->orderBy('created_at', 'desc'); // Default sorting
        }

        $products = $query->paginate(12); // Return the next set of products

        return response()->json([
            'products' => $products->items(),
            'hasMore' => $products->hasMorePages(),
        ]);
    }


    /**
     * Display the specified product.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with(['categories', 'images'])->findOrFail($id);

        return view('products.show', compact('product'));
    }
}
