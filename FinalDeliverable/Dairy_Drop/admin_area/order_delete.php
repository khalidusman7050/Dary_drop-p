<?php
if(isset($_GET['order_delete'])){
    $order_delete =$_GET['order_delete'];
    //echo  $delete_brand;
    $delete_query ="Delete from `user_orders` where order_id=$order_delete";
    $result =mysqli_query($con,$delete_query);
    if($result){
        echo "<script>alert('Order deleted successfully')</script>";
        echo "<script>window.open('index.php?all_orders','_self')</script>";
    }
}
?>