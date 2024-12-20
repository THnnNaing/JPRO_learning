<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <title>Registion System</title>
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
                <a href="Home.php">Home</a>
                <a href="AboutUs.php">About</a>
                <a href="UPView.php">Food</a>
                <a href="Order.php">Order</a>
                <a href="UReview.php">Review</a>
            </div>
        </nav>
        </p>
    </center>

    <div class="entries">
        <h1 align="center">Review Form</h1>
        </br>
        <form name="registerForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
            method="post">
            <table border=0 cellpadding=5 align="center">
                <tr>
                    <td>Customer Name :</td>
                    <td><input type="text" name="cname" size="30"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="email" size="30"></td>
                </tr>
                <tr>
                    <td>Product Name</td>
                    <td><input type="text" name="pname" size="30"></td>
                </tr>
                <tr>
                    <td> Comment</td>
                    <td><textarea id="message" name="comment" rows="4" cols="30">
                    </textarea> </td>
                </tr>
                <tr>
                    <td colspan=2 style="text-align:center">
                        <input type="submit" name="submit" value="submit"><input type="reset" value="Reset 
Form">
                    </td>
                </tr>
            </table>
        </form>
        <?php
        if (isset($_POST['submit'])) {

            include "connect.php";

            $sql = "INSERT INTO review(customer,email,productname,comment,Date) 
         VALUES('$_POST[cname]','$_POST[pname]','$_POST[email]','$_POST[comment]',NOW())";

            if (!mysqli_query($con, $sql)) {
                die('Error: ' . mysqli_error($con));
            } else {
                echo "<center>Successfully added</center>";
            }
            mysqli_close($con);
        }
        ?>
    </div>
</body>

</html>