<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Database Record</title>
</head>

<body>
    <p>Main Screen</p>
    <hr>
    <?php
    print "<p>View Database Record</p>";
    print "<p><a href=add.html>Add New Database Record</a></p>";
    print "<p><a href=edit.php>Edit Database Record</a></p>";
    print "<p><a href=delete.php>Delete Database Record</a></p>";
    print "<hr>";
    print "<p>View Database Record</p>";
    print "<hr>";

    include "connect.php";

    $query = "SELECT * FROM product";
    mysqli_select_db($conn, $mydb);
    $result = mysqli_query($conn, $query);
    if ($result) {
        print "<table border = 1 >";
        print "<th>Product ID<th>Title<th>Qty Onhand<th>Sell Price<th>Reorder Level";
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            print "<tr>";
            foreach ($row as $field) {
                print "<td>$field</td> ";
            }
            print "</tr>";
        }
    } else {
        die("Query=$query failed!");
    }
    mysqli_close($conn);

    ?>
</body>

</html>