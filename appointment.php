
<?php
	session_start();
	require_once('config.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style1.css"><!--we will create a seperate style for the pages than we have for the forms-->
</head>
<body>

<div class="topnav">
  <a href="contact.php">Contact Us</a>
  <a href="about.php">About Me</a>
  <a href="cancellation.php">Cancel Appoinment</a>
  <a class="active" href="appointment.php">Make Appoinment</a>
  <a href="login.php">Sign In</a>
  <a href="home.php">Home</a>
</div>

<div class="main-block">
</div>
	<div id="main-border">
	<center><h2>Book Appointment</h2></center>
			
		<form action="appointment.php" method="post">
		
			<div class="main-form">
				<input type="text" placeholder="Enter name" name="name" required>	
				<input type="text" placeholder="Enter email" name="email" required>
				<span style="font-size:15px;">Timeslot :</span>
				<input style="width:350px;" type="text" placeholder="eg: Year-month-day Hr:Min" name="timeslot" required>
				
				<input type="password" placeholder="Enter Password" name="password" required>
				<input type="text" placeholder="Enter credit card number" name="creditcard" required>
			    <span style="font-size:16px;">Massage name :</span>
				<select name="massage">
					<option value="deeptissue">Deep Tissue Massage</option>
					<option value="sports">Sports Massage</option>
					<option value="therapeutic">Therapeutic Massage</option>
					<option value="relaxation">Relaxation</option>
				</select><br>
				<input type="text" placeholder="Reason for appointment" name="reason" required>
				<button class="book_btn" name="booking" type="submit">Make Appointment</button>
				<p>
					<!--changes to Sign In page-->
					Want to cancel an Appointment? <a href="cancellation.php">Cancel Here</a>
				</p>
				<p>
					<!--changes to Sign In page-->
					<a href="home.php"><button type="button" class="back_btn"><< Back to Home</button></a>
				</p>
			</div>
		</form>
		
		<?php
			if(isset($_POST['booking']))
			{
				$name=$_POST['name'];
				$email=$_POST['email'];
				$timeslot=$_POST['timeslot'];
				
				echo "<script>console.log('$timeslot')</script>";
				
				//$date = date_format('Y-m-d H:i:s',$timeslot);
				//echo "<script>console.log('$date')</script>";
				$password=$_POST['password'];
				$password1=md5($password);
				echo "<script>console.log('$password')</script>";
				$creditcard=$_POST['creditcard'];
				$massage=$_POST['massage'];
				$reason=$_POST['reason'];
				$query1="select * from timeslots where timeslot='$timeslot' LIMIT 1";
					$query_run1 = mysqli_query($db,$query1);
					$timecheck = mysqli_fetch_assoc($query_run1);
					if (!$timecheck) { // if timeslot does not exist
						echo '<script type="text/javascript">alert("Timeslot does not exist")</script>';
						}
					else{
						$query="insert into appointments values ('','$name','$email', '$password1','$creditcard','$reason','$timeslot','$massage')";
						//echo $query;
						echo "<script>console.log('$query')</script>";

						$query_run = mysqli_query($db,$query);
						if($query_run)
						{
							// Checks if appointment time has allready been filled
							$appointment_check_query = "SELECT * FROM appointments WHERE timeslot='$timeslot' LIMIT 1";
							$result = mysqli_query($db, $appointment_check_query);
							$appoint = mysqli_fetch_assoc($result);
							if($appoint){
								$_SESSION['name'] = $name;
								$_SESSION['email'] = $email;
								$_SESSION['timeslot'] = $timeslot;
								header( "Location: customerinfo.php");		
								}
							
						}
						else
						{
							echo '<script type="text/javascript">alert("Booking Unsuccessful due to server error. Please try later")</script>';
						}
					}

			}
		
		?>
		
	</div>

</body>
</html>
