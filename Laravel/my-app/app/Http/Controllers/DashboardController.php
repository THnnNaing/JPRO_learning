<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Customer;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::All()->count();
        $categories = Category::All()->count();
        $customers = Customer::All()->count();
        return view('dashboard', [
            'products' => $products,
            'categories' => $categories,
            'customers' => $customers
        ]);
    }
}
