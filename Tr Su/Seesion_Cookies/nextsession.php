<?php
session_start();
$n1 = $_SESSION['name'];
echo "My name is " . $n1;

echo "<br><br>";

$n2 = $_SESSION['address'];
echo "My address is " . $n2;

print_r($_SESSION);

// for destroying one/each session only 
// unset($_SESSION['name']);

// for destroying all sessions
session_destroy();
?>