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
    $array = array("1" => "hi", "2" => "My", "3" => "name", "4" => "is", "5" => "what?");
    foreach ($array as $key => $value) {
        echo "key=" . "$key", "value=" . "$value";
        echo "<br>";
    }

    $families = array(
        "Griffin" => array("Peter", "Lois", "Megan"),
        "Quagmire" => array("Glenn"),
        "Brown" => array("Cleveland", "Loretta", "Junior")
    );

    echo $families["Griffin"][0] . "<br>";

    $human = array("me", "you", "him", "her");
    $human[1] = "";

    foreach ($human as $res ) {
        echo  $res . "<br>";
    }

    sort($human);

    foreach ($human as $key => $value) {
        echo $value ."\n" . "<br>";
    }

    ksort($families);
    print_r($families);

    print_r($human);

    echo "<br>";

    $arr = array(5 => 1, 12 => 2);
    $arr[] =50;
    $arr["x"] =42;
    unset($arr[5]);
    print_r($arr);
    echo "<br>";

    $x = 1;
    $b = 2;

    $first = 'helo the variables are : $x and $b <br>';
    $second = "helo the variables are : $x and $b <br>";
    print ($first);
    print ($second);

    $name = 1;
    $price = 3;

    function getPrice($price, $tax = 0.3){
        return $price * (1 + $tax);
    }

    $firstNum = 1000;
    $secondNum = 10;
    $total = getPrice($firstNum);
    print("Your total price is $total <br>");

    for ($i=0; $i < 10; $i++) { 
        if($i == 4 ){
            break;
        }
        echo "the number is $i <br>";
    }

    ?>
</body>

</html>