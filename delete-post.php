<?php
include("db.php");

$deleteComments = "DELETE FROM comments WHERE post_id = {$_GET['post_id']}";
$deletePost = "DELETE FROM posts WHERE id = {$_GET['post_id']}";

$delete = getSingle($connection, $deletePost);
$deleteComments = getSingle($connection, $deleteComments);

header('Location: index.php');
?>