<?php
if(isset($_GET['payment_delete'])){
    $payment_delete =$_GET['payment_delete'];
    //echo  $delete_payment;
    $delete_query ="Delete from `user_payments` where payment_id=$payment_delete";
    $result =mysqli_query($con,$delete_query);
    if($result){
        echo "<script>alert('Payment deleted successfully')</script>";
        echo "<script>window.open('index.php?all_payments','_self')</script>";
    }
}
?>