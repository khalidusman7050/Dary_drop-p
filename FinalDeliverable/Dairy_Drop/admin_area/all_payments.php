<h3 class="text-center text-success">All Payments</h3>

<?php
$get_payments = "SELECT * FROM `user_payments`";
$result_payments = mysqli_query($con, $get_payments);
$row_count = mysqli_num_rows($result_payments);

if($row_count == 0){
    echo "<h2 class='text-center text-danger mt-5'>No payments received yet</h2>";
} else {
?>
    <table class="table table-bordered mt-5 m-auto">
        <thead class="table-info text-light">
            <tr class="text-center">
                <th>SI No</th>
                <th>Invoice Number</th>
                <th>Amount</th>
                <th>Payment Mode</th>
                <th>Order Date</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="table-secondary text-light">
            <?php
            $number = 0;
            while($row_data = mysqli_fetch_assoc($result_payments)){
                $number++;
                $payment_id = $row_data['payment_id']; // <- primary key
                $invoice_number = $row_data['invoice_number'];
                $amount = $row_data['amount'];
                $payment_mode = $row_data['payment_mode'];
                $date = $row_data['date'];
            ?>
            <tr class="text-center">
                <td><?php echo $number; ?></td>
                <td><?php echo $invoice_number; ?></td>
                <td><?php echo $amount; ?></td>
                <td><?php echo $payment_mode; ?></td>
                <td><?php echo $date; ?></td>
                <td>
                    <a href="index.php?payment_delete=<?php echo $payment_id; ?>" 
                       onclick="return confirm('Are you sure you want to delete this payment?');" 
                       class="text-light text-decoration-none">
                       <i class="fa-solid fa-trash"></i>
                    </a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } ?>