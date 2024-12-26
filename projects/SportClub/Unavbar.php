<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .mobile-menu-closed {
            opacity: 0;
            max-height: 0;
            transform: translateY(-10px);
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .mobile-menu-open {
            opacity: 1;
            max-height: 400px;
            transform: translateY(0);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
        }

        /* Hover effects for nav links */
        .nav-link {
            position: relative;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -2px;
            left: 0;
            background-color: #0d9488; /* red-500 */
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        /* Button hover effects */
        .button-hover {
            transition: all 0.3s ease;
        }

        .button-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
        }
    </style>
    <title>Responsive Navbar</title>
</head>
<body class="">
<header class="bg-white ">
  <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
    <div class="flex h-16 items-center justify-between">
      <!-- Logo Section -->
      <div class="md:flex md:items-center md:gap-12">
        <a class="block text-red-100" href="Uindex.php">
          <span class="sr-only">Home</span>
          <img src="./Images/logo.png" alt="logo" class="w-auto h-10">
        </a>
      </div>

      <!-- Desktop Navigation -->
      <div class="hidden md:block">
        <nav aria-label="Global">
          <ul class="flex items-center gap-6 text-sm">
            <li><a class="nav-link text-gray-600 transition hover:text-gray-900" href="#">About</a></li>
            <li><a class="nav-link text-gray-600 transition hover:text-gray-900" href="#">Announcements</a></li>
            <li><a class="nav-link text-gray-600 transition hover:text-gray-900" href="#">Events</a></li>
            <li><a class="nav-link text-gray-600 transition hover:text-gray-900" href="#">Club Info</a></li>
            <li><a class="nav-link text-gray-600 transition hover:text-gray-900" href="#">History</a></li>
            <li><a class="nav-link text-gray-600 transition hover:text-gray-900" href="#">Contact Us</a></li>
          </ul>
        </nav>
      </div>

      <!-- Actions -->
      <div class="flex items-center gap-4">
        <div class="sm:flex sm:gap-4">
          <a class="button-hover rounded-md bg-red-500 px-5 py-2.5 text-sm font-medium text-white shadow" href="#">
            Login
          </a>
          <div class="hidden sm:flex">
            <a class="button-hover rounded-md bg-gray-100 px-5 py-2.5 text-sm font-medium text-red-500" href="#">
              Register
            </a>
          </div>
        </div>

        <!-- Mobile Menu Toggle -->
        <div class="block md:hidden">
          <button id="menu-toggle" class="rounded bg-gray-100 p-2 text-gray-600 transition hover:text-gray-900 hover:bg-gray-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile Navigation -->
    <nav id="mobile-menu" class="mobile-menu-closed mt-2 md:hidden bg-white rounded-lg p-2">
      <ul class="space-y-3 text-sm">
        <li><a class="block text-gray-600 transition hover:text-gray-900 hover:bg-gray-50 p-2 rounded-md" href="#">About</a></li>
        <li><a class="block text-gray-600 transition hover:text-gray-900 hover:bg-gray-50 p-2 rounded-md" href="#">Careers</a></li>
        <li><a class="block text-gray-600 transition hover:text-gray-900 hover:bg-gray-50 p-2 rounded-md" href="#">History</a></li>
        <li><a class="block text-gray-600 transition hover:text-gray-900 hover:bg-gray-50 p-2 rounded-md" href="#">Services</a></li>
        <li><a class="block text-gray-600 transition hover:text-gray-900 hover:bg-gray-50 p-2 rounded-md" href="#">Projects</a></li>
        <li><a class="block text-gray-600 transition hover:text-gray-900 hover:bg-gray-50 p-2 rounded-md" href="#">Blog</a></li>
      </ul>
    </nav>
  </div>
</header>

<script>
  // Toggle mobile menu visibility
  const menuToggle = document.getElementById('menu-toggle');
  const mobileMenu = document.getElementById('mobile-menu');

  menuToggle.addEventListener('click', () => {
    mobileMenu.classList.toggle('mobile-menu-closed');
    mobileMenu.classList.toggle('mobile-menu-open');
  });
</script>
</body>
</html>
