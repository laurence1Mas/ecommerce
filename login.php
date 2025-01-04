<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>login</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

	<link rel='stylesheet prefetch'
		href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
	<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

	<link rel="stylesheet" href="login.css">

	<style type="text/css">
		#buttn {
			color: #fff;
			background-color: #ff3300;
		}
	</style>

</head>

<body>
	<?php
	include 'config_db/config.php'; //INCLUDE CONNECTION
	error_reporting(0); // hide undefine index errors
	session_start(); // temp sessions
	if (isset($_POST['submit']))   // if button is submit
	{
		$nom = $_POST['nom'];  //fetch records from login form
		$PASSWORDS = $_POST['PASSWORDS'];
		if (!empty($_POST["submit"]))   // if records were not empty
		{
			$loginquery = "SELECT * FROM users WHERE nom='$nom' AND PASSWORDS='$PASSWORDS '"; //selecting matching records
			$result = mysqli_query($con, $loginquery); //executing
			$row = mysqli_fetch_array($result);

			if (is_array($row))  // if matching records in the array & if everything is right
			{
				$_SESSION["id"] = $row['id']; // put user id into temp session
				header("refresh:1;url=index.php");// redirect to index.php page
                $success = "welcome"; 
			} else {
				$message = "Invalid Username or Password!"; // throw error
			}
		}
	}
	?>

	<!-- Form Mixin-->
	<!-- Input Mixin-->
	<!-- Button Mixin-->
	<!-- Pen Title-->
	<div class="pen-title">
		<h1>Login Form</h1>
	</div>
	<!-- Form Module-->
	<div class="module form-module">
		<div class="toggle">

		</div>
		<div class="form">
			<h2>Connectez-vous à votre compte</h2>
			<span style="color:red;">
				<?php echo $message; ?>
			</span>
			<span style="color:green;">
				<?php echo $success; ?>
			</span>
			<form action="" method="post">
				<input type="text" placeholder="nom" name="nom" />
				<input type="password" placeholder="password" name="PASSWORDS" />
				<input type="submit" id="buttn" name="submit" value="login" />
			</form>
		</div>

		<div class="cta">Vous n'avez pas de compte?<a href="registre.php" style="color:#f30;"> Créer un compte</a>
		</div>
	</div>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

</body>

</html>