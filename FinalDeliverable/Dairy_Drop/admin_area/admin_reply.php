<?php
include('../includes/connect.php');

if(isset($_POST['message'])){
    $user_id = intval($_POST['user_id']);
    $message = mysqli_real_escape_string($con, $_POST['message']);

    $insert = "INSERT INTO user_messages (user_id, sender, message, status)
               VALUES ($user_id, 'admin', '$message', 'pending')";
    mysqli_query($con, $insert);
}
?>