<?php

session_start();


if(!empty($_POST['usrname']) && ($_POST['password'])){
	
	$username = $_POST['usrname'];
	$username = stripslashes($username);
    $username = htmlspecialchars($username);
	$pasword = $_POST['password'];
	$pasword = stripslashes($pasword);
	$pasword = htmlspecialchars($pasword);
	$halfway = "Q%GRgrtrudn845734956(#¤=(¤/#=/%=(#/%G)EFG)#(" . $pasword . "%/(GV205986yjg(/G8r6tiui8rd76jbIKU/(/¤)fe&5eq§";
	$hashed = hash('sha512', $halfway);
	 
}

if($hashed == "e945c3c8d39b3738ff830797fe5655747ea5b42ca610e83bbee2908fbb8b4b3dc03e418841965f28ff21e1370ef1b9e6dce7e01af0233e655d080d9a12b72370" && $username == "Admin"){
	$loggedin = true;
	$_SESSION['loggedin'] = true;
	$_SESSION['adminstatus'] = true;
	$_SESSION['username'] = $username;
	
} 

if($hashed != "e945c3c8d39b3738ff830797fe5655747ea5b42ca610e83bbee2908fbb8b4b3dc03e418841965f28ff21e1370ef1b9e6dce7e01af0233e655d080d9a12b72370" && $username != "Admin"){
	$loggedin = false;
	$_SESSION['loggedin'] = false;
	$_SESSION['adminstatus'] = false;
	

}

if($hashed == "b798f7a7853d5259423bd0e2044980c4e9e88c0dcd0d393248dee0f924ab4070c5069b633a2a625c4ce0a7cb2f07f6eea585891a833c97da74c9161b137d1635" && $username == "Guest"){
	$loggedin = true;
	$_SESSION['loggedin'] = true;
	$_SESSION['adminstatus'] = false;
	$_SESSION['username'] = $username;
	
} 
if($hashed == "c7d227eb661db73ba79d0fc49ea831aecd3d6b00ba61211b6f544f2adc9f239d61c7000f25a619b1a968fda63b7dd274601e1fc6c9d62f0a80f250e1b9533536" && $username == "Lukas"){
	$loggedin = true;
	$_SESSION['loggedin'] = true;
	$_SESSION['adminstatus'] = false;
	$_SESSION['username'] = $username;
}



if(($_SESSION['loggedin']) == true){
  header("Location: /index.php");
  die();
} 

$numdate = date("d");

if($numdate == 0) {
$date = "#CD5C5C";
} elseif($numdate == 1) {
$date = "#FA8072";
} elseif($numdate == 2) {
$date = "#B22222";
} elseif($numdate == 3) {
$date = "#FF69B4";
} elseif($numdate == 4) {
$date = "coral";
} elseif($numdate == 5) {
$date = "#FF8C00";
} elseif($numdate == 6) {
$date = "#FFD700";
} elseif($numdate == 7) {
$date = "#F0E68C";
} elseif($numdate == 8) {
$date = "#EE82EE";
} elseif($numdate == 9) {
$date = "#FF00FF";
} elseif($numdate == 10) {
$date = "#663399";
} elseif($numdate == 11) {
$date = "#9932CC";
} elseif($numdate == 12) {
$date = "#8B008B";
} elseif($numdate == 13) {
$date = "#ADFF2F";
} elseif($numdate == 14) {
$date = "#32CD32";
} elseif($numdate == 15) {
$date = "#228B22";
} elseif($numdate == 16) {
$date = "#6B8E23";
} elseif($numdate == 17) {
$date = "#66CDAA";
} elseif($numdate == 18) {
$date = "#008080";
} elseif($numdate == 19) {
$date = "#00FFFF";
} elseif($numdate == 20) {
$date = "#7FFFD4";
} elseif($numdate == 21) {
$date = "#5F9EA0";
} elseif($numdate == 22) {
$date = "#B0E0E6";
} elseif($numdate == 23) {
$date = "#87CEFA";
} elseif($numdate == 24) {
$date = "#6495ED";
} elseif($numdate == 25) {
$date = "#0000CD";
} elseif($numdate == 26) {
$date = "#191970";
} elseif($numdate == 27) {
$date = "#F5DEB3";
} elseif($numdate == 28) {
$date = "#F4A460";
} elseif($numdate == 29) {
$date = "#B8860B";
} elseif($numdate == 30) {
$date = "#D2691E";
} elseif($numdate == 31) {
$date = "#800000";
}

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>



input[type="text"], input[type="password"]{
	outline:none;
	padding:10px;
	display:block;
	width:300px;
	border-radius: 3px;
	border:1px solid #eee;
	margin:5px auto;
	margin-bottom: 0px;
}

input[type="submit"]{
	padding:10px;
	color:#fff;
	background:#0098cb;
	width:320px;
	margin:10px auto;
	margin-top:0px;
	border:0px;
	border-radius: 3px;
	cursor:pointer;
}

input[type="submit"]:hover{
	background:#00b8eb;
}

.header{
	border-bottom:1px solid #eee;
	padding:10px 0px;
	width:100%;
	text-align:center;
}

.header a{
	color:#333;
	text-decoration: none;
}

form {
	border: 1px solid black;
	width: 340px;
	border-radius: 10px;
}
body { 

background-color:<?php echo $date ?> ;

}
@media only screen and (max-width: 600px) {
  form {
    border: 1px solid black;
	width: 98%;
	border-radius: 3px;
  }
  input[type="submit"]{
	padding:10px;
	color:#000;
	background:#0098cb;
	width:95%;
	height:5vh;
	margin:10px auto;
	margin-top:0px;
	border:0px;
	border-radius:1px;
	cursor:pointer;
  }
  input[type="text"], input[type="password"]{
	outline:none;
	padding:10px;
	display:block;
	width:89%;
	border-radius: 3px;
	border:1px solid #eee;
	margin:5px auto;
	margin-bottom: 0px;
}
}

	</style>

	<title>Login</title>
	<!--<link rel="stylesheet" type="text/css" href="media_style.css"> -->
	<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>
<body>

<?php
// Do make a visitors.html file and set permission to 777
         
$ip = $_SERVER['REMOTE_ADDR'];
$browser = $_SERVER['HTTP_USER_AGENT'];
$dateTime = date('Y/m/d G:i:s');
$file = "logintries.html";
$file = fopen($file, "a");
$data = "<pre><b>User IP</b>: $ip <b> Browser</b>: $browser <br>on Time : $dateTime <br></pre>";
fwrite($file, $data);
fclose($file);
?>


	

	<?php if(!empty($message)): ?>
		<p><?= $message ?></p>
	<?php endif; ?>
	<center>
	<h1>Login</h1>
	
	

	<form action="login.php" method="POST">
		
		<input type="text" placeholder="Enter your Username" name="usrname"></br>
		<input type="password" placeholder="Enter your Password" name="password"></br>

		<input type="submit" value="Login">

	</form>
	</center>
</body>
</html>
