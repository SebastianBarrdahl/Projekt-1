<?php
	$db= new mysqli("localhost", "Seba01001", "Filipvågarintepratamedsandra1", "webbshop"); 
	if(!$db){
		echo "Connection failed!";
		exit;
		}
	$sql="SELECT * FROM products";
	$result = $db->query($sql);
	while($row=$result->fetch_assoc()){
		echo $row['Name'];
		echo ", ";
		echo $row['Description'];
		echo ", ";
		echo $row['Price'];
		echo ", ";
		echo $row['Picture'];
		echo "<br>";
	}
	mysqli_close($db);
?>