 <?php
include('../includes/connect.php');

// Reply
if(isset($_POST['reply_message'])){
    $reply = mysqli_real_escape_string($con,$_POST['reply']);
    $message_id = intval($_POST['message_id']);

    $update = "UPDATE `user_messages`
               SET reply='$reply', status='replied'
               WHERE message_id=$message_id";
    mysqli_query($con,$update);

    echo "<script>alert('Reply sent successfully');</script>";
}else{
    $message_id = isset($_POST['message_id']) ? intval($_POST['message_id']) : 0;
    if($message_id > 0){
        $update = "UPDATE `user_messages`
                   SET status='read'
                   WHERE message_id=$message_id";
        mysqli_query($con,$update);
    }
}
?>

<h3 class="text-center text-success">User Messages</h3>

<?php
$get_messages = "SELECT m.*, u.username
                 FROM `user_messages` m
                 JOIN `user_table` u ON m.user_id=u.user_id
                 ORDER BY m.date DESC";
$result = mysqli_query($con,$get_messages);

while($row = mysqli_fetch_assoc($result)){
?>

<div class="card w-75 m-auto mb-3">
    <div class="card-body">
        <h5>User: <?php echo $row['username']; ?></h5>
        <p><strong>Subject:</strong> <?php echo $row['subject']; ?></p>
        <p><strong>Message:</strong> <?php echo $row['message']; ?></p>
        <p><strong>Status:</strong> <?php echo $row['status']; ?></p>

        <?php if($row['reply']==NULL){ ?>
            <form method="post">
                <textarea name="reply" class="form-control mb-2" placeholder="Write reply"></textarea>
                <input type="hidden" name="message_id" value="<?php echo $row['message_id']; ?>">
                <input type="submit" name="reply_message" class="btn btn-success" value="Send Reply">
            </form>
        <?php } else { ?>
            <p class="text-success"><strong>Admin Reply:</strong> <?php echo $row['reply']; ?></p>
        <?php } ?>
    </div>
</div>

<?php } ?>"