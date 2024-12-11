<html>

<head>
    <title>Edit Database Record</title>
</head>

<body>
    <p>Main Screen</p>
    <hr>
    <?php
    print "<p><a href=view.php>View Database Record</p>";
    print "<p><a href=add.html>Add New Database Record</a></p>";
    print "<p>Edit Database Record</p>";
    print "<p><a href=delete.php>Delete Database Record</a></p>";
    print "<hr>";
    print "<p>Edit Database Record</p>";
    print "<hr>";
    include "connect.php";

    ?>
    <p>Please enter the Product ID you want to edit</p>
    <form name="editform" action="edit1.php" method="post">
        <table>
            <tr>
                <td>Product ID</td>
                <td><input type="text" name="aproductid" size="10"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="submit" />
                    <input type="reset" value="Reset Form" />
                </td>
            </tr>
        </table>
    </form>
</body>

</html>