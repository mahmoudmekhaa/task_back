<?php 

session_start();
$errors=[];

if(isset($_POST['submit'])&& $_SERVER['REQUEST_METHOD']=="POST"){
    // get data
    $name=trim(htmlspecialchars($_POST['name']));
    






    
     //validation
     include "../../validation/validation.php";






         // name
    if(empty($name)){
        $errors[]= "Please Enter Name";
    }elseif(!minLen($name,3)){
        $errors[]= "Name Must Be Greater Than 3 Characters";
    }elseif(!maxLen($name,20)){
        $errors[]= "Name Must Be Less Than 20 Characters";
    }




    //database

    if(isset($_SESSION['user_id'])){
        $user_id=$_SESSION['user_id'];
    }
    include "../../database/database.php";
    $sql2="SELECT `name` FROM `categories` WHERE `user_id`='$user_id' AND `name`='$name'";
    $result=mysqli_query($conn,$sql2);
    $row=mysqli_fetch_assoc($result);
    if($row!=null){
        $errors[]="Name Is Already Exist";
    }
    if(empty($errors)){
        if(isset($_SESSION['user_id'])){
            $user_id=$_SESSION['user_id'];
                $sql="INSERT INTO `categories` (`name`,`user_id`) VALUE('$name','$user_id')";
            if(mysqli_query($conn,$sql)){
                $_SESSION['success']=['Category Added Successfully'];
            }else{
                $_SESSION['errors']=['Category Did Not add Successfully'];
            }
        }
            
           header("Location:../../create-category.php");
    }else{
        $_SESSION['errors']=$errors;
        header("Location:../../create-category.php");
    }
}