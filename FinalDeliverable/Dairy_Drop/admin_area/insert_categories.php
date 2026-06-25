<h3>insert categories</h3>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <input type="text" name="category_title" class="form-control" placeholder="insert categories" aria-label="Categories" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button type="submit" name="insert_cat" class="btn bg-info">Insert</button>
        </div>
    </div>
</form>
<?php
if(isset($_POST['insert_cat'])){
    $category_title=$_POST['category_title'];
    $insert_cat="insert into `category` (category_title) values ('$category_title')";
    $result=mysqli_query($con,$insert_cat);
    if($result){
        echo "<script>alert('Category has been inserted successfully')</script>";
        echo "<script>window.open('./index.php?view_categories','_self')</script>";
    }
}
?>