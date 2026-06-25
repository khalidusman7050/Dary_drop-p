<h3 class="text-center text-success">All  User</h3>

<?php
$get_user = "SELECT * FROM `user_table`";
$result_user = mysqli_query($con, $get_user);
$row_count = mysqli_num_rows($result_user);

if($row_count == 0){
    // No payments
    echo "<h2 class='text-center text-danger mt-5'>No User yet</h2>";
} else {
    // There are users, show table
?>
    <table class="table table-bordered mt-5 m-auto">
        <thead class="table-info text-light">
            <tr class="text-center">
                <th>SI No</th>
                <th>User Name</th>
                <th>Email</th>
                <th>user image</th>
                <th>user Address</th>
                <th>mobile</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="table-secondary text-light">
            <?php
            $number = 0;
            while($row_data = mysqli_fetch_assoc($result_user)){
                $number++;
                $user_id  = $row_data['user_id'];           // Used for delete
                $username = $row_data['username'];
                $email = $row_data['user_email'];
                $user_image = $row_data['user_image'];
                $address = $row_data['user_address'];
                $user_mobile = $row_data['user_mobile'];
            ?>
            <tr class="text-center">
                <td><?php echo $number; ?></td>
                <td><?php echo $username; ?></td>
                <td><?php echo $email; ?></td>
                <td>
                    <?php
$image_path = "../user_area/user_images/".$user_image;

if(file_exists($image_path)){
    echo "<img src='$image_path' width='80'>";
} else {
    echo "Image not found!";
}
?>

                </td>
                <td><?php echo $address; ?></td>
                <td><?php echo $user_mobile; ?></td>
                <td>
                    <a href="index.php?user_delete=<?php echo $user_id; ?>" 
                       class=" text-light" data-toggle="modal" data-target="#exampleModal">
                       <i class="fa-solid fa-trash"></i>
                    </a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } ?>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Are you sure you want to delete this user?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?list_users" class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"><a  href='index.php?user_delete=<?php echo $user_id; ?>' class=" text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>
