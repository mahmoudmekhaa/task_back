<?php


//connection
$conn = mysqli_connect("localhost","root","");

if(!$conn){
    echo "connect error " . mysqli_connect_error($conn);
}




$sql = "CREATE DATABASE IF NOT EXISTS todoapp";
$result = mysqli_query($conn,$sql);

mysqli_close($conn);





$conn = mysqli_connect("localhost","root","","todoapp");

if(!$conn){
    echo "connect error " . mysqli_connect_error($conn);
}




$sql = "CREATE TABLE if not exists tasks (

    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `title` VARCHAR(200) NOT NULL

)";
$result = mysqli_query($conn,$sql);

echo mysqli_error($conn);


mysqli_close($conn);


echo "<pre>";
var_dump($conn);