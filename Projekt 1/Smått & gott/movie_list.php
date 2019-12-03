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

	<style>
	* {box-sizing:border-box}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -22px;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

	</style>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel = "stylesheet" type="text/css" href="media_style.css" />

	<title>Movie List</title>
</head>

<body>

	<!-- Navbar list-->

<!-- Load an icon library to show a hamburger menu (bars) on small screens -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="topnav" id="myTopnav">
  <a href="index.php" >Home</a>
  <a href="movie_list.php" class="active">Movies</a>
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

	<center>
	
	<h3>New movies</h3>
	<hr>
	</center>
	
	 <!-- Slideshow container -->
<div class="slideshow-container" style="color: black;">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
    <div class="numbertext">1 / 3</div>
    <a href="/movies/avengers_infinity.php">
    <img src="/movies/antmanwasp.jpeg" style="width:100%" alt="Ant-Man and the Wasp">
    </a>
    <div class="text" style="color: black;">Ant-Man and the Wasp</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 3</div>
    <a href="/movies/avengers_infinity.php">
    <img src="/movies/avengersinfinitywar.jpg" style="width:100%">
    </a>
    <div class="text">Avengers Infinity War</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 3</div>
    <a href="/movies/avengers_infinity.php">
    <img src="/movies/captainamerica2.jpg" style="width:100%" alt="Captain America">
    </a>
    <div class="text">Captain America: The Winter Soldier</div>
  </div>

  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div> 

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>
	
	<center>
	<h3>Available movies</h3>
	<hr>
	<table>

	<tr>
	 <th><a href="avengers_infinity.php" target="_self" style="display:block;">Avengers: Infinity War</a></th>
	 <th><a href="djazz.php" target="_self" style="display:block;">Avengers: Age of Ultron</th>
	 <th><a href="Avengers_IF.php" target="_self" style="display:block;">Iron Man 2</th>
	 <th><a href="Avengers_IF.php" target="_self" style="display:block;">Black Panther</th>
	</tr>
	<tr>
 	 <th><a href="Avengers_IF.php" target="_self" style="display:block;">Ant-Man</th>
 	 <th><a href="Avengers_IF.php" target="_self" style="display:block;">Ant-Man and the Wasp</th>
   <th><a href="Avengers_IF.php" target="_self" style="display:block;">Civil War</th>
 	 <th><a href="Avengers_IF.php" target="_self" style="display:block;">Rouge One</th>
	</tr>
	<tr>
	 <th><a href="Avengers_IF.php" target="_blank" style="display:block;">Spider-Man Homecoming</th>
	 <th><a href="Avengers_IF.php" target="_blank" style="display:block;">Thor Ragnarok</th>
	 <th><a href="Avengers_IF.php" target="_blank" style="display:block;">Fast & Furious 8</th>
	 <th><a href="Avengers_IF.php" target="_blank" style="display:block;">Kong Skull Island</th>
	</tr>
	<tr>
	 <th><a href="Avengers_IF.php" target="_blank" style="display:block;">Captain America "The First Avenger"</th>
	 <th><a href="Avengers_IF.php" target="_blank" style="display:block;">Captain America "The Winter Soldier"</th>
	 <th><a href="Avengers_IF.php" target="_blank" style="display:block;">Guardians of the Galaxy</th>
	 <th><a href="Avengers_IF.php" target="_blank" style="display:block;">Guardians of the Galaxy Vol.2</th>
	</tr>

	</table>
	</center>

</body>

</html>

