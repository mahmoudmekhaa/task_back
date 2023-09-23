<?php include 'inc/header.php'; ?>
<?php include 'inc/nav.php'; ?>

<?php
        if (isset($_SESSION['auth'])) {
            header('location: index.php');
            die;
        }
    ?>

<div class="container">
    <div class="row">
        <div class="col-8 mx-auto my-5">
            <h2 class="border p-2 my-2 text-center">Login</h2>


            <?php
                    if (isset($_SESSION['errors'])) :
                    foreach ($_SESSION['errors'] as $error) :
                ?>
            <div class="alert alert-danger text-center">
                <?= $error ?>
            </div>
            <?php
                    endforeach;
                    endif;
                    unset($_SESSION['errors']);
                ?>

            <form action="handelers\handleRegister.php" method="POST" class="border p-3">
                <div class="form-group p-2 my-1">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email">
                </div>
                <div class="form-group p-2 my-1">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <div class="form-group p-2 my-1">
                    <input type="submit" value="Login" class="form-control">
                </div>

            </form>

        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>