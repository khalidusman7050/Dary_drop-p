<h3 class="text-center text-success">All Orders</h3>

<?php
$get_orders = "SELECT * FROM `user_orders`";
$result_orders = mysqli_query($con, $get_orders);
$row_count = mysqli_num_rows($result_orders);

if($row_count == 0){
    // No orders
    echo "<h2 class='text-center text-danger mt-5'>No orders yet</h2>";
} else {
    // There are orders, show table
    ?>
    <table class="table table-bordered mt-5 m-auto">
        <thead class="table-info text-light">
            <tr class="text-center">
                <th>SI no</th>
                <th>Due Amount</th>
                <th>Invoice Number</th>
                <th>Total Products</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="table-secondary text-light">
            <?php
            $number = 0;
            while($row_data = mysqli_fetch_assoc($result_orders)){
                $number++;
                $order_id = $row_data['order_id'];
                $amount_due = $row_data['amount_due'];
                $invoice_number = $row_data['invoice_number'];
                $total_products = $row_data['total_products'];
                $order_date = $row_data['order_date'];
                $order_status = $row_data['order_status'];
                ?>
                <tr class="text-center">
                    <td><?php echo $number; ?></td>
                    <td><?php echo $amount_due; ?></td>
                    <td><?php echo $invoice_number; ?></td>
                    <td><?php echo $total_products; ?></td>
                    <td><?php echo $order_date; ?></td>
                    <td><?php echo $order_status; ?></td>
                    <td>
                        <a href="index.php?order_delete=<?php echo $order_id; ?>" 
                           onclick="return confirm('Are you sure you want to delete this order?');" 
                           class="text-light text-decoration-none">
                           <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } ?>