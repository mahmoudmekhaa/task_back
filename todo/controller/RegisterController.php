<?php 

session_start();
require_once "../core/helpers.php";

if(checkRequest("POST")){
    $errors = [];
    foreach ($_POST as $key => $val) {
        $$key = sanitize($val);
    }
    if (requiredValue($name)) {
        $errors['name'] = "Name Is Required";
    }elseif(minLength($name , 3)){
        $errors['name'] = "Name Must Be Greater Than 3 Characters";
    }elseif(maxLength($name,15)){
        $errors['name'] = "Name Must Be Smaller Than 15 Characters";
    }

    if (requiredValue($email)) {
        $errors['email'] = "E_mail Is Required";
    }elseif(isValidEmail($email)){
        $errors['email'] = "E_mail Is InValid";
    }

    $users = readFromJsonFile("../data/users.json");
    if($users != NULL){
        foreach($users as $user){
            if($user['email'] == $$email){
            $errors['email'] = "E_mail Is Already Exists";
            }
        }
    }

    if (requiredValue($password)) {
        $errors['password'] = "Password Is Required";
    }elseif(minLength($password , 8)){
        $errors['password'] = "password Must Be Greater Than 8 Characters";
    }elseif(maxLength($password,20)){
        $errors['password'] = "password Must Be Smaller Than 20 Characters";
    }


    if(empty($errors)) {
        $users = readFromJsonFile("../data/users.json");
        if($users == NULL){
            $data = ['id' => 1 , 'name' => $name , 'email' => $email , 'password' => password_hash($password,PASSWORD_DEFAULT)];
            $users [] = $data;
            file_put_contents("../data/users.json",json_encode($users,JSON_PRETTY_PRINT));
            $_SESSION['success_register'] = "Please Login";
            redirectTo("../index.php");
            die();
        }else{
            $id = end($users)['id'] + 1;
            $data = ['id' => $id , 'name' => $name , 'email' => $email , 'password' => password_hash($password,PASSWORD_DEFAULT)];
            $users [] = $data;
            file_put_contents("../data/users.json",json_encode($users,JSON_PRETTY_PRINT));
            $_SESSION['success_register'] = "Please Login";
            redirectTo("../index.php");
            die;
        }
    }else{
        $_SESSION['register_errors'] = $errors;
        redirectTo("../register.php");
        die;
    }
}else{
    $_SESSION['request_error'] = "Invalid Request";
    redirectTo("../register.php");
    die();
}