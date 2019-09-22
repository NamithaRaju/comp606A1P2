
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
	font-size: 100%;
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
input{
    width: 450px;
	margin: 0 auto;
    padding: 10px;
    border: 1px solid #ccc;
}
.main-block {
    border-bottom: 8px;
    min-height: 100px;
}

#main-border{
	border-radius : 10px;
	background-color: white;
	border: 3px solid #133783;
	width: 500px;
	margin: 0 auto;
}
.main-form{
	width:450px;
	margin:0 auto;
}
.login_button {
    background-color: #4CAF50;
    color: white;
    margin-top:10px;
    margin-bottom: 10px;
    padding:10px;
    width: 100%;
	font-size:18px;
	font-weight: bold;
}
</style>
</head>
<body>

<div class="topnav">
  <a href="contact.php">Contact Us</a>
  <a class="active" href="login.php">Sign In</a>
  <a href="about.php">About Me</a>
  <a href="home.php">Home</a>
</div>

<div class="main-block">
</div>
	<div id="main-border">
	<center><h2>Login Form</h2></center>
			
		<form action="login.php" method="post">
		
			<div class="main-form">
				<input type="text" placeholder="Enter Username or email" name="username" required>
				<input type="password" placeholder="Enter Password" name="password" required>
				<a href="resetpassword.php" class="reset_pwd">Forgotten Password</a>
				<button class="login_button" name="login" type="submit">Login</button>
			</div>
		</form>
		
		<?php
			if(isset($_POST['login']))
			{
				$username=$_POST['username'];
				$password=$_POST['password'];
				//echo $query;
				$query = "SELECT * FROM therapists WHERE username='$username' AND password='$password'";
				$query_run = mysqli_query($db,$query);
				//echo mysql_num_rows($query_run);
				if($query_run)
				{
					if(mysqli_num_rows($query_run)>0)
					{
					
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $password;
					
					header( "Location: therapist.php");
					}
					else
					{
						echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
					}
				
			}
			else
			{
				echo '<script type="text/javascript">alert("Database Error")</script>';
			}
		}
		
		?>
		
	</div>

</body>
</html>
