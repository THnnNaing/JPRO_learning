@extends('customers.layouts')
@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Payment Page</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h5>Payment for Order #{{ $order->id }}</h5>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('payment.store') }}" method="POST">
            @csrf
            <input type="hidden" name="order_id" value="{{ $order->id }}">
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="text" name="amount" class="form-control" value="{{ $order->total_price }}" readonly>
            </div>
            <div class="form-group">
                <label for="payment_method">Payment Method</label>
                <select name="payment_method" class="form-control">
                    <option value="KBZ_Pay">KBZ Pay</option>
                    <option value="Wave_Pay">Wave Pay</option>
                    <option value="AYA_Pay">AYA Pay</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Pay Now</button>
        </form>
    </div>
</body>
</html>
@endsection