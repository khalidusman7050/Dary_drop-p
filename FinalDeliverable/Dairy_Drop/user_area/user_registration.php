<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - Registration</title>
    <!-- bootstrap css link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
     
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- username field -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off"required="required"name="user_username"/>
                    </div>
                     <!-- email field -->
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" id="user_email" class="form-control" placeholder="Enter your email" autocomplete="off"required="required"name="user_email"/>
                    </div>
                     <!--image -->
                    <div class="form-outline mb-4">
                        <label for="user_image" class="form-label">User Image</label>
                        <input type="file" id="user_image" class="form-control" name="user_image"/>
                    </div>
                     <!-- password field -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off"required="required"name="user_password"/>
                    </div>
                     <!-- confirm password field -->
                    <div class="form-outline mb-4">
                        <label for="user_confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" id="user_confirm_password" class="form-control" placeholder="Confirm your password" autocomplete="off"required="required"name="user_confirm_password"/>
                    </div>
                      <!-- Address field -->
                    <div class="form-outline mb-4">
                        <label for="user_address" class="form-label">Address</label>
                        <input type="text" id="user_address" class="form-control" placeholder="Enter your address" autocomplete="off"required="required"name="user_address"/>
                    </div>
                      <!-- contact field -->
                    <div class="form-outline mb-4">
                        <label for="user_contact" class="form-label">Contact</label>
                        <input type="text" id="user_contact" class="form-control" placeholder="Enter your contact number" autocomplete="off"required="required"name="user_contact"/>
                    </div>
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Register" class="bg-info btn-outline-dark py-2 px-3 border-0" name="user_register">
                        <p class="small fw-bold mt-2 mb-0">Already have account? <a href="user_login.php" class="text-danger"> Login</a></p>
                    </div>
                </form> 
        </div>
    </div>
    
</body>
</html>



<!--php code -->
<?php
if(isset($_POST['user_register'])){
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
    $user_confirm_password = $_POST['user_confirm_password'];
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    $user_ip= getIPAddress();
    // select query
    $select_query = "SELECT * FROM `user_table` where username='$user_username' or user_email='$user_email'";
    $result = mysqli_query($con,$select_query);
    $rows_count = mysqli_num_rows($result);
    if($rows_count > 0){
    echo "<script>alert('Username or email already exist!')</script>";
}else if($user_password != $user_confirm_password){
    echo "<script>alert('Passwords do not match!')</script>";
}
else{

    move_uploaded_file($user_image_tmp,"./user_images/$user_image");

    $insert_query ="INSERT INTO user_table 
(username,user_email,user_password,user_address,user_mobile,user_image,user_ip) 
VALUES 
('$user_username','$user_email','$hash_password','$user_address','$user_contact','$user_image','$user_ip')";

    $sql_execute = mysqli_query($con, $insert_query);

    if($sql_execute){
        echo "<script>alert('Data inserted successfully!')</script>";
    }else{
        die(mysqli_error($con));
    }
}



// selecting cart items
$select_cart_items ="SELECT * FROM `cart_details` WHERE ip_address='$user_ip'";
$result_cart = mysqli_query($con, $select_cart_items);
$rows_count_cart = mysqli_num_rows($result_cart);
if($rows_count_cart>0){
    $_SESSION['username'] = $user_username;
    echo "<script>alert('You have items in your cart!')</script>";
    echo "<script>window.open('checkout.php','_self')</script>";
}else{
    echo"<script>window.open('../index.php','_self')</script>"; 
}
}


?>