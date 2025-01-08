@extends('layouts')

@section('content')
<div class="card mt-5">
    <h3 class="card-header">Category</h3>
    <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            
            
                <form action="{{ route('categories.search') }}" method="get">
            <input type="text" name="search" placeholder="Search By Category Name"
                value="{{ request()->input('search') ? request()->input('search') : '' }}">
            <button class="btn btn-success btn-sm" type="submit">Search</button>
             <!-- <a class="btn btn-success btn-sm" href="{{ route('categories.search') }}">  
                        Search</a>  -->
            </form>
            

            <a class="btn btn-success btn-sm" href="{{ route('categories.create') }}">
                <i class="fa fa-plus"></i> Create New Category
            </a>
        </div>

        <table class="table table-bordered table-striped table-responsive text-center">
            <tr>
                <th>No</th>
                <th>Category Name</th>
                <th>Action</th>
            </tr>
            @php
            $i = 0;
            @endphp
            @foreach ($categories as $category)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('categories.show', $category->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('categories.edit', $category->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection