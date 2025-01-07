@extends('categories.layout') 
@section('content') 
    <div class="row"> 
        <div class="col-lg-12 margin-tb"> 
            <div class="pull-left"> 
                <h4>Edit Category</h4> 
            </div> 
            <div class="pull-right"> 
                <a class="btn btn-primary" href="{{ route('categories.index') }}"> Back</a> 
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
 
    <form action="{{ route('categories.update', $category->id) }}" method="POST" 
enctype="multipart/form-data"> 
        @csrf 
        @method('PUT') 
        <div class="col-xs-12 col-sm-12 col-md-12"> 
            <div class="form-group"> 
                <strong>Category Name:</strong> 
                <input type="text" name="name" value="{{ $category->name }}" class="form
control" 
                    placeholder="Category Name"> 
            </div> 
        </div> 
 
        <div class="col-xs-12 col-sm-12 col-md-12 text-center"> 
            <button type="submit" class="btn btn-primary">Update</button> 
        </div> 
        </div> 
 
    </form> 
@endsection 