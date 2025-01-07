@extends('products.layout') 
@section('content') 
    <div class="card mt-5"> 
        <h2 class="card-header">Show Product</h2> 
        <div class="card-body"> 
            <div class="d-grid gap-2 d-md-flex justify-content-md-end"> 
                <a class="btn btn-primary btn-sm" href="{{ route('products.index') }}"><i class="fa 
fa-arrow-left"></i> 
                    Back</a> 
            </div> 
            <div> 
                <table width="400"> 
                    <tr> 
                        <td><strong>Category</strong> </td> 
                        <td> {{ $product->category->name }} </td> 
                    </tr> 
                    <tr> 
                        <td><strong>Name</strong> </td> 
                        <td> {{ $product->name }} </td> 
                    </tr> 
                    <tr> 
                        <td><strong>Details</strong> </td> 
                        <td> {{ $product->detail }} </td> 
                    </tr> 
                    <tr> 
                        <td><strong>Price</strong> </td> 
                        <td> {{ $product->price }} </td> 
                    </tr> 
                    <tr> 
                        <td><strong>Image</strong> </td> 
                        <td> <img src="/images/{{ $product->image }}" width="100px"> </td> 
                    </tr> 
                </table> 
            </div> 
        </div> 
    </div> 
@endsection 