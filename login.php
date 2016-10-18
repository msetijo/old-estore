<?php session_start(); 

		if( isset($_POST['signIn']) )
				{
					$email = $_POST['email'];
					$pass = $_POST['pass'];

					$members = fopen("members.txt" , "a+");
					$content = file_get_contents("members.txt");

					if( preg_match("/$email/", $content) && preg_match("/$pass/", $content) )
					{
						$value = explode('@', $email);
						$_SESSION['user'] = $value[0];
						header('Location: login.php');	
				}
				}
				else
				{
					echo "";
						
				}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	
	<head>
		<title> Log in </title>
		<link rel="stylesheet" type="text/css" href="style/q3.css" />
		<script src="script/q3.js" type="text/javascript"> </script>
		<meta http-equiv="Content-type" content="application/xhtml+xml;charset=UTF-8"/>
	</head>

	<body onload="makeDate()">
		
		<div id="container">
		
			<h1 id="banner"> E-Store</h1> 
				<div id="date"> </div>	
			
			<div id="menu">
				<p> <a href="q3.php"> Home </a></p>
				<p> <a href="">Products </a></p>
				<p> <?php 
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
			
				<div id="error"></div>
				
				<form method="post" action="" onsubmit="return validate()">

					<div>
					
					<label class="top-label">Email: </label>
					<input name="email" id="emailaddress" type="text" size="20" maxlength="25" />
							
					<p></p><p></p>
						
					<label class="top-label">Password:</label>
					<input name="pass" id="password" type="password" />
							
					<p></p><p></p>
							
					<input name="signIn" type="submit" value="Sign in" />
					
					</div>
				</form>
				
				<?php 
					
				if( isset($_SESSION['user']) )
				{
					echo "Success! You're log in";
				}
				else if( isset($_POST['signIn']) )
				{
					$email = $_POST['email'];
					$pass = $_POST['pass'];
					
					$members = fopen("members.txt" , "a+");
					$content = file_get_contents("members.txt");
					
					if( !preg_match("/$email/", $content) && !preg_match("/$pass/", $content) )
					{
						echo "Unsuccessful log in";						 
					}
				}
				?>
			
			</div>
			
			<div class="clear"></div>
			
			<div id="footer"> 
				<pre>Copyright &copy; 2012 E-Store. All rights reserved. <a style="color:white" href="" >Contact</a>  <a style="color:white" href="" >About Us</a> </pre>
			</div>
			
		</div>
		
	</body>
	
</html>