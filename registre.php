<!DOCTYPE html>
<html lang="en">

<?php

include 'config_db/config.php';
if(isset($_POST['submit'])){

    if(empty($_POST['nom']) ||  //fetching and find if its empty
   	    empty($_POST['email'])|| 
		empty($_POST['PASSWORDS']))
		{
			$message = "All fields must be Required!";
		}
	else
	{

		//cheching username & email if already present
	    $check_username= mysqli_query($con, "SELECT nom FROM users where nom = '".$_POST['nom']."' ");
	    $check_email = mysqli_query($con, "SELECT email FROM users where email = '".$_POST['email']."' ");
        if(strlen($_POST['PASSWORDS']) < 6)  //cal password length
        {
            $message = "Password Must be >=6";
        }	
        elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) // Validate email address
        {
               $message = "Invalid email address please type a valid email!";
        }
        elseif(mysqli_num_rows($check_username) > 0)  //check username
         {
            $message = 'username Already exists!';
         }
        elseif(mysqli_num_rows($check_email) > 0) //check email
         {
            $message = 'Email Already exists!';
         }
        else{
       
            //inserting values into db
           $mql = "INSERT INTO users(nom,email,PASSWORDS) VALUES('".$_POST['nom']."','".$_POST['email']."','".md5($_POST['PASSWORDS'])."')";
           mysqli_query($con, $mql);
               $success = "Compte créé avec succès!<p>Vous serez redirigé vers <span id='counter'>5</span> second(s).</p>;
                <script type='text/javascript'>
                    function countdown() {
                        var i = document.getElementById('counter');
                        if (parseInt(i.innerHTML)<=0) {
                            location.href = 'login.php';
                        }
                        i.innerHTML = parseInt(i.innerHTML)-1;
                    }
                    setInterval(function(){ countdown(); },1000);
                </script>'"; 
                header("refresh:5;url=login.php"); // redireted once inserted success
           }
    }
}
?>

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
	<!-- Form Module-->
	<div class="module form-module">
		<div class="toggle">

		</div>
		<div class="form">
			<h2>Create a account</h2>
			<form action="" method="post">
                <label for="field-3" class="form-label">name</label>
                <input type="text" name="nom" class="form-control" id="field-3" placeholder=" enter your name">
                <label for="field-3" class="form-label">email</label>
                <input type="email" name="email" class="form-control" id="field-3" placeholder=" enter your email adress">
                <label for="field-3" class="form-label">password</label>
                <input type="password" name="PASSWORDS" class="form-control" id="field-3" placeholder=" enter your password">
				<input type="submit" id="buttn" name="submit"/>
			</form>
		</div>

		<div class="cta">Vous avez un compte?<a href="login.php" style="color:#f30;"> sign up</a>
		</div>
	</div>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

</body>

</html>