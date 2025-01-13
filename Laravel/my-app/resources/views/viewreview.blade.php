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
                <form action="{{ route('viewreview.search') }}" method="GET">
                    <label for="start_date">Start Date:</label>
                    <input type="date" id="start_date" name="start_date" required>

                    <label for="end_date">End Date:</label>
                    <input type="date" id="end_date" name="end_date" required>

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
                                <th>Product</th>
                                <th>Customer Name</th>
                                <th>Email</th>
                                <th>Comment</th>
                                <th>Review_Date</th>
                                {{-- <th width="250px">Action</th> --}}
                            </tr>
                        </thead>

                        <tbody>

                            @php
                                $i = 0;
                            @endphp

                            @forelse ($reviews as $review)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $review->product->name }}</td>
                                    <td>{{ $review->customer->name }}</td>
                                    <td>{{ $review->customer->email }}</td>
                                    <td>{{ $review->comment }}</td>
                                    <td>{{ $review->review_date }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">There are no data.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{-- for pignation --}}
                    {{ $reviews->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
