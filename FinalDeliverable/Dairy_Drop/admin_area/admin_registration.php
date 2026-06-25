
<?php
include('../includes/connect.php');

if(isset($_POST['admin_register'])){
    
    $admin_name = $_POST['admin_name'];
    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];
    $hash_password = password_hash($admin_password, PASSWORD_DEFAULT);

    $admin_image = $_FILES['admin_image']['name'];
    $temp_image = $_FILES['admin_image']['tmp_name'];

    move_uploaded_file($temp_image,"./product_images/$admin_image");

    // Check if email already exists
    $check_query = "SELECT * FROM `admin_tables` WHERE admin_email='$admin_email'";
    $result = mysqli_query($con,$check_query);

    if(mysqli_num_rows($result)>0){
        echo "<script>alert('Email already exists')</script>";
    }else{
        $insert_query = "INSERT INTO admin_tables 
        (admin_name, admin_email, admin_password, admin_image) 
        VALUES 
        ('$admin_name','$admin_email','$hash_password','$admin_image')";

        $run_query = mysqli_query($con,$insert_query);

        if($run_query){
            echo "<script>alert('Admin Registered Successfully')</script>";
            echo "<script>window.open('admin_login.php','_self')</script>";
        }
    }
}
?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

        <style>
        body{
        overflow-x: hidden;
            background: linear-gradient(to right, #4e73df, #1cc88a);
        }

        .register-box{
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
    <div class="container mt-5 d-flex justify-content-center align-items-center">
        <div class="image">
            
        </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="register-box">

                <h2 class="text-center mb-4">Admin Registration</h2>

                <form action="" method="post" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label class="form-label">Admin Name</label>
                        <input type="text" name="admin_name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Admin Email</label>
                        <input type="email" name="admin_email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Admin Password</label>
                        <input type="password" name="admin_password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Upload Image</label>
                        <input type="file" name="admin_image" class="form-control">
                    </div>

                    <div class="d-grid">
                        <input type="submit" name="admin_register" value="Register" class="btn btn-custom">
                    </div>
                    <p>Do have account?<a href="admin_login.php" class="text-decoration-none text-danger text-bold">Login</a></p>

                </form>

            </div>
        </div>
    </div>
</div>
</body>
</html>