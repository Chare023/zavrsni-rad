<?php

include('header.php');
?>

<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "blog";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (isset($_POST['submitForm'])) {
   
    if (!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['title']) && !empty($_POST['post-body'])) {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $title = $_POST['title'];
        $postBody = $_POST['post-body'];
        $creadedAt = date("Y-m-d H:i:s");
      
        $users = "INSERT INTO users(id, first_name, last_name)
        VALUE('id','$first_name', '$last_name')";

        $users = mysqli_query($conn, $users);
        $user = "SELECT id FROM users ORDER BY id DESC LIMIT 1";
        $run = getSingle($connection, $user);
        
        $posts ="INSERT INTO posts(id, title, body, created_at)
        VALUE ('$user','$title', '$postBody', '$creadedAt')";

        // $query = "SELECT users_id FROM posts LEFT JOIN users ON  ";

        
        // $result = "SELECT user_id FROM posts as p LEFT JOIN users as u ON p.user_id = u.first_name";
        // // var_dump($result);

        $run = mysqli_query($conn, $posts);
        // header("Location: index.php");
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
      <input type="text" class="form-control" placeholder="First Name" name="first_name"><br>
      <input type="text" class="form-control" placeholder="Last Name" name="last_name"><br>
      <input type="text" class="form-control" placeholder="Title" name="title"><br>
    <textarea class="form-control" name="post-body" id="post-text" rows="4" placeholder="Post"></textarea><br>
    <button class="btn btn-outline-primary" name="submitForm">Submit</button>
  </form>
</div>

<?php

include('footer.php');
?>
