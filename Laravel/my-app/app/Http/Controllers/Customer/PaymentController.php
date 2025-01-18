<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id', // Validate against the 'orders' table's 'id' column
            'amount' => 'required|numeric',
            'payment_method' => 'required|string',
        ]);

        // Create payment
        $payment = Payment::create([
            'order_id' => $request->order_id,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'status' => 'completed',
        ]);

        // Update order status
        $order = Order::find($request->order_id);
        $order->status = 'Processing';
        $order->save();

        // Flash success message and return view
        session()->flash('success', 'Order placed successfully');
        return view('customers.ordersuccess', compact('order'));
    }
}
