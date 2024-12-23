<?php
// Database connection
include 'connect.php';

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Create/Update operation
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'create') {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $date = $_POST['date'];
            
            $sql = "INSERT INTO events (title, description, event_date) VALUES (?, ?, ?)";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("sss", $title, $description, $date);
            $stmt->execute();
        } elseif ($_POST['action'] == 'delete') {
            $id = $_POST['id'];
            $sql = "DELETE FROM events WHERE id = ?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
        }
    }
}

// Read operation
$sql = "SELECT * FROM event";
$result = $con->query($sql);
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
    <div class="container mx-auto px-4 py-8">
        <!-- Add Event Form -->
        <div class="mb-8 bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-4">Add New Event</h2>
            <form method="POST" class="space-y-4">
                <input type="hidden" name="action" value="create">
                <div>
                    <label class="block text-gray-700">Title</label>
                    <input type="text" name="title" required 
                           class="w-full p-2 border rounded-md">
                </div>
                <div>
                    <label class="block text-gray-700">Description</label>
                    <textarea name="description" required 
                            class="w-full p-2 border rounded-md"></textarea>
                </div>
                <div>
                    <label class="block text-gray-700">Date</label>
                    <input type="date" name="date" required 
                           class="w-full p-2 border rounded-md">
                </div>
                <button type="submit" 
                        class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                    Add Event
                </button>
            </form>
        </div>

        <!-- Event Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php while($row = $result->fetch_assoc()): ?>
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2"><?php echo htmlspecialchars($row['title']); ?></h3>
                        <p class="text-gray-600 mb-4"><?php echo htmlspecialchars($row['description']); ?></p>
                        <p class="text-gray-500"><?php echo date('F d, Y', strtotime($row['event_date'])); ?></p>
                        
                        <div class="mt-4 flex space-x-2">
                            <a href="editEvent.php?id=<?php echo $row['id']; ?>" 
                               class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600">
                                Edit
                            </a>
                            <form method="POST" class="inline">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button type="submit" 
                                        class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600"
                                        onclick="return confirm('Are you sure you want to delete this event?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>
