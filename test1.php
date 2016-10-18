<?php
				session_start();
	if(isset($_GET["amount1"]) )
	{
		$amount1 = $_GET["amount1"];
		
		$error="";
		
		if($amount1 == "" || !preg_match("/^[0-9]+$/", $amount1))
		{
			$error .= "Please enter a valid number";
			echo $error;
		}
		else{
			$items_array = $_SESSION['cart'];
			$items_array[1] = $amount1;
			$items_array[4] = round($amount1*16.65, 2);
			$items_array[7] = $items_array[4] + $items_array[5] + $items_array[6];
			$_SESSION['cart'] = $items_array;
			echo round($amount1*16.65, 2);
		}
	}
	
	
	if(isset($_GET["amount2"]) )
	{
		$amount2 = $_GET["amount2"];
		
		$error="";
		
		if($amount2 == "" || !preg_match("/^[0-9]+$/", $amount2))
		{
			$error .= "Please enter a valid number";
			echo $error;
		}
		else{
			$items_array = $_SESSION['cart'];
			$items_array[2] = $amount2;
			$items_array[5] = round($amount2*19.99, 2);
			$items_array[7] = $items_array[4] + $items_array[5] + $items_array[6];
			$_SESSION['cart'] = $items_array;
			echo round($amount2*19.99, 2);
		}
	}
	
	
	if(isset($_GET["amount3"]) )
	{
		$amount3 = $_GET["amount3"];
		
		$error="";
		
		if($amount3 == "" || !preg_match("/^[0-9]+$/", $amount3))
		{
			$error .= "Please enter a valid number";
			echo $error;
		}
		else{
			$items_array = $_SESSION['cart'];
			$items_array[3] = $amount3;
			$items_array[6] = round($amount3*17.65, 2);
			$items_array[7] = $items_array[4] + $items_array[5] + $items_array[6];
			$_SESSION['cart'] = $items_array;
			echo round($amount3*17.65, 2);
		}
	}
	
	
	
	if(isset($_GET["amount"]) )
	{
		$amount = $_GET["amount"];

			$items_array = $_SESSION['cart'];
			$items_array[$amount] = 0;
			$items_array[$amount+3] = 0;
			$items_array[7] = $items_array[4] + $items_array[5] + $items_array[6];
			$_SESSION['cart'] = $items_array;
			echo $amount;
	}			
	?>