<?php
session_start();

include './include/env.php' ;
$newquery = "SELECT * FROM post";

$allpost = mysqli_query($connection,$newquery);
$fetchdata = mysqli_fetch_all($allpost,1);
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

<?php
if(isset($_SESSION['success'])){
?>
  <div class="toast show align-items-center text-bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="d-flex">
    <div class="toast-body">
  
  
    <?= $_SESSION['success']
    ?>
  
  
  </div>
    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
</div>
<?php
}
?>

<div class="container mt-5">
<h3>All Posts</h3>
<table class="table table-dark table-striped">
    <tr>
        <th>#</th>
        <th>post title</th>
        <th>Post detail</th>
        <th>author</th>
        <th>Action</th>
    </tr>

<?php
foreach($fetchdata as $id =>$post) {
?>
    <tr>
        <td><?= ++ $id?></td>
        <td><?= $post['title']?></td>
        <td><?= strlen($post['detail']) > 50 ? substr($post['detail'],0,50).'...' : $post['detail']
         ?> </td>
        <td><?= $post['author']?></td>
        <td>
            <div class="btn-group">
                <a href="./readmore.php?id=<?= $post['id'] ?>" class="btn btn-sm btn-primary">read more</a>
                <a href="./Editpost.php?id=<?= $post['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                <a href="./controller/deletepost.php?id=<?= $post['id'] ?>" class="btn btn-sm btn-primary">Delete</a>
            </div>
        </td>
    </tr>
    <?php
}

?>

<?php
if(mysqli_num_Rows($allpost) == 0 ){
  ?>
   <tr class="text-center">
   <td colspan="5">NO DATA FOUND </td>
  </tr>

   <?php
}
?>


    
</table>

</div>




    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
<?php
session_unset();