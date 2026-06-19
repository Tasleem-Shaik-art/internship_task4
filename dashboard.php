<?php

session_start();

include "db.php";

if(!isset($_SESSION['username'])){

header("Location:login.php");

exit();

}

$post=mysqli_query($conn,"SELECT * FROM posts");

$total_posts=mysqli_num_rows($post);

$user=mysqli_query($conn,"SELECT * FROM users");

$total_users=mysqli_num_rows($user);

?>

<!DOCTYPE html>

<html>

<head>

<title>Dashboard</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<nav>

<h2>Final Project</h2>

<div>

<a href="add_post.php">Add Post</a>

<a href="logout.php">Logout</a>

</div>

</nav>

<div class="dashboard">

<h1>

Welcome,

<?php echo $_SESSION['fullname']; ?>

🎉

</h1>

<div class="cards">

<div class="card">

<h2>

<?php echo $total_users; ?>

</h2>

<p>Total Users</p>

</div>

<div class="card">

<h2>

<?php echo $total_posts; ?>

</h2>

<p>Total Posts</p>

</div>

</div>

<h2>All Posts</h2>

<table>

<tr>

<th>ID</th>

<th>Title</th>

<th>Content</th>

<th>Created By</th>

<th>Action</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($post)){

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo htmlspecialchars($row['title']); ?></td>

<td><?php echo htmlspecialchars(substr($row['content'],0,80)); ?></td>

<td><?php echo $row['created_by']; ?></td>

<td>

<a class="edit" href="edit_post.php?id=<?php echo $row['id']; ?>">Edit</a>

<a class="delete"

onclick="return confirm('Delete this post?')"

href="delete_post.php?id=<?php echo $row['id']; ?>">

Delete

</a>

</td>

</tr>

<?php

}

?>

</table>

</div>

</body>

</html>