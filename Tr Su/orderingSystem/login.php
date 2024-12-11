<!Doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <title>Ordering System</title>
    <link rel="stylesheet" type="text/css" href="Order.css" />
</head>

<body>
<?php
    include("nav.php");
?>
    <center>
        <h2>LOGIN FORM</h2>
        <form action="" method="POST">
            Username: <input type="text" name="user"><br /><br />
            Password: <input type="password" name="pass"><br /><br />
            <input type="submit" value="Login" name="submit" />
        </form>
    </center>
    <?php
    if (isset($_POST["submit"])) {
        if (!empty($_POST['user']) && !empty($_POST['pass'])) {
            $user = $_POST['user'];
            $pass = $_POST['pass'];

            //include "connect.php"; 

            $con = mysqli_connect('localhost', 'root', '', 'bucjunedb') or die(mysql_error());
            $query = mysqli_query($con, "SELECT * FROM users 
            WHERE username='" . $user . "' AND password='" . $pass . "'");
            $numrows = mysqli_num_rows($query);
            if ($numrows != 0) {
                while ($row = mysqli_fetch_assoc($query)) {
                    $dbusername = $row['username'];
                    $dbpassword = $row['password'];
                }
                if ($user == $dbusername && $pass == $dbpassword) {
                    session_start();
                    $_SESSION['sess_user'] = $user;
                    header("Location: AdminWelcome.php");
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