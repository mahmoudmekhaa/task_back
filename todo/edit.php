<?php
    require_once "inc/header.php";
    require_once "core/helpers.php";
    isLoggedIn('auth','index.php');
    if(isset($_GET['id'])){
        $tasks = readFromJsonFile("data/task.json");
        if($tasks !=NULL){
            foreach($tasks as $task){
                if($task['id'] == $_GET['id'] && $task['user_id'] == $_SESSION['auth']['id']){
                    $data = $task;
                    break;
                }
            }
            if(!isset($data)){
                $_SESSION['not_found'] = "Task not found";
                redirectTo("profile.php");
                die;
            }
        }
    }else{
        $_SESSION['not_found'] = "Task not found";
        redirectTo("profile.php");
        die;
    }

?>

<div class="container ">
    <div class="row justify-content-center">
        <form action="controller/UpdateController.php" method="POST" class="form-group w-25">
            <label for="inputPassword5" class="form-label text-light fs-1">edit</label>
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
            <input type="text" name="name" value="<?= $data['task'] ?>" id="inputPassword5" class="form-control">
            <input type="submit" value="update" class="btn btn-outline-success mt-2">
            <a href="profile.php" class="btn btn-outline-primary mt-2">Profile</a>
        </Form>
    </div>
</div>
<?php
    require_once "inc/footer.php"
?>