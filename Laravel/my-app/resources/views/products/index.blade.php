@extends('layouts')
{{-- @extends('products.layout') --}}
@section('content')
<div class="card mt-5">
    <h3 class="card-header">Product Information</h3>
    <div class="card-body">
        @session('success')
        <div class="alert alert-success" role="alert"> {{ $value }} </div>
        @endsession

        {{-- For Search --}}
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <form action="{{ route('products.search') }}" method="GET">
                <input type="text" name="search" placeholder="Search By Products Informations"
                    value="{{ request()->input('search') ? request()->input('search') : '' }}">
                <button class="btn btn-success btn-sm" type="submit">Search</button>
            </form>
            <a class="btn btn-success btn-sm" href="{{ route('products.create') }}">
                <i class="fa fa-plus"></i> Create New Product
            </a>
        </div>

        <table class="table table-bordered table-striped table-responsive text-center">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Photo</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Details</th>
                    <th>Price</th>
                    <th width="250px">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 0;
                @endphp
                @forelse ($products as $product)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td><img src="/images/{{ $product->image }}" width="100px" height="70"></td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->detail }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                            <a class="btn btn-info btn-sm" href="{{ route('products.show', $product->id) }}">
                                <i class="fa-solid fa-list"></i> Show
                            </a>
                            <a class="btn btn-primary btn-sm" href="{{ route('products.edit', $product->id) }}">
                                <i class="fa-solid fa-pen-to-square"></i> Edit
                            </a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7">There are no data.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
