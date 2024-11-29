<?php
$server = "localhost";
$user = "root";
$passwd = "";
$mydb = "studentdb";
$connect = mysqli_connect("$server", "$user", "$passwd", "$mydb");

if (!$connect) {
    die("Connection failed");
} else {
    echo "Connected successfully";
}


$query = "select * from student";
mysqli_select_db($connect, $mydb);
$result_set = mysqli_query($connect, $query);


if ($result_set) {
    while ($record = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
        foreach ($record as $value) {
            echo "$value";
        }
    }
} else {
    die("Query =$query failed");
}
// mysqli_close($connect); // After processing,close the database connection\\




$query = "select * from student";
mysqli_select_db($connect, $mydb);
$result_set = mysqli_query($connect, $query);
if ($result_set) {
    $i=0;
    echo "<table border=1>";
    echo "<th>No</th>";
    echo "<th>Sid</th>";
    echo "<th>Sname</th>";
    echo "<th>Sage</th>";
    echo "<th>Syear</th>";
    while ($record = mysqli_fetch_array($result_set, MYSQLI_ASSOC)) {
        $i++;
        echo "<tr>\n";
        
        echo "<td>$i</td>";
        foreach ($record as $value) {
            echo "<td>$value</td>";
        }
        echo "</tr>\n";
    }
    echo "</table>";
} else {
    die("Query =$query failed");
}


mysqli_close($connect);
