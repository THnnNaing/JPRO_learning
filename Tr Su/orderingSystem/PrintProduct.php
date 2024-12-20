<?php
session_start();
if (!isset($_SESSION["sess_user"])) {
    header("location:Login.php");
} else {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Print Order Information</title>'
        <link rel="stylesheet" type="text/css" href="Order.css" />'

        <script type="text/javascript">
            function PrintDoc() {
                var toPrint = document.getElementById('printarea');
                var popupWin = window.open('', '_blank', 'width=900,height=900,location=no,left=200px');
                popupWin.document.open();
                popupWin.document.write('<html><title>Preview</title><head>');
                popupWin.document.write('<link rel="stylesheet" type="text/css" href="Order.css" />');
                popupWin.document.write('</head><body onload="window.print()">');
                popupWin.document.write(toPrint.innerHTML);
                popupWin.document.write('</body></html>');
                popupWin.document.close();
            }
        </script>
    </head>

    <body>
        <center>
            <img src="JunePhoto/OrderManagementlogo.jpg" margin="auto" width="200px"
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

        <form method="post">
            <input type="button" value="Print" class="btn" onclick="PrintDoc()" /></td>
        </form>

        <div id="printarea">
            <h3 align="center">Product Information</h3>
            <?php

            include "connect.php";

            $query = "SELECT * FROM product";
            $result = mysqli_query($con, $query);

            echo "<div color=red class=entries>";

            if ($result) {
                print '<table border="1" width="800px" align="center" cellpadding="2" class="mytable" 
cellspacing="0" >';
                print "<th>No<th>Category<th>Name<th>Price<th>Photo";

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