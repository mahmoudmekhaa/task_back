<?php 

session_start();
require_once "../core/helpers.php";
// checkRequest-----------------------
if(checkRequest("POST")){
    $errors = [];
    $name = sanitize($_POST['name']);
    if (requiredValue($name)) {
        $errors['name'] = "Name Is Required";
    }elseif(minLength($name , 3)){
        $errors['name'] = "Name Must Be Greater Than 3 Characters";
    }elseif(maxLength($name,15)){
        $errors['name'] = "Name Must Be Smaller Than 15 Characters";
    }

if(empty($errors)){
    $tasks = readFromJsonFile("../data/task.json");
    if($tasks == NULL){
        $data = ['id' => 1 , 'task' => $name , 'user_id' => $_SESSION['auth']['id']];
        $tasks[] = $data;
        file_put_contents("../data/task.json", json_encode($tasks,JSON_PRETTY_PRINT));
        $_SESSION['success_create'] = "Task created successfully";
        redirectTo("../create.php");
        die;
    }else{
        $id = end($tasks)['id'] + 1;
        $data = ['id' => $id , 'task' => $name ,'user_id' => $_SESSION['auth']['id']];
        $tasks [] = $data;
        file_put_contents("../data/task.json",json_encode($tasks,JSON_PRETTY_PRINT));
        $_SESSION['success_create'] = "Task created successfully";
        redirectTo("../create.php");
        die;
    }
}else{
    $_SESSION['create_errors'] = $errors;
    redirectTo("../create.php");
    die;
}
}else{
    $_SESSION['request_error'] = "Invalid Request";
    redirectTo("../create.php");
    die();
}
?>