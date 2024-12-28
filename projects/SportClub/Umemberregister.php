<?php
$errors = [];
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = trim($_POST['name'] ?? '');
    $grade = trim($_POST['grade'] ?? '');
    $batch = trim($_POST['batch'] ?? '');
    $sport_type = trim($_POST['sport_type'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $image = $_FILES['image'] ?? null;

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

    if (empty($email)) {
        $errors['email'] = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format';
    }

    if (empty($password)) {
        $errors['password'] = 'Password is required';
    } elseif (strlen($password) < 6) {
        $errors['password'] = 'Password must be at least 6 characters';
    }

    if ($password !== $confirm_password) {
        $errors['confirm_password'] = 'Passwords do not match';
    }

    if (empty($image['name'])) {
        $errors['image'] = 'Image is required';
    } elseif (!in_array(strtolower(pathinfo($image['name'], PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png'])) {
        $errors['image'] = 'Only JPG, JPEG, and PNG files are allowed';
    }

    // If no errors, process the registration
    if (empty($errors)) {
        // Handle image upload
        $target_dir = "Images/";
        $target_file = $target_dir . basename($image['name']);
        if (move_uploaded_file($image['tmp_name'], $target_file)) {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert into the database
            include 'connect.php';

            // Check connection
            if ($con->connect_error) {
                die("Connection failed: " . $con->connect_error);
            }

            // Prepare and bind
            $stmt = $con->prepare("INSERT INTO member (name, grade, batch, sport_type, img, password, email) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssss", $name, $grade, $batch, $sport_type, $target_file, $hashed_password, $email);

            if ($stmt->execute()) {
                $success = "Registration successful!";
                echo "<script>
                alert('New announcement created successfully!');
                window.location.href = 'Uindex.php'; // Redirect to form page
              </script>";
            } else {
                $errors['database'] = "Error: " . $stmt->error;
            }

            $stmt->close();
            $con->close();
        } else {
            $errors['image'] = 'Failed to upload the image.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-lg shadow-md w-96">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Create Account</h2>
        
        <?php if (!empty($success)): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                <?php echo $success; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name</label>
                <input 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline <?php echo isset($errors['name']) ? 'border-red-500' : ''; ?>"
                    id="name" type="text" name="name" value="<?php echo htmlspecialchars($name ?? ''); ?>">
                <?php if (isset($errors['name'])): ?>
                    <p class="text-red-500 text-xs italic"><?php echo $errors['name']; ?></p>
                <?php endif; ?>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="grade">Grade</label>
                <input 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline <?php echo isset($errors['grade']) ? 'border-red-500' : ''; ?>"
                    id="grade" type="text" name="grade" value="<?php echo htmlspecialchars($grade ?? ''); ?>">
                <?php if (isset($errors['grade'])): ?>
                    <p class="text-red-500 text-xs italic"><?php echo $errors['grade']; ?></p>
                <?php endif; ?>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="batch">Batch</label>
                <input 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline <?php echo isset($errors['batch']) ? 'border-red-500' : ''; ?>"
                    id="batch" type="text" name="batch" value="<?php echo htmlspecialchars($batch ?? ''); ?>">
                <?php if (isset($errors['batch'])): ?>
                    <p class="text-red-500 text-xs italic"><?php echo $errors['batch']; ?></p>
                <?php endif; ?>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="sport_type">Sport Type</label>
                <input 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline <?php echo isset($errors['sport_type']) ? 'border-red-500' : ''; ?>"
                    id="sport_type" type="text" name="sport_type" value="<?php echo htmlspecialchars($sport_type ?? ''); ?>">
                <?php if (isset($errors['sport_type'])): ?>
                    <p class="text-red-500 text-xs italic"><?php echo $errors['sport_type']; ?></p>
                <?php endif; ?>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="image">Image</label>
                <input 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline <?php echo isset($errors['image']) ? 'border-red-500' : ''; ?>"
                    id="image" type="file" name="image">
                <?php if (isset($errors['image'])): ?>
                    <p class="text-red-500 text-xs italic"><?php echo $errors['image']; ?></p>
                <?php endif; ?>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                <input 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline <?php echo isset($errors['email']) ? 'border-red-500' : ''; ?>"
                    id="email" type="email" name="email" value="<?php echo htmlspecialchars($email ?? ''); ?>">
                <?php if (isset($errors['email'])): ?>
                    <p class="text-red-500 text-xs italic"><?php echo $errors['email']; ?></p>
                <?php endif; ?>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
                <input 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline <?php echo isset($errors['password']) ? 'border-red-500' : ''; ?>"
                    id="password" type="password" name="password">
                <?php if (isset($errors['password'])): ?>
                    <p class="text-red-500 text-xs italic"><?php echo $errors['password']; ?></p>
                <?php endif; ?>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="confirm_password">Confirm Password</label>
                <input 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline <?php echo isset($errors['confirm_password']) ? 'border-red-500' : ''; ?>"
                    id="confirm_password" type="password" name="confirm_password">
                <?php if (isset($errors['confirm_password'])): ?>
                    <p class="text-red-500 text-xs italic"><?php echo $errors['confirm_password']; ?></p>
                <?php endif; ?>
            </div>

            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full" type="submit">
                    Register
                </button>
            </div>
        </form>
    </div>
</body>
</html>
