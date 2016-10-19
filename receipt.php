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
				<p> <a href="index.php"> Home </a></p>
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
				
				
			<?php
				$array = $_SESSION['cart'];
				$total = 0;

				if(empty($array))
				{
					echo "You have purchased nothing!";
				}
				else{
					
					
				echo "<p><b>Here are the items you purchase:</b></p>";
				
				echo "<table border='1' > <tr> <th >Items</th> <th >Price</th></tr> ";
				
				
				if($array[1] == 0){
				$book1 = $array[4];
				}else{
				$book1 = $array[1] * 16.65;
				}
				if($array[2] == 0){
				$book2 = $array[5];
				}else{
				$book2 = $array[2] * 19.99;
				}
				if($array[3] == 0){
				$book3 = $array[6];
				}else{
				$book3 = $array[3] * 17.65;
				}

				if($array[7] == 0){
				$total = $book1 + $book2 + $book3;
				}else{
				$total = $array[7];
				}		
				echo "<tr><td>Catch Me by Lisa Gardner</td>";
				echo "<td>$ $book1</td>";
				echo "</tr>";
				
				echo "<tr><td>Bonnie by Iris Johansen</td>";
				echo "<td>$ $book2</td>";
				echo "</tr>";
				
				echo "<tr><td>Never Smile at Strangers by Jennifer Minar-Jaynes</td>";
				echo "<td>$ $book3</td>";
				echo "</tr>";
				
				echo "<tr> <td align='right'><b>Total:</b></td>";
				echo "<td>$ $total</td>";
				echo "</tr>";
				echo "</table>";
				
				echo "<br/><b>Thank you for visiting E-Store, please come again!</b>";
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
