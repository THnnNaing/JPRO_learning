<?php
$server = "localhost";
$user = "root";
$passwd = "";
$mydb = "productdb";
$connect = mysqli_connect("$server", "$user", "$passwd", "$mydb");

if (!$connect) {
    die("Connection failed");
} else {
    echo "Connected successfully";
}


$query = "select * from product";
mysqli_select_db($connect, $mydb);
$result_set = mysqli_query($connect, $query);
if($result_set){
//    $i=0;
   echo "<table border='1'>";
   echo "<th>productID</th>";
   echo "<th>title</th>";
   echo "<th>qtyOnHand</th>";
   echo "<th>sellPrice</th>";
   echo "<th>reorderLevel</th>";
   while ($record = mysqli_fetch_array($result_set,MYSQLI_ASSOC)) {
    // $i++;
    echo "<tr>";
    foreach ($$record as $value) {
        echo "<td>".$value."</td>";
    } {
        echo "</tr>";
    }
    echo "</table>";
   }
}


?>