<?php


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    echo "Hello World";
    $hi = "Hello world";
    echo "<p>$hi</p>";

    $first_name = "Thi Han";
    $last_name = "Naing";
    echo "My name is", $first_name, "", $last_name, "<br>";

    $Reno = 360000;
    $Pasadena = 138000;
    $cityname = "Reno";
    echo "The size of $cityname is {${$cityname}} <br>";
    echo "The size of $cityname is $$cityname <br>";

    $cityname = "Pasadena";
    echo "The size of $cityname is {${$cityname}} <br>";
    echo "The size of $cityname is $$cityname <br>";

    $rate = 1.53;
    $US_dollars = 20.00;
    $CA_dollars = $US_dollars * $rate;

    define("RATE", 1.52);
    echo '<br>Rate variable', RATE;
    $US_dollars = 20;
    $CA_dollars = $US_dollars * RATE;
    echo '<br>CA dollars', $CA_dollars;

    var_dump($cityname);
    var_dump($US_dollars);

    $intvar = 3;
    $floatvar = 9.3;

    $varl = "1.4";
    $var2 = 2;
    $total = $varl + $var2;
    echo "<br>Total=", $total;

    $rootvar = sqrt(91);
    echo "<br>Root=", $rootvar;

    $num1 = ceil(27.63);
    $num2 = floor(27.63);

    echo "<br>Num1=", $num1;
    echo "<br>Num2=", $num2;

    echo "<br>Total=", $num1 + $num2;

    echo "<br>new=", $num1, $num2;

    $string = "_HelloWorld_";
    echo     '<br>', $string;
    $string = "Hello World";
    echo '<br>', $string;
    $string = "Line 1 \n\t Line 2";
    echo '<br>', $string;
    $string1 = "String in \n\t double quotes";
    $string2 = "String in \n\t single quotes";
    echo '<br>', $string1. "<br>";
    echo $string2. "<br>";

    echo $date = date('Y/m/d');
    
    for ($i = 0; $i < 10; $i++) {
       if ($i%2 == 0) {
           echo "<p>The number is $i and it is even.</p>";
        }
        else {
            echo "<p>The number is $i and it is odd.</p>";
        }
    }

    $x = array("one","two","three");
    foreach ($x as $value) {
        echo $value . "<br>";
    }

    foreach ($x as $key => $value) {
        echo $value . "<br>";
    }

    ?>
</body>

</html>