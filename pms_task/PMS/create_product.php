<?php include "layout/header.php"; ?>
<?php 

if(isset($_SESSION['user_id'])){
    $user_id=$_SESSION['user_id'];
    include "database/database.php";
    $sql="SELECT * FROM `categories` WHERE `user_id`='$user_id' ";
    $result=mysqli_query($conn,$sql);
}

?>
<div class="container pt-5">
    <div class="row">
        <div class="col-8 mx-auto">

            <a href="<?php echo URL ?>index_category.php" class="btn btn-primary mb-2">view categories</a>

            <?php include "layout/message.php"; ?>
            <form action="handelers/products/create.php" method="POST" class="border p-5" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="text" name="price" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select class="form-select" name="category_id" aria-label="Default select example">
                        <?php if(isset($result)): foreach($result as $value): ?>
                        <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                        <?php endforeach; endif; ?>
                    </select>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Add Category</button>
            </form>
        </div>
    </div>
</div>
<?php include "layout/footer.php" ?>