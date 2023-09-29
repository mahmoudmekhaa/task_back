<?php
    require_once "inc/header.php";
    require_once "core/helpers.php";
    isLoggedIn('auth','index.php');
?>
<?php
    flashSession("request_error", "danger" );
?>
<?php
    flashSession("success_create", "success" );
?>
<div class="container  ">
    <div class="row justify-content-center">
        <form action="controller/CreateController.php" method="POST" class="form-group w-25">
            <label for="inputPassword5" class="form-label text-light fs-1">create task</label>
            <input type="text" name="name" id="inputPassword5" class="form-control"
                aria-describedby="passwordHelpBlock">
            <?php
                getSession("create_errors", 'name','danger');
            ?>
            <input type="submit" value="save" class="btn btn-outline-success mt-2">
            <a href="profile.php" class="btn btn-outline-primary mt-2">Profile</a>
        </form>
    </div>
</div>
<?php
    require_once "inc/footer.php"
?>