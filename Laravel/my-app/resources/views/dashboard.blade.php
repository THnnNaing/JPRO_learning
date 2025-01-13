@extends('layouts')
@section('content')
    <div class="page-header d-print-none">
        <h4 class="page-title">
            Dashboard
        </h4>
    </div>
    <div class="page-header d-print-none">
        <h4 class="page-title">
        </h4>
        {{-- </div>
            Admin Home Page!!!!
        </div> --}}
        <div class="row">
            <div class="col-md-3 col-6 mb-4">
                <div class="card">
                    <a href="{{ route('categories.index') }}" class="nav-link">
                        <img src="/images/categories.png" alt="" class="card-img-top" width="100" height="200px">
                        <div class="card-body">
                            <h5 class="card-title"> {{ $categories }} Categories</h5>
                        </div>
                    </a>
                </div>

            </div>
            <div class="col-md-3 col-6 mb-4">
                <div class="card">
                    <a href="{{ route('categories.index') }}" class="nav-link">
                        <img src="/images/dinner.png" alt="" class="card-img-top" width="100" height="200px">
                        <div class="card-body">
                            <h5 class="card-title"> {{ $products }} Products</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <div class="card">
                    <a href="{{ route('viewcustomer') }}" class="nav-link">
                        <img src="/images/people.png" alt="" class="card-img-top" width="100" height="200px">
                        <div class="card-body">
                            <h5 class="card-title"> {{ $customers }} Customers</h5>
                        </div>
                    </a>
                </div>
            </div>
            
        </div>
    @endsection
