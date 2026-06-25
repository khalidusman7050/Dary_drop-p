<?php
session_start();
include('../includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>payment page</title>
    <!-- bootstrap css link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<style>
  .payment_img{
    width: 90%;
    margin: auto;
    display: block;
    
  }

</style>
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
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">product</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="profile.php">my account</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../cart.php"><i class ="fa-solid fa-cart-shopping"></i> <sup>
            <?php
          cart_item(); 
          ?>
          </sup></a>
        </li> 

        <li class="nav-item">
          <a class="nav-link" href="">Total price: <?php
          total_cart_price();
          ?>/- </a>
        </li>
        
      </ul>
      <form class="d-flex" action="../search_product.php" method="get">
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
            <a class='nav-link' href='user_login.php'>Login</a>
        </li>";
     }else{
      echo " </li>
        <li class='nav-item'>
            <a class='nav-link' href='logout.php'>Logout</a>
        </li>";
     }
     
     ?>
  </ul>
 </nav>

 <!-- third child -->
  <div class="bg-light poster">
    <h3 class="text-center">Dairy Drop</h3>
    <p class="text-center">Communication is at the heart of E-commerce and community</p>
  </div>


  <!-- php code to access user id -->
  <?php
  $user_ip=getIPAddress();
  $get_user="SELECT * FROM `user_table` WHERE user_ip='$user_ip'";
  $result=mysqli_query($con,$get_user);
  $run_query=mysqli_fetch_array($result);
   $user_id=$run_query['user_id'];
  ?>
  <div class="container">
    <h2 class="text-center text-info">Payment options</h2>
    <div class="row d-flex justify-content-center align-items-center my-5">
      <div class="col-md-6">
      <a href="https://www.paypal.com" target="_blank">
        <img src="../admin_area/product_images/paypal.jpg" class = "payment_img" alt="paypal">
      </a>
      </div>
     <div class="col-md-6">
  <a href="order.php?user_id=<?php echo $user_id ?>">
    <h2 class="text-center">Pay Offline</h2>
  </a>
</div>
    </div>
  </div>
  <div>
     <?php
    include("../includes/footer.php");
    ?>
  </div>
   

</body>
</html>