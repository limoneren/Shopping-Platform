<?php

include("connection.php");

$product_id = $_POST['productid'];


$query = "DELETE FROM Product WHERE ".$product_id." = product_id";


if(!mysqli_query($conn, $query))
{
    echo('Error '.mysqli_error($conn));
} else
{
    echo "Product Removed. :D";
}

?>