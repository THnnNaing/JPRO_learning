<?php
// Database connection
include 'connect.php';

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Initialize variables
$event = $details = $date = $location = $sport_type = $organizer_name = "";
$id = intval($_GET['id'] ?? 0);

// Fetch the event data for editing
if ($id > 0) {
    $sql = "SELECT * FROM event WHERE id = $id";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $event_data = $result->fetch_assoc();
        $event = $event_data['event'];
        $details = $event_data['details'];
        $date = $event_data['date'];
        $location = $event_data['location'];
        $sport_type = $event_data['sport_type'];
        $organizer_name = $event_data['organizer_name'];
    } else {
        echo "<script>
                alert('Event not found!');
                window.location.href = 'manageEvent.php';
              </script>";
        exit;
    }
}

// Handle form submission for updating the event
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $event = $con->real_escape_string($_POST['event']);
    $details = $con->real_escape_string($_POST['details']);
    $date = $con->real_escape_string($_POST['date']);
    $location = $con->real_escape_string($_POST['location']);
    $sport_type = $con->real_escape_string($_POST['sport_type']);
    $organizer_name = $con->real_escape_string($_POST['organizer_name']);

    $sql = "UPDATE event 
            SET event='$event', 
                details='$details', 
                date='$date', 
                location='$location', 
                sport_type='$sport_type', 
                organizer_name='$organizer_name' 
            WHERE id=$id";

    if ($con->query($sql) === TRUE) {
        echo "<script>
                alert('Event updated successfully!');
                window.location.href = 'manageEvent.php';
              </script>";
    } else {
        echo "<script>
                alert('Error: " . addslashes($con->error) . "');
              </script>";
    }
}

// Close the database connection
$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="mb-8 bg-white p-6 rounded-lg shadow-md max-w-md mx-auto">
    <h2 class="text-2xl font-bold mb-4">Edit Event</h2>
    <form method="POST" class="space-y-4">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

        <div>
            <label class="block text-gray-700">Event Title</label>
            <input type="text" name="event" value="<?php echo htmlspecialchars($event); ?>" required
                   class="w-full p-2 border rounded-md">
        </div>
        <div>
            <label class="block text-gray-700">Event Details</label>
            <textarea name="details" class="w-full p-2 border rounded-md"><?php echo htmlspecialchars($details); ?></textarea>
        </div>
        <div>
            <label class="block text-gray-700">Date</label>
            <input type="date" name="date" value="<?php echo htmlspecialchars($date); ?>" required
                   class="w-full p-2 border rounded-md">
        </div>
        <div>
            <label class="block text-gray-700">Event Location</label>
            <input type="text" name="location" value="<?php echo htmlspecialchars($location); ?>" required
                   class="w-full p-2 border rounded-md">
        </div>
        <div>
            <label class="block text-gray-700">Sport Club</label>
            <input type="text" name="sport_type" value="<?php echo htmlspecialchars($sport_type); ?>" required
                   class="w-full p-2 border rounded-md">
        </div>
        <div>
            <label class="block text-gray-700">Organizer Name</label>
            <input type="text" name="organizer_name" value="<?php echo htmlspecialchars($organizer_name); ?>" required
                   class="w-full p-2 border rounded-md">
        </div>
        <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
            Update Event
        </button>
    </form>
</div>
</body>
</html>
