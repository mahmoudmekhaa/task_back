<?php
    require_once "inc/header.php";
    require_once "core/helpers.php";

?>
<?php
    flashSession("success_register", "success" );
?>
<?php
    flashSession("request_error", "danger" );
?>
<?php
flashSession("not_found_data");
?>
<?php
flashSession("no_creditational");
?>

<div class="container w-25 border m-auto mt-2">
    <h1 class="text-primary  text-light text-center">Login Form</h1>
    <form action="controller/LoginController.php" method="POST" class="form-group">
        <div class="mb-3">
            <label for="exampleFromControlInput1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleFromControlInput1"
                placeholder="Enter E_mail">
            <?php
                getSession("login_errors", 'email','danger');
                ?>
        </div>
        <div class="mb-3">
            <label for="exampleFromControlInput1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleFromControlInput1"
                placeholder="Enter Password">
            <?php
                getSession("login_errors", 'password','danger');
                ?>
        </div>
        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Login">
            <a href="register.php" class="btn btn-secondary">Create Account</a>
        </div>
    </Form>
</div>
<?php
    require_once "inc/footer.php"
?>