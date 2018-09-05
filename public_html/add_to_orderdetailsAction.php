
<?php

	include("connection.php");
	 
	$product_id = $_POST['product_id'];
	 
	 echo $product_id;
	 echo "<br>";
	 
	 
	$query1 = "select Product.product_id, price*(1-discount) as price
  	from Product, ProductDetails, Defines
  	where Product.product_id = Defines.product_id
  	and ProductDetails.product_detail_id = Defines.product_detail_id
  	and Product.product_id = ".$product_id."
  	limit 1";
	
	$result = mysqli_query($conn, $query1);
	
	if(!mysqli_query($conn, $query1))  
	{
		echo('Error '.mysqli_error($conn));	
	} else    
	{
		while($row=mysqli_fetch_array($result))
		{ 
		
			$fiyat = $row['price'];
		
			echo "<br>";
			
		}

	}
	 
	 
	$order_details_id = 1010;
	$quantity = 1;
	$total_price = $quantity * $fiyat;
	$tax = 1010;
	
	
	$query = "INSERT INTO OrderDetails VALUES (
		'".$order_details_id."',
		'".$quantity."',
		'".$total_price."',
		'".$tax."'
	)";

	
	if(!mysqli_query($conn, $query))  
	{
		echo('Error '.mysqli_error($conn));	
	} else    
	{
		echo "New record added";
	}
	
?>