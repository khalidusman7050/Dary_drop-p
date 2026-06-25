<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
cart();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dairy Drop Ecommerce</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">

    <style>
        body { overflow-x: hidden; }

        /* Navbar hover */
        .navbar-nav .nav-link {
            transition: all 0.2s ease;
        }
        .navbar-nav .nav-link:hover { color: yellow !important; transform: scale(1.1); }

        /* Profile image */
        .profile_img {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border: 2px solid #fff;
            cursor: pointer;
            transition: 0.3s;
        }
        .profile_img:hover { transform: scale(1.1); border-color: #0d6efd; }

        /* Banner */
        .banner-container { position: relative; width: 100%; height: 500px; overflow: hidden; margin-bottom: 40px; }
        .banner-container .banner-image { width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease; }
        .banner-container:hover .banner-image { transform: scale(1.05); }
        .banner-container .banner-text { position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; text-align: center; background: rgba(0,0,0,0.3); padding: 20px 40px; border-radius: 10px; }
        .banner-container .banner-text h1 { font-size: 3rem; font-weight: bold; margin-bottom: 15px; text-shadow: 2px 2px 5px rgba(0,0,0,0.7); }
        .banner-container .banner-text p { font-size: 1.2rem; margin-bottom: 20px; text-shadow: 1px 1px 3px rgba(0,0,0,0.7); }
        .banner-container .banner-text .btn { font-size: 1.2rem; padding: 10px 25px; border-radius: 30px; text-transform: uppercase; }

        /* Product card hover */
        .card { transition: all 0.4s ease; }
        .card:hover { transform: translateY(-10px); box-shadow: 0 10px 25px rgba(0,0,0,0.3); }

        /* Sidebar hover */
        .col-md-2 .nav-link { transition: all 0.3s ease; }
        .col-md-2 .nav-link:hover { background-color: #0dcaf0; color: white !important; padding-left: 15px; }

        /* Buttons */
        .btn-primary { transition: all 0.3s ease; }
        .btn-primary:hover { background-color: darkblue; transform: scale(1.05); }

        @media screen and (max-width: 768px) {
            .banner-container { height: 300px; }
            .banner-container .banner-text h1 { font-size: 2rem; }
            .banner-container .banner-text p { font-size: 1rem; }
        }
    </style>
</head>
<body>

<div class="container-fluid p-0">
    <!-- First Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Dairy Drop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="display_all.php">Product</a></li>
                    <li class="nav-item"><a class="nav-link" href="./user_area/contact.php">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i> <sup><?php cart_item(); ?></sup></a></li>
                    <li class="nav-item"><a class="nav-link" href="cart.php">Total Price: <?php total_cart_price(); ?>/-</a></li>
                </ul>

                <form class="d-flex" action="search_product.php" method="get">
                    <input class="form-control me-2" type="search" placeholder="Search" name="search_data">
                    <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                </form>
            </div>
        </div>
    </nav>

    <!-- Second Navbar (Profile / Login / Logout) -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <ul class="navbar-nav me-auto d-flex align-items-center">
            <li class='nav-item d-flex align-items-center'>
            <?php
                if(isset($_SESSION['user_image'])){
                    echo "<img src='./user_images/".$_SESSION['user_image']."' alt='' class='profile_img'>";
                } else {
                    echo "<img src='./images/user.png' alt='' class='profile_img'>";
                }
                if(isset($_SESSION['username'])){
                    echo "<span class='text-light'>Welcome ".$_SESSION['username']."</span>";
                } else {
                    echo "<a class='nav-link text-light' href='./user_area/user_login.php'>Login</a>";
                }
            ?>
            </li>

            <?php
                if(isset($_SESSION['username'])){
                    echo "<li class='nav-item'><a class='nav-link' href='./user_area/logout.php'>Logout</a></li>";
                }
            ?>
        </ul>
    </nav>

    <!-- Banner -->
    <div class="banner-container">
        <img src="image/dairydrop.png" alt="Banner" class="banner-image">
        <div class="banner-text">
            <h1>Welcome to Dairy Drop</h1>
            <p>Fresh & Healthy Products Delivered to Your Home</p>
            <a href="display_all.php" class="btn btn-primary">Shop Now</a>
        </div>
    </div>

    <!-- Products Section -->
    <div class="row px-1">
        <div class="col-md-10">
            <div class="row px-3">
                <?php
                    getproducts();
                    get_unique_categories();
                    get_unique_brands();
                ?>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-md-2 bg-secondary p-0">
            <!-- Brands -->
            <ul class="navbar-nav me-auto text-center">
                <li class="nav-item bg-info"><a href="#" class="nav-link text-light"><h4>Delivery Brand</h4></a></li>
                <?php getbrands(); ?>
            </ul>

            <!-- Categories -->
            <ul class="navbar-nav me-auto text-center">
                <li class="nav-item bg-info"><a href="#" class="nav-link text-light"><h4>Categories</h4></a></li>
                <?php getcategory(); ?>
            </ul>
        </div>
    </div>

    <!-- Footer -->
    <?php include("./includes/footer.php"); ?>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>