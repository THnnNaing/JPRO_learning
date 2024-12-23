<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96">
        <h2 class="text-2xl font-bold mb-6 text-center">Admin Login</h2>
        <form action="adminlogin.php" method="POST">
            <div class="mb-4">
                <label for="username" class="block text-gray-700">Username</label>
                <input type="text" id="username" name="username" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" id="password" name="password" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <button type="submit" name="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">Login</button>
        </form>
        <?php
        include 'connect.php';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($_POST['username']) && !empty($_POST['password'])) {
                $user = $_POST['username'];
                $pass = $_POST['password'];

                $query = mysqli_query($con, "SELECT * FROM admin WHERE name='" . $user . "' AND password='" . $pass . "'");
                $numrows = mysqli_num_rows($query);
                if ($numrows != 0) {
                    while ($row = mysqli_fetch_assoc($query)) {
                        $dbusername = $row['name'];
                        $dbpassword = $row['password'];
                    }
                    if ($user == $dbusername && $pass == $dbpassword) {
                        session_start();
                        $_SESSION['admin_user'] = $user;
                        header("Location: admindashboard.php");
                        exit();
                    }
                } else {
                    echo "Invalid username or password!";
                }
            } else {
                echo "All fields are required!";
            }
        }
        ?>

    </div>
</body>

</html>