<?php
if(isset($_GET['delete_review'])){
    $review_id = intval($_GET['delete_review']);
    $delete_query = "DELETE FROM `product_reviews` WHERE review_id=$review_id";
    mysqli_query($con, $delete_query);

    echo "<script>alert('Review deleted successfully');</script>";
    echo "<script>window.location='index.php?all_reviews';</script>";
}
?>