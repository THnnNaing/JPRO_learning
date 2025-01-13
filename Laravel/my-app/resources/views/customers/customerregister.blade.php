@extends('customers.layouts')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h4>Please Fill Your Information</h4>
            </div>
            {{-- <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('cart') }}"> Back</a>
            </div> --}}
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

    <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Customer Name:</strong></label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="inputName"
                placeholder="Name">
            @error('name')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputAddress" class="form-label"><strong>Address:</strong></label>
            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                id="inputAddress" placeholder="Address">
            @error('address')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputPhone" class="form-label"><strong>Phone:</strong></label>
            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="inputPhone"
                placeholder="Phone">
            @error('phone')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputUserName" class="form-label"><strong>User Name:</strong></label>
            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                id="inputUserName" placeholder="UserName">
            @error('username')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputEmail" class="form-label"><strong>Email:</strong></label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail"
                placeholder="Email">
            @error('email')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputPassword" class="form-label"><strong>Password:</strong></label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                id="inputPassword" placeholder="Password">
            @error('password')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">
            <i class="fa-solid fa-floppy-disk"></i> Register</button>
    </form>

    </div>
    </div>
@endsection
