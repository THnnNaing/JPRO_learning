@extends('customers.layouts')
@section('content')

    <div>
        <h5>***Hello!!!, For Review, You must registered customer.***<h5>
    </div>
    <a class="nav-link" href="{{ route('cregister') }}">
        <h5 class="text-center">Register!!!</h5>
    </a>

    <div class="card mt-5">
        <h4 class="card-header">Add New Review</h4>
        <div class="card-body">
            @session('success')
                <div class="alert alert-success" role="alert"> {{ $value }} </div>
            @endsession

            <form action="{{ route('review') }}" method="POST">
                @csrf

                {{-- For Product SelectBox --}}
                <div class="mb-3">
                    <div class="form-group">
                        <strong>Product:</strong>
                        <select name="product_id" class="form-control" placeholder="Product">
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="inputEmail" class="form-label"><strong>Email:</strong></label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        id="inputEmail" placeholder="Email">
                    @error('email')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- <div class="mb-3">
                    <div class="form-group">
                        <strong>Customer:</strong>
                        <select name="customer_id" class="form-control" placeholder="Customer">
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div> --}}

                <div class="mb-3">
                    <div class="form-group">
                        <label for="inputComment" class="form-label"><strong>Comment:</strong></label>
                        <textarea id="message" name="comment" rows="4" cols="30" class="form-control"></textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
            </form>
        </div>
    </div>
@endsection
