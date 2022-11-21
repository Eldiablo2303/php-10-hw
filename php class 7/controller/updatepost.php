<?php

session_start();

include '../include/env.php';


if(isset($_POST['submit'])){

    $id = $_POST['id'];
    $title = $_POST['title'];
    $detail = $_POST['detail'];
    $author = $_POST['author'];

    $emptydata = [];

    if(empty($title)){

        $emptydata['title'] = "fill in the blank";
    }
    if(empty($detail)) {
        $emptydata['detail'] = "fill in the blank";
    }
    
    if(count($emptydata) == 0){
       $query =" UPDATE  post SET title='$title',detail='$detail',author='$author' WHERE id= $id";
       
       $updatedate = mysqli_query($connection,$query);
       
       $_SESSION['success'] = "Post Updated successfully!";

       header('location: ../allpost.php');

    } else {
        $_SESSION['errors'] = $emptydata;
        header("Location: ../Editpost.php?id=$id");
    }
}

?>