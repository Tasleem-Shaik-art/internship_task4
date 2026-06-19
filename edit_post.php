<?php
session_start();
include "db.php";

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];

$stmt = mysqli_prepare($conn,"SELECT * FROM posts WHERE id=?");
mysqli_stmt_bind_param($stmt,"i",$id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$post = mysqli_fetch_assoc($result);

if(!$post){
    die("Post not found.");
}

if(isset($_POST['update'])){

    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    $update = mysqli_prepare($conn,
    "UPDATE posts SET title=?,content=? WHERE id=?");

    mysqli_stmt_bind_param($update,"ssi",$title,$content,$id);

    if(mysqli_stmt_execute($update)){
        header("Location: dashboard.php");
        exit();
    }

}
?>

<!DOCTYPE html>

<html>

<head>

<title>Edit Post</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<div class="form-box">

<h1>Edit Post</h1>

<form method="POST">

<input
type="text"
name="title"
value="<?php echo htmlspecialchars($post['title']); ?>"
required>

<textarea
name="content"
rows="8"
required><?php echo htmlspecialchars($post['content']); ?></textarea>

<button
type="submit"
name="update">
Update Post
</button>

<p>

<a href="dashboard.php">

← Dashboard

</a>

</p>

</form>

</div>

</div>

</body>

</html>