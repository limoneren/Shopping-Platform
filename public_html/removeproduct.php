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
		background: url(shopping.jpg);
		position: relative;
		opacity: 0.5;
		width:100%;
		height:100%;
	}
	
	
	
	.signuppart {
		position: absolute;
		width:300px;
		height:350px;
		background:#fff;
		border-radius: 5%;
		text-align: center;
		vertical-align: middle;
		top:5%;
		left:40%;
		margin: auto;
	}
	
	
	.formcontainer{
		position: relative;
		margin: auto;
		top:10%;
		display: inline-block;
	}
	
	
	
	.signupform{
		text-decoration: none;

	}
	
	.signupform ul {
		
		display: inline-block;
		list-style-type: none;
	}
	
	
	
	</style>


</head>

<body>


<div class="bgimage">
	
</div>




<div class="signuppart">

	<div class=formcontainer>
		
		<form class="signupform" action="removeproductaction.php" method="post">

<ul>
	
	<li><input type="productid" name="productid" placeholder="Product ID" required="required" /></li>

	
	<li>
	
	<button type="submit" class="btn btn-primary btn-block btn-large" name="signupbutton">Remove Product</button>
	
	</li>
	
	
	
</ul>



</form>


		
		
	</div>




</div>





</body>
</html>
