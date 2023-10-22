<?php 
?>
<?php include "layout/header.php"; ?>
<div class="container pt-5">
    <div class="row">
        <div class="col-8 mx-auto">

            <a href="<?php echo URL ?>index_category.php" class="btn btn-primary mb-2">view categories</a>
            <?php include "layout/message.php"; ?>

            <form action="handelers/categories/create.php" method="POST" class="border p-4">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Add Category</button>
            </form>
        </div>
    </div>
</div>
<?php include "layout/footer.php" ?>