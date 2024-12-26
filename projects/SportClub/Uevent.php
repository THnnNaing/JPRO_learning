<?php
include 'connect.php';

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Fetch data from your table
$sql = "SELECT id, event, date, location, sport_type, organizer_name FROM event"; // Replace with your table name and columns
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Announcements</title>
</head>
<body class="bg-gray-100 p-4">
    <div class="max-w-screen-xl mx-auto">
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Upcoming Events</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <article
                        class="rounded-xl bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 p-0.5 shadow-xl transition hover:bg-[length:400%_400%] hover:shadow-lg hover:[animation-duration:_4s]">
                        <div class="rounded-[10px] bg-white p-4 sm:p-6 flex flex-col justify-between h-full">
                            <!-- Announcement content -->
                            <h3 class="text-lg font-bold text-gray-900">
                                <?php echo htmlspecialchars($row['event']); ?>
                            </h3>
                            <p class="text-sm text-gray-600 mt-2">
                                <strong>Date:</strong> <?php echo htmlspecialchars($row['date']); ?>
                            </p>
                            <p class="text-sm text-gray-600">
                                <strong>Location:</strong> <?php echo htmlspecialchars($row['location']); ?>
                            </p>
                            <p class="text-sm text-gray-600">
                                <strong>Sport Type:</strong> <?php echo htmlspecialchars($row['sport_type']); ?>
                            </p>
                            
                            <!-- Button or Footer -->
                            <div class="mt-4 border-t border-gray-200 pt-4 flex justify-between items-center">
                                <a href="Uevent_details.php?id=<?php echo $row['id']; ?>" class="text-blue-500 hover:underline text-sm">
                                    View Details
                                </a>
                                <p class="text-sm text-blue-600">
                                    <strong class="text-gray-600">Organizer:</strong> <?php echo htmlspecialchars($row['organizer_name']); ?>
                                </p>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-center text-gray-500">No events found.</p>
            <?php endif; ?>

            <?php $con->close(); ?>
        </div>
    </div>
</body>
</html>
