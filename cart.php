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
				
				if(!isset($_SESSION['cart'])) 
				{
					$items_array = array(0,0,0,0,0,0,0,0);
					$_SESSION['cart'] = $items_array;
				}
				else{
						
					$items_array = $_SESSION['cart'];
				}
				
				if(isset($_GET['itemid'])) 
				{
					$items_array = $_SESSION['cart'];
					$itemid = $_GET['itemid'];
						
					if($items_array[$itemid] == 0)
					{
						$items_array[$itemid] = 1;
					}
					else
					{							
						$items_array[$itemid] += 1;
						
					} 
					$_SESSION['cart'] = $items_array;
				}
				?>
				
				<table border='1' > <tr> <th >Items</th> <th >Quantity</th> <th >Price</th> <th >Remove</th></tr>
				
				
				<tr><td><label class='top-label'>Catch Me by Lisa Gardner</label></td>
				
				<?php
				echo "<td><input name='b1' id='b1' type='text' size='15' maxlength='2' value='$items_array[1]' onblur='validateBook1(this.value)'/>";
				echo "<div id='err1'> </div></td>";
				echo "<td><div id='book1'></div></td>";
				?>
				<td><input name='remove1' type='button' value='remove' onclick='remove(1)'/></td>
				</tr>
				
				
				<tr><td><label class='top-label'>Bonnie by Iris Johansen</label></td>
				<?php
				echo "<td><input name='b2' id='b2' type='text' size='15' maxlength='2' value='$items_array[2]' onblur='validateBook2(this.value)'/>";
				echo "<div id='err2'></div></td>";
				echo "<td id='book2'></div></td>";
				?>
				<td><input name='remove2' type='button' value='remove' onclick='remove(2)'/></td>
				</tr>
				
				
				<tr><td><label class='top-label'>Never Smile at Strangers by Jennifer Minar-Jaynes</label></td>
				<?php
				echo "<td><input name='b3' id='b3' type='text' size='15' maxlength='2' value='$items_array[3]' onblur='validateBook3(this.value)'/>";
				echo "<div id='err3'></div></td>";
				echo "<td id='book3'></div></td>";
				?>
				<td><input name='remove3' type='button' value='remove' onclick='remove(3)'/></td>
				</tr>
				
				<tr>
				<td></td>
				<td align='right'> <b>Total:</b> </td>
				
				<?php
				echo "<td> <div id='total'> </div> </td>";
				?>
				
				</tr>
				
				</table>
				
				<?php
				
				echo "<p><a href=\"index.php\"> Continue shopping </a></p>";
				
				echo "<p><a href=\"receipt.php\"> Check out </a></p>";
					
				
				?>
				
			</div>
			
			<div class="clear"></div>

			<div id="footer"> 
				<pre>Copyright &copy; 2012 E-Store. All rights reserved. <a style="color:white" href="" >Contact</a>  <a style="color:white" href="" >About Us</a> </pre>
			</div>
			
		</div>

	</body>
</html>
