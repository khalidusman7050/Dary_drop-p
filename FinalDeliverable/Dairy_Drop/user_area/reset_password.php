<?php
include('../includes/connect.php');

if(isset($_GET['token'])){
    $token = $_GET['token'];

    $select_query = "SELECT * FROM user_table 
                     WHERE reset_token='$token' 
                     AND token_expire > NOW()";

    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);

    if($row_count > 0){

        if(isset($_POST['update_password'])){

            $new_password = $_POST['new_password'];
            $hash_password = password_hash($new_password, PASSWORD_DEFAULT);

            $update_query = "UPDATE user_table 
                             SET user_password='$hash_password',
                                 reset_token=NULL,
                                 token_expire=NULL
                             WHERE reset_token='$token'";

            mysqli_query($con, $update_query);

            echo "<script>alert('Password Updated Successfully')</script>";
            echo "<script>window.open('user_login.php','_self')</script>";
        }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: linear-gradient(to right, #ff9a9e, #fad0c4);">

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="col-md-5">
        <div class="card shadow-lg p-4">

            <h3 class="text-center mb-4">Reset Password</h3>

            <form method="post">
                <div class="mb-3">
                    <label class="form-label">New Password</label>
                    <input type="password" 
                           name="new_password" 
                           class="form-control"
                           required>
                </div>

                <div class="d-grid">
                    <input type="submit" 
                           name="update_password" 
                           value="Update Password"
                           class="btn btn-success btn-lg">
                </div>
            </form>

        </div>
    </div>
</div>

</body>
</html>

<?php
    } else {
        echo "<div class='alert alert-danger text-center mt-5'>
                Invalid or Expired Token
              </div>";
    }
}
?>