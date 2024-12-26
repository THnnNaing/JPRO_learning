<?php
include 'connect.php';

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Fetch data from your table
$sql = "SELECT id, announcement, sport_type, announcer_name FROM announcement"; // Replace with your table name and columns
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
<h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Announcements</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <article
                    class="hover:animate-background rounded-xl bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 p-0.5 shadow-xl transition hover:bg-[length:400%_400%] hover:shadow-sm hover:[animation-duration:_4s]">
                    <div class="rounded-[10px] bg-white p-4 sm:p-6 flex flex-col justify-between h-full">
                        <div>
                            <!-- Announcement content -->
                            <h3 class="text-lg font-medium text-gray-900">
                                <?php echo htmlspecialchars($row['announcement']); ?>
                            </h3>
                        </div>
                        
                        <!-- Bottom Section -->
                        <div class="mt-4 border-t border-gray-200 pt-4">
                            <p class="text-sm text-blue-500 flex justify-between">
                                <span><strong class="text-gray-500">Sport Type:</strong> <?php echo htmlspecialchars($row['sport_type']); ?></span>
                                <span><strong class="text-gray-500">Announcer:</strong> <?php echo htmlspecialchars($row['announcer_name']); ?></span>
                            </p>
                        </div>
                    </div>
                </article>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="text-center text-gray-500">No announcements found.</p>
        <?php endif; ?>

        <?php $con->close(); ?>
    </div>
</body>
</html>
