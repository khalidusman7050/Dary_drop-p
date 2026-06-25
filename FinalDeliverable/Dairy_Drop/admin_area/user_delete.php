<?php
if(isset($_GET['user_delete'])){
    $user_delete =$_GET['user_delete'];
    //echo  $delete_user;
    $delete_query ="Delete from `user_table` where user_id=$user_delete";
    $result =mysqli_query($con,$delete_query);
    if($result){
        echo "<script>alert('User deleted successfully')</script>";
        echo "<script>window.open('index.php?list_users','_self')</script>";
    }
}
?>