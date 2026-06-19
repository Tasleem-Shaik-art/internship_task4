<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Blogging Platform</title>

<link rel="stylesheet" href="style.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body>

<nav>

<h2>BlogSphere</h2>

<div>

<a href="index.php">Home</a>

<a href="#features">Features</a>

<a href="login.php">Login</a>

<a href="register.php">Register</a>

</div>

</nav>

<section class="hero">

<div class="hero-content">

<h1>Welcome to <span>BlogSphere</span></h1>

<p>
Share your thoughts, ideas and stories with the world.
Create beautiful blogs, manage your posts easily,
and connect with readers from anywhere.
</p>

<div class="hero-buttons">

<a href="register.php" class="hero-btn">
Get Started
</a>

<a href="login.php" class="hero-btn hero-outline">
Login
</a>

</div>

</div>

</section>

<section class="features" id="features">

<h2>Platform Features</h2>

<div class="feature-grid">

<div class="feature-box">

<i class="fa-solid fa-pen"></i>

<h3>Create Posts</h3>

<p>
Write amazing blogs using a clean editor and publish instantly.
</p>

</div>

<div class="feature-box">

<i class="fa-solid fa-user"></i>

<h3>User Authentication</h3>

<p>
Secure Registration and Login System using PHP Sessions.
</p>

</div>

<div class="feature-box">

<i class="fa-solid fa-lock"></i>

<h3>Secure Platform</h3>

<p>
Your account and blog posts remain protected with authentication.
</p>

</div>

<div class="feature-box">

<i class="fa-solid fa-chart-column"></i>

<h3>Dashboard</h3>

<p>
Manage all your blogs with Edit and Delete options.
</p>

</div>

<div class="feature-box">

<i class="fa-solid fa-mobile-screen"></i>

<h3>Responsive Design</h3>

<p>
Looks beautiful on Desktop, Tablet and Mobile Devices.
</p>

</div>

<div class="feature-box">

<i class="fa-solid fa-globe"></i>

<h3>Global Access</h3>

<p>
Access your blogging platform from anywhere at any time.
</p>

</div>

</div>

</section>

<footer>

<p>

© <?php echo date("Y"); ?>

BlogSphere | Developed using HTML, CSS, JavaScript, PHP & MySQL

</p>

</footer>

<script src="script.js"></script>

</body>
</html>