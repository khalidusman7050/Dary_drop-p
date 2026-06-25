<h3 class="text-center text-success">All Products</h3>

<?php
$get_products = "SELECT * FROM `products`";
$result = mysqli_query($con, $get_products);
$row_count = mysqli_num_rows($result);

if($row_count == 0){
    // No products found
    echo "<h2 class='text-center text-danger mt-5'>No products found</h2>";
} else {
    // Products exist
?>
<table class="table table-bordered mt-5">
    <thead class="table-info text-center">
        <tr>
            <th>SI No</th>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Product Price</th>
            <th>Total Sold</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="table-secondary text-center text-light">
        <?php
        $number = 0;
        while($row = mysqli_fetch_assoc($result)){
            $number++;
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $status = $row['status'];

            // Count total sold
            $get_count = "SELECT * FROM `orders_pending` WHERE product_id=$product_id";
            $result_count = mysqli_query($con, $get_count);
            $rows_count = mysqli_num_rows($result_count);
        ?>
        <tr>
            <td><?php echo $number; ?></td>
            <td><?php echo $product_title; ?></td>
            <td><img src='./product_images/<?php echo $product_image1; ?>' class='product_img' /></td>
            <td><?php echo $product_price; ?>/-</td>
            <td><?php echo $rows_count; ?></td>
            <td><?php echo $status; ?></td>
            <td>
                <a href='index.php?edit_products=<?php echo $product_id; ?>' class='text-light'>
                    <i class='fa-solid fa-pen-to-square'></i>
                </a>
            </td>
            <td>
                <a href='index.php?delete_products=<?php echo $product_id; ?>' 
                   onclick="return confirm('Are you sure you want to delete this product?');" 
                   class='text-light'>
                   <i class='fa-solid fa-trash'></i>
                </a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<?php } ?>