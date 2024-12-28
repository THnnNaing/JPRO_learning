<?php
include 'connect.php';

$event_id = $_GET['id'] ?? null;
$event = $date = $location = $sport_type = $organizer_name = ""; // Initialize variables

if ($event_id) {
    // Fetch event data from the database

    $sql = "SELECT * FROM event WHERE id = '$event_id'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $event = $row['event'];
        $date = $row['date'];
        $location = $row['location'];
        $sport_type = $row['sport_type'];
        $organizer_name = $row['organizer_name'];
    } else {
        echo "Event not found.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Register Event</title>
</head>
<body class="bg-gray-100 p-4">
    <div class="max-w-screen-md mx-auto">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">
            <?php echo $event_id ? "Edit Event" : "Register a New Event"; ?>
        </h1>
        <form action="save_event.php" method="POST" class="bg-white shadow-md rounded-lg p-6 space-y-4">
            <!-- Include hidden input for event ID -->
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($event_id); ?>">

            <div>
                <label for="event" class="block text-sm font-medium text-gray-700">Event Name</label>
                <input type="text" id="event" name="event" required 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                       value="<?php echo htmlspecialchars($event); ?>">
            </div>
            <div>
                <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                <input type="date" id="date" name="date" required 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                       value="<?php echo htmlspecialchars($date); ?>">
            </div>
            <div>
                <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                <input type="text" id="location" name="location" required 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                       value="<?php echo htmlspecialchars($location); ?>">
            </div>
            <div>
                <label for="sport_type" class="block text-sm font-medium text-gray-700">Sport Type</label>
                <input type="text" id="sport_type" name="sport_type" required 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                       value="<?php echo htmlspecialchars($sport_type); ?>">
            </div>
            <div>
                <label for="organizer_name" class="block text-sm font-medium text-gray-700">Organizer Name</label>
                <input type="text" id="organizer_name" name="organizer_name" required 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                       value="<?php echo htmlspecialchars($organizer_name); ?>">
            </div>
        </form>
    </div>
    <?php include 'UEventRegister.php';?>
</body>
</html>
