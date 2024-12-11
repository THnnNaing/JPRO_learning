<html>  

<head>
    <title>Edit Database Record</title>
</head>

<body>
    <p>Main Screen</p>
    <hr>
    <?php
    print "<p><a href=view.php>View Database Record</p>";
    print "<p><a href=add.html>Add New Database Record</a></p>";
    print "<p><a href=edit.html>Edit Database Record</a></p>";
    print "<p>Delete Database Record</p>";
    print "<hr>";
    print "<p>Delete Database Record</p>";
    print "<hr>";

    include "connect.php";

    mysqli_select_db($conn, $mydb);

    $productid = $_POST["aproductid"];

    $query = "SELECT * FROM product WHERE pid='" . $productid . "'";
    $sql = "DELETE FROM product WHERE pid='" . $productid . "'";


    mysqli_select_db($conn,$mydb);
    $result = mysqli_query($conn,$query); 
$myrow = mysqli_fetch_array($result,MYSQLI_ASSOC); 
if (!$myrow) 
{ 
print "<p>No such record</p>"; 
} 
else  
{ 
mysqli_query($conn,$sql); 
print "Product ID '$productid' has been updated from the Database"; 
} 
mysqli_close($conn); 
    ?>
</body>

</html>