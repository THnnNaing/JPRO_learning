<?php
session_start();
if (!isset($_SESSION['admin_user'])) {
    header("Location: adminlogin.php");
    exit();
}
include 'connect.php';

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Fetch data from your table
$sql = "SELECT id, name FROM admin"; // Replace with your table name and columns
$result = $con->query($sql);

$sql1 = "SELECT count(*) FROM member"; // Replace with your table name and columns
$result1 = $con->query($sql1);

$sql2 = "SELECT count(*) FROM announcement"; // Replace with your table name and columns
$result2 = $con->query($sql2);

$sql3 = "SELECT count(*) FROM event"; // Replace with your table name and columns
$result3 = $con->query($sql3);

$sql4 = "SELECT count(*) FROM registration"; // Replace with your table name and columns
$result4 = $con->query($sql4);

$query = "SELECT id, name, sport_type, email FROM member";
$result5 = $con->query($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <?php include 'sidebar.php'; ?>

        <!-- Main Content -->
        <div class="flex-1">
            <!-- Top Navigation -->
            <?php include 'adminheader.php'; ?>

            <!-- Dashboard Content -->
            <main class="p-6">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h3 class="text-gray-500 text-sm font-medium">Total Members</h3>
                        <p class="text-3xl font-bold"><?php echo $result1->fetch_assoc()['count(*)']; ?></p>
                        <!-- <span class="text-green-500">↑ 12%</span> -->
                    </div>
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h3 class="text-gray-500 text-sm font-medium">Total Announcements</h3>
                        <p class="text-3xl font-bold"><?php echo $result2->fetch_assoc()['count(*)']; ?></p>
                        <!-- <span class="text-green-500">↑ 8%</span> -->
                    </div>
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h3 class="text-gray-500 text-sm font-medium">Total Events</h3>
                        <p class="text-3xl font-bold"><?php echo $result3->fetch_assoc()['count(*)']; ?></p>
                        <!-- <span class="text-red-500">↓ 3%</span> -->
                    </div>
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h3 class="text-gray-500 text-sm font-medium">Total Registrations</h3>
                        <p class="text-3xl font-bold"><?php echo $result4->fetch_assoc()['count(*)']; ?></p>
                        <!-- <span class="text-green-500">↑ 4%</span> -->
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h3 class="text-xl font-semibold mb-4">Recent Activity</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead>
                                <tr class="border-b">
                                    <th class="text-left py-3 px-4">No</th>
                                    <th class="text-left py-3 px-4">Member Name</th>
                                    <th class="text-left py-3 px-4">Sport Club</th>
                                    <th class="text-left py-3 px-4">Email</th>
                                </tr>
                            </thead>
                            <!-- <tbody>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-3 px-4">New Order #12345</td>
                                    <td class="py-3 px-4">John Doe</td>
                                    <td class="py-3 px-4">2024-03-20</td>
                                    <td class="py-3 px-4">
                                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">
                                            Active
                                        </span>
                                    </td>
                                </tr>
                            </tbody> -->
                            <tbody>
                        <?php if ($result->num_rows > 0): ?>
                            <?php
                            $counter = 1; // Initialize a counter
                            while ($row = $result5->fetch_assoc()): ?>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-3 px-4"><?php echo $counter; ?></td>
                                    <td class="py-3 px-4"><?php echo htmlspecialchars($row['name']); ?></td>
                                    <td class="py-3 px-4"><?php echo htmlspecialchars($row['sport_type']); ?></td>
                                    <td class="py-3 px-4"><?php echo htmlspecialchars($row['email']); ?></td>
                                </tr>
                                <?php
                                $counter++; // Increment the counter after each row
                                ?>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center py-2 text-gray-500">No records found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                        </table>
                    </div>
                </div>

                

            </main>
        </div>
    </div>




</body>

</html>