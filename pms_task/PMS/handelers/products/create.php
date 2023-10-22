<?php 

session_start();
$errors=[];

if(isset($_POST['submit'])&& $_SERVER['REQUEST_METHOD']=="POST"){
    // get data
    $name=trim(htmlspecialchars($_POST['name']));
    $price=trim(htmlspecialchars($_POST['price']));
    $category_id=trim(htmlspecialchars($_POST['category_id']));
    $image=$_FILES['image'];
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
        // price
    if(empty($price)){
        $errors[]= "Please Enter price";
    }elseif(!minLen($price,1)){
        $errors[]= "price Must Be Greater Than 1 ";
    }elseif(!maxLen($price,3)){
        $errors[]= "price Must Be Less Than 3 ";
    }
        // category
    if(empty($category_id)){
        $errors[]= "Please Enter Category";
    }
        // image
    if(empty($image)){
        $errors[]= "Please Upload Image";
    }
    //database
    if(isset($_SESSION['user_id'])){
        $user_id=$_SESSION['user_id'];
    }
    include "../../database/database.php";
    $sql2="SELECT `name` FROM `products` WHERE `user_id`='$user_id' AND `name`='$name'";
    $result=mysqli_query($conn,$sql2);
    $row=mysqli_fetch_assoc($result);
    if($row!=null){
        $errors[]="Name Is Already Exist";
    }
    if(empty($errors)){
          //upload
            include "../../UploadFile/UploadFile.php";
            uploadFile("../../upload/",$image,$errors);
            if(isset($_SESSION['image_name'])){
                $image_name=$_SESSION['image_name'];
                $sql3="INSERT into `products` (`name`,`price`,`image`,`user_id`,`category_id`) value('$name','$price','$image_name','$user_id','$category_id')";            
                if(mysqli_query($conn,$sql3)){
                    $_SESSION['success']=['Added Successfully'];
                }else{
                    $_SESSION['errors']=['Not Added Successfully'];
                }
            }
            
            header("Location:../../create_product.php");
    }else{
        $_SESSION['errors']=$errors;
        header("Location:../../create_product.php");
    }
}