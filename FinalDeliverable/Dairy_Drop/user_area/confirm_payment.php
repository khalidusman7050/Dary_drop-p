<?php
include('../includes/connect.php');
session_start();

if(isset($_GET['order_id'])){
    $order_id = intval($_GET['order_id']); // sanitize
    $select_data = "SELECT * FROM `user_orders` WHERE order_id=$order_id";
    $result = mysqli_query($con, $select_data);

    if($result && mysqli_num_rows($result) > 0){
        $row_fetch = mysqli_fetch_assoc($result);
        $invoice_number = $row_fetch['invoice_number'];
        $amount_due = $row_fetch['amount_due'];
    } else {
        echo "<script>alert('Order not found');</script>";
        exit();
    }
}

if(isset($_POST['confirm_payment'])){
    $invoice_number = $_POST['invoice_number'];
    $amount = floatval($_POST['amount']);
    $payment_mode = $_POST['payment_mode'];

    // Insert into user_payments
    $insert_query = "INSERT INTO `user_payments` (order_id, invoice_number, amount, payment_mode, date) 
                     VALUES ($order_id, '$invoice_number', $amount, '$payment_mode', NOW())";
    $result = mysqli_query($con, $insert_query);

    if($result){
        // Update order status
        $update_order = "UPDATE `user_orders` SET order_status='complete' WHERE order_id=$order_id";
        mysqli_query($con, $update_order);

        echo "<h3 class='text-center text-light'>Successfully completed the payment</h3>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
    } else {
        echo "<h3 class='text-center text-danger'>Payment failed: ".mysqli_error($con)."</h3>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment page</title>
    <!-- bootstarp -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-secondary">
    <div class="container my-5">
        <h1 class="text-center text-light">Confirm payment</h1>
        <form action="" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoice_number  ?>">
            </div>
             <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="" class="text-light">Amount</label>
                <input type="text" class="form-control w-50 m-auto" name="amount"value="<?php echo $amount_due  ?>" >
            </div>
             <div class="form-outline my-4 text-center w-50 m-auto">
              <select class="form-select w-50 m-auto" name="payment_mode">
                <option >Select payment Mode</option>
                <option >UPI</option>
                <option >jazcash</option>
                <option >essypasa</option>
                <option >UBL</option>
                <option >Cash on Delivery</option>
                <option >payoffline</option>
            </select>
            </div>
             <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="submit" class="bg-info py-2 px-3 border-0" value="confirm"
                name="confirm_payment">
            </div>
        </form>
    </div>

    
</body>
</html>