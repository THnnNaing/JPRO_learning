@extends('layouts')
@section('content')

    <div class="card mt-5">
        <h3 class="card-header">Customer Information</h3>
        <div class="card-body">

            @session('success')
                <div class="alert alert-success" role="alert"> {{ $value }} </div>
            @endsession

            {{-- For Search --}}
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <form action="{{ route('viewcustomer.search') }}" method="GET">
                    <input type="text" name="search" placeholder="Search By Customer Info:"
                        value="{{ request()->input('search') ? request()->input('search') : '' }}">

                    <button class="btn btn-success btn-sm" type="submit">Search</button>
                </form>

            </div>

            <div class="row justify-content-center">
                <div class="col-auto">
                    <table class="table table-bordered table-striped table-responsive text-center">
                        {{-- <table class="table table-bordered table-striped mt-4"> --}}
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>UserName</th>
                                <th>Password</th>
                                {{-- <th width="250px">Action</th> --}}
                            </tr>
                        </thead>

                        <tbody>

                            @php
                                $i = 0;
                            @endphp

                            @forelse ($customers as $customer)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->address }}</td>
                                    <td>{{ $customer->phone }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->username }}</td>
                                    <td>{{ $customer->password }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">There are no data.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{-- for pignation --}}
                    {{ $customers->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
