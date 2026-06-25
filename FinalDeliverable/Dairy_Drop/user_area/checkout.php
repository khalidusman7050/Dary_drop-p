<?php
include('../includes/connect.php');
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dairy drop website-Checkout page</title>
    <!-- bootstrap css link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
     <!-- font awesome link -->
      <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw="crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="style.css">
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
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">product</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="user_registration.php">Register</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li> 
      </ul>
      <form class="d-flex" action="search_product.php" method="get">
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
        if(isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>welcome ".$_SESSION['username']."</a>
          </li>";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>welcome Guest</a>
          </li>";
        }


      if(!isset($_SESSION['username'])){
        echo "<li class='nav-item'>
        <a class='nav-link' href='user_login.php'>Login</a>
        </li>";
      }else{
        echo "<li class='nav-item'>
        <a class='nav-link' href='logout.php'>Logout</a>
        </li>";
      }
      
      ?>
        
  </ul>
 </nav>


 <!-- third child -->
  <div class="bg-light poster">
    <h3 class="text-center">Hidden store</h3>
    <p class="text-center">Communication is at the heart of E-commerce and community</p>
  </div>

  <!-- fourth child-->
<div class="row px-1">
  <div class="col-md-12">
    <!-- product -->
     <div class="row">
      <?php
      if(!isset($_SESSION['username'])){
        echo "<script>window.open('user_login.php','_self')</script>";
      }else{
       echo "<script>window.open('payment.php','_self')</script>";
       
      }
      ?>
  <!-- row end -->
    </div>
    <!-- col end -->
  </div>   
      
      
      <!--<div class="col-md-2 bg-secondary p-0">
  </div>-->
</div>
<!-- last child -->
<!--include footer.php-->
<?php 
include("../includes/footer.php");
?>

 </div>
<!-- bootstrap js li -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>