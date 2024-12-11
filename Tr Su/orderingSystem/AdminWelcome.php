<?php
session_start();
if (!isset($_SESSION["sess_user"])) {
    header("location:Login.php");
} else {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset='utf-8'>
        <title> Ordering System</title>
        <link rel="stylesheet" type="text/css" href="Order.css" />
    </head>

    <body>
        <center>
            <img src="https://cdn-icons-png.flaticon.com/512/10692/10692220.png" margin="auto" width="150px"
                height="150px"></img>
            <p>
            <nav>
                <div class="topnav" id="myTopnav">
                    <a href="AdminWelcome.php">Home</a>
                    <a href="APView.php">View Products</a>
                    <a href="APAdd.php">Add Product</a>
                    <a href="AReview.php">Review</a>
                    <a href="AOView.php">Orders</a>
                    <a href="ViewSaleResult.php">Report</a>
                    <a href="PrintProduct.php" title="Print">Print Product Information</a>
                    <a href="Logout.php" title="Logout">Logout</a>
                    <h5>Welcome, <?= $_SESSION['sess_user']; ?>!</h5>
                </div>
            </nav>
            </p>
        </center>

        <div class=entries>
            <center>
                <p>
                <h1></h1>Log In successfull!!!!</p>
                <h1>
            </center>
        </div>
    </body>

    </html>
<?php
}
?>