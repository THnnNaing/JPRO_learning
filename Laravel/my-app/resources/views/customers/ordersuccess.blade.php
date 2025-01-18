@extends('customers.layouts')
@section('content')
    <!DOCTYPE html>
    <html>

    <head>
        <title>Laravel 11</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            crossorigin="anonymous">

        {{-- For Print --}}
        <link rel="stylesheet" type="text/css" href="{{ asset('css/print.css') }}">
        <script type="text/javascript">
            function PrintDoc() {
                var toPrint = document.getElementById('printarea');
                //window.open(URL, name, specs, replace)
                var popupWin = window.open('', '_blank', 'width=900,height=900,location=no,left=200px');
                popupWin.document.open();
                popupWin.document.write('<html><title>Preview</title><head></head><body onload="window.print()">')
                popupWin.document.write(toPrint.innerHTML);
                popupWin.document.write('</html>');
                popupWin.document.close();
            }
        </script>
    </head>

    <body>
        <form method="post">
            <button class="btn btn-success btn-sm" type="button" value="Print" onclick="PrintDoc()">
                Print
            </button>
        </form>
        <div id="printarea">
            <div class="card mt-5">
                @session('success')
                    <div class="alert alert-success" role="alert"> {{ $value }} </div>
                @endsession

                <h5 class="card-header">Your Order Details</h5>
                <div class="card-body">
                    <div>
                        <table width="800">
                            <tr>
                                <td><strong>Customer Name</strong> </td>
                                <td> {{ $order->customer->name }} </td>
                            </tr>

                            <tr>
                                <td><strong>Phone</strong> </td>
                                <td> {{ $order->customer->phone }} </td>
                            </tr>

                            <tr>
                                <td><strong>Email</strong> </td>
                                <td> {{ $order->customer->email }} </td>
                            </tr>


                            <tr>
                                <td><strong>Order Date</strong> </td>
                                <td> {{ $order->order_date }} </td>
                            </tr>

                            <tr>
                                <td><strong>Delivery Address</strong> </td>
                                <td> {{ $order->delivery_address }} </td>
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
        </div>
    </body>
    <div>
        <h5>*** Thanks for Your Order !!! ***<h5>
    </div>

    </html>
@endsection
