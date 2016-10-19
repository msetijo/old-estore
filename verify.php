<?php session_start(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<title> Project E-Store </title>
		<link rel="stylesheet" type="text/css" href="style/q3.css" />
		<script src="script/q3.js" type="text/javascript"> </script>
		<meta http-equiv="Content-type" content="application/xhtml+xml;charset=UTF-8"/>
	</head>
	
	<body onload="makeDate()">
				
		<div id="container">
		
			<h1 id="banner"> E-Store</h1> 
				<div id="date"> </div>	
			
			<div id="menu">
				<p> <a href="index.php"> Home </a></p>
				<p> <a href="">Products </a></p>
				<p> 
				<?php 
				if( !isset($_SESSION["user"]) ) {
						echo "<a href=\"login.php\">Log IN</a>";
					}
					else{
						echo "<a href=\"logout.php\">Log OUT</a>";

					}
				?></p>
				<p> <?php
					if( isset($_SESSION["user"]) ) 
						echo "<a href=\"cart.php\">My Cart</a>";
					else
						echo "<a href=\"\">My Cart</a>";
				?></p>
				<p> <a href="register.php">Register</a></p>
				<p> <a href="">FAQ </a></p>
			</div>
			
			<div id="content"> 
			
			<p><?php 
		
			$error		= "";
			$fname		= $_POST['fname'];
			$lname		= $_POST['lname'];
			$pass		= $_POST['pass'];
			$pass2		= $_POST['pass2'];
			$pnumber    = $_POST['pnumber'];
			$email 		= $_POST['email'];
		
			
			// Validation
			if($fname == "")
				$error .= "Enter a full name<br />";
			
			if($pass == "" || $pass2 == "")
				$error .= "Enter a password<br />";
			else if($pass != $pass2)
				$error .= "Passwords must match<br />";
			else if(strlen($pass) < 8)
				$error .= "Password must be 8 characters long <br/>";
				
			if($pnumber == "")
				$error .= "Enter phone number <br/>";
			
			if($email == "")
				$error .= "Enter email address <br/>";
				
			if($error == "")
			{
				 echo 'Registration Successful!';
				 $members = fopen("members.txt", "a+");
				 $str = "Name: " . $fname . " " . $lname ." Email: ". $email ." Password: ". $pass." Phone #: " .$pnumber. "<br/>" ;
				 fwrite($members, $str);
				 fclose($members);
				 
			}else{
				// Error Exists
				
				 echo $error;
			}
				
		?></p>

				
			</div>
			
			<div class="clear"></div>
			
			<div id="footer"> 
				<pre>Copyright &copy; 2012 E-Store. All rights reserved. <a style="color:white" href="" >Contact</a>  <a style="color:white" href="" >About Us</a> </pre>
			</div>
			
		</div>

	</body>
	
</html>
