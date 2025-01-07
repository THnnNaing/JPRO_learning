@extends('categories.layout') 
@section('content') 
    <div class="row"> 
        <div class="col-lg-12 margin-tb"> 
            <div class="pull-left"> 
                <h4> Show Category</h4> 
            </div> 
            <div class="pull-right"> 
                <a class="btn btn-primary" href="{{ route('categories.index') }}"> Back</a> 
            </div> 
        </div> 
    </div> 
    <table width="400"> 
        <tr> 
            <td><strong>Category</strong> </td> 
            <td> {{ $category->name }} </td> 
        </tr> 
    </table> 
@endsection