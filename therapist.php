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
	background-image: url("massage.jpg");
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
	width: 650px;
	margin: 0 auto;
}
</style>
</head>
<body>

<div class="topnav">
  <a href="contact.php">Contact Us</a>
  <a href="cancellation.php">Cancel Appointment</a>
  <a href="appointment.php">Make Appointment</a>
  <a href="login.php">Login</a>
  <a href="about.php">About Me</a>
  <a class="active" href="home.php">Home</a>
</div>

<div style="margin-top:10px;"></div>


<div class="table">
    <?php
    $db = mysqli_connect('localhost', 'root', '', 'booking');
    $result = mysqli_query($db,"SELECT name,email,reason,timeslot FROM appointments");

    echo "<table border='1'>
    <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Reason for Appointment</th>
    <th>Time</th>
    </tr>";

    while($row = mysqli_fetch_array($result))
    {
    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['reason'] . "</td>";
    echo "<td>" . $row['timeslot'] . "</td>";
    echo "</tr>";
    }
    echo "</table>";
    ?>
  </div>

</body>
</html>
