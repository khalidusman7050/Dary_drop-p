<!-- connect file -->
 <?php
session_start();

if(!isset($_SESSION['admin_email'])){
    header("Location: admin_login.php");
    exit();
}


 include('../includes/connect.php');
 include('../functions/common_function.php');
 ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashbord</title>
    <!-- boostrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    .Admin_image {
        width: 100px;
        object-fit: contain;
    }

    .footer {
       position: ;
        bottom: 0;
    }
    body{
        overflow-x:hidden ;
    }
    .product_img{
        width: 100px;
        object-fit: contain;
    }
    </style>
</head>

<body>
    <div class="container-fluid">

        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <h1>Dairy Drop</h1>

                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav d-flex align-items-center justify-content-center">
                        <li class="nav-item">
                            <a href="" class="nav-link">welcome Guest</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?admin_chat" class="nav-link">Messages</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
        <!-- second child -->

        <div class="bg-light">
            <h3 class="text-center p-2">Manage Date</h3>
        </div>
        <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-3">
                    <div class="p-3 text-center">
                <div class="p-3 text-center">

<?php
if(isset($_SESSION['admin_image']) && $_SESSION['admin_image'] != ""){
    ?>
    <img src="./product_images/<?php echo $_SESSION['admin_image']; ?>"
         alt="Admin Image"
         class="Admin_image rounded-circle">
    <?php
}else{
    ?>
    <img src="./product_images/default.png"
         alt="Default Image"
         class="Admin_image rounded-circle">
    <?php
}
?>

<p class="text-light mt-2">
    <?php echo $_SESSION['admin_name']; ?>
</p>

</div>
                </div>
                </div>
                <!--button*10>a.nav-link.text-light.bg-info.my-1 -->
                <div class="button text-center">
                    <button>
                        <a href="insert_product.php" class="nav-link text-light bg-info my-1">Insert products</a>
                    </button>
                    <button><a href="index.php?view_products" class="nav-link text-light bg-info my-1">view products</a>
                    </button>
                    <button>
                        <a href="index.php?insert_category" class="nav-link text-light bg-info my-1 ">Insert
                            Categories</a>
                    </button>
                    <button>
                        <a href="index.php?view_categories" class="nav-link text-light bg-info my-1 ">view Categories</a>
                    </button>
                    <button>
                        <a href="index.php?insert_brand" class="nav-link text-light bg-info my-1">Instert Brand</a>
                    </button>
                    <button>
                        <a href="index.php?view_brands" class="nav-link text-light bg-info my-1">view Brand</a>
                    </button>
                    <button>
                        <a href="index.php?all_orders" class="nav-link text-light bg-info my-1">All orders</a>
                    </button>
                    <button>
                        <a href="index.php?all_payments" class="nav-link text-light bg-info my-1">All paymets</a>
                    </button>
                    <button></button>
                    <button>
                        <a href="index.php?all_reviews" class="nav-link text-light bg-info my-1">All Reviews</a>
                    </button>
                    <button>
                        <a href="index.php?list_users" class="nav-link text-light bg-info my-1">List user</a>
                    </button>

                    <button>
                        <a href="admin_logout.php" class="nav-link text-light bg-info my-1">Logout</a>
                    </button>
                </div>
            </div>
        </div>
        <!--fourth child-->
        <div class="container m-5">
            <?php
            if(isset($_GET['insert_category'])){
                include('insert_categories.php');
            }
            if(isset($_GET['insert_brand'])){
                include('insert_brands.php');
            }
            if(isset($_GET['view_products'])){
                include('view_products.php');
            }
            if(isset($_GET['edit_products'])){
                include('edit_products.php');
            }
            if(isset($_GET['delete_products'])){
                include('delete_products.php');
            }
            if(isset($_GET['view_categories'])){
                include('view_categories.php');
            }
            if(isset($_GET['view_brands'])){
                include('view_brands.php');
            }
            if(isset($_GET['edit_category'])){
                include('edit_category.php');
                }
             if(isset($_GET['delete_category'])){
                include('delete_category.php');
            }
            if(isset($_GET['edit_brand'])){
                include('edit_brand.php');
            }
             if(isset($_GET['delete_brand'])){
                include('delete_brand.php');
            }
            if(isset($_GET['all_orders'])){
                include('all_orders.php');
            }
            if(isset($_GET['order_delete'])){
                include('order_delete.php');
            }
            if(isset($_GET['all_payments'])){
                include('all_payments.php');
            }
            if(isset($_GET['payment_delete'])){
                include('payment_delete.php');
            }
            if(isset($_GET['list_users'])){
                include('list_users.php');
            }
            if(isset($_GET['user_delete'])){
                include('user_delete.php');
            }
           
            if(isset($_GET['all_reviews'])){
                include('all_reviews.php');
            }
            if(isset($_GET['delete_review'])){
                include('delete_review.php');
            }
                if(isset($_GET['admin_chat'])){
                    include('admin_chat.php');
                }
                if(isset($_GET['delete_message'])){
                    include('delete_message.php');
                }
                if(isset($_GET['logout'])){
                    include('admin_logout.php');
                }

            ?>
        </div>

        <!-- last child -->
         <div>

         </div>
        <div class="bg-info p-3 text-center footer">
            <p>All right reserved 0- Designed by khanam-2025</p>
        </div>
    </div>

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>