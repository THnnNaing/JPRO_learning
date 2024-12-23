<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <?php include 'sidebar.php'; ?>

        <!-- Main Content -->
        <div class="flex-1">
            <!-- Top Navigation -->
            <header class="bg-white shadow-sm">
                <div class="flex items-center justify-between px-6 py-4">
                    <h2 class="text-xl font-semibold">Dashboard Overview</h2>
                    <div class="flex items-center">
                        <span class="mr-4">Admin User</span>
                        <button class="bg-gray-800 text-white px-4 py-2 rounded-md hover:bg-gray-700">
                            Logout
                        </button>
                    </div>
                </div>
            </header>

            <!-- Dashboard Content -->
            <main class="p-6">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h3 class="text-gray-500 text-sm font-medium">Total Users</h3>
                        <p class="text-3xl font-bold">1,234</p>
                        <span class="text-green-500">↑ 12%</span>
                    </div>
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h3 class="text-gray-500 text-sm font-medium">Total Revenue</h3>
                        <p class="text-3xl font-bold">$45,678</p>
                        <span class="text-green-500">↑ 8%</span>
                    </div>
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h3 class="text-gray-500 text-sm font-medium">Total Orders</h3>
                        <p class="text-3xl font-bold">892</p>
                        <span class="text-red-500">↓ 3%</span>
                    </div>
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h3 class="text-gray-500 text-sm font-medium">Active Products</h3>
                        <p class="text-3xl font-bold">156</p>
                        <span class="text-green-500">↑ 4%</span>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h3 class="text-xl font-semibold mb-4">Recent Activity</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead>
                                <tr class="border-b">
                                    <th class="text-left py-3 px-4">Action</th>
                                    <th class="text-left py-3 px-4">User</th>
                                    <th class="text-left py-3 px-4">Date</th>
                                    <th class="text-left py-3 px-4">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-3 px-4">New Order #12345</td>
                                    <td class="py-3 px-4">John Doe</td>
                                    <td class="py-3 px-4">2024-03-20</td>
                                    <td class="py-3 px-4">
                                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">
                                            Completed
                                        </span>
                                    </td>
                                </tr>
                                <!-- Add more rows as needed -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Font Awesome for icons -->
   
</body>
</html>
