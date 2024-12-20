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
        <title></title>
        <link rel="stylesheet" type="text/css" href="Order.css" />

        <script language="JavaScript" type="text/javascript">
            function checkDelete() {
                return confirm('Are you sure?');
            }
        </script>

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

                $query = "SELECT * FROM product order by productid desc";
                mysqli_select_db($con, $database);
                $result = mysqli_query($con, $query);

                // echo "<div color=red class=entries>"; 
                echo "<h1 align=center>Product List</h1>";

                if ($result) {
                    print "<table align=center border=1 width='800'>";
                    print "<th>No<th>Category<th>Name<th>Price<th>Photo";
                    print "<th colspan='2'>Operation</th>";
                    $i = 0;
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        $i++;
                        $pid = $row['productid'];
                        $pcat = $row['catname'];
                        $pname = $row['productname'];
                        $price = $row['price'];
                        $photo = $row['photo'];

                        print "<tr align='center'>";
                        print "<td>" . $i . "</td>";
                        print "<td>" . $pcat . "</td>";
                        print "<td>" . $pname . "</td>";
                        print "<td>" . $price . "</td>";
                        print "<td>" . "<img src='" . $photo . "'controls width='100px' height='70px'>" . "</td>";

                        print "<td><a href='APEdit.php?edid=$pid'>Update</a></td>";
                        print "<td><a href='APDelete.php?did=$pid' onclick='return checkDelete()'>Delete</a></td>";
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

        <script>
            function checkDelete() {
                return confirm('Are you sure you want to delete this product?');
            }
        </script>

    </body>

    </html>

<?php
}
?>