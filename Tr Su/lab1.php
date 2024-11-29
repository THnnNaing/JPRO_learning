<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $cars = array("nissan" => "gtr35", "mitsubishi" => "idk", "toyota" => "lexusRFA");
    print_r(value: array_keys($cars));

    print("<br>");

    $a1 = array("red", "orange");
    $a2 = array("blue", "yellow");
    print_r(array_merge($a1, $a2));

    print("<br>");

    $b = array("blue", "darkblue", "dark");
    array_pop($b);
    array_pop($b);
    print_r($b);

    print("<br>");

    $a = array("paleblue", "blue", "darkblue", "dark");
    array_push($a, "purple");
    print_r($a);

    print("<br>");


    //Array_unshift 
    $b1 = array("a" => "red", "b" => "green");
    array_unshift($b1, "blue");
    print_r($b1);

    print("<br>");

    //count(var) 
    $cars = array("Volvo", "BMW", "Toyota", "Nissan");
    echo count($cars);
    print("<br>");

    //in_array 
    $people = array("Peter", "Joe", "Glenn", "Cleveland");
    if (in_array("Glenn", $people)) {
        echo "Match found";
    } else {
        echo "Match not found";
    }
    print("<br>");

    //is_array 
    $a = "Hello";
    echo "a is " . is_array($a) . "<br>";
    $b = array("red", "green", "blue");
    echo "b is " . is_array($b) . "<br>";

    //key(array) 
    $person = array("Peter", "Joe", "Glenn", "Cleveland");
    echo "The key from the current position is: " . key($person);
    print("<br>");

    //list 
    $my_array = array("Dog", "Cat", "Horse");
    list($a, $b, $c) = $my_array;
    echo "I have several animals, a $a, a $b and a $c.";
    print("<br>");

    //sizeof 
    $cars = array("Volvo", "BMW", "Toyota");
    echo sizeof($cars);
    print("<br>");

    //Sort Array 
    $cars = array("Volvo", "BMW", "Toyota");
    sort($cars);
    print_r($cars);
    print("<br>");

    $cars = array(
        // two dimensional array 
        array("Volvo", 22, 18),
        array("BMW", 15, 13),
        array("Saab", 5, 2),
        array("Land Rover", 17, 15)
    );
    echo $cars[0][0] . ": In stock: " . $cars[0][1] . ", sold: " . $cars[0][2] . ".<br>";

    
    ?>
</body>

</html>