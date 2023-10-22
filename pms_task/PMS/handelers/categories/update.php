<?php 

session_start();
$errors=[];

if(isset($_POST['submit'])&& $_SERVER['REQUEST_METHOD']=="POST"){
    $name=trim(htmlspecialchars($_POST['name']));
     include "../../validation/validation.php";
    if(empty($name)){
        $errors[]= "Please Enter Name";
    }elseif(!minLen($name,3)){
        $errors[]= "Name Must Be Greater Than 3 Characters";
    }elseif(!maxLen($name,20)){
        $errors[]= "Name Must Be Less Than 20 Characters";
    }




    if(isset($_SESSION['user_id'])&&isset($_GET['id'])){
        $user_id=$_SESSION['user_id'];
        $id=$_GET['id'];
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
                $sql="UPDATE `categories` SET `name`= '$name' WHERE `id`='$id'";
            if(mysqli_query($conn,$sql)){
                $_SESSION['success']=['Category Updated Successfully'];
            }else{
                $_SESSION['errors']=['Category Did Not Update Successfully'];
            }
        }
            
           header("Location:../../edit_category.php?id=$id");
    }else{
        $_SESSION['errors']=$errors;
        header("Location:../../edit_category.php?id=$id");
    }
}