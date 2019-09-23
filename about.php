<?php
	session_start();
	require_once('config.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    body {
	font-size: 120%;
	background-image: url("sports-massage.jpg");
	background-repeat: no-repeat;
    background-size: cover;
    font-family: Arial, Helvetica, sans-serif;
  }


.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: right;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}

.table{
  border-radius : 10px;
	background-color: white;
	border: 3px solid #133783;
	width: 400px;
	margin: 0 auto;
}
</style>
</head>
<body>

<div class="topnav">
  <a href="contact.php">Contact Us</a>
  <a class="active" href="about.php">About Me</a>
  <a href="cancellation.php">Cancel Appoinment</a>
  <a href="appointment.php">Make Appoinment</a>
  <a href="login.php">Sign In</a>
  <a href="home.php">Home</a>
</div>
<div>
<!--shows a brief information about the site-->
<h1>Welcome to Sports Massage Hamilton<h1>

<p style="font-size:16px;">Sports Massage Hamilton is a clinic which was established in 2015 by Ann Davies and have 2 different 
locations: @ Female Federation: 9 Pembroke Street, Hamilton Lake & @ Vertex: 41 Victoria Street, Hamilton.

We have got over 13 Years experience in sports treatment, relaxation and corporate massages to more recently manual lymphatic drainage.

Being specialized in treatments for muscular injuries and maintenance from elite athletes to people working in the office,
mum’s carrying their child, people gardening, weekend warriors or children who do a lot of sports,
 we are beneficial for everyone.
 </p>
</div>
</body>
</html>
