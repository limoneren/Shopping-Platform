<?php

	include("connection.php");
	 
	$customer_id = 10101;
	$email = $_POST['email'];
	$password = $_POST['password'];
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$street = $_POST['street'];
	$apartment_number = $_POST['apartment_number'];
	$city = $_POST['city'];
	$country = $_POST['country'];
	$phone_number = $_POST['phone_number'];
	$membership_type = $_POST['membership_type'];
	$gender = $_POST['gender'];
	
	
	if (strlen($password) < 6)
	{
		echo "Password should include at least 6 characters!<br>";
	} else if (!ctype_alnum($password))
	{
		echo "Password should contain all alphanumerical characters!<br>";
	}
	
	$query = "INSERT INTO Customer VALUES (
		'".$customer_id."',
		'".$email."',
		'".$name."',
		'".$surname."',
		'".$password."',
		'".$apartment_number."',
		'".$street."',
		'".$city."',
		'".$country."',
		'".$phone_number."',
		'".$membership_type."',
		'".$gender."',
		'2018-5-12'
	)";

	
	if(!mysqli_query($conn, $query))  
	{
		echo('Error '.mysqli_error($conn));	
	} else    
	{
		echo "New record added";
	}
	
?>