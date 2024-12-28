<?php
// Database connection
include 'connect.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Delete event
    $sql = "DELETE FROM event WHERE id = $id";

    if ($con->query($sql) === TRUE) {
        echo "<script>
                alert('Event deleted successfully!');
                window.location.href = 'manageEvent.php';
              </script>";
    } else {
        echo "<script>
                alert('Error deleting event: " . addslashes($con->error) . "');
              </script>";
    }
}
?>

include Sidebar

<div class="mb-8 bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">Delete Event</h2>
    <form method="POST" name="delete_event.php" class="space-y-4">
        <input type="hidden" name="action" value="delete">
        <input type="hidden" name="id" value="<?php echo $event['id']; ?>"> <!-- Event ID -->

        <p>Are you sure you want to delete the event "<strong><?php echo $event['title']; ?></strong>"?</p>
        <button type="submit" 
                class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">
            Delete Event
        </button>
    </form>
</div>
