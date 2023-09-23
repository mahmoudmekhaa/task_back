<?php
session_start();
include '../core/functions.php';
include '../core/validations.php';
$errors = [];

if(checkRequestMethod("POST") && checkPostInput('name')){

    foreach($_POST as $key => $value){
        $$key = sanitizeInput($value) ;
    }


    //validations
    // name => required , min:3 , max:25

    if(!requiredVal($name)){
        $errors[]= "name is required";
    }elseif(!minVal($name,3)){
        $errors[]= "name must be greater than 3 chars ";
    }elseif(!maxVal($name,25)){
        $errors[]= "name must be smaller than 25 chars ";
    }



    // email => required , email

    if(!requiredVal($email)){
        $errors[]= "email is required";
    }elseif(!emailVal($email)){
        $errors[]= "please type a valid email";
    }

    // password => required , min:6 , max:20

    if(!requiredVal($password)){
        $errors[]= "password is required";
    }elseif(!minVal($password,6)){
        $errors[]= "password must be greater than 6 chars ";
    }elseif(!maxVal($password,25)){
        $errors[]= "password must be smaller than 20 chars ";
    }




    if(empty($errors)){
        $users_file = fopen("../data/users.csv","a+");
        $data = [$name,$email,sha1($password)];
        fputcsv($users_file,$data);
        //redirect
        $_SESSION['auth'] = [$name,$email];
        redirect("../index.php");
        die();
    }else{
        $_SESSION['errors'] = $errors;
        redirect("../register.php");
        die;
    }

   // var_dump($errors);


}else{
    echo "not supported method";
}
?>