<?php
session_start();
if (!isset($_SESSION["sess_user"])) {
    header("location:login.php");
} else {
?>
    <!doctype html>
    <html>

    <head>
        <title>Welcome</title>
    </head>

    <body>
        <h2>Welcome, <?= $_SESSION['sess_user']; ?>!</h2>
        Click here to <a href="logout.php" title="Logout">Logout</a>
    </body>

    </html>
<?php
}
?>