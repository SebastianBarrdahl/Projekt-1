<?php

session_start();



 
function validate($string){
	
	$string = trim($string);
	$string = stripslashes($string);
	$string = htmlspecialchars($string);
	return $string;		
	
}

$servername = "localhost";
$username = "user";
$password = "password";
$dbname = "users";
$_SESSION['error'] = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if(!empty($_POST['username']) && ($_POST['password'])){

	$username = $_POST['username'];
	$username = validate($username);
	
	$password = $_POST['password'];
	$password = validate($password);
	
	$uhash = "7452958/#&¤)/#" . $username . "9693488iiugFOVoduOEDODOOB%/876/&)/&";
	$uhash = hash('sha512', $uhash);
	
	$sql = "SELECT password, passwordsalt1, passwordsalt2, firstname FROM users WHERE username='$uhash'";
	
	$_SESSION['username'] = $username;
	
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $databasepass = $row["password"];
        $databasesalt1 = $row["passwordsalt1"];
        $databasesalt2 = $row["passwordsalt2"];
        $_SESSION['fname'] = $row["firstname"];
    }
} else {
    $_SESSION['error'] = "Wrong username/password combination";
}

$passhash = hash('sha512', $databasesalt1 . $password . $databasesalt2);

if($passhash == $databasepass){

	$_SESSION['loggedin'] = true;
	$_SESSION['adminstatus'] = false;
	
} else {

	$_SESSION['error'] = "Wrong username/password combination";
	$_SESSION['loggedin'] = false;
	$_SESSION['adminstatus'] = false;
	
	}

if($uhash === "2e914b4a19befd48d8b6684755b3d34ccc4694cafdcc16da354663c7b253ec32d418caf12deab3ab976f0280244bc7edfb68be18eae151edd71adb5e94ee8509"){

	$_SESSION['adminstatus'] = true;

}

}






$conn->close();

if(($_SESSION['loggedin']) == true){
  header("Location: /index.php");
  die();
} 

$ip = $_SERVER['REMOTE_ADDR'];
$browser = $_SERVER['HTTP_USER_AGENT'];
$dateTime = date('Y/m/d G:i:s');
$file = "logintries.html";
$file = fopen($file, "a");
$data = "<pre><b>User IP</b>: $ip <b> Browser</b>: $browser <br>on Time : $dateTime <br></pre>";
fwrite($file, $data);
fclose($file);

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>

<meta charset="UTF-8">


<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<link rel = "stylesheet" type="text/css" href="media_style.css" />
</head>

<body>

<?php
$servername = "localhost";
$username = "user";
$password = "password";
$dbname = "users";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->close();
?>
 
<center>

	<h1>Login</h1>

	<form action="login.php" method="POST">
		
		<input type="text" placeholder="Enter your Username" name="username"></br>
		<input type="password" placeholder="Enter your Password" name="password"></br>

		<input type="submit" value="Login">

	</form>
	</br>
	
	<?php echo $_SESSION['error'] ?>
	
	<p>Not registered? Email mediaservererrors@gmail.com to get a link</p>
	
	
	
	</center>

</body>

</html>
