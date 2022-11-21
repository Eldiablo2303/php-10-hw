<?php
include './include/env.php';
$methor = $_GET;
$id = $methor['id'];
$query = "SELECT * FROM post WHERE id = '$id'";
$data = mysqli_query($connection , $query);
$post = mysqli_fetch_assoc($data);
 
//print_r($post);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Posts</title>
     <!-- CSS only -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
<body>
    
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">POST SYSTEM</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav m-auto">
        <li class="nav-item">
           <a class="nav-link active" aria-current="page" href="./index.php">Add Post</a>
          
           <a class="nav-link active" aria-current="page" href="./allpost.php">All Posts</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-5">
<h3>Read More Post</h3>
<div class="card">
    <div class="card-header">
        <h4>Post Title</h4>
        <?= $post['title']?>
    </div>
    <div class="card-body">
        <h4>Post Details</h4>
        <?= $post['detail']?>
    </div>
    <div class="card-footer">
        <h4>Author name</h4>
        <?= $post['author']?>
    </div>
</div>

</div>




    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>