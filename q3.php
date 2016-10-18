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
		
			<h1 id="banner">E-Store</h1> 
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
				
				
				<img src="images/Catch me.jpg" alt="Catch Me" width="75px" height="125px" class="fl"/> 
				<p>In New York Times bestselling author Lisa Gardner's latest D.D. Warren thriller, the
				relentless Boston investigator must solve a coldly calculated murder--before it happens. 
				</p>
				<p><b>$16.55</b></p>
				<p> <?php 
					if( !isset($_SESSION["user"]) ) {
						echo "<a href=\"\">Add to Cart</a>";
					}
					else{
						echo "<a href=\"cart.php?itemid=1\">Add to Cart</a>";

					}
				?></p>
				<p class="clear"></p>
				
				 
				<img src="images/bonnie.jpg" alt="bonnie" width="75px" height="125px" class="fl"/>
				<p >The truth has eluded her for years. Now, is she ready to face it? The # 1 New York Times
				bestselling author Iris Johansen has written an explosive conclusion to the trilogy that
				will finally lay to rest the questions that have haunted her fans for a decade.
				</p>
				<p><b>$19.99</b></p>
				<p> <?php 
					if( !isset($_SESSION["user"]) ) {
						echo "<a href=\"\">Add to Cart</a>";
					}
					else{
						echo "<a href=\"cart.php?itemid=2\">Add to Cart</a>";

					}
				?></p>
				<p class="clear"></p>
				
				
				<img src="images/strangers.jpg" alt="strangers" width="75px" height="125px" class="fl"/>
				<p>When teenage girls vanish in what was once considered a safe, Louisiana bayou town, the lives of four desperate 
				young locals take unexpected turns, begging the crucial question: Do you every truly know those closest to you? </p>
				<p><b>$17.65</b></p>
				<p> <?php 
					if( !isset($_SESSION["user"]) ) {
						echo "<a href=\"\">Add to Cart</a>";
					}
					else{
						echo "<a href=\"cart.php?itemid=3\">Add to Cart</a>";

					}
				?></p>
				<p class="clear"> </p>
				
			</div>
			
			<div class="clear"></div>
			
			<div id="footer"> 
				<pre>Copyright &copy; 2012 E-Store. All rights reserved. <a style="color:white" href="" >Contact</a>  <a style="color:white" href="" >About Us</a> </pre>
			</div>
			
		</div>
		
	</body>


</html>