<?php
include('db.php');
include('header.php');

    
?>
<?php
    if (isset($_GET['post_id'])) {
        $sql = "SELECT id, title, body, author, created_at 
        FROM posts ORDER BY created_at DESC";
        $posts = getall($connection, $sql);
        $sqlSinglePost = "SELECT id, title, body, author, created_at 
        FROM posts WHERE id = {$_GET['post_id']}";
        $singlePost = getSingle($connection, $sqlSinglePost);
        $sqlComments = "SELECT * FROM comments WHERE post_id = {$_GET['post_id']}";
        $comments = getAll($connection, $sqlComments);  
?>

<!-- single post -->
<div class="col-sm-8 blog-main">
    <div class="blog-post">
        <h2 class="blog-post-title"><?php echo($singlePost['title'])?></a></h2>
        <!-- <input type="submit" value="Delete" class="btn btn-primary" onclick="return confirm('Are you sure you want to delete this post?')"> -->
        <a onclick="return confirm('Are you sure you want to delete this post?')" if(confirm){
            href="delete-post.php?post_id=<?php echo($singlePost['id'])?>"
        } class="btn btn-primary float-right">Delete this post</a>
        <p class="blog-post-meta"><?php echo($singlePost['created_at']) ?><a href="#"><?php echo(" ". $singlePost['author']) ?></a></p>
        <p><?php echo($singlePost['body']) ?></p>
        <!-- kraj posta -->

        <!-- forma za upis komentara -->
        <div class="form-group">
            
            <form action="create-comment.php" method="post" id="comment-form">
                <h4>Post a comment:</h4><br>
                <?php 
                if (isset($_GET['error'])) {
                    echo '
                    <div class="alert alert-danger form-control">
                        <h6>All fields required</h6>
                    </div>';
                }
                ?>
                <input class="form-control" name="author" type="text" placeholder="Name"><br>
                <textarea class="form-control" name="text" id="comment-text" rows="4" maxlength="255" placeholder="Comment"></textarea><br>
                <button class="btn btn-outline-primary" name='submit' value="<?php echo($singlePost['id']) ?>">Submit</button>
            </form>
        </div> <!-- kraj forme -->

        <!-- komentari -->
        <button id="btn-comment-show" class="btn btn-default">Hide comments</button>
        <br><br>
        <ul id="comments">
            <?php foreach ($comments as $comment) { ?>
                <li><?php echo($comment['author'].": ");
                    echo($comment['text']); ?>
                </li>
                <a href="delete-comment.php?post_id=<?php echo($singlePost['id'])?>&comment_id=<?php echo($comment['id'])?>" class="btn btn-default float-right">Delete</a>
                
                <br>
                <hr>
            <?php } ?>
        </ul>
    </div>
    <script src="main.js"></script>
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
