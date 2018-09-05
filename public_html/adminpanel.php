<!doctype html>
<html background="#000">
<head>
<meta charset="utf-8">
<title>Alisverisplatformu.com</title>



<style type="text/css" >
	
	html,body{
		
		background: #000;
		width:100%;
		height:100%;
		margin:0;
		padding: 0;
	}

	
	.bgimage{
		background: url(admin.jpg);
		position: relative;
		opacity: 0.5;
		width:100%;
		height:100%;
	}
	
	
	ul{
		
		list-style-type:none;
	}
	
	.loginpart {
		position: absolute;
		width:400px;
		height:800px;
		background:#fff;
		border-radius: 2%;
		text-align: center;
		vertical-align: middle;
		top:35%;
		left:40%;
		margin: auto;
	}
	
	
	.formcontainer{
		position: relative;
		margin: auto;
		top:30%;
		display: inline-block;
	}
	
	
	
	.loginform{
		text-decoration: none;

	}
	
	.loginform ul {
		
		display: inline-block;
		list-style-type: none;
	}
	
	
	.btn {
		padding: 10px;
		background: #0A0A0A;
		color: white;
	}
	
	.btn:hover{
		background: #6C6C6C;
		transition-duration: 0.5s;
	}
	
	
	</style>


</head>

<body>


<div class="bgimage">
	
</div>




<div class="loginpart">

	<div class="formcontainer">
		

<ul>
	<li>Welcome</li>
	<li></li>
	<li><a href="addstoremanager.php"><button type="submit" class="btn" name="loginbutton">Add Store Manager</button></a>
	<a href="removestoremanager.php"><button type="submit" class="btn" name="signupbutton">Remove Store Manager</button></a></li>
	
</ul>	
	<form action="watch.php" method = "POST">
	<ul>
	
	
	
	<li><button type="submit" class="btn" name="prem_money">Premium Users and Money Earned From Them</button></li>
	<li><button type="submit" class="btn" name="demanded_product">Most Demanded Product Last Month</button></li>	
	<li><button type="submit" class="btn" name="demanded_store">Most Demanded Store</button></li>
	<li><button type="submit" class="btn" name="store_money">Store which earned the most money</button></li>
	<li><button type="submit" class="btn" name="clothing_order">Clothing Orders </button></li>
	<li><button type="submit" class="btn" name="products">Products on the market</button></li>
	<li><button type="submit" class="btn" name="product_stock">Product with largest amount of stock </button></li>
	
	
	
	

	
	</ul>
	</form>
	





		
		
	</div>




</div>





</body>
</html>
