<?php

session_start();

if(($_SESSION['loggedin']) == false){
  header("Location: /login.php");
  die();
}

if(($_SESSION['adminstatus']) == false){ 

  header("Location: /index.php");
  die();
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel = "stylesheet" type="text/css" href="media_style.css" />

	<title>Admin Projects</title>
</head>
<body>

<p>Hello</p>

<ul>
<li><a href="base64.php">Base 64</a></li>
<li><a href="mediarezise.php">Different viewport resize</a></li>
<li><a href="/MySQL/login.php">MySQL login</a></li>
<li><a href="/gymforce/index.php">GymForce.se</a></li>
</ul>

</body>

</html>

