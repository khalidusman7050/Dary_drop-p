<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce website using php and MYSQL</title>
    <!-- bootstrap css link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
     <!-- font awesome link -->
      <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw="crossorigin="anonymous" referrerpolicy="no-referrer" />

      <link rel="stylesheet" href="style.css">
      <style>
        .cart_img{
        width: 100px;
        height: 100px;
        object-fit: contain;
    }
       body{
        overflow-x: hidden;
    }
    /* Navbar link hover */
.navbar .nav-link:hover {
    color: #fff !important; /* text color on hover */
    background-color: #0d6efd; /* Bootstrap primary blue background */
    border-radius: 5px;
    transition: 0.3s;
}
/* Sidebar links hover */
.navbar-nav .nav-item a:hover {
    background-color: #17a2b8; /* bootstrap info color */
    color: #fff !important;
    border-radius: 5px;
    transition: 0.3s;
}
.product-card {
    border: 1px solid #ddd;
    padding: 10px;
    margin-bottom: 15px;
    transition: transform 0.3s, box-shadow 0.3s;
}

.product-card:hover {
    transform: scale(1.05); /* slightly bigger */
    box-shadow: 0 5px 15px rgba(0,0,0,0.3);
}
.btn:hover {
    opacity: 0.8;
    transform: scale(1.05);
    transition: 0.3s;
}
    

      </style>
</head>
<body>
<!-- navBar --> 
 <div class="container-fluid p-0">
    <!-- first child -->
     <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Dairy drop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">product</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="./user_area/user_registration.php">Register</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="./user_area/contact.php">Contact</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class ="fa-solid fa-cart-shopping"></i> <sup> <?php
          cart_item(); 
          ?></sup></a>
        </li> 

        <li class="nav-item">
          <a class="nav-link" href="cart.php">Total price: <?php
          total_cart_price();
          ?>/- </a>
        </li>
        
      </ul>
      <form class="d-flex" action="" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"name="search_data"/>
        <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product"/>
      </form>
    </div>
  </div>
</nav>

<!-- second child -->
 <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <ul class="navbar-nav me-auto">
     <?php
       if(!isset($_SESSION['username'])){
      echo " <li class='nav-item'>
            <a class='nav-link' href='#'>welcome Guest</a>
           </li>";
     }else{
      echo " </li>
        <li class='nav-item'>
            <a class='nav-link' href='#'>welcome ".$_SESSION['username']."</a>
        </li>";
     }




     if(!isset($_SESSION['username'])){
      echo " </li>
        <li class='nav-item'>
            <a class='nav-link' href='./user_area/user_login.php'>Login</a>
        </li>";
     }else{
      echo " </li>
        <li class='nav-item'>
            <a class='nav-link' href='./user_area/logout.php'>Logout</a>
        </li>";
     }
     
     ?>
  </ul>
 </nav>

 <!-- calling cart function -->
  <?php
  cart();
  ?>
 <!-- third child -->
  <div class="bg-light">
    <h3 class="text-center">Hidden store</h3>
    <p class="text-center">Communication is at the heart of E-commerce and community</p>
  </div>

  <!-- fourth child-->
<div class="row px-1">
  <div class="col-md-10">
    <!-- product -->
     <div class="row px-3">
<?php

// callig function
search_product();
get_unique_categories();
get_unique_brands();

?>
  <!-- row end -->
    </div>
    <!-- col end -->
  </div>   
      
      
      <div class="col-md-2 bg-secondary p-0">
    <!-- sidenav -->
     <!-- brand to be displed -->
     <ul class="navbar-nav me-auto text-center">
      <li class="nav-item bg-info">
        <a href="#" class="nav-link text-light"><h4>Delevery brand</h4></a>
      </li>
      <?php

     getbrands();
      
      ?>

     </ul>
     <!-- categorie to be display-->

     <ul class="navbar-nav me-auto text-center">
      <li class="nav-item bg-info">
        <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
      </li>
  <?php
     getcategory();
    
      
      ?>

     </ul>
  </div>
</div>
<!-- last child -->
<div class="bg-info p-3 text-center">
    <p>this is my dairy drop project</p>
</div>

 </div>
<!-- bootstrap js li -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>