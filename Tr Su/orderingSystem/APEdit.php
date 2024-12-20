<?php
session_start();
if (!isset($_SESSION["sess_user"])) {
    header("location:Login.php");
}
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
    <?php
    $edit_id = $_GET["edid"];

    include "connect.php";

    // show product information in form to update 
    $query = "SELECT * FROM product WHERE productid='" . $edit_id . "'";
    $result = mysqli_query($con, $query);
    $myrow = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if (!$myrow) {
        print "<p>No such record</p>";
    } else {
        $pid = $myrow['productid'];
        $cat = $myrow['catname'];
        $pname = $myrow['productname'];
        $price = $myrow['price'];
        $photo = $myrow['photo'];
        // echo "Old Data...." . $cat . $pname . $price . $photo; 
    ?>

        <div class="entries">
            <h1 align="center">Update Product Information Form</h1>
            </br>

            <form name="UpdateForm" action="" method="post" enctype='multipart/form-data'>
                <table border=0 cellpadding=5 align="center">
                    <tr>
                        <td>Product ID :</td>
                        <td><?php $pid; ?><input type="hidden" name="pid1" size="30" value="<?php echo $pid;
                                                                                            ?>"></td>
                    </tr>
                    <tr>
                        <td>Category Name :</td>
                        <td><input type="text" name="pcategory1" size="30" value="<?php echo $cat; ?>"></td>
                    </tr>
                    <tr>
                        <td>Product Name</td>
                        <td><input type="text" name="pname1" size="30" value="<?php echo $pname; ?>"></td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td><input type="text" name="price1" size="30" value="<?php echo $price; ?>"></td>
                    </tr>
                    <tr>
                        <td>Photo</td>

                        <td><input type="file" name="pfile1" value="<?php echo $photo; ?>"></td>
                        <td><img src="<?php echo $photo ?>" width="100" height="100"></td>
                    </tr>
                    <tr>
                        <td colspan=2 style="text-align:center">
                            <input type="submit" name="submit" value="Update">
                            <input type="reset" value="Reset">
                        </td>
                    </tr>
                </table>
            </form>

        <?php
    }
    //For Update button  
    if (isset($_POST['submit'])) {
        //For upload image  

        $name = $_FILES['pfile1']['name'];
        $target_dir = "JunePhoto/";
        $target_file = $target_dir . $_FILES["pfile1"]["name"];
        $maxsize = 5242880; // 5MB 

        // Select file type 
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Valid file extensions 
        $extensions_arr = array("png", "jpeg", "jpg");

        // Check extension 
        if (in_array($imageFileType, $extensions_arr)) {

            // Check file size 
            if (($_FILES['pfile1']['size'] >= $maxsize) || ($_FILES["pfile1"]["size"] == 0)) {
                echo "File too large. File must be less than 5MB.";
            } else {
                move_uploaded_file($_FILES['pfile1']['tmp_name'], $target_file);
            }
        }
        //for new Data (Updated Data) 
        $epid = $_POST['pid1'];
        $ecatname = $_POST['pcategory1'];
        $epname = $_POST['pname1'];
        $eprice = $_POST['price1'];
        $ephoto = $photo;

        if (!$name) {
            $ephoto = $photo;
        } else {
            $ephoto = $target_file;
        }
        $sql = "UPDATE product SET catname= 
'$ecatname',productname='$epname',price='$eprice',photo='$ephoto' WHERE productid= '" . $epid . "'";

        if (!mysqli_query($con, $sql)) {
            die('Error: ' . mysqli_error($con));
        }
        print "<p>Your information has been updated in the database</p>";
        mysqli_close($con);
    }
    // echo "Data.....".$epid.$ecatname.$epname.$eprice.$ephoto;    
        ?>
</body>