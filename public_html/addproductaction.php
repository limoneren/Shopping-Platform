<?php

include("connection.php");

$product_id = $_POST['productid'];
$name = $_POST['name'];
$description = $_POST['description'];
$category = $_POST['category'];


$query = "INSERT INTO Product VALUES (
		'".$product_id."',
		'".$name."',
		'".$description."',
		'".$category."')";


if(!mysqli_query($conn, $query))
{
    echo('Error '.mysqli_error($conn));
} else
{
    echo "New prouct added";
}

?>