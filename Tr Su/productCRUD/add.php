<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Database Record</title>
</head>

<body>
    <p>Main Screen</p>
    <hr>
    <?php
    print "<p><a href=view.php>View Database Record</a></p>";
    print "<p><a>Add New Database Record</a></p>";
    print "<p><a href=edit.php>Edit Database Record</a></p>";
    print "<p><a href=delete.php>Delete Database Record</a></p>";
    print "<hr>";
    print "<p>Add New Database Record</p>";
    print "<hr>";
    include "connect.php";

    $sql = "INSERT INTO product(pid, title, qty, price, reorderlevel)
    VALUES('$_POST[aproductid]','$_POST[atitle]','$_POST[aqtyonhand]',
    '$_POST[asellprice]','$_POST[aorderlevel]')";

    if (!mysqli_query($conn, $sql)) {
        die('Error: ' . mysqli_error($conn));
    }
    echo "1 record added";
    mysqli_close($conn);

    ?>
</body>

</html>