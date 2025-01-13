<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 11 CRUD</title>
    <!-- For Dropdown Menu -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-
        rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
        crossorigin="anonymous"> --}}
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <!-- <a class="navbar-brand" href="{{ URL('/') }}">Admin Login Page</a> -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs- target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle
        navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <img src="/images/SideLogo.png" alt="Logo" width="100">
                <ul class="navbar-nav ms-auto">
                    {{-- @guest
<li class="nav-item">
<a class="nav-link {{ request()->is('login') ? 'active' : '' }}"
href="{{ route('login') }}">Login</a>
</li>
@else --}}
                    <!-- for Admin Home -->
                    <a class="nav-link" href="{{ route('dashboard') }}">Home</a>
                    <!-- for Category -->
                    <a class="nav-link" href="{{ route('categories.index') }}">Category</a>
                    <!-- for product -->
                    <a class="nav-link" href="{{ route('products.index') }}">Product</a>
                    <!-- for customer -->
                    <a class="nav-link" href="{{ route('viewcustomer') }}">Customer</a>
                    <!-- for View Sale Customer Review -->
                    <a class="nav-link" href="{{ route('viewreview') }}">Review</a>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ Auth::guard('admin')->user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="get">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                    {{-- @endguest --}}
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('content')
        <div class="row justify-content-center text-center mt-3">
        </div>
    </div>
    {{-- For Logout --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-
            kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
