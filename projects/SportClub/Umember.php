<?php
include 'connect.php';

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Fetch data from your table
$sql = "SELECT id, name, grade, batch, sport_type, img FROM member"; // Replace with your table name and columns
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Members</title>
</head>
<body class="bg-gray-100 p-4">
    <div class="max-w-screen-xl mx-auto">
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Member Directory</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div
                      class="relative bg-slate-50 block overflow-hidden rounded-lg border border-gray-100 p-4 sm:p-6 lg:p-8 bg-white shadow-md hover:shadow-lg transition">
                      <span
                        class="absolute inset-x-0 bottom-0 h-2 bg-gradient-to-r from-green-300 via-blue-500 to-purple-600"
                      ></span>

                      <div class="sm:flex sm:justify-between sm:gap-4">
                        <div>
                          <h3 class="text-lg font-bold text-gray-900 sm:text-xl">
                            <?php echo htmlspecialchars($row['name']); ?>
                          </h3>
                        </div>

                        <div class="hidden sm:block sm:shrink-0">
                          <img
                            alt="Member Image"
                            src="<?php echo !empty($row['img']) ? htmlspecialchars($row['img']) : 'path/to/default-image.jpg'; ?>"
                            class="size-16 rounded-lg object-cover shadow-sm"
                            onerror="this.src='path/to/default-image.jpg'"
                          />
                        </div>
                      </div>

                      <div class="mt-4">
                      <p class="text-sm text-gray-500">
                          Sport Type: <?php echo htmlspecialchars($row['sport_type']); ?>
                        </p>
                        <p class="text-sm text-gray-500">
                          Batch: <?php echo htmlspecialchars($row['batch']); ?>
                        </p>
                        <p class="text-sm text-gray-500">
                          Sport Type: <?php echo htmlspecialchars($row['sport_type']); ?>
                        </p>
                      </div>

                      <!-- <dl class="mt-6 flex gap-4 sm:gap-6">
                        <div class="flex flex-col-reverse">
                          <dt class="text-sm font-medium text-gray-600">Member ID</dt>
                          <dd class="text-xs text-gray-500"><?php echo htmlspecialchars($row['id']); ?></dd>
                        </div>
                      </dl> -->
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-center text-gray-500">No members found.</p>
            <?php endif; ?>

            <?php $con->close(); ?>
        </div>
    </div>
</body>
</html>
