<?php

session_start();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $user_id = $_SESSION['user_id'];
    include "../../database/database.php";
    $sql = "DELETE FROM `categories` WHERE `id` = '$id' AND `user_id` = '$user_id'";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = ['Category Deleted Successfully'];
    } else {
        $_SESSION['errors'] = ['Category Did Not Delete'];
    }
    header("Location:../../index_category.php");
}