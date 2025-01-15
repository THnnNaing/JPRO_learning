<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $orders = Order::latest()->paginate(5);
        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }


    public function updateStatus(Request $request, Order $order)
    {

        $request->validate([
            'name' => 'required'
        ]);

        $input = $request->all();
        $order->update($input);
        return redirect()->route('orders.index')->with('success', 'Category updated successfully.');
    }

    public function search(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $orders = Order::whereBetween('order_date', [$startDate, $endDate])->latest()->paginate(5);
        return view('vieworder', compact('orders'));
    }
}
