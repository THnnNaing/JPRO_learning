<?php
$errors = [];

include 'connect.php';
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $event_name = trim($_POST['event_name'] ?? '');
    $event_date = trim($_POST['event_date'] ?? '');
    $location = trim($_POST['location'] ?? '');
    $sport_type = trim($_POST['sport_type'] ?? '');
    $organizer_name = trim($_POST['organizer_name'] ?? '');

    // Validate inputs
    if (empty($event_name)) {
        $errors['event_name'] = 'Event name is required';
    }
    if (empty($event_date)) {
        $errors['event_date'] = 'Event date is required';
    }
    if (empty($location)) {
        $errors['location'] = 'Location is required';
    }
    if (empty($sport_type)) {
        $errors['sport_type'] = 'Sport type is required';
    }
    if (empty($organizer_name)) {
        $errors['organizer_name'] = 'Organizer name is required';
    }

    // If no errors, process the event addition
    if (empty($errors)) {
        $query = "INSERT INTO event (event, date, location, sport_type, organizer_name) 
                 VALUES (?, ?, ?, ?, ?)";
        $stmt = $con->prepare($query);
        $stmt->bind_param("sssss", $event_name, $event_date, $location, $sport_type, $organizer_name);
        
        if ($stmt->execute()) {
            $success = "Event added successfully!";
        } else {
            $errors['database'] = "Error adding event: " . $con->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Registration</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">

    <div class="min-h-screen flex flex-col md:flex-row">
        <?php include 'sidebar.php'; ?>
        <div class="p-4 md:p-12 w-full">
            <div class="max-w-7xl mx-auto bg-white p-8 rounded-xl shadow-lg">
                <h2 class="text-3xl font-bold mb-8 text-gray-800 border-b pb-4">Event Registration</h2>

                <?php if (!empty($errors)): ?>
                    <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6 rounded-r">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <!-- You can add an error icon here -->
                                ⚠️
                            </div>
                            <div class="ml-3">
                                <h3 class="text-red-800 font-medium">Please correct the following errors:</h3>
                                <ul class="list-disc list-inside mt-2 text-red-700">
                                    <?php foreach ($errors as $error): ?>
                                        <li><?php echo htmlspecialchars($error); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (isset($success)): ?>
                    <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-6 rounded-r">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <!-- You can add a success icon here -->
                                ✅
                            </div>
                            <div class="ml-3 text-green-700">
                                <?php echo htmlspecialchars($success); ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <form method="POST" class="mt-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="flex flex-col justify-between">
                            <div class="space-y-6">
                                <div>
                                    <label class="block text-gray-700 text-sm font-semibold mb-2" for="event_name">Event Name</label>
                                    <input type="text" id="event_name" name="event_name"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                                        placeholder="Enter event name"
                                        value="<?php echo htmlspecialchars($event_name ?? ''); ?>">
                                </div>

                                <div>
                                    <label class="block text-gray-700 text-sm font-semibold mb-2" for="event_date">Date</label>
                                    <input type="date" id="event_date" name="event_date"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                                        value="<?php echo htmlspecialchars($event_date ?? ''); ?>">
                                </div>

                                <div>
                                    <label class="block text-gray-700 text-sm font-semibold mb-2" for="location">Location</label>
                                    <input type="text" id="location" name="location"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                                        placeholder="Enter event location"
                                        value="<?php echo htmlspecialchars($location ?? ''); ?>">
                                </div>

                                <div>
                                    <label class="block text-gray-700 text-sm font-semibold mb-2" for="sport_type">Sport Type</label>
                                    <input type="text" id="sport_type" name="sport_type"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                                        placeholder="Enter sport type"
                                        value="<?php echo htmlspecialchars($sport_type ?? ''); ?>">
                                </div>

                                <div>
                                    <label class="block text-gray-700 text-sm font-semibold mb-2" for="organizer_name">Organizer Name</label>
                                    <input type="text" id="organizer_name" name="organizer_name"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                                        placeholder="Enter organizer name"
                                        value="<?php echo htmlspecialchars($organizer_name ?? ''); ?>">
                                </div>
                            </div>

                            <button type="submit"
                                class="w-full bg-blue-600 text-white py-3 px-4 rounded-lg hover:bg-blue-700 active:bg-blue-800 transition duration-200 font-semibold shadow-md hover:shadow-lg">
                                Add Event
                            </button>
                        </div>

                        <div class="flex flex-col items-center justify-center">
                            <div class="w-full h-full rounded-xl overflow-hidden shadow-xl hover:shadow-2xl transition duration-300">
                                <img src="./Images/momo.jpg" alt="Event Image"
                                    class="w-full h-full object-cover">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
