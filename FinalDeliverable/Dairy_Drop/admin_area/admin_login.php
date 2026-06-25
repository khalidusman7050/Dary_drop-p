
<?php
session_start();
include('../includes/connect.php');

if(isset($_POST['admin_login'])){
    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];

    // Fetch admin from database
    $select_admin = "SELECT * FROM admin_tables WHERE admin_email='$admin_email'";
    $result = mysqli_query($con, $select_admin);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);

        // Verify password
        if(password_verify($admin_password, $row['admin_password'])){
            // Set session variables
            $_SESSION['admin_name']  = $row['admin_name'];
            $_SESSION['admin_email'] = $row['admin_email'];
            $_SESSION['admin_image'] = $row['admin_image'];

            // Redirect to dashboard
            header("Location: index.php");
            exit();
        } else {
            echo "<script>alert('Invalid Password');</script>";
        }
    } else {
        echo "<script>alert('Admin Email not found');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body{
    background: linear-gradient(to right, #4e73df, #1cc88a);
    overflow-x: hidden;
}
.login-box{
    background:white;
    padding:40px;
    border-radius:15px;
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
}
.btn-custom{
    background:#4e73df;
    color:white;
    font-weight:bold;
}
.btn-custom:hover{
    background:#2e59d9;
}
</style>
</head>
<body>
<div class="container mt-5  ">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="login-box">
                <h2 class="text-center mb-4">Admin Login</h2>
                <form action="" method="post">
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="admin_email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="admin_password" class="form-control" required>
                    </div>
                    <div class="d-grid">
                        <input type="submit" name="admin_login" value="Login" class="btn btn-custom">
                    </div>
                    <p class="mt-3"><a href="forgot_password.php" class="text-decoration-none">Forgot Password?</a></p>
                    <p class="mt-3">Don't have an account? <a href="admin_registration.php" class="text-decoration-none text-danger">Register</a></p>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>