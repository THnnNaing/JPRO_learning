@extends('customers.newlayouts')

@section('content')
    <div> </div>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h5>*** Hello!!!, For Order, You must registered customer.***<h5>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('cart') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong> <br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="inputEmail" class="form-label"><strong>Email:</strong></label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail"
                placeholder="Email">
            @error('email')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputDAddress" class="form-label"><strong>Delivery Address:</strong></label>
            <input type="text" name="delivery_address"
                class="form-control @error('delivery_address') is-invalid @enderror" id="inputDAddress"
                placeholder="Delivery Address">
            @error('delivery_address')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Order</button>
    </form>
@endsection
