<?php
include('../includes/connect.php');

// Delete review
if(isset($_GET['delete_review'])){
    $review_id = intval($_GET['delete_review']);
    $delete_query = "DELETE FROM `product_reviews` WHERE review_id=$review_id";
    mysqli_query($con, $delete_query);

    echo "<script>alert('Review deleted successfully');</script>";
    echo "<script>window.location='index.php?all_reviews';</script>";
}
?>

<h3 class="text-center text-success">All Reviews</h3>

<?php
$get_reviews = "SELECT r.*, p.product_title, u.username
                FROM `product_reviews` r
                JOIN `products` p ON r.product_id=p.product_id
                JOIN `user_table` u ON r.user_id=u.user_id
                ORDER BY r.review_date DESC";

$result = mysqli_query($con, $get_reviews);

if(mysqli_num_rows($result) == 0){
    echo "<h4 class='text-center text-danger mt-5'>No Reviews Found</h4>";
} else {
?>

<table class="table table-bordered mt-4">
    <thead class="table-info text-center">
        <tr>
            <th>SI No</th>
            <th>Product</th>
            <th>User</th>
            <th>Rating</th>
            <th>Review</th>
            <th>Date</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="text-center">
        <?php
        $number = 0;
        while($row = mysqli_fetch_assoc($result)){
            $number++;
        ?>
        <tr>
            <td><?php echo $number; ?></td>
            <td><?php echo $row['product_title']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['rating']; ?> ⭐</td>
            <td><?php echo $row['review_text']; ?></td>
            <td><?php echo $row['review_date']; ?></td>
            <td>
                <a href="index.php?delete_review=<?php echo $row['review_id']; ?>"
                   onclick="return confirm('Delete this review?')"
                   class="text-danger">
                   <i class="fa-solid fa-trash"></i>
                </a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<?php } ?>