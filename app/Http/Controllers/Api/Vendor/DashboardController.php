<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class VendorDashboardController extends Controller
{
    /**
     * Display the vendor dashboard.
     */
    public function index()
    {
        $vendor = Auth::user();

        // Fetch vendor-related data
        $productsCount = Product::where('vendor_id', $vendor->id)->count();
        // $ordersCount = Order::where('vendor_id', $vendor->id)->count();
        // $notifications = Notification::where('vendor_id', $vendor->id)->latest()->take(5)->get();

        // // Fetch earnings, assuming a simple sum of paid orders
        // $earnings = Order::where('vendor_id', $vendor->id)
        //     ->where('status', 'paid')
        //     ->sum('total_price');

        return view('vendor.dashboard', compact('productsCount'));
    }

    /**
     * Manage products.
     */
    public function products()
    {
        $vendor = Auth::user();
        $products = Product::where('vendor_id', $vendor->id)->paginate(10);

        return view('vendor.products.index', compact('products'));
    }

    /**
     * View specific product.
     */
    public function showProduct($id)
    {
        $vendor = Auth::user();
        $product = Product::where('id', $id)->where('vendor_id', $vendor->id)->firstOrFail();

        return view('vendor.products.show', compact('product'));
    }

    /**
     * Manage orders.
     */
    // public function orders()
    // {
    //     $vendor = Auth::user();
    //     $orders = Order::where('vendor_id', $vendor->id)->latest()->paginate(10);

    //     return view('vendor.orders.index', compact('orders'));
    // }

    // /**
    //  * View specific order details.
    //  */
    // public function showOrder($id)
    // {
    //     $vendor = Auth::user();
    //     $order = Order::where('id', $id)->where('vendor_id', $vendor->id)->firstOrFail();

    //     return view('vendor.orders.show', compact('order'));
    // }

    // /**
    //  * Notifications page.
    //  */
    // public function notifications()
    // {
    //     $vendor = Auth::user();
    //     $notifications = Notification::where('vendor_id', $vendor->id)->paginate(10);

    //     return view('vendor.notifications.index', compact('notifications'));
    // }

    /**
     * Update account settings.
     */
    public function accountSettings()
    {
        $vendor = Auth::user();

        return view('vendor.settings.account', compact('vendor'));
    }

    // /**
    //  * Update account information.
    //  */
    // public function updateAccount(Request $request)
    // {
    //     $vendor = Auth::user();

    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|unique:users,email,' . $vendor->id,
    //         'password' => 'nullable|string|min:8|confirmed',
    //     ]);

    //     $vendor->name = $request->name;
    //     $vendor->email = $request->email;

    //     if ($request->filled('password')) {
    //         $vendor->password = bcrypt($request->password);
    //     }

    //     $vendor->save();

    //     return redirect()->route('vendor.settings.account')->with('success', 'Account updated successfully!');
    // }
}
