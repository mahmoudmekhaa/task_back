<?php 

session_start();
$errors=[];
if(isset($_POST['submit'])&&$_SERVER['REQUEST_METHOD']=="POST"){
    $email=trim(htmlspecialchars($_POST['email']));
    $password=trim(htmlspecialchars($_POST['password']));
    include "../../validation/validation.php";

    if(empty($email)){
        $errors[]= "Please Enter Your Email";
    }elseif(checkEmail($email)){
        $errors[]= "Email Not Valid";
    }

    if(empty($password)){
        $errors[]= "Please Enter Your Password";
    }elseif(!minLen($password,6)){
        $errors[]= "Password Must Be Greater Than 6 Characters";
    }elseif(!maxLen($password,20)){
        $errors[]= "Password Must Be Less Than 20 Characters";
    }

    include "../../database/database.php";
    $sql1="SELECT * FROM `users` WHERE `email`='$email'";
    $result=mysqli_query($conn,$sql1);
    $row=mysqli_fetch_assoc($result);
    if($row==null){
            $errors[]="Email Is Not Exist";
        }
    
        
    if(empty($errors)){
        $_SESSION['success']=['Successfully Login'];
        $_SESSION['login']=true;
        $_SESSION['user_id']=$row['id'];
        header("Location:../../login.php");
    }else{
        $_SESSION['errors']=$errors;
        header("Location:../../login.php");
    }

}