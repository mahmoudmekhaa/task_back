<?php 

session_start();
require_once "../core/helpers.php";

if(checkRequest("POST")){
    $errors = [];
    foreach($_POST as $key => $val){
        $$key = sanitize($val);
    }
    if (requiredValue($email)) {
        $errors['email'] = "E_mail Is Required";
    }elseif(isValidEmail($email)){
        $errors['email'] = "E_mail Is InValid";
    }

    if(requiredValue($password)){
        $errors['password'] = "password Is Required";
    }

    if(empty($errors)){
        $users = readFromJsonFile("../data/users.json");
        if($users==NULL){
            $_SESSION['not_found_data'] = "no Data in my json file";
            redirectTo("../index.php");
            die;
        }else{
            foreach($users as $user){
                if ($user['email'] == $email && password_verify($password , $user['password'])){
                    $_SESSION['auth'] = $user;
                    redirectTo("../profile.php");
                    die;
                }
            }
            $_SESSION['no_creditational'] = "Invalid email or password";
            redirectTo("../index.php");
            die;
        }
    }else{
        $_SESSION['login_errors'] = $errors;
        redirectTo("../index.php");
        die;
    }
}else{
    $_SESSION['request_error'] = "Invalid Request";
    redirectTo("../index.php");
    die();
}
?>