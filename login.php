<?php
session_start();
include "db.php";

$message = "";

if(isset($_POST['login'])){

    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username=?";
    $stmt = mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"s",$username);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($result)==1){

        $row = mysqli_fetch_assoc($result);

        if(password_verify($password,$row['password'])){

            $_SESSION['username']=$row['username'];
            $_SESSION['fullname']=$row['fullname'];

            header("Location: dashboard.php");
            exit();

        }else{

            $message="Invalid Password!";

        }

    }else{

        $message="User Not Found!";

    }

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

<div class="form-box">

<h1>Login</h1>

<p class="error"><?php echo $message; ?></p>

<form method="POST">

<input
type="text"
name="username"
placeholder="Username"
required>

<input
type="password"
name="password"
placeholder="Password"
required>

<button
type="submit"
name="login">
Login
</button>

<p>

Don't have an account?

<a href="register.php">

Register

</a>

</p>

</form>

</div>

</div>

</body>

</html>