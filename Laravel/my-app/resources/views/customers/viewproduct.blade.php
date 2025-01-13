@extends('customers.newlayouts')
@section('content')
    <div class="row mt-5">
        @foreach ($categories as $category)
            <h5>{{ $category->name }}</h5>
            @foreach ($category->products as $product)
                <div class="col-md-3">
                    <div class="card text-center">
                        <img src="/images/{{ $product->image }}" alt="{{ $product->name }}" class="card-img-top" width="100"
                            height="150">

                        <div class="caption card-body">
                            <h5>{{ $product->name }}</h5>
                            <p>{{ $product->detail }}</p>
                            <p><strong>Price: </strong>{{ $product->price }} Kyats</p>
                            <a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-warning btn-block text-center"
                                role="button">Add to Cart</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>
@endsection
