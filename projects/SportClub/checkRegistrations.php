<?php
session_start();
if (!isset($_SESSION['admin_user'])) {
    header("Location: adminlogin.php");
    exit();
}

include 'connect.php';

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Fetch all records
$query = "SELECT id, name, grade, batch, sport_type, event_name, email FROM registration";
$result = $con->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approval Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <?php include 'sidebar.php'; ?>

        <div class="flex-1">
            <?php include 'adminheader.php'; ?>
            <div class="container mx-auto mt-5 ml-2">
                <h1 class="text-2xl font-bold mb-4">Check Registrations</h1>
                <table class="table-auto w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2 border">ID</th>
                            <th class="px-4 py-2 border">Name</th>
                            <th class="px-4 py-2 border">Grade</th>
                            <th class="px-4 py-2 border">Batch</th>
                            <th class="px-4 py-2 border">Sport Type</th>
                            <th class="px-4 py-2 border">Event Name</th>
                            <th class="px-4 py-2 border">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0): ?>
                            <?php
                            $counter = 1; // Initialize a counter
                            while ($row = $result->fetch_assoc()):
                            ?>
                                <tr class="hover:bg-gray-100">
                                    <td class="px-2 py-1 border"><?php echo $counter; ?></td>
                                    <td class="px-4 py-2 border"><?php echo htmlspecialchars($row['name']); ?></td>
                                    <td class="px-4 py-2 border"><?php echo htmlspecialchars($row['grade']); ?></td>
                                    <td class="px-4 py-2 border"><?php echo htmlspecialchars($row['batch']); ?></td>
                                    <td class="px-4 py-2 border"><?php echo htmlspecialchars($row['sport_type']); ?></td>
                                    <td class="px-4 py-2 border"><?php echo htmlspecialchars($row['event_name']); ?></td>
                                    <td class="px-4 py-2 border"><?php echo htmlspecialchars($row['email']); ?></td>
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
    </div>

</body>

</html>

<?php
// Close the database connection
$con->close();
?>