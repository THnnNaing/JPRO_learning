<html>

<head>
    <title>Delete Database Record</title>
</head>

<body>
    <p>Main Screen</p>
    <hr>
    <?php
    print "<p><a href=view.php>View Database Record</p>";
    print "<p><a href=add.html>Add New Database Record</a></p>";
    print "<p><a href=edit.php>Edit Database Record</a></p>";
    print "<p>Delete Database Record</p>";
    print "<hr>";
    print "<p>Delete Database Record</p>";
    print "<hr>";
    ?>
    <p>Please enter the Product ID you want to delete</p>
    <form name="deleteform" action="delete1.php" method="post">
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