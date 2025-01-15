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

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #9B9A9C;">

        <div class="container">

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <img src="/images/SideLogo.png" alt="Logo" width="100">

                <ul class="navbar-nav ms-auto">

                    <!--  for Customer Home -->
                    <a class="nav-link active" href="{{ route('home') }}">Home</a>

                    {{-- for Food Menu  --}}
                    <a class="nav-link" href="{{ route('food') }}">Food Menu</a>

                    <!--  for Order -->

                    <!--  for Review -->
                    <a class="nav-link" href="{{ route('review') }}">Review</a>

                    <a class="nav-link" href="{{ route('aboutus') }}">About Us</a>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container">

        @yield('content')
        <div class="row justify-content-center text-center mt-3">

        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-secondary text-white pt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>About Us</h5>
                    <p>.......</p>
                </div>
                <div class="col-md-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home') }}" class="text-white">Home</a></li>
                        {{-- <li><a href="{{ route('food') }}" class="text-white">Food Menu</a></li> --}}
                        <li><a href="{{ route('review') }}" class="text-white">Review</a></li>
                        <li><a href="{{ route('aboutus') }}" class="text-white">About Us</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Contact Us</h5>
                    <address> 123, Insein Road, Hlendan, Yangon, Myanmar<br> Email:
                        <a href="mailto:info@example.com" class="text-white">jpro@gmail.com</a>
                        <br> Phone: (09) 450-1111-22
                    </address>
                </div>
            </div>
        </div>
        <div class="bg-light text-dark text-center py-2 mt-4"> &copy; 2024 Your Company. All rights reserved. </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
