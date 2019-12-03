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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel = "stylesheet" type="text/css" href="media_style.css" />

<title>Media Server Home</title>
<style>


</style>
</head>

<body>



<?php
//IP logger
// Do make a visitors.html file and set permission to 777
 

$myfile = fopen("countfile.html", "r+") or die("Unable to open file!");
$temp = fread($myfile, filesize("countfile.html"));
$temp = $temp + 1;
fclose($myfile);
$myfile2 = fopen("countfile.html","w+");
fwrite($myfile2, $temp);
fclose($myfile2);
         
$ip = $_SERVER['REMOTE_ADDR'];
$browser = $_SERVER['HTTP_USER_AGENT'];
$dateTime = date('Y/m/d G:i:s');
$file = "visitors.html";
$file = fopen($file, "a");
$usr = $_SESSION['username'];

$data = "<pre><b>Visits</b>: $temp <b>Username</b>: $usr <b>User IP</b>: $ip <b> Browser</b>: $browser <br>on Time : $dateTime <br><hr></pre>";

if($ip != "192.36.73.252" && "127.0.0.1"){

	fwrite($file, $data);
	fclose($file);
}



?>



<!-- Navbar list-->

<!-- Load an icon library to show a hamburger menu (bars) on small screens -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="topnav" id="myTopnav">
  <a href="index.php" class="active">Home</a>
  <a href="movie_list.php">Movies</a>
  <a href="projects.php">Projects</a>
  <a href="logout.php">Log-out</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div> 

<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>



<h3>Welcome to the media server</h3></br>

<?php

if($_SESSION['adminstatus'] == true){
echo $_SESSION['adminstatus'] . " ";
echo $_SERVER['REMOTE_ADDR']; 
}
?>
</br>
</br>
<?php
echo "Welcome " . $_SESSION['fname'];

?>


</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
<p>Why are you here</p>



</body>

</html>
