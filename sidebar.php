<aside class="col-sm-3 ml-sm-auto blog-sidebar">
    <div class="sidebar-module sidebar-module-inset">
        <h4>Latest posts</h4>
        <div class="sidebar-module">
            <?php 
            $i = 1;
            foreach ($posts as $post) { ?>
            
            <h5><a class="blog-post-title-a" href="single-post.php?post_id=<?php echo($post['id']) ?>"><?php echo($post['title'])?></a></h5>        
            
            <?php if($i++ == 5) break; } 
            ?>
        </div>
    </div>
</aside><!-- /.blog-sidebar -->
