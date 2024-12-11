<?php 
session_start(); 
if (!isset($_SESSION["pcount"]))  
{ 
$message = "Hi, this is the first time I see you"; 
$_SESSION["pcount"] = 0; 
} 
elseif ($_SESSION["pcount"] < 5) 
{ 
      $_SESSION["pcount"]++; 
      $message = "Hi, you have visited me ".$_SESSION["pcount"]." times"; 
} 
else { 
    unset($_SESSION["pcount"]); 
    $message = "Why you left me (TOT)"; 
} 
?> 
<html> 
<head> 
<title>PHP session</title> 
</head> 
<body> 
<h1>Welcome to my place</h1> 
<?php 
print("<p>$message</p>"); 
?> 
</body> 
</html> 
