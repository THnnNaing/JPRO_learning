@extends('customers.newlayouts')
@section('content')

    <table id="cart" class="table table-bordered table-striped mt-4">

        <thead>
            <tr>
                <th style="width:5%">No</th>
                <th style="width:50%">Product</th>
                <th style="width:10%">Price</th>
                <th style="width:8%">Quantity</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%"></th>
            </tr>
        </thead>

        <tbody>
            @php $i = 0 @endphp
            @php $total = 0 @endphp

            @if (session('cart'))
                @foreach (session('cart') as $id => $details)
                    @php $total += $details['price'] * $details['quantity'] @endphp

                    <tr data-id="{{ $id }}">

                        <td data-th="No">{{ ++$i }}</td>

                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs">
                                    <img src="/images/{{ $details['image'] }}" width="100" height="100"
                                        class="img-responsive" />
                                </div>

                                <div class="col-sm-9">
                                    <h5 class="nomargin">{{ $details['name'] }}</h5>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">{{ $details['price'] }} Kyats</td>
                        <td data-th="Quantity">
                            <input type="number" value="{{ $details['quantity'] }}"
                                class="form-control quantity update-cart" />
                        </td>

                        <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>

                        <td class="actions" data-th="">

                            <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
                        </td>
                    </tr>
                @endforeach
            @endif

        </tbody>

        <tfoot>
            <tr>
                <td colspan="5" class="text-right">
                    <h4><strong>Total {{ $total }} Kyats</strong></h4>
                </td>
            </tr>
            <tr>
                <td colspan="5" class="text-right">
                    <a href="{{ url('food') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue
                        Shopping</a>

                    <a class="btn btn-success btn-sm" href="{{ route('order') }}"> <i class="fa fa-plus"></i> Checkout</a>

                </td>
            </tr>
        </tfoot>
    </table>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(".update-cart").change(function(e) {

            e.preventDefault();
            var ele = $(this);

            $.ajax({

                url: '{{ route('update.cart') }}',

                method: "patch",

                data: {

                    _token: '{{ csrf_token() }}',

                    id: ele.parents("tr").attr("data-id"),

                    quantity: ele.parents("tr").find(".quantity").val()
                },

                success: function(response) {

                    window.location.reload();

                }

            });

        });

        $(".remove-from-cart").click(function(e) {

            e.preventDefault();
            var ele = $(this);

            if (confirm("Are you sure want to remove?")) {

                $.ajax({

                    url: '{{ route('remove.from.cart') }}',

                    method: "DELETE",

                    data: {

                        _token: '{{ csrf_token() }}',

                        id: ele.parents("tr").attr("data-id")

                    },

                    success: function(response) {

                        window.location.reload();
                    }
                });
            }

        });
    </script>
@endsection
