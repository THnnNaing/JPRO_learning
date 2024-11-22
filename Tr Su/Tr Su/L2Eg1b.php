<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $name = $_POST["name"];
    $pCode = $_POST["postalcode"];
    print($name);
    print ($pCode) . "<br>";

    if (preg_match("^(AA|BB|CC)[0‐ 9]{3,4}$^", $pCode)) {
        echo  " <strong style='color:blue'> is Valid</strong>";
    } else {
        echo " <strong style='color:red'> is NOT Valid</strong>";
    }
    ?>
</body>

</html>