<?php
include('header.php');
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "blog";
$postId = $_POST['submit'];
$conn = mysqli_connect($servername, $username, $password, $dbname);
$error = "error";
if (isset($_POST['submit'])) {
   
    if (!empty($_POST['author'] && !empty($_POST['text']))) {
        $author = $_POST['author'];
        $text = $_POST['text'];
        $postId = $_POST['submit'];
        $creadedAt = date("Y-m-d H:i:s");

        $query = "INSERT INTO comments(id,author, text, post_id, created_at) VALUE('id','$author', '$text', '$postId', '$createdAt')";

        $run = mysqli_query($conn, $query);
        header("Location: single-post.php?post_id=".$postId);
    }
    else{ 
        header("Location: single-post.php?post_id=$postId&error=$error");
    }
}
?>
