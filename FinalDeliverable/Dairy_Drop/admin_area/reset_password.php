<?php
session_start();
include('../includes/connect.php');

if(!isset($_SESSION['reset_email'])){
    header("Location: forgot_password.php");
    exit();
}

if(isset($_POST['reset_submit'])){
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if($new_password === $confirm_password){
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $email = $_SESSION['reset_email'];

        $update_query = "UPDATE admin_tables SET admin_password='$hashed_password' WHERE admin_email='$email'";
        $result = mysqli_query($con, $update_query);

        if($result){
            unset($_SESSION['reset_email']);
            echo "<script>alert('Password updated successfully!'); window.location='admin_login.php';</script>";
        } else {
            echo "<script>alert('Error! Please try again.');</script>";
        }
    } else {
        echo "<script>alert('Passwords do not match!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reset Password</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5 d-flex justify-content-center">
    <div class="col-md-6">
        <div class="card p-4">
            <h3 class="text-center mb-4">Reset Password</h3>
            <form method="post">
                <div class="mb-3">
                    <label>New Password</label>
                    <input type="password" name="new_password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" required>
                </div>
                <div class="d-grid">
                    <input type="submit" name="reset_submit" value="Reset Password" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>