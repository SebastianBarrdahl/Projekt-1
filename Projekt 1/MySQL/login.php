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
	
	$sql = "SELECT password, passwordsalt1, passwordsalt2 FROM users WHERE username='$uhash'";
	
	
	
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $databasepass = $row["password"];
        $databasesalt1 = $row["passwordsalt1"];
        $databasesalt2 = $row["passwordsalt2"];
    }
} else {
    echo "Wrong username/password combination";
}

$passhash = hash('sha512', $databasesalt1 . $password . $databasesalt2);

if($passhash = $databasepass){

	$_SESSION['loggedin'] = true;
	$_SESSION['adminstatus'] = false;
	
} else {

	echo "Wrong username/password combination";
	$_SESSION['loggedin'] = false;
	$_SESSION['adminstatus'] = false;
	
	}

//echo $uhash;
echo $databasepass . " ";
echo $databasesalt1 . " ";
echo $databasesalt2;

}






$conn->close();

if(($_SESSION['loggedin']) == true){
  header("Location: /index.php");
  die();
} 

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>

<meta charset="UTF-8">



<title>MySQL login</title>
<style>

body{background-color:green;}

</style>
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
	
	<p>Not registered? <a href="register.php">Register here</a></p>
	
	</center>

</body>

</html>
