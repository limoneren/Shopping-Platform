<?php

include("connection.php");

$storemanager_id = $_POST['storemanagerid'];


$query = "DELETE FROM StoreManager WHERE ".$storemanager_id." = s_manager_id";


if(!mysqli_query($conn, $query))
{
    echo('Error '.mysqli_error($conn));
} else
{
    echo "Store Manager Removed. :D";
}

?>