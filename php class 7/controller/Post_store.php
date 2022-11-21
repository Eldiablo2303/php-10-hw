<?php
session_start();
include '../include/env.php';
if(isset($_POST['submit'])){
   
$errors = [];
count($errors);

   $request = $_POST;
   $title = $request['title'];
   $detail = $request['detail'];
   $author = $request['author'];
   
if(empty($title)){
    $msg = "Input Title";
    $errors['title'] = $msg;
} elseif(strlen($title) > 15){
    $msg = "Title is Too Long";
    $errors['title'] = $msg;
}
if(empty($detail)){
    $msg = "Input Details";
    $errors['detail'] = $msg;
}
if(empty($author)){
    $author = 'anonymous';
}

if(count($errors) > 0){
    $_SESSION['errors'] = $errors;
    $_SESSION['old_data'] = $request;
    header("Location: ../index.php");
} else {
    $myquery = "INSERT INTO post(author, title, detail) VALUES ('$author' , '$title' , '$detail') " ;

$save = mysqli_query($connection,$myquery);

if($save){
  header("Location: ../index.php"); 
  $_SESSION['success'] = "Hello , Post Added Successfully . Thank you !";
} else {
    echo "server is down";
}

}

} else{
    echo "fill the form";
}