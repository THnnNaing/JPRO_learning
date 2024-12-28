<?php
// Database connection
include 'connect.php';

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Initialize variables
$announcement = $sport_type = $announcer_name = "";
$id = intval($_GET['id'] ?? 0);

// Fetch the announcement data for editing
if ($id > 0) {
    $sql = "SELECT * FROM announcement WHERE id = $id";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $announcement_data = $result->fetch_assoc();
        $announcement = $announcement_data['announcement'];
        $sport_type = $announcement_data['sport_type'];
        $announcer_name = $announcement_data['announcer_name'];
    } else {
        echo "<script>
                alert('Announcement not found!');
                window.location.href = 'manageAnnouncement.php';
              </script>";
        exit;
    }
}

// Handle form submission for updating the announcement
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $announcement = $con->real_escape_string($_POST['announcement']);
    $sport_type = $con->real_escape_string($_POST['sport_type']);
    $announcer_name = $con->real_escape_string($_POST['announcer_name']);

    $sql = "UPDATE announcement 
            SET announcement='$announcement', 
                sport_type='$sport_type', 
                announcer_name='$announcer_name' 
            WHERE id=$id";

    if ($con->query($sql) === TRUE) {
        echo "<script>
                alert('Announcement updated successfully!');
                window.location.href = 'manageAnnouncement.php';
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
    <title>Edit Announcement</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="mb-8 bg-white p-6 rounded-lg shadow-md max-w-md mx-auto">
    <h2 class="text-2xl font-bold mb-4">Edit Announcement</h2>
    <form method="POST" class="space-y-4">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

        <div>
            <label class="block text-gray-700">Announcement</label>
            <textarea name="announcement" required class="w-full p-2 border rounded-md"><?php echo htmlspecialchars($announcement); ?></textarea>
        </div>
        <div>
            <label class="block text-gray-700">Sport Type</label>
            <input type="text" name="sport_type" value="<?php echo htmlspecialchars($sport_type); ?>" required
                   class="w-full p-2 border rounded-md">
        </div>
        <div>
            <label class="block text-gray-700">Announcer Name</label>
            <input type="text" name="announcer_name" value="<?php echo htmlspecialchars($announcer_name); ?>" required
                   class="w-full p-2 border rounded-md">
        </div>
        <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
            Update Announcement
        </button>
    </form>
</div>
</body>
</html>
