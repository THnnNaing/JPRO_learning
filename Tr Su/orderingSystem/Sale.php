<?php 
header('Content-Type: application/json'); 
 
include "connect.php"; 
 
$sqlQuery = "SELECT *,sum(purchase_detail.quantity*product.price) as tot  
            FROM product left join purchase_detail on product.productid=purchase_detail.productid  
            Group By productname"; 
 
$result = mysqli_query($con, $sqlQuery); 
 
//$data = array(); 
foreach ($result as $row) { 
    $data[] = $row; 
} 
mysqli_close($con); 
 
echo json_encode($data); 
?> 