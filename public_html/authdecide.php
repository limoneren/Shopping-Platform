<?php

	include("connection.php");
	 
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$query = "SELECT email FROM Customer WHERE email = '$email' and password = '$password';";
	$query .= "SELECT email FROM CompanyManager WHERE email = '$email' and password = '$password';";
	$query .= "SELECT email FROM StoreManager WHERE email = '$email' and password = '$password'";
	
	if(mysqli_multi_query($conn, $query))
	{
		$resultFromCustomer = mysqli_store_result($conn);
		mysqli_next_result($conn);
		$resultFromCompanyManager = mysqli_store_result($conn);
		mysqli_next_result($conn);
		$resultFromStoreManager = mysqli_store_result($conn);
	}
	
	$isCustomer = mysqli_num_rows($resultFromCustomer);
	$isCompanyManager = mysqli_num_rows($resultFromCompanyManager);
	$isStoreManager = mysqli_num_rows($resultFromStoreManager);		
	
	if(isset($_POST['loginbutton'])){
		//echo "login button clicked"."<br>"; 
		if($isCustomer == 1)
		{
			//echo $email." logged in successfully!"."<br>";
			header("Location: customer_home.php");
		} elseif($isCompanyManager == 1)
		{
			//echo $email." logged in successfully!"."<br>";
			header("Location: adminpanel.php");
		} elseif($isStoreManager == 1)
		{
			//echo $email." logged in successfully!"."<br>";
			header("Location: storemanager.php");
		}
		
	} else if(isset($_POST['signupbutton'])) {
		header("Location: signupform.php");
	}
	
?>