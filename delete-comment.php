<?php
include("db.php");

$commentId = $_GET['comment_id'];
$postId = $_GET['post_id'];

$deleteComment = "DELETE FROM comments WHERE id = $commentId";
$delete = getSingle($connection, $deleteComment);

header("Location: single-post.php?post_id=$postId");
?>