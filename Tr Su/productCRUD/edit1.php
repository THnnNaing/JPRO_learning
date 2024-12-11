<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>Main Screen</p>
    <hr>
    <?php
    print "<p><a href=view.php>View Database Record</p>";
    print "<p><a href=add.html>Add New Database Record</a></p>";
    print "<p>Edit Database Record<</p>";
    print "<p><a href=delete.php>Delete Database Record</a></p>";
    print "<hr>";
    print "<p>Edit Database Record</p>";
    print "<hr>";

    include "connect.php";
    $aproductid = $_POST["aproductid"];
    $query = "SELECT * FROM product WHERE pid = '$aproductid'";
    mysqli_select_db($conn, $mydb);
    $result = mysqli_query($conn, $query);

    $myrow = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $productid = $myrow['pid'];
    $title = $myrow['title'];
    $qtyonhand = $myrow['qty'];
    $sellprice = $myrow['price'];
    $reorderlevel = $myrow['reorderlevel'];

    if (!$myrow) {
        print "<p>No such record</p>";
    } else {
        print "<form name='editform' action ='edit2.php' method='post'> 
    <table> 
    <tr><td>Product ID</td> 
    <td>$productid<input type='hidden' name='aproductid' value='$productid'></td></tr> 
    <tr><td>title</td> 
    <td><input type='text' name='atitle' value='$title'></td></tr> 
    <tr><td>Qtyonhand</td> 
    <td><input type='text' name='aqtyonhand' value='$qtyonhand'></td></tr> 
    <tr><td>Sellprice</td> 
    <td><input type='text' name='asellprice' value='$sellprice'></td></tr> 
    <tr><td>Reorderlevel</td> 
    <td><input type='text' name='areorderlevel' value='$reorderlevel'></td></tr> 
    <tr><td><input type='submit' value='submit' > 
    <input type='reset' value='Reset Form'></td> 
    </tr> 
    </table> 
    </form>";
    }
    mysqli_close($conn);

    ?>
</body>

</html>