<?php

if(!empty($_POST['input'])){
	
	$input = $_POST['input'];	
	
}

?>

 


<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>

<meta charset="UTF-8">



<title>Base 64 encoder</title>
</head>

<body>

<form action="base64.php" method="POST">
<input type="number" name="input">
<input type="submit">
</form>

<?php

echo base64_encode($input);

?>

</body>

</html>

