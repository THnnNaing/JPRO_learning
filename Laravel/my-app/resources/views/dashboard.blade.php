@extends('layouts')
@section('content')
<div class="page-header d-print-none">
    <h4 class="page-title">
        Dashboard
    </h4>
</div>
<!-- <div class="page-header d-print-none"> 
        <h4 class="page-title"> 
            Admin Home Page!!!! 

        </h4>  -->
</div>
<div class="row">
    <div class="col-md-3 col-6 mb-4">
        <div class="card">
            <a class="nav-link" href="{{route ('categories.index')}}">
                <img src="./images/momo.jpg" class="card-img-top" width="100" height="100" alt="">
                <div class="card-body">
                    <h5 class="card-titlee">{{$categories}} Cateogry</h5>
                </div>
            </a>

        </div>

    </div>
    <div class="col-md-3 col-6 mb-4">
        <div class="card">
            <a class="nav-link" href="{{route ('categories.index')}}">
                <img src="./images/momo.jpg" class="card-img-top" width="100" height="100" alt="">
                <div class="card-body">
                    <h5 class="card-titlee">{{$categories}} Cateogry</h5>
                </div>
            </a>

        </div>

    </div>
</div>
</div>
@endsection