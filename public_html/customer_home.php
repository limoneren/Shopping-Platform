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
	
	
	.cart {
		float: right;
		margin-right: 30px;
		margin-top: -50px;
	}
	
	.left_sidebar{
		padding-top: 100px;
		float: left;
		color: white;
		border:1px black solid;
		width:20%;
		height:calc(100% - 100px);
		background: #222222;
	}
	
	
	
	.left_sidebar ul{
		
		list-style-type: none;
	}
	
	.left_sidebar ul li{
		padding: 10px;
		display:block;
		
		
		
		
	}
	
	
	
		
	.middle_side{
		float:left;
		width:55.7%;
		height:calc(100% - 100px);
		padding-top: 100px;
	}
	
	
	
	
	.right_sidebar{
		float: right;
		padding-top: 100px;
		width:20%;
		color: white;
		height:calc( 100% - 100px) ;
		background: #222222;
		
		border:1px black solid;
	}
	
	.right_sidebar ul{
		list-style-type: none;
	}
	
	.right_sidebar ul li{
		padding: 10px;
		display:block;
		
	}
	
	
	
	
	
	
	</style>



</head>

<body>


<div class="container">
	
	
	

<div class="upperbar">


<div class="text_ap">
<h1>AlisverisPlatformu.com</h1>
</div>


<div class="cart"><img src="Stack.png" width="30px" height="30px" /></div>


</div>





<div class="left_sidebar">


<ul>
	
	<li>Clothing</li>
	<li>Electronics</li>
	<li>Sport and Outdoors</li>
	<li>Shoes</li>
	
	
</ul>



</div>




<div class="middle_side">


<?php 
	include("connection.php");
	
	$query = "SELECT * FROM Product";
	
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
					<button type="submit" class="btn btn-primary btn-block btn-large" name='.$row['product_id'].' >Order !</button>
					</li>
				</ul>
				</form>';
		
			echo "<br>";
			
		}

	}
	
	
?>
	
	
</div>




<div class="right_sidebar">


<ul>
	
	<li>Popular Products</li>
	<li>Popular Stores</li>
	<li>Log out</li>
	
	
</ul>
</div>


	
	
</div>



</body>
</html>