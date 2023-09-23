<?php

// session_start();
// include '../core/function.php';
// include '../core/avlidation.php';

// $errors =[];

// if(checkRequestMethob("POST") && checkPostInput('name')){

//     foreach($_POST as $key => $value){
//         $$key = sanitizeInput($value);
//     }

//     if(!requiredVal($name)){
//         $errors[]="name is required";
//     }
//     elseif(!minVal($name , 3)){
//         $errors[]= "ethod";

//     }
//     elseif(!maxVal($name ,35)){
//         $errors[]="ethoaadadsd";

//     }

//     if(!requiredVal($email)){
//         $errors[]="email is required";
//     }
//     elseif(!minVal($name , 3)){
//         $errors[]= "asddsa";

//     }


//     // password =>required 

//     if(!requiredVal($password)){
//         $errors[]= "password is required";
//     }elseif(!minVal($password,6)){
//         $errors[]= "password must be greater than 6 chars ";
//     }elseif(!maxVal($password,25)){
//         $errors[]= "password must be smaller than 20 chars ";
//     }

//     if(empty($errors)){
//         $users_file = fopen("../data/users.csv","a+");
//         $data = [$name,$email,sha1($password)];
//         fputcsv($users_file,$data);
//         //redirect
//         $_SESSION['auth'] = [$name,$email];
//         redirect("../index.php");
//         die();
//     }else{
//         $_SESSION['errors'] = $errors;
//         redirect("../register.php");
//         die;
//     }
    



// }
// else{
//     $errors[]="not supported method";
// }