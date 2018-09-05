<?php

	include("connection.php");
	 
	$product_id = $_POST['product_id'];
	
	
	
	
	$query = "SELECT * FROM ProductDetails AS T1, Defines AS T2 WHERE T1.product_detail_id = T2.product_detail_id AND 
	T2.product_id = $product_id";
	
	$result = mysqli_query($conn, $query);
	
	if(!mysqli_query($conn, $query))  
	{
		echo('Error '.mysqli_error($conn));	
	} else    
	{
		while($row=mysqli_fetch_array($result))
		{ 
		
			echo '<form class="customer_home" action="add_to_orderdetailsAction.php" method="post">

				<ul>
					
					<li>
						<label for='.$row['product_id'].'>'.$row['size'].' - '.$row['color'].'</label>'.
						'<input type="hidden" name="product_id" value='.$row['product_id'].' >
					<button type="submit" class="btn btn-primary btn-block btn-large" name='.$row['product_id'].' >Add This To My Cart !</button>
					</li>
				</ul>
				</form>';
		
			echo "<br>";
			
		}

	}
	
?>