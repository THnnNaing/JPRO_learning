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
        $orders = Order::with(['orderDetails','payment'])->latest()->paginate(5);
        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function search(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $orders = Order::whereBetween('order_date', [$startDate, $endDate])->latest()->paginate(5);
        return view('orders.index', compact('orders'));
    }

    public function updateStatus(Request $request, $id){
        $order = Order::find($id);
        $order->status = $request->input('status');
        $order->save();
        return redirect()->route('orders.index')->with('success','Status updated successfully.');
    }
}
