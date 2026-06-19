<?php
include "db.php";

$message="";

if(isset($_POST['register'])){

$fullname=mysqli_real_escape_string($conn,$_POST['fullname']);
$username=mysqli_real_escape_string($conn,$_POST['username']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
$password=password_hash($_POST['password'],PASSWORD_DEFAULT);

$check=mysqli_query($conn,"SELECT * FROM users WHERE username='$username' OR email='$email'");

if(mysqli_num_rows($check)>0){

$message="Username or Email already exists!";

}else{

$sql="INSERT INTO users(fullname,username,email,password)
VALUES('$fullname','$username','$email','$password')";

if(mysqli_query($conn,$sql)){

header("Location: login.php");

}else{

$message="Registration Failed";

}

}

}

?>

<!DOCTYPE html>

<html>

<head>

<title>Register</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<div class="form-box">

<h1>Create Account</h1>

<p class="error"><?php echo $message; ?></p>

<form method="POST">

<input type="text"
name="fullname"
placeholder="Full Name"
required>

<input type="text"
name="username"
placeholder="Username"
required>

<input type="email"
name="email"
placeholder="Email"
required>

<input type="password"
name="password"
placeholder="Password"
required>

<button type="submit"
name="register">
Register
</button>

<p>

Already have an account?

<a href="login.php">

Login

</a>

</p>

</form>

</div>

</div>

</body>

</html>