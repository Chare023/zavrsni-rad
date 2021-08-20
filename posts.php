<?php 
include('db.php'); 

    $sql = "SELECT id, title, body, author, created_at 
    FROM posts ORDER BY created_at DESC";
    $posts = getall($connection, $sql);
    

?>

<div class="col-sm-8 blog-main">
<?php foreach ($posts as $post) { ?>
    <div class="blog-post">
        <h2 class="blog-post-title"><a class="blog-post-title-a" href="single-post.php?post_id=<?php echo($post['id']) ?>"><?php echo($post['title'])?></a></h2>
        <p class="blog-post-meta"><?php echo($post['created_at']) ?><a href="#"><?php echo($post['author']) ?></a></p>
        <p><?php echo($post['body']) ?></p>
        
    </div><!-- /.blog-post -->
<?php } ?>

    <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
    </nav>

</div><!-- /.blog-main -->
<?php 
include('sidebar.php');
include('footer.php');
?>