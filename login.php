<?php
session_start();
require_once('config.php');
require_once('navbar.php');

?>

<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style1.css">
	<!--we will create a seperate style for the pages than we have for the forms-->
</head>

<body>

	<?php
	get_navbar(0); ?>

	<div class="main-block">
	</div>
	<div id="main-border">
		<center>
			<h2>Login Form</h2>
		</center>

		<form action="login.php" method="post">

			<div class="main-form">
				<input type="text" placeholder="Enter Username or email" name="username" required>
				<input type="password" placeholder="Enter Password" name="password" required>
				<a href="resetpassword.php" class="reset_pwd">Forgotten Password</a>
				<button class="login_button" name="login" type="submit">Login</button>
				<a href="register.php"><button type="button" class="register_btn">Therapist Registration</button></a>
			</div>
		</form>

		<?php
		if (isset($_POST['login'])) {
			$username = $_POST['username'];

			$password = $_POST['password'];
			// $query = "select * from appointments where name='$username' and password='$password' ";
			$query = "select * from users where username='$username' and password='$password' ";

			//echo $query;
			$query1 = "SELECT * FROM therapists WHERE username='$username' AND password='$password'";
			$query_run = mysqli_query($db, $query);
			$query_run1 = mysqli_query($db, $query1);
			//echo mysql_num_rows($query_run);
			if ($query_run) {
				if (mysqli_num_rows($query_run) > 0) {

					$_SESSION['username'] = $username;
					$_SESSION['password'] = $password;

					header("Location: form.php");
				} else {
					echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
				}
			} elseif ($query_run1) {
				header("Location: therapist.php");
			} else {
				echo '<script type="text/javascript">alert("Database Error")</script>';
			}
		} else { }
		?>

	</div>

</body>

</html>