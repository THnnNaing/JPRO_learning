<?php
include "connect.php";

if (isset($_POST['productid'])) {
    $customer = $_POST['customer'];
    $address = $_POST['address'];

    // Insert into purchase table
    $sql = "INSERT INTO purchase (customer, date_purchase, address) VALUES (?, NOW(), ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ss", $customer, $address);
    if ($stmt->execute()) {
        $pid = $stmt->insert_id; // Get the last inserted ID
    } else {
        die("Error: Unable to insert into purchase table.");
    }

    $total = 0;

    foreach ($_POST['productid'] as $product) {
        list($productid, $productname) = explode("||", $product);
        $quantity_key = 'quantity_' . $productid;

        if (!isset($_POST[$quantity_key]) || empty($_POST[$quantity_key])) {
            echo "<script>
                    alert('Please fill quantity for product: {$productname}');
                    window.location.href = 'Order.php';
                  </script>";
            exit();
        }

        $quantity = intval($_POST[$quantity_key]);

        // Retrieve product details
        $product_query = "SELECT price FROM product WHERE productid = ?";
        $stmt = $con->prepare($product_query);
        $stmt->bind_param("s", $productid);
        $stmt->execute();
        $result = $stmt->get_result();
        $product_data = $result->fetch_assoc();

        if ($product_data) {
            $subt = $product_data['price'] * $quantity;
            $total += $subt;

            // Insert into purchase_detail table
            $detail_query = "INSERT INTO purchase_detail (purchaseid, productid, quantity) VALUES (?, ?, ?)";
            $detail_stmt = $con->prepare($detail_query);
            $detail_stmt->bind_param("isi", $pid, $productid, $quantity);
            if (!$detail_stmt->execute()) {
                die("Error: Unable to insert into purchase_detail table.");
            }
        } else {
            echo "<script>
                    alert('Product ID {$productid} not found.');
                    window.location.href = 'Order.php';
                  </script>";
            exit();
        }
    }

    // Update the total in the purchase table
    $update_query = "UPDATE purchase SET total = ? WHERE purchaseid = ?";
    $update_stmt = $con->prepare($update_query);
    $update_stmt->bind_param("di", $total, $pid);
    if (!$update_stmt->execute()) {
        die("Error: Unable to update total in purchase table.");
    }

    session_start();
    $_SESSION['sess_pid'] = $pid;
    header('Location: OrderSuccess.php');
} else {
    echo "<script>
            alert('Please select a product.');
            window.location.href = 'Order.php';
          </script>";
}
?>