<?php
session_start();
include_once '../include/env.php';
$id = $_GET['id'];
$query = "DELETE FROM post WHERE id = $id";
$delete = mysqli_query($connection,$query);

if($delete){
    $_SESSION['success'] = 'Post Was Deleted.';
    header("location: ../allpost.php");
} else {
 echo "unable";
}