<?php
if(!isset($_GET['product_id'])){
    return;
}

$product_id = intval($_GET['product_id']);

// Get user id if logged in
if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    $get_user = "SELECT * FROM `user_table` WHERE username='$username'";
    $result_user = mysqli_query($con, $get_user);
    $row_user = mysqli_fetch_assoc($result_user);
    $user_id = $row_user['user_id'];
}

// Insert Review
if(isset($_POST['submit_review']) && isset($user_id)){
    $review_text = mysqli_real_escape_string($con, $_POST['review_text']);
    $rating = intval($_POST['rating']);

    $insert_review = "INSERT INTO `product_reviews` 
                      (product_id, user_id, review_text, rating) 
                      VALUES ($product_id, $user_id, '$review_text', $rating)";
    mysqli_query($con, $insert_review);

    echo "<script>alert('Review added successfully');</script>";
}
?>

<div class="container mt-5">
    <h3 class="text-center text-info">Customer Reviews</h3>

    <?php
    $get_reviews = "SELECT r.*, u.username 
                    FROM `product_reviews` r
                    JOIN `user_table` u ON r.user_id=u.user_id
                    WHERE r.product_id=$product_id
                    ORDER BY r.review_date DESC";
    $result_reviews = mysqli_query($con, $get_reviews);

    if(mysqli_num_rows($result_reviews) == 0){
        echo "<p class='text-center text-danger'>No reviews yet.</p>";
    } else {
        while($row = mysqli_fetch_assoc($result_reviews)){
            echo "<div class='card mb-2 w-75 m-auto'>
                    <div class='card-body'>
                        <h5>{$row['username']} - {$row['rating']} ⭐</h5>
                        <p>{$row['review_text']}</p>
                        <small>{$row['review_date']}</small>
                    </div>
                  </div>";
        }
    }
    ?>

    <?php if(isset($user_id)){ ?>
    <form method="post" class="w-50 m-auto mt-4">
        <textarea name="review_text" class="form-control mb-2" placeholder="Write your review" required></textarea>
        <select name="rating" class="form-select mb-2" required>
            <option value="">Select Rating</option>
            <option value="1">1 ⭐</option>
            <option value="2">2 ⭐⭐</option>
            <option value="3">3 ⭐⭐⭐</option>
            <option value="4">4 ⭐⭐⭐⭐</option>
            <option value="5">5 ⭐⭐⭐⭐⭐</option>
        </select>
        <input type="submit" name="submit_review" class="btn btn-primary" value="Submit Review">
    </form>
    <?php } else {
        echo "<p class='text-center text-warning'>Login to leave a review.</p>";
    } ?>
</div>