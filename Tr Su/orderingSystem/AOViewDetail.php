<!-- Sales Details -->
<div>
    <table class="table table-bordered table-striped" width="650">
        <thead>
            <th>Product Name</th>
            <th>Price</th>
            <th>Purchase Quantity</th>
            <th>Subtotal</th>
        </thead>
        <tbody>
            <?php
            $sql = "select * from purchase_detail left join product on 
product.productid=purchase_detail.productid where purchaseid='" . $row['purchaseid'] . "'";
            $dquery = $con->query($sql);
            while ($drow = $dquery->fetch_array()) {
            ?>
                <tr>
                    <td><?php echo $drow['productname']; ?></td>
                    <td class="text-right">&nbsp;&nbsp;&nbsp; <?php echo number_format($drow['price'], 2);
                                                                ?></td>

                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $drow['quantity']; ?></td>
                    <td class="text-right">
                        <?php
                        $subt = $drow['price'] * $drow['quantity'];
                        echo number_format($subt, 2);
                        ?>
                    </td>
                </tr>
            <?php
            }
            ?>
            <tr>
                <td colspan="3" class="text-right"><b>TOTAL</b></td>
                <td class="text-right">kyats <?php echo number_format($row['total'], 2); ?></td>
            </tr>
        </tbody>
    </table>
</div>