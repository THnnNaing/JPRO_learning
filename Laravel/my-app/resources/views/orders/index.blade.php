@extends('layouts')
@section('content')
    <div class="card mt-5">
        <h3 class="card-header">Order Information</h3>
        <div class="card-body">

            {{-- @session('success')
                <div class="alert alert-success" role="alert"> {{ $value }} </div>
            @endsession --}}

            {{-- For Search --}}
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <form action="{{ route('orders.search') }}" method="GET">
                    <label for="start_date">Start Date:</label>
                    <input type="date" id="start_date" name="start_date" required>

                    <label for="end_date">End Date:</label>
                    <input type="date" id="end_date" name="end_date" required>

                    {{-- <input type="text" 
                            name="search" 
                            placeholder="Search Order Info:" 
                            value="{{request()->input('search') ? request()->input('search') : ''}}"> --}}

                    <button class="btn btn-success btn-sm" type="submit">Search</button>
                </form>

            </div>

            <table class="table table-bordered table-striped table-responsive text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Customer</th>
                        <th>Total</th>
                        <th>Date</th>
                        <th>Delivery Address</th>
                        <th>Payment Method</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                    @php
                        $i = 0;
                    @endphp

                    @forelse ($orders as $order)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $order->customer->name }}</td>
                            <td>{{ $order->total_price }}</td>
                            <td>{{ $order->order_date }}</td>
                            <td>{{ $order->delivery_address }}</td>
                            <td>
                                @if ($order->payment)
                                    {{ $order->payment->payment_method }}
                                @else
                                    <span class="text-muted">No Payment</span>
                                @endif
                            </td>
                            
                            <td>
                                <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" id="status">
                                        <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending
                                        </option>
                                        <option value="Preparing" {{ $order->status == 'Preparing' ? 'selected' : '' }}>
                                            Preparing</option>
                                        <option value="Delivered" {{ $order->status == 'Delivered' ? 'selected' : '' }}>
                                            Delivered</option>
                                        <option value="Cancelled" {{ $order->status == 'Cancelled' ? 'selected' : '' }}>
                                            Cancelled</option>
                                    </select>
                                    <button type="submit" class="btn btn-info btn-sm">Update Status</button>
                                </form>
                            </td>
                            <td>
                                <a class="btn btn-info btn-sm" href="{{ route('orders.show', $order->id) }}">
                                    <i class="fa-solid fa-list"></i> View Orders Details
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">There are no data.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- for pignation --}}
            {{ $orders->links() }}
        </div>
    </div>
@endsection