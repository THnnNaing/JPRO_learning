<html>
<head>
    <meta charset="utf-8">
    <title>Order</title>
    <link rel="stylesheet" type="text/css" href="Order.css">
</head>
<body>
    <center>
        <img src="https://img.freepik.com/premium-vector/burger-hamburger-vector-logo-template-design-premium-graphic-illustrations-vintage-style_645012-736.jpg?ga=GA1.1.886371591.1723277070&semt=ais_hybrid" 
             margin="auto" width="370px" height="200px">
        <p>
            <nav>
                <div class="topnav" id="myTopnav">
                    <a href="Home.php">Home</a>
                    <a href="AboutUs.php">About</a>
                    <a href="UPView.php">Food</a>
                    <a href="Order.php">Order</a>
                    <a href="UReview.php">Review</a>
                </div>
            </nav>
        </p>
    </center>
    <div class="entries">
        <h1>ORDER</h1>
        <form method="POST" action="Order1.php">
            <table border="1">
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                </tr>
                <!-- Example Product List -->
                <?php
                include "connect.php";
                $query = $con->query("SELECT * FROM product");
                while ($row = $query->fetch_assoc()) {
                    echo "<tr>
                            <td>
                                <input type='checkbox' name='productid[]' value='{$row['productid']}||{$row['productname']}'>
                            </td>
                            <td>{$row['productname']}</td>
                            <td>{$row['price']}</td>
                            <td>
                                <input type='number' name='quantity_{$row['productid']}' min='1' placeholder='Enter quantity'>
                            </td>
                        </tr>";
                }
                ?>
            </table>
            <br>
            <label>Customer Name: </label>
            <input type="text" name="customer" required>
            <br>
            <label>Address: </label>
            <input type="text" name="address" required>
            <br>
            <input type="submit" value="Submit Order">
        </form>
    </div>
</body>
</html>