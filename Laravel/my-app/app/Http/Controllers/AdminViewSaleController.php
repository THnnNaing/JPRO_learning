<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AdminViewSaleController extends Controller
{
    public function index(Request $request)
    {
        $sumproducts = Product::leftJoin('order_details', 'products.id', '=', 'order_details.product_id')
            ->select('products.name', Product::raw('sum(order_details.quantity*products.price) as sum'))
            ->groupBy('products.name')
            ->pluck('sum', 'products.name');

        $labels = $sumproducts->keys();
        $data = $sumproducts->values();

        return view('viewsale',compact('labels','data'));
    }
}