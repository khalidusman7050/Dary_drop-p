<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome <?php echo $_SESSION['username'] ?></title>
    <!-- bootstrap css link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
     <!-- font awesome link -->
      <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw="crossorigin="anonymous" referrerpolicy="no-referrer" />      <style>
        body{
          overflow-x: hidden;
        }
        .profile_img{
        width: 90%;
        margin: auto;
        display: block;
        object-fit: contain;
        border-radius: 50%;
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
    <h3 class="text-center"><?php echo $_SESSION['username']; ?>  Dairy Drop</h3>
  </div>

  <!-- fourth child-->
   <div class="row">
    <div class="col-md-2 ">
      <ul class="navbar-nav bg-secondary text-center text-light" style="height:100vh">
        <li class="nav-item bg-info">
          <a class="nav-link" href="profile.php"><h4>Your Profile</h4></a>
        </li>
        <?php
        $username=$_SESSION['username'];
        $user_image = "SELECT * FROM `user_table` WHERE username ='$username'";
        $user_image =  mysqli_query($con,$user_image);
        $row_image = mysqli_fetch_array($user_image);
        $user_image = $row_image['user_image'];
        echo "<li class='nav-item'>
          <img src='./user_images/$user_image' alt='' class='profile_img'>"
        
        ?>


         
          <li class="nav-item">
            <a class="nav-link" href="profile.php">Pending orders</a>
        </li>
          <li class="nav-item ">
            <a class="nav-link" href="profile.php?edit_account">Edit account</a>
        </li>
          <li class="nav-item ">
            <a class="nav-link" href="profile.php?my_orders">My Orders</a>
        </li>
          <li class="nav-item ">
            <a class="nav-link" href="profile.php?delete_account">Delete Account</a>
        </li>
         <li class="nav-item ">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
    <div class="col-md-10 text-center">
      <?php
        get_user_order_details();
        if(isset($_GET['edit_account'])){
          include('edit_account.php');
        }
        if(isset($_GET['my_orders'])){
          include('my_orders.php');
        }
        if(isset($_GET['delete_account'])){
          include('delete_account.php');
        }

      ?>
    </div>
   </div>

<!--include footer.php-->
<?php 
include("../includes/footer.php");
?>

 </div>
<!-- bootstrap js li -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>