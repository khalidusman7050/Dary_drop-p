<?php
session_start();
include('../includes/connect.php');

if(isset($_POST['forgot_submit'])){
    $admin_email = $_POST['admin_email'];

    // Check if email exists
    $check_email = "SELECT * FROM admin_tables WHERE admin_email='$admin_email'";
    $result = mysqli_query($con, $check_email);

    if(mysqli_num_rows($result) > 0){
        // Email exists, allow to reset password
        $_SESSION['reset_email'] = $admin_email;
        header("Location: reset_password.php");
        exit();
    } else {
        echo "<script>alert('Email not found!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Forgot Password</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5 d-flex justify-content-center">
    <div class="col-md-6">
        <div class="card p-4">
            <h3 class="text-center mb-4">Forgot Password</h3>
            <form method="post">
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="admin_email" class="form-control" required>
                </div>
                <div class="d-grid">
                    <input type="submit" name="forgot_submit" value="Submit" class="btn btn-primary">
                </div>
                <p class="mt-3"><a href="admin_login.php">Back to Login</a></p>
            </form>
        </div>
    </div>
</div>
</body>
</html>