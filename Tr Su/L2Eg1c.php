<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $tody = "11/22/2024";
    print($tody). "<br>";
    list($month,$day,$year) = explode("/",$tody);
    echo "Month: $month, Day: $day, Year: $year" . "<br>";
    ?>
</body>
</html>