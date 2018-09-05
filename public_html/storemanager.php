<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>AlisverisPlatformu</title>

<style type="text/css">
	
	
	html, body {
		position: relative;
		margin:0;
		width:100%;
		height:100%;
	}
	
	.container {
		background: #EBE7E7;
		margin: auto;
		width: 80%;
		font-size: 25px;
		font-family: Gill Sans, Gill Sans MT, Myriad Pro, DejaVu Sans Condensed, Helvetica, Arial," sans-serif";
		
		border: 1px black solid;
		height: 100%;
	}
	
	.upperbar{
		position: absolute;
		background: #FF8600;
		border:1px black solid;
		width:80%;
		height:80px;
		
	}
	
	.upperbar .text_ap{
		position: relative;
		padding: 0;
		width:400px;
		clear: none;
	}
	
	h1{
		padding: 0;
		margin: 0;
		clear: right;
	}
	
	
	.logout {
		float: right;
		margin-right: 30px;
		margin-top: -50px;
	}
	
	
	.productform ul{
		list-style-type: none;
	}
	
	
	.btn{
		border-radius: 10px;
		padding: 15px;
		background: black;
		color: white;
		font-family: Lucida Grande, Lucida Sans Unicode, Lucida Sans, DejaVu Sans, Verdana," sans-serif";
	}
	.btn:hover{
		background: #FF8600;
		color: black;
		transition-duration: 0.3s;
	}

	
	
	
		
	.middle_side{
		float:left;
		width:100%;
		height:100%;
		padding-top: 100px;
	}

	
	
	</style>

</head>

<body>


<div class="container">
	
<div class="upperbar">

<div class="text_ap">
<h1>AlisverisPlatformu.com</h1>
</div>


<div class="logout"><a href="index.html"><img src="logout.png" width="30px" height="30px" /></a></div>

</div>

<div class="middle_side">
	
	<div class="storemanager_info">
		Welcome
	</div>
	
	<div class = "products"></br></br></br></br>Products of your Store</br>
	
<?php 
	include("connection.php");
	
	
	$store_id = "1234";
	
	$query = "SELECT name FROM Product, (SELECT * FROM Sells WHERE store_id = ".$store_id.") as T WHERE Product.product_id = T.product_id";
	
	$result = mysqli_query($conn, $query);
	
	if(!mysqli_query($conn, $query))  
	{
		echo('Error '.mysqli_error($conn));	
	} else    
	{
		while($row=mysqli_fetch_array($result))
		{ 
		
			echo '<form class="customer_home" action="add_to_orderdetails.php" method="post">

				<ul>
					
					<li>
						<label for='.$row['product_id'].'>'.$row['name'].' - '.$row['description'].'</label>'.
						'<input type="hidden" name="product_id" value='.$row['product_id'].' >
					
					</li>
				</ul>
				</form>';
		
			echo "<br>";
			
		}

	}
	
	
?>
	
	
	
		
<ul>
	<li><a href="addproduct.php"><button type="submit" class="btn" name="addproduct">Add Product</button></a>
	<a href="removeproduct.php">"<button type="submit" class="btn" name="removeproduct">Remove Product</button></a></li>
	
	
	
</ul>



	</div>
	
	
		

	
</div>




	
	
</div>



</body>
</html>