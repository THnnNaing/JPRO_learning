@extends('layouts')
{{-- @extends('orders.layout') --}}
@section('content')
    <div class="card mt-5">
        <h2 class="card-header">Show Product</h2>
        <div class="card-body">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-primary btn-sm" href="{{ route('orders.index') }}"><i class="fa
fa-arrow-left"></i>
                    Back</a>
            </div>
            <div>
                <table width="400">
                    <tr>
                        <td><strong>Customer Name</strong> </td>
                        <td> {{ $order->customer->name }} </td>
                    </tr>
                    <tr>
                        <td><strong>Price</strong> </td>
                        <td> {{ $order->total_price }} </td>
                    </tr>
                    <tr>
                        <td><strong>Order Date</strong> </td>
                        <td> {{ $order->order_date }} </td>
                    </tr>
                    <tr>
                        <td><strong> <Address>Delivery</Address></strong> </td>
                        <td> {{ $order->delivery_address }} </td>
                    </tr>
                    <tr>
                        <td><strong>Status</strong> </td>
                        <td> {{ $order->status }} </td>
                    </tr>
                    <tr>
                        <td><strong>Payment Method</strong> </td>
                        <td> {{ $order->payment->payment_method }} </td>
                    </tr>
                    <tr>
                        <td><strong>Items</strong> </td>
                        <td>
                            <ul>
                                @php
                                    $subTotal = 0;
                                @endphp

                                @foreach ($order->orderDetails as $orderDetail)
                                    @php
                                        $subTotal = $orderDetail->product->price * $orderDetail->quantity;
                                    @endphp
                                    <li>{{ $orderDetail->product->name }} : {{ $orderDetail->product->price }} Kyats
                                        x
                                        {{ $orderDetail->quantity }}={{ $subTotal }}
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>

                    <tr>
                        <td><strong>Total Price</strong> </td>
                        <td> {{ $order->total_price }} Kyats</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
