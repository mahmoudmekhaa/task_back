<?php 

session_start();
$errors=[];
if(isset($_POST['submit'])&&$_SERVER['REQUEST_METHOD']=="POST"){
    //GET DATA
    $email=trim(htmlspecialchars($_POST['email']));
    $password=trim(htmlspecialchars($_POST['password']));






    
    //validation
    include "../../validation/validation.php";
     // email
     if(empty($email)){
        $errors[]= "Please Enter Your Email";
    }elseif(checkEmail($email)){
        $errors[]= "Email Not Valid";
    }




    // password
    if(empty($password)){
        $errors[]= "Please Enter Your Password";
    }elseif(!minLen($password,6)){
        $errors[]= "Password Must Be Greater Than 6 Characters";
    }elseif(!maxLen($password,20)){
        $errors[]= "Password Must Be Less Than 20 Characters";
    }



    //database
    include "../../database/database.php";
    $sql1="SELECT * FROM `users`";
    $result1=mysqli_query($conn,$sql1);
    foreach($result1 as $row){
        if($row['email']==$email){
            $errors[]="Email Is Existed";
            break;
        }
    }

    if(empty($errors)){
        $new_password=sha1($password);
        $sql="INSERT INTO `users` (`email`,`password`) value ('$email','$new_password')";
        $result=mysqli_query($conn,$sql);
        if($result){
            $_SESSION['success']=['Added Successfully'];
        }else{
            $_SESSION['errors']=['Not Added'];
        }
        header("Location:../../register.php");
    }else{
        $_SESSION['errors']=$errors;
        header("Location:../../register.php");
    }
}