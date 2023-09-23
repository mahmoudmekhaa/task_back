<?php include 'inc/header.php'; ?>
<?php include 'inc/nav.php'; ?>

<h1>Home Page</h1>
<?php
        if (!isset($_SESSION['auth'])) {
            header('location: login.php');
            exit;
        }
    ?>

<?php include 'inc/footer.php'; ?>