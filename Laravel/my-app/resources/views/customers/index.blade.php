@extends('customers.layouts')
@section('content')
<br>
    <div class="container mt-8">
        <h4>Healthy Food</h4>
    </div>

    <div class="container mt-4">
        <img src="/images/foodbanner.jpg" height="100%" width="200" class="card-img-top img-size">
    </div>

    <div class="container mt-4">
        <!--  for Register -->
        <a class="nav-link" href="{{ route('cregister') }}">
            <h5 class="text-center">Register!!!</h5>
        </a>
    </div>
    @session('success')
        <div class="alert alert-success" role="alert"> {{ $value }} </div>
    @endsession


@endsection
