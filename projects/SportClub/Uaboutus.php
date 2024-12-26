<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans">
    <header class="bg-blue-600 text-white py-4">
        <div class="container mx-auto flex justify-between items-center px-6">
            <h1 class="text-2xl font-bold">Our Company</h1>
            <nav>
                <ul class="flex space-x-6">
                    <li><a href="#" class="hover:underline">Home</a></li>
                    <li><a href="#" class="hover:underline">About</a></li>
                    <li><a href="#" class="hover:underline">Services</a></li>
                    <li><a href="#" class="hover:underline">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="bg-white py-16">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold text-gray-800">About Us</h2>
                <p class="mt-4 text-gray-600">Learn more about our journey, mission, and values.</p>
            </div>
            <div class="flex flex-wrap justify-center items-center gap-12">
                <div class="w-full md:w-1/2 lg:w-1/3">
                    <img src="https://via.placeholder.com/400" alt="Our Team" class="rounded-lg shadow-lg">
                </div>
                <div class="w-full md:w-1/2 lg:w-2/3">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Our Mission</h3>
                    <p class="text-gray-600 leading-relaxed">
                        We aim to provide exceptional services and products that empower our customers and enhance their lives. Our team works tirelessly to ensure quality and innovation in every aspect of what we do.
                    </p>
                    <h3 class="text-xl font-semibold text-gray-800 mt-8 mb-4">Our Story</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Founded in 2020, our company began with a small but passionate team. Over the years, we have grown into a diverse organization committed to making a positive impact in our industry and community.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gray-100 py-16">
        <div class="container mx-auto px-6">
            <h3 class="text-2xl font-bold text-center text-gray-800 mb-8">Meet Our Team</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <img src="https://via.placeholder.com/150" alt="Team Member" class="rounded-full w-24 h-24 mx-auto">
                    <h4 class="mt-4 text-lg font-semibold text-gray-800">Jane Doe</h4>
                    <p class="text-sm text-gray-600">CEO & Founder</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <img src="https://via.placeholder.com/150" alt="Team Member" class="rounded-full w-24 h-24 mx-auto">
                    <h4 class="mt-4 text-lg font-semibold text-gray-800">John Smith</h4>
                    <p class="text-sm text-gray-600">CTO</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <img src="https://via.placeholder.com/150" alt="Team Member" class="rounded-full w-24 h-24 mx-auto">
                    <h4 class="mt-4 text-lg font-semibold text-gray-800">Emily Johnson</h4>
                    <p class="text-sm text-gray-600">Head of Marketing</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-blue-600 text-white py-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Our Company. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>