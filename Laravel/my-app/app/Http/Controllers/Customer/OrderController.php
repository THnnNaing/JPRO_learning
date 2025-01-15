<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
// use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index()
    {
        $customers = Customer::all();
        return view('customers.order', compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:App\Models\Customer,email',
            'delivery_address' => 'required',
        ]);

        $cart = session()->get('cart');
        $totalPrice = 0;

        $cart = $cart ?? []; 
        
        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        $customers = Customer::where('email', $request->email)->get();

        foreach ($customers as $customer) {
            $order = Order::create([
                'customer_id' => $customer->id,
                'total_price' => $totalPrice,
                'order_date' => now()->toDateTimeString(),
                'delivery_address' => $request->delivery_address,
            ]);

            // Create OrderDetails for each item in the cart
            foreach ($cart as $productID => $details) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $productID,
                    'quantity' => $details['quantity'],
                ]);
            }

            // After creating the order, ensure it has the associated orderDetails
            $order = Order::with('orderDetails')->findOrFail($order->id);
        }

        // Forget the cart from the session
        session()->forget('cart');

        // Return success view
        return view('customers.ordersuccess', compact('order'))->with('success', 'Order placed successfully');
    }
}
