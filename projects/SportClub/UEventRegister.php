<?php
$errors = [];

// Add this at the top of your PHP section
include 'connect.php';
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Fetch sport types from database
$query = "SELECT MIN(id) AS id, sport_type
FROM event
GROUP BY sport_type;
";
$result = $con->query($query);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = trim($_POST['name'] ?? '');
    $grade = trim($_POST['grade'] ?? '');
    $batch = trim($_POST['batch'] ?? '');
    $sport_type = trim($_POST['sport_type'] ?? '');
    $event_name = trim($_POST['event_name'] ?? '');
    $email = trim($_POST['email'] ?? '');

    // Initialize an array for errors
    $errors = [];

    // Validate inputs
    if (empty($name)) {
        $errors['name'] = 'Name is required';
    }

    if (empty($grade)) {
        $errors['grade'] = 'Grade is required';
    }

    if (empty($batch)) {
        $errors['batch'] = 'Batch is required';
    }

    if (empty($sport_type)) {
        $errors['sport_type'] = 'Sport type is required';
    }

    if (empty($event_name)) {
        $errors['event_name'] = 'Event name is required';
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'A valid email is required';
    }

    // If no errors, insert data into database
    if (empty($errors)) {

        // Prepare and bind the SQL statement
        $stmt = $con->prepare("INSERT INTO registration (name, grade, batch, sport_type, event_name, email) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $name, $grade, $batch, $sport_type, $event_name, $email);

        // Execute the statement
        if ($stmt->execute()) {
            $success = "Registration successful!";
            echo "<script>
            alert('New announcement created successfully!');
            window.location.href = 'Uindex.php'; // Redirect to form page
          </script>";
        } else {
            $errors['database'] = "Error: " . $stmt->error;
        }

        // Close the statement and connection
        $stmt->close();
        $con->close();
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

                <form method="POST" class="mt-6 ">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="flex flex-col justify-between">
                            <div class="space-y-6">
                                <div>
                                    <label class="block text-gray-700 text-sm font-semibold mb-2" for="name">Full Name</label>
                                    <input type="text" id="name" name="name"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                                        placeholder="Enter your full name"
                                        value="<?php echo htmlspecialchars($name ?? ''); ?>">
                                </div>

                                <div>
                                    <label class="block text-gray-700 text-sm font-semibold mb-2" for="grade">Grade</label>
                                    <input type="text" id="grade" name="grade"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                                        placeholder="Enter your grade"
                                        value="<?php echo htmlspecialchars($grade ?? ''); ?>">
                                </div>

                                <div>
                                    <label class="block text-gray-700 text-sm font-semibold mb-2" for="batch">Batch</label>
                                    <input type="text" id="batch" name="batch"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                                        placeholder="Enter your batch"
                                        value="<?php echo htmlspecialchars($batch ?? ''); ?>">
                                </div>

                                <div>
                                    <label class="block text-gray-700 text-sm font-semibold mb-2" for="sporttype">Sport Type</label>
                                    <select id="sport_type" name="sport_type"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200">
                                        <option value="">Select Sport Type</option>
                                        <?php while ($row = $result->fetch_assoc()): ?>
                                            <option value="<?php echo htmlspecialchars($row['id']); ?>"
                                                <?php echo (isset($sport_type) && $sport_type == $row['id']) ? 'selected' : ''; ?>>
                                                <?php echo htmlspecialchars($row['sport_type']); ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-gray-700 text-sm font-semibold mb-2" for="event_name">Event Name</label>
                                    <input type="text" id="event_name" name="event_name"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                                        placeholder="Enter event name"
                                        value="<?php echo htmlspecialchars($event_name ?? ''); ?>">
                                </div>

                                <div>
                                    <label class="block text-gray-700 text-sm font-semibold mb-2" for="email"> Email </label>
                                    <input type="text" id="email" name="email"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                                        placeholder="Enter email"
                                        value="<?php echo htmlspecialchars($email ?? ''); ?>">
                                </div>

                                <div class="flex items-center gap-3 mb-4">
                                    <label class="text-gray-700 text-sm font-semibold" for="is_club_member">Are you a club member?</label>
                                    <a href="club_registration.php"
                                        class="text-sm text-blue-600 
                                            transition-all duration-300 ease-in-out
                                            hover:text-blue-700 hover:translate-x-2 
                                            hover:font-medium
                                            active:text-blue-800 active:scale-95
                                            inline-flex items-center gap-1
                                            relative">
                                        If not, register as a club member
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                </div>
                            </div>

                            <button type="submit"
                                class="w-full bg-blue-600 text-white py-3 px-4 rounded-lg hover:bg-blue-700 active:bg-blue-800 transition duration-200 font-semibold shadow-md hover:shadow-lg">
                                Register for Event
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