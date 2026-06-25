<?php
session_start();
include('../includes/connect.php');

if(!isset($_SESSION['username'])){
    echo "<h3 class='text-center text-danger'>Please login first</h3>";
    exit();
}

$username = $_SESSION['username'];
$get_user = "SELECT * FROM `user_table` WHERE username='$username'";
$result = mysqli_query($con,$get_user);
$row = mysqli_fetch_assoc($result);
$user_id = $row['user_id'];

/* ---------------- SEND MESSAGE ---------------- */
if(isset($_POST['send_message'])){
    $subject = mysqli_real_escape_string($con,$_POST['subject']);
    $message = mysqli_real_escape_string($con,$_POST['message']);

    $insert = "INSERT INTO `user_messages`
               (user_id, subject, message, status)
               VALUES ($user_id,'$subject','$message',0)";
    mysqli_query($con,$insert);

    echo "<script>alert('Message sent successfully');</script>";
}

/* ---------------- CLEAR CHAT ---------------- */
if(isset($_POST['clear_chat'])){
    mysqli_query($con,"DELETE FROM user_messages WHERE user_id=$user_id");
    echo "<script>window.location.href='contact.php';</script>";
}

/* ---------------- COUNT UNREAD REPLIES ---------------- */
$count_query = "SELECT COUNT(*) as total 
                FROM user_messages 
                WHERE user_id=$user_id 
                AND reply IS NOT NULL 
                AND status=0";

$count_result = mysqli_query($con,$count_query);
$count_row = mysqli_fetch_assoc($count_result);
$unread_count = $count_row['total'];
?>

<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background: linear-gradient(135deg, #667eea, #764ba2);
}

.contact-card{
    background: #ffffff;
    border-radius: 15px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.2);
    padding: 40px;
}

.btn-custom{
    background: linear-gradient(135deg, #667eea, #764ba2);
    border: none;
    border-radius: 10px;
    padding: 12px;
    font-weight: 500;
    transition: 0.3s;
}

.btn-custom:hover{
    opacity: 0.9;
    transform: scale(1.02);
}

.badge{
    font-size: 14px;
}
.text-1{
    text-decoration: none;
    color: white;
}
/* Responsive design for screens below 700px */
@media (max-width: 700px) {

    /* Stack sidebar below products */
    .col-md-10,
    .col-md-2 {
        width: 100% !important;
        max-width: 100% !important;
        flex: 0 0 100% !important;
    }

    /* Reduce banner height */
    .banner-container {
        height: 300px;
    }

    /* Adjust banner text size */
    .banner-container .banner-text h1 {
        font-size: 1.8rem;
    }

    .banner-container .banner-text p {
        font-size: 1rem;
    }

    /* Make product cards full width */
    .card {
        width: 100% !important;
        margin-bottom: 15px;
    }

    /* Center sidebar text */
    .col-md-2 ul {
        text-align: center;
    }

    /* Navbar items center */
    .navbar-nav {
        text-align: center;
    }
}
</style>
</head>

<body>
    

<div class="container d-flex justify-content-center align-items-center" style="min-height:100vh;">
    
<div class="contact-card col-md-6">

<button type="button" class="btn btn-secondary w-30 mt-2 m-90 btn" >
        <a style="none" class="text-1" href="/Dairy_Drop/index.php">🏠 Home</a>
    </button>
<h2 class="text-center mb-4 position-relative">
    📩 Contact Admin
    <?php if($unread_count > 0){ ?>
        <span class="badge bg-danger position-absolute top-0 start-100 translate-middle">
            <?php echo $unread_count; ?>
        </span>
    <?php } ?>
</h2>

<form method="post">
    <div class="mb-3">
        <label class="form-label">Subject</label>
        <input type="text" name="subject"
               class="form-control"
               placeholder="Enter your subject" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Message</label>
        <textarea name="message" rows="4"
                  class="form-control"
                  placeholder="Write your message here..." required></textarea>
    </div>

    <div class="d-grid">
        <button type="submit" name="send_message"
                class="btn btn-custom text-white">
            Send Message
        </button>
    </div>
</form>

<form method="post" class="text-center mt-4">
    <button type="submit" name="clear_chat"
            class="btn btn-danger w-100">
        🗑 Clear All Chat
    </button>
</form>

<h4 class="text-center mt-5">Your Messages</h4>

<?php
$get_user_messages = "SELECT * FROM user_messages
                      WHERE user_id=$user_id
                      ORDER BY date DESC";

$result2 = mysqli_query($con,$get_user_messages);

while($row = mysqli_fetch_assoc($result2)){

    echo "<div class='card mb-3'>
            <div class='card-body'>
                <p><strong>Subject:</strong> {$row['subject']}</p>
                <p><strong>Your Message:</strong> {$row['message']}</p>";

    if($row['reply']!=NULL){
        echo "<p class='text-success'><strong>Admin Reply:</strong> {$row['reply']}</p>";

        // Mark as read
        if($row['status']==0){
            mysqli_query($con,"UPDATE user_messages 
                               SET status=1 
                               WHERE message_id={$row['message_id']}");
        }

    } else {
        echo "<p class='text-warning'>Waiting for reply...</p>";
    }

    echo "</div></div>";
}
?>

</div>
</div>

</body>
</html>