<?php
// Database connection
include 'connect.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Delete announcement
    $sql = "DELETE FROM announcement WHERE id = $id";

    if ($con->query($sql) === TRUE) {
        echo "<script>
                alert('Announcement deleted successfully!');
                window.location.href = 'manageAnnouncement.php';
              </script>";
    } else {
        echo "<script>
                alert('Error deleting announcement: " . addslashes($con->error) . "');
              </script>";
    }
}
?>

<?php include 'Sidebar.php'; ?>

<div class="mb-8 bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">Delete Announcement</h2>
    <form method="POST" name="delete_announcement.php" class="space-y-4">
        <input type="hidden" name="action" value="delete">
        <input type="hidden" name="id" value="<?php echo $announcement['id']; ?>"> <!-- Announcement ID -->

        <p>Are you sure you want to delete the announcement "<strong><?php echo $announcement['title']; ?></strong>"?</p>
        <button type="submit" 
                class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">
            Delete Announcement
        </button>
    </form>
</div>
