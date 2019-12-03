<?php

session_start();




function validate($string){
	
	$string = trim($string);
	$string = stripslashes($string);
	$string = htmlspecialchars($string);
	return $string;		 
	
}




//salt generator

$salt1 = base64_encode(openssl_random_pseudo_bytes(24));
$salt2 = base64_encode(openssl_random_pseudo_bytes(24));
$_SESSION['errormsg'] = "";



$servername = "localhost";
$mysqluser = "user";
$password = "password";
$dbname = "users";

// Create connection
$conn = new mysqli($servername, $mysqluser, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}






if(!empty(($_POST['email']) && ($_POST['username']) && ($_POST['password']) && ($_POST['password2']) && ($_POST['fname']) && ($_POST['lname']))){
	

	//email handling
	
	$email = $_POST['email'];
	$email = validate($email);
	
	//username handling
	
	$username = $_POST['username'];
	$username = validate($username);
	
	$uhash = "7452958/#&¤)/#" . $username . "9693488iiugFOVoduOEDODOOB%/876/&)/&";
	$uhash = hash('sha512', $uhash);
	
	
	
	//if($sql != false){
	// goto validation_skip;
	//}
	
	//password validation
	
	$pass = $_POST['password'];
	$pass = validate($pass);
	
	//password comparison
	
	$pass2 = $_POST['password2'];
	$pass2 = validate($pass2);
	
	//if($pass != $pass2){
	// goto validation_skip;
	//}
	
	//password hashing
	
	$passwordhash = hash('sha512', $salt1 . $pass . $salt2);
	
	//fname validation
	
	$fname = $_POST['fname'];
	$fname = validate($fname);
	
	//lname validation
	
	$lname = $_POST['lname'];
	$lname = validate($lname);
	
	
	
	$sql = $conn->prepare("INSERT INTO users (username, firstname, lastname, email, password, passwordsalt1, passwordsalt2)
	VALUES (?, ?, ?, ?, ?, ?, ?)");
	
	$sql->bind_param("sssssss" , $uhash, $fname, $lname, $email, $passwordhash, $salt1, $salt2);
	
	$sql->execute();
	
	
	/*if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
} else {
    $_SESSION['errormsg'] = "Username already exists";
    $errormsg = $sql . "" . $conn->error;
    mail("mediaservererrors@gmail.com", "Website error", "Username already exists", 'From: register@php.com');
}*/
	
	
	
	
	
	
}

validation_skip:

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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel = "stylesheet" type="text/css" href="media_style.css" />

<title>Register</title>
</head>

<body>



<?php

//create an MySQL database

$servername = "localhost";
$mysqluser = "user";
$password = "password";
$dbname = "users";

// Create connection
$conn = new mysqli($servername, $mysqluser, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table

$sql = "CREATE TABLE users (
username VARCHAR(200) UNIQUE,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50) NOT NULL,
password VARCHAR(512),
passwordsalt1 VARCHAR(512),
passwordsalt2 VARCHAR(512),
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
reg_date TIMESTAMP
)";

/*if ($conn->query($sql) === TRUE) {
    echo "Table users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}*/

$conn->close();

?> 

<!-- rest of code goes here -->
<center>
</br>
<form action="register.php" method="POST" autocomplete="on">
		
	<input type="email" placeholder="Enter email..." name="email"></br>
	<input type="text" placeholder="Enter username..." name="username"></br>
	<input type="password" placeholder="Enter password..." name="password" autocomplete="off"></br>
	<input type="password" placeholder="Repeat password..." name="password2" autocomplete="off"></br>
	<input type="text" placeholder="First name..." name="fname"></br>
	<input type="text" placeholder="Last name..." name="lname"></br>

	<input type="submit" value="Register">

</form>

<?php
//echo $fname . " ";
//echo $lname . " ";
//echo $email . " ";
//echo $pass . " ";
//echo $pass2 . " ";
//echo $username . " ";
//echo $uhash . " ";
//echo $salt1 . " ";
//echo $salt2;
//echo $passwordhash;
echo $_SESSION['errormsg'];

?>

<p>Already registered? <a href="login.php">Login</a></p>





</center>

</body>

</html>

