<?php

if(isset($_GET['edit_brand'])){
    $edit_brand = intval($_GET['edit_brand']);

    $get_brand ="SELECT * FROM `brands` WHERE brand_id = $edit_brand";
    $result = mysqli_query($con,$get_brand);

    if($result && mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $ebrand_title = $row['brand_title'];
    } else {
        echo "<script>alert('Brand not found')</script>";
        exit();
    }
}

if(isset($_POST['edit_brand'])){

    $edit_brand = intval($_GET['edit_brand']);
    $brand_title = $_POST['brand_title'];

    $update_query ="UPDATE `brands` 
                    SET brand_title='$brand_title' 
                    WHERE brand_id=$edit_brand";

    $result_brand = mysqli_query($con,$update_query);

    if($result_brand){
        echo "<script>alert('Brand updated successfully')</script>";
        echo "<script>window.open('./index.php?view_brands','_self')</script>";
    } else {
        echo mysqli_error($con);
    }
}
?>
<h3 class="text-center text-success mb-5">Edit Brand</h3>
<form action="" method="post" class="text-center mb-5">
    <div class="form-outline w-50 mb-4 m-auto">
        <label for="brand_title" class="form-label">Brand Title</label>
        <input type="text" class="form-control " name="brand_title" value="<?php echo $ebrand_title; ?>" aria-label="Username" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-3 m-auto">
        <input type="submit" class="bg-info border-0 p-2 my-1" name="edit_brand" value="Update Brand">
    </div>
</form>