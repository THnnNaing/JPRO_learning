<!Doctype html>
<html>

<head>
    <title>Login</title>
</head>

<body>
    <center>
        <h1>LOGIN FORM</h1>
    </center>
    <form action="" method="POST">
        Username: <input type="text" name="user"><br />
        Password: <input type="password" name="pass"><br />
        <input type="submit" value="Login" name="submit" />
    </form>
    <?php
    if (isset($_POST["submit"])) {
        if (!empty($_POST['user']) && !empty($_POST['pass'])) {
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            $con = mysqli_connect('localhost', 'root', '', 'users');
            $query = mysqli_query($con, "SELECT * FROM users WHERE username='" . $user . "' AND 
password='" . $pass . "'");
            $numrows = mysqli_num_rows($query);
            if ($numrows != 0) {
                while ($row = mysqli_fetch_assoc($query)) {
                    $dbusername = $row['username'];
                    $dbpassword = $row['password'];
                }
                if ($user == $dbusername && $pass == $dbpassword) {
                    session_start();
                    $_SESSION['sess_user'] = $user;
                    header("Location: member.php");
                }
            } else {
                echo "Invalid username or password!";
            }
        } else {
            echo "All fields are required!";
        }
    }
    ?>
</body>

</html>