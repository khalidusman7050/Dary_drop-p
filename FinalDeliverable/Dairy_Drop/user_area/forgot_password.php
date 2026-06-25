<?php
include('../includes/connect.php');

if(isset($_POST['forgot_password'])){
    $user_email = $_POST['user_email'];

    $select_query = "SELECT * FROM user_table WHERE user_email='$user_email'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);

    if($row_count > 0){

        $token = bin2hex(random_bytes(50));
        $expire = date("Y-m-d H:i:s", strtotime("+1 hour"));

        $update_query = "UPDATE user_table 
                         SET reset_token='$token', token_expire='$expire' 
                         WHERE user_email='$user_email'";

        mysqli_query($con, $update_query);

        $reset_link = "http://localhost/Dairy_Drop/user_area/reset_password.php?token=$token";

        echo "<div class='alert alert-success text-center'>
                Reset Link: <br> 
                <a href='$reset_link'>$reset_link</a>
              </div>";

    } else {
        echo "<div class='alert alert-danger text-center'>
                Email not found!
              </div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: linear-gradient(to right, #74ebd5, #9face6);
        }
        .card{
            border-radius: 15px;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="col-md-5">
        <div class="card shadow-lg p-4">

            <h3 class="text-center mb-4">Forgot Password</h3>

            <form method="post">
                <div class="mb-3">
                    <label class="form-label">Enter Your Email</label>
                    <input type="email" 
                           name="user_email" 
                           class="form-control" 
                           placeholder="example@gmail.com"
                           required>
                </div>

                <div class="d-grid">
                    <input type="submit" 
                           name="forgot_password" 
                           value="Send Reset Link"
                           class="btn btn-primary btn-lg">
                </div>

                <div class="text-center mt-3">
                    <a href="user_login.php" class="text-decoration-none">
                        Back to Login
                    </a>
                </div>
            </form>

        </div>
    </div>
</div>

</body>
</html>