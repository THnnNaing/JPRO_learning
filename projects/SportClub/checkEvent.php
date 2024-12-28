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


// Fetch events from the database
$sql1 = "SELECT id, event, details, date, location, sport_type, organizer_name FROM event ORDER BY date DESC";
$result = $con->query($sql1);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <?php include 'sidebar.php'; ?>

        <div class="flex-1">
            <?php include 'adminheader.php'; ?>


            <div class="container mx-auto px-4 py-8">
                <!-- Event Cards -->
                <div class="container mx-auto px-4 py-6">
                    <h1 class="text-xl font-bold mb-4">Event List</h1>

                    <div class="bg-white p-4 rounded-lg shadow-md">
                        <table class="w-full text-sm border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-200 text-left">
                                    <th class="px-2 py-1 border">No</th>
                                    <th class="px-2 py-1 border">Event</th>
                                    <th class="px-2 py-1 border">Details</th>
                                    <th class="px-2 py-1 border">Date</th>
                                    <th class="px-2 py-1 border">Location</th>
                                    <th class="px-2 py-1 border">Type</th>
                                    <th class="px-2 py-1 border">Organizer</th>
                                    <!-- <th class="px-2 py-1 border">Actions</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($result->num_rows > 0): ?>
                                    <?php
                                    $counter = 1; // Initialize a counter
                                    while ($row = $result->fetch_assoc()):
                                    ?>
                                        <tr class="hover:bg-gray-100">
                                            <td class="px-2 py-1 border"><?php echo $counter; ?></td> <!-- Use counter instead of $row['id'] -->
                                            <td class="px-2 py-1 border"><?php echo $row['event']; ?></td>
                                            <td class="px-2 py-1 border"><?php echo substr($row['details'], 0, 50) . (strlen($row['details']) > 50 ? '...' : ''); ?></td>
                                            <td class="px-2 py-1 border"><?php echo $row['date']; ?></td>
                                            <td class="px-2 py-1 border"><?php echo $row['location']; ?></td>
                                            <td class="px-2 py-1 border"><?php echo $row['sport_type']; ?></td>
                                            <td class="px-2 py-1 border"><?php echo $row['organizer_name']; ?></td>
                                            <!-- <td class="px-2 py-1 border text-center">
                                                <a href="edit_event.php?id=<?php echo $row['id']; ?>"
                                                    class="text-blue-500 hover:underline">Edit</a> |
                                                <a href="delete_event.php?id=<?php echo $row['id']; ?>"
                                                    class="text-red-500 hover:underline"
                                                    onclick="return confirm('Are you sure you want to delete this event?');">
                                                    Delete
                                                </a>
                                            </td> -->
                                        </tr>
                                        <?php
                                        $counter++; // Increment the counter after each row
                                        ?>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="8" class="px-2 py-1 text-center text-gray-500">No events found</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>