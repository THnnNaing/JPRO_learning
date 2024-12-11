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
        <style>
            .error {
                color: #FF0001;
            }
        </style>
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

        <div class="entries">
            <h1 align="center">Add Product</h1>
            </br>
            <form name="registerForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                method="post" enctype='multipart/form-data'>
                <table border=0 cellpadding=5 align="center">
                    <tr>
                        <td>Category Name :</td>
                        <td><input type="text" name="pcategory" size="30"></td>
                    </tr>
                    <tr>
                        <td>Product Name</td>
                        <td><input type="text" name="pname" size="30"></td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td><input type="text" name="price" size="30"></td>
                    </tr>
                    <tr>
                        <td>Photo</td>
                        <td><input type="file" name="pfile"></td>
                    </tr>
                    <tr>
                        <td colspan=2 style="text-align:center">
                            <input type="submit" name="submit" value="Add">
                            <input type="reset" value="Reset Form">
                        </td>
                    </tr>
                </table>
            </form>
        <?php
        if (isset($_POST['submit'])) {

            include "connect.php";

            $target_dir = "JunePhoto/";
            $target_file = $target_dir . $_FILES["pfile"]["name"];
            $maxsize = 5242880; // 5MB 
            // Select file type 
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Valid file extensions 
            $extensions_arr = array("png", "jpeg", "jpg");

            // Check extension 
            if (in_array($imageFileType, $extensions_arr)) {

                // Check file size 
                if (($_FILES['pfile']['size'] >= $maxsize) || ($_FILES["pfile"]["size"] == 0)) {
                    echo "File too large. File must be less than 5MB.";
                } else {
                    if (move_uploaded_file($_FILES['pfile']['tmp_name'], $target_file)) {
                        // Insert record 
                        $sql = "INSERT INTO product(catname,productname,price,photo) 
              VALUES('$_POST[pcategory]','$_POST[pname]','$_POST[price]','" . $target_file . "')";

                        if (!mysqli_query($con, $sql)) {
                            die('Error: ' . mysqli_error($con));
                        } else {
                            echo "<center>Successfully added</center>";
                        }
                        mysqli_close($con);
                    }
                }
            } else {
                echo "Invalid file extension.";
            }
        } else {
            echo "<h3> <b>You didn't filled up the form correctly.</b> </h3>";
        }
    }
        ?>
        </div>
    </body>

    </html>