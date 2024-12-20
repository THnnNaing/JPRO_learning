APDelete.php 
<!-- <?php 
        //$delete_id=$_GET["did"]; 
        //echo "id no for delete......".$delete_id; 
        ?> --> 
<html> 
 
<head> 
    <title>Delete Record</title> 
</head> 
 
<body> 
    <?php   
    include "connect.php"; 
 
    //get id no for delete 
    $delete_id = $_GET["did"]; 
    $query = "SELECT * FROM product WHERE productid='" . $delete_id . "'"; 
 
    $sql = "DELETE FROM product WHERE productid='" . $delete_id . "'"; 
    mysqli_select_db($con, $database); 
    $result = mysqli_query($con, $query); 
 
    $myrow = mysqli_fetch_array($result, MYSQLI_ASSOC); 
 
    if (!$myrow) { 
        print "<p>No such record</p>"; 
    } else { 
        mysqli_query($con, $sql); 
        print "Product ID '$delete_id' has been deleted"; 
        print "<a href='APView.php'>Back<a>"; 
        //header("location:APView.php"); 
    } 
    mysqli_close($con); 
    ?> 
</body> 
</html> 