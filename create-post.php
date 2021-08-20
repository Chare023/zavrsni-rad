<?php
// include("db.php");
include('header.php');
?>

<?php


$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "blog";

$conn = mysqli_connect($servername, $username, $password, $dbname);
// var_dump($_POST);
if (isset($_POST['submitForm'])) {
   
    if (!empty($_POST['author']) && !empty($_POST['title']) && !empty($_POST['post-body'])) {
        $author = $_POST['author'];
        $title = $_POST['title'];
        $postBody = $_POST['post-body'];
        $creadedAt = date("Y-m-d H:i:s");

        $query = "INSERT INTO posts(id, title, body, author, created_at)
         VALUE('id','$title', '$postBody', '$author', '$creadedAt')";

        $run = mysqli_query($conn, $query);
        header("Location: index.php");
    }
    else{ 
        header("Location: create-post.php?error=$error");
       
    }
} 

?>

<div class="col-sm-8 blog-main">
<?php 
if (isset($_GET['error'])) {
    echo '
    <div class="alert alert-danger form-control">
        <h6>All fields required</h6>
    </div>';
}
?>
  <form class="form-group" action="create-post.php" method="post" id="create-post-form">
      <input type="text" class="form-control" placeholder="Author" name="author"><br>
      <input type="text" class="form-control" placeholder="Title" name="title"><br>
    <textarea class="form-control" name="post-body" id="post-text" rows="4" placeholder="Post"></textarea><br>
    <button class="btn btn-outline-primary" name="submitForm">Submit</button>
  </form>
</div>

<?php

include('footer.php');
?>
