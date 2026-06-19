<?php
session_start();
include "db.php";

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}

$message = "";

if(isset($_POST['submit'])){

    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $created_by = $_SESSION['username'];

    if(!empty($title) && !empty($content)){

        $sql = "INSERT INTO posts(title,content,created_by) VALUES(?,?,?)";
        $stmt = mysqli_prepare($conn,$sql);

        mysqli_stmt_bind_param($stmt,"sss",$title,$content,$created_by);

        if(mysqli_stmt_execute($stmt)){
            header("Location: dashboard.php");
            exit();
        }else{
            $message="Something went wrong.";
        }

    }else{
        $message="All fields are required.";
    }

}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Post</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

<div class="form-box">

<h1>Add New Post</h1>

<p class="error"><?php echo $message; ?></p>

<form method="POST">

<input
type="text"
name="title"
placeholder="Post Title"
required>

<textarea
name="content"
rows="8"
placeholder="Write your content..."
required></textarea>

<button
type="submit"
name="submit">
Publish Post
</button>

<p>

<a href="dashboard.php">

← Back to Dashboard

</a>

</p>

</form>

</div>

</div>

</body>

</html>