<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Review;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::All()->count();
        $categories = Category::All()->count();
        $customers = Customer::All()->count();
        $orders = Order::All()->count();
        $reviews = Review::All()->count();
        return view('dashboard', [
            'products' => $products,
            'categories' => $categories,
            'customers' => $customers,
            'reviews' => $reviews,
            'orders' => $orders
        ]);
    }
}
