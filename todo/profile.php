<?php
    require_once "inc/header.php";
    require_once "core/helpers.php";
    isLoggedIn('auth','index.php');
    $tasks = readFromJsonFile("data/task.json");
    if($tasks != NULL){
        foreach ($tasks as $task){
            if($task['user_id'] == $_SESSION['auth']['id']){
                $myTasks[] = $task;
            }
        }
    }
?>
<?php 
flashSession("not_found");
?>
<div class="container mt-4">
    <div class="row col-12 d-flex">
        <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid">

                <div class="collapse navbar-collapse row justify-content-between" id="navbarSupportedContent">
                    <div class="col-4">
                        <h5 class="card-title text-light">hello! <?= $_SESSION['auth']['name'] ?> </h5>
                    </div>
                    <div class="col-4 text-end">
                        <a class="btn btn-outline-success" href="controller/LogoutController.php">Logout</a>
                    </div>



                </div>
            </div>
        </nav>


        <div class="col-12 p-5">
            <a href="create.php" class="btn btn-outline-primary text-light">Create New Task</a>
            <?php if(isset($myTasks)) : ?>
            <table class="table" id="table">
                <thead>
                    <tr class="text-end">
                        <th scope="col">#</th>
                        <th scope="col">Task</th>
                        <th scope="col ">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  foreach($myTasks as $task) : ?>
                    <tr class="text-end">
                        <th scope="row"><?= $task['id'] ?></th>
                        <td><?= $task['task'] ?></td>
                        <td>
                            <a href="edit.php?id=<?= $task['id']?>" class="btn btn-outline-warning">Edit</a>
                            <a href="controller/DeleteController.php?id=<?=$task['id']?>"
                                class="btn btn-outline-danger">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <tbody>
            </table>
            <?php else : ?>
            <h1>No Tasks</h1>
            <?php endif; ?>
        </div>
    </div>
    <?php
    require_once "inc/footer.php"
?>