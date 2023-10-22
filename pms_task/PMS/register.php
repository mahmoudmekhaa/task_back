<?php 
?>
<?php include "layout/header.php"; ?>
<div class="container pt-5">
    <div class="row">
        <div class="col-8 mx-auto">
            <?php include "layout/message.php"; ?>
            <form action="handelers/auth/register.php" method="POST" class="border p-4">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<?php include "layout/footer.php" ?>