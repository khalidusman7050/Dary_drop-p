<?php
include('../includes/connect.php');

$user_id = intval($_GET['user_id']);

// Mark all user messages as read
mysqli_query($con,"UPDATE user_messages SET status='read' WHERE user_id=$user_id AND sender='user'");

$chat_query = "SELECT * FROM user_messages WHERE user_id=$user_id ORDER BY date ASC";
$chat_result = mysqli_query($con, $chat_query);

while($chat = mysqli_fetch_assoc($chat_result)){
    if($chat['sender']=='user'){
        echo '<div style="background:#f1f1f1; padding:8px; margin:5px; border-radius:10px; text-align:left;">';
        echo '<strong>User:</strong> '.$chat['message'].'<br><small>'.$chat['date'].'</small></div>';
    } else {
        echo '<div style="background:#28a745; color:white; padding:8px; margin:5px; border-radius:10px; text-align:right;">';
        echo '<strong>Admin:</strong> '.$chat['message'].'<br><small>'.$chat['date'].'</small></div>';
    }
}
?>