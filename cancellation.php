
<?php
	session_start();
	require_once('config.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style1.css"><!--we will create a seperate style for the pages than
 we have for the forms--> 
</head>
<body>

<div class="topnav">
  <a href="contact.php">Contact Us</a>
  <a href="about.php">About Me</a>
  <a class="active" href="cancellation.php">Cancel Appoinment</a>
  <a href="appointment.php">Make Appoinment</a>
  <a href="login.php">Sign In</a>
  <a href="home.php">Home</a>
</div>

	<div id="main-border">
	<center><h2> Cancellation</h2></center>
			
		<form action="cancellation.php" method="post">
		
			<div class="main-form">
				<input type="text" placeholder="Enter name" name="name" required>	
				<input type="text" placeholder="Enter email" name="email" required>
                <input type="password" placeholder="Enter Password" name="password" required>
				<span style="font-size:15px;">Timeslot :</span>
				<input style="width:350px;" type="text" placeholder="eg: Year-month-day Hr:Min" name="timeslot" required>
				<button class="book_btn" name="cancel" type="submit">Cancel Appointment</button>
				<p>
					<!--changes to Sign In page-->
					Want to make an Appointment? <a href="appointment.php">Book Here</a>
				</p>
				<p>
					<!--changes to Sign In page-->
					<a href="home.php"><button type="button" class="back_btn"><< Back to Home</button></a>
				</p>
			</div>
		</form>
		
		<?php
			if(isset($_POST['cancel']))
			{
				$name=$_POST['name'];
				$email=$_POST['email'];
				$timeslot=$_POST['timeslot'];
				$date = date('Y-m-d H:i:s');

				
				$password=md5($_POST['password']);
				$query="select * from appointments where name='$name' and password='$password'";
				$query_run = mysqli_query($db,$query);
				if($query_run)
				{
					$diff= strtotime($date)-strtotime($timeslot);
					$query1="delete from appointments where name='$name' and password='$password'";
					mysqli_query($db,$query1);
					if($diff>=86400)
					{
						$query1="delete from appointments where name='$name' and password='$password'";
						$query_run1=mysqli_query($db,$query1);
						if($query_run1)
						{

							$_SESSION['success'] = "Your appointment has been cancelled and you have been charged a small fee for late cancellation!!!";
							header( "Location: cancelfinish.php");	
						}
					else{
						$query1="delete from appointments where name='$name' and password='$password'";
						$query_run1=mysqli_query($db,$query1);
						if($query_run1)
						{

						$_SESSION['success'] = "Your appointment has been cancelled!!!";
						header( "Location: cancelfinish.php");	
						}
					}
				}
			}
				else
				{
					echo '<script type="text/javascript">alert("User is unavailable. Please try again!")</script>';
				}
			    
            }
		?>
		
	</div>

</body>
</html>
