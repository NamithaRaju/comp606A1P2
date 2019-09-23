<?php
	session_start();
	require_once('config.php');
?>

<!DOCTYPE html>
<html>
<head>
 <!--title of page-->
<title>Reset Password</title>
<style>
input{
    width: 400px;
	margin: 0 auto;
    padding: 10px;
    border: 1px solid #ccc;
}
.main-block {
    background-color: #3B5A9C;
    border-bottom: 2px solid #133783;
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
.back_btn{
	margin-top:10px;
	color: white;
	margin-bottom:15px;
    padding: 10px;
    background-color: #42b72a;
}


.sign_up_btn {
	background-color: #3498db;
    color: white;
	 padding:10px;
	margin-top:10px;
	margin-bottom:10px;
    width: 94%;
	font-size:16px;
	font-weight: bold;
}
</style>
</head>
<body style="background-color:#bdc3c7">
<div class="main-block">
</div>
	<div id="main-border">
	<!--title of form-->
	<center><h2>Reset Password Form</h2></center>
			<!--form-->
		<form action="resetpassword.php" method="post">
		
			<div class="main-form">
				<input type="text" placeholder="Enter Username or email" name="username" required>
				<input type="password" placeholder="Enter Password" name="password" required>
                <input type="password" placeholder="Confirm Password" name="cpassword" required>
				<button class="sign_up_btn" name="reset" type="submit">Reset Password</button>
			</div>
		</form>
		
		<?php
		// this code is for handling the Reset appointment form
			if(isset($_POST['reset']))
			{
				$username=$_POST['username'];
				
				$password=$_POST['password'];
				$cpassword=$_POST['cpassword'];
				
				if($password==$cpassword)//checking passwords
				{
					$query = "select * from therapists where username='$username'";
					//echo $query;
                    $query_run = mysqli_query($db,$query);
                    if($query_run){
                        $query1 = "update therapists set password='$password' where username='$username'";
                        $query_run = mysqli_query($db,$query1);
                        header("location:login.php");//redirects to loginpage
                    }
                    else{
						//showing alert message
                        echo '<script type="text/javascript">alert(This username not exists. Please try later</script>';
                    }

                }
                else{
                    echo '<script type="text/javascript">alert("Password and Confirm Password do not match")</script>';

                }
            }
			
		?>
		
	</div>
</body>
</html>