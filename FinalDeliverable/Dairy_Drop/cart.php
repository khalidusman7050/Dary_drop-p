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
    <title>Dairy drop-cart detail</title>
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
        .table{
          table-layout: fixed;
        }
        .table td{
          width: 20%;
        }
        @media (max-width: 576px) {
          .table td {
              width: 100%;
              display: block;
          }
          .footer {
              text-align: center;

          }
          .banner-container {
    position: relative;
    width: 100%;
    height: 500px; /* adjust as needed */
    overflow: hidden;
    margin-bottom: 40px;
}

/* Banner image */
.banner-container .banner-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.5s ease; /* smooth zoom effect */
}

/* Hover zoom effect (optional) */
.banner-container:hover .banner-image {
    transform: scale(1.05);
}

/* Text overlay */
.banner-container .banner-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    text-align: center;
    background: rgba(0,0,0,0.3); /* semi-transparent */
    padding: 20px 40px;
    border-radius: 10px;
}

/* Heading */
.banner-container .banner-text h1 {
    font-size: 3rem;
    font-weight: bold;
    margin-bottom: 15px;
    text-shadow: 2px 2px 5px rgba(0,0,0,0.7);
}

/* Paragraph */
.banner-container .banner-text p {
    font-size: 1.2rem;
    margin-bottom: 20px;
    text-shadow: 1px 1px 3px rgba(0,0,0,0.7);
}

/* Button */
.banner-container .banner-text .btn {
    font-size: 1.2rem;
    padding: 10px 25px;
    border-radius: 30px;
    text-transform: uppercase;
}
/* Navbar links hover */
.navbar-nav .nav-link {
    transition: all 0.2s ease;
}

.navbar-nav .nav-link:hover {
    color: yellow !important;
    transform: scale(1.1);
}
/* Product card hover */
.card {
    transition: all 0.4s ease;
}

.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.3);
}
/* Sidebar links hover */
.col-md-2 .nav-link {
    transition: all 0.3s ease;
}

.col-md-2 .nav-link:hover {
    background-color: #0dcaf0;
    color: white !important;
    padding-left: 15px;
}
.btn-primary {
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background-color: darkblue;
    transform: scale(1.05);
}
    }
    @media (max-width: 768px) {
        .banner-container {
    position: relative;
    width: 100%;
    height: 400px; /* adjust as needed */
    overflow: hidden;
    margin-bottom: 30px;
}
/* Banner image */
.banner-container .banner-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.5s ease; /* smooth zoom effect */
}
/* Hover zoom effect (optional) */
.banner-container:hover .banner-image {
    transform: scale(1.05);
}
/* Text overlay */
.banner-container .banner-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    text-align: center;
    background: rgba(0,0,0,0.3); /* semi-transparent */
    padding: 15px 30px;
    border-radius: 10px;
}
/* Heading */
.banner-container .banner-text h1 {
    font-size: 2.5rem;
    font-weight: bold;
    margin-bottom: 10px;
    text-shadow: 2px 2px 5px rgba(0,0,0,0.7);
}
/* Paragraph */
.banner-container .banner-text p {
    font-size: 1rem;
    margin-bottom: 15px;
    text-shadow: 1px 1px 3px rgba(0,0,0,0.7);
}
/* Button */
.banner-container .banner-text .btn {
    font-size: 1rem;
    padding: 8px 20px;
    border-radius: 30px;
    text-transform: uppercase;
}

      </style>
</head>
<body>
<!-- navBar --> 
 <div class="container-fluid p-0 h-100">
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
          <a class="nav-link" href="../user_area/user_registration.php">Register</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="cart.php">Total price: <?php
          total_cart_price();
          ?>/- </a>
        </li>
        
      </ul>
     
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
            <a class='nav-link' href='../user_area/user_login.php'>Login</a>
        </li>";
     }else{
      echo " </li>
        <li class='nav-item'>
            <a class='nav-link' href='../user_area/logout.php'>Logout</a>
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
    <h3 class="text-center">All products in your cart</h3>
</div>
<!-- fourth child -->
 <div class="container">
    <div class="row">
        <form action="" method="post">
        <table class="table table-bordered text-center"> 

            <!-- php code to display dynamic data -->
             <?php
      $get_ip_add = getIPAddress();
      $total_price = 0;
      $cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
      $result=mysqli_query($con,$cart_query);
      $result_count=mysqli_num_rows($result);
      if ($result_count>0) {
        echo "  <thead>
                <tr>
                    <th>product Title</th>
                    <th>product image</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Remove</th>
                    <th colspan='2'>Operations</th>
                </tr>
           </thead> 
           <tbody>";

      while ($row=mysqli_fetch_array($result)) {
        $product_id=$row['product_id'];
        $select_products="Select * FROM `products` where product_id ='$product_id'";
        $result_products=mysqli_query($con,$select_products);

         while($row_product_price=mysqli_fetch_array($result_products)){
          $price_table = $row_product_price['product_price'];
$product_title = $row_product_price['product_title'];
$product_image1 = $row_product_price['product_image1'];

$quantity = $row['quantity'];  //get quantity from cart table
$subtotal = $price_table * $quantity;

$total_price += $subtotal;

        
             ?>
            <tr>
                <td><?php echo $product_title ?></td>
                <td>
    <img src="./admin_area/product_images/<?php echo $product_image1; ?>" 
         alt="<?php echo $product_title; ?>" 
         class="cart_img">
                </td>

                <td><input type="text" name="qty[<?php echo $product_id; ?>]" class="form-input w-50">
                </td>
                    <?php
                    $get_ip_add = getIPAddress();
                    if(isset($_POST['update_cart'])){
        $get_ip_add = getIPAddress();

        foreach($_POST['qty'] as $product_id => $quantity){
        $quantity = (int)$quantity;

        $update_cart = "UPDATE `cart_details`
        SET quantity='$quantity'
        WHERE ip_address='$get_ip_add'
        AND product_id='$product_id'";

        mysqli_query($con, $update_cart);
    }

    echo "<script>window.open('cart.php','_self')</script>";
}


                    ?>
                <td><?php echo $subtotal; ?>/-</td>
                <td><input type="checkbox"name="removeitem[]" value="<?php
                echo $product_id;
                ?>"></td>
                <td >
                    <input type="submit" value="update Cart"class="bg-secondary px-3 py-2 border-0 text-light mx-2 mb-2" name="update_cart">
                    <input type="submit" value="Remove Cart"class="bg-danger px-3 py-2 border-0 text-light" name="remove_cart">
                </td>
            </tr>
            <?php
         }
            }
            }
            
            else{
              echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
            }
              ?>
           </tbody>
        </table>
        <!-- subtotal -->
         <div class="d-flex mb-5">
          <?php
          $get_ip_add = getIPAddress();
          $cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
          $result=mysqli_query($con,$cart_query);
          $result_count=mysqli_num_rows($result);
          if ($result_count>0) {
            echo "
            <h4 class='px-3'>Subtotal: <strong class='text-info'>{$total_price}/-</strong></h4>
           <input type='submit'  value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>
            <button class='bg-secondary px-3 py-2 border-0 text-light'><a href='./user_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>";
          }else{
            echo "<input type='submit'  value='Continue Shopping'class='bg-info px-3 py-2 border-0 ' name='continue_shopping'>";
          }
          
          if(isset($_POST['continue_shopping'])){
            echo "<script>window.open('index.php','_self')</script>";
          }
          ?>
         </div>
    </div>
 </div>
 </form>
 <!-- function to remove items -->
   <?php
    function remove_cart_item(){
        global $con;
            $get_ip_add = getIPAddress();
            if(isset($_POST['remove_cart'])){
                foreach($_POST['removeitem'] as $remove_id){
                    echo $remove_id;
                    $delete_query ="DELETE FROM `cart_details`
                    WHERE product_id = $remove_id
                    AND ip_address='$get_ip_add'";
    
                    $run_deete = mysqli_query($con, $delete_query);
                    if($run_deete){
                        echo "<script>window.open('cart.php','_self')</script>";
                }
            }
        
            }
        }
    echo $remove_item = remove_cart_item();
   ?>


<!--last child-->
<!--include footer -->
<div class="footer">
<?php
include('./includes/footer.php');
?>
</div>

 </div>
<!-- bootstrap js li -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
