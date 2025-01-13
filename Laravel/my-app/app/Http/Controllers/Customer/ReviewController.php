<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Review;
use App\Models\Product;
use App\Models\Customer;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();
        $customers = Customer::all();
        return view('customers.review', compact('products', 'customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:App\Models\Product,id',
            'email' => 'required|exists:App\Models\Customer,email',
            'comment' => 'required',
            'review_date' => now()->toDateTimeString(),
        ]);

        $customers = Customer::where('email', $request->email)->get();

        foreach ($customers as $customer)
        {
            $review = Review::create ([
                'product_id' => $request->product_id,
                'customer_id' => $customer->id,
                'comment' => $request->comment,
               'review_date' => now()->toDateTimeString(),
            ]);

        }

        return redirect()->route('home')->with('success', 'Review Submitted Successfully');
    }

}
