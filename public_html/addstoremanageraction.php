<?php

include("connection.php");

$storemanager_id = $_POST['storemanagerid'];
$store_id = $_POST['storeid'];
$email = $_POST['email'];
$password = $_POST['password'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$street = $_POST['street'];
$apartment_number = $_POST['apartment_number'];
$city = $_POST['city'];
$country = $_POST['country'];
$phone_number = $_POST['phone_number'];


if (strlen($password) < 6)
{
    echo "Password should include at least 6 characters!<br>";
} else if (!ctype_alnum($password))
{
    echo "Password should contain all alphanumerical characters!<br>";
}

$query = "INSERT INTO StoreManager VALUES (
		'".$storemanager_id."',
        '".$store_id."',
		'".$email."',
		'".$name."',
		'".$surname."',
		'".$password."',
		'".$apartment_number."',
		'".$street."',
		'".$city."',
		'".$country."',
		'".$phone_number."'
	)";


if(!mysqli_query($conn, $query))
{
    echo('Error '.mysqli_error($conn));
} else
{
    echo "New record added";
}

?>