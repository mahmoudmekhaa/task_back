<?php if(isset($_SESSION['errors'])): foreach($_SESSION['errors'] as $error): ?>
<div class="alert alert-danger" role="alert">
    <?php echo $error; ?>
</div>
<?php endforeach; unset($_SESSION['errors']); endif; ?>
<?php if(isset($_SESSION['success'])): foreach($_SESSION['success'] as $success): ?>
<div class="alert alert-success" role="alert">
    <?php echo $success; ?>
</div>
<?php endforeach; unset($_SESSION['success']); endif; ?>