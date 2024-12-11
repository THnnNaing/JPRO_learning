<?php 
$host = "localhost"; 
$user = "root"; 
$passwd = ""; 
$database = "bucjunedb"; 
$con = mysqli_connect($host, $user, $passwd, $database)  or die("could not connect to database"); 
mysqli_select_db($con,$database); 
?>