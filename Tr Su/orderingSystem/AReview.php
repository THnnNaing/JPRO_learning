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
        <title>Ordering System</title>
        <link rel="stylesheet" type="text/css" href="Order.css" />
    </head>

    <body>
        <center>
            <img src="JunePhoto/logo.png" margin="auto" width="200px"
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
                <?php

                include "connect.php";

                $query = "SELECT * FROM review";
                mysqli_select_db($con, $database);
                $result = mysqli_query($con, $query);

                echo "<div color=red class=entries>";
                echo "<h1 align=center>Customer Comments</h1>";

                if ($result) {
                    print "<table align=center border=1 width='700'>";
                    print "<th>No<th>Customer Name<th>Product Name<th>Email<th>Comments<th>Date";
                    $id = 0;
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        $id++;
                        $rid = $row['rid'];
                        $customer = $row['customer'];
                        $cemail = $row['email'];
                        $pname = $row['productname'];
                        $comment = $row['comment'];
                        $cdate = $row['Date'];

                        print "<tr align='center'>";
                        print "<td>" . $id . "</td>";
                        print "<td>" . $customer . "</td>";
                        print "<td>" . $cemail . "</td>";
                        print "<td>" . $pname . "</td>";
                        print "<td>" . $comment . "</td>";
                        print "<td>" . $cdate . "</td>";
                        print "</tr>";
                    }
                    print "</table>";
                } else {
                    die("Query=$query failed!");
                }
                echo "</div>";
                mysqli_close($con);
                ?>
            </center>
        </div>
    </body>

    </html>
<?php
}
?>