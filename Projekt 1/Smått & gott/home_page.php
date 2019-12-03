<?php

session_start();

if(($_SESSION['loggedin']) == false){
  header("Location: /login.php");
  die();
}
?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel = "stylesheet" type="text/css" href="media_style.css" />

<title>Media Server Home</title>
</head>

<body>



<?php
// Do make a visitors.html file and set permission to 777
         
$ip = $_SERVER['REMOTE_ADDR'];
$browser = $_SERVER['HTTP_USER_AGENT'];
$dateTime = date('Y/m/d G:i:s');
$file = "visitors.html";
$file = fopen($file, "a");
$data = "<pre><b>User IP</b>: $ip <b> Browser</b>: $browser <br>on Time : $dateTime <br></pre>";
fwrite($file, $data);
fclose($file);
?>



<!-- Navbar list
-->

<ul class="navbar_ul">
  <li class="navbar_li" class="silverbackground"><a href="index.php">Home</a></li>
  <li class="navbar_li"><a href="movie_list.php">Movies</a></li>
  <li class="navbar_li"><a href="contact.php">Contact</a></li>
  <li class="navbar_li" style="float:right"><a href="logout.php">Log-out</a></li>
  
</ul>

<h3>Welcome to the media server</h3></br>
<p>I would suggest pressing movies in the navigation bar</p>



</body>

</html>
