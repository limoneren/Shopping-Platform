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






<div class="middle_side">


<?php

include("connection.php");


if(isset($_POST['demanded_product'])){

       $query = "select Product.name as name,max(quantity)
  from Contains,Defines,Includes,Orders,OrderDetails,ProductDetails,Product
  where Defines.product_detail_id = Contains.product_detail_id
  and Contains.order_details_id = Includes.order_details_id
  and Includes.order_id = Orders.order_id
  and OrderDetails.order_details_id = Includes.order_details_id
  and ProductDetails.product_detail_id = Contains.product_detail_id
  and Product.product_id = Defines.product_id
  and  YEAR(order_date) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH)
AND MONTH(order_date) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)
  group by Product.name
order by max(quantity) desc
  limit 1";
       $result = mysqli_query($conn, $query);
       
       
       echo "Most Demanded Product Last Month<br><br>";
       
       
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
						<label for='.$row['name'].'>'.$row['name'].'</label>'.
						'				    
					</li>
				</ul>
				</form>';
               
               echo "<br>";
               
           }
           
       }
    
    
    
    
} else if(isset($_POST['demanded_store'])) {
   
    
    $query = "select Store.name as name
  from Contains,Defines,Includes,Orders,OrderDetails,ProductDetails,Product, Sells,Store
  where Defines.product_detail_id = Contains.product_detail_id
  and Contains.order_details_id = Includes.order_details_id
  and Includes.order_id = Orders.order_id
  and OrderDetails.order_details_id = Includes.order_details_id
  and ProductDetails.product_detail_id = Contains.product_detail_id
  and Product.product_id = Defines.product_id
  and Sells.product_id = Product.product_id
  and Store.store_id = Sells.store_id
  group by Store.name 
  order by max(quantity) desc
  limit 1";
    $result = mysqli_query($conn, $query);
    
    
    
    echo "Most Demanded Store<br><br>";
    
    
    
    
    
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
						<label for='.$row['name'].'>'.$row['name'].'</label>'.
						'
						    
					</li>
				</ul>
				</form>';
            
            echo "<br>";
            
        }
        
    }
    
    
 
    
    
}else if(isset($_POST['store_money'])){
    
    
    
    $query = "select Store.name as name,max(sold*price*(1-discount)) as max
  from ProductDetails,Defines,Product, Sells, Store
  where ProductDetails.product_detail_id = Defines.product_detail_id
  and Defines.product_id = Product.product_id
  and Sells.product_id = Product.product_id
  and Sells.store_id = Store.store_id
  group by Store.name
  order by max(sold*price*(1-discount)) desc 
  limit 1";
    $result = mysqli_query($conn, $query);
    
    
    echo "Store which has earned the most money<br><br>";
    
    
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
						<label for='.$row['name'].'>'.$row['name'].' - '.$row['max'].'</label>'.
						'
						    
					</li>
				</ul>
				</form>';
            
            echo "<br>";
            
        }
        
    }
    
    
    
    
    
    
    
}else if(isset($_POST['product_stock'])){
    
    
    
    
    $query = "select Product.name as name, in_stock
   from Product 
   order by in_stock desc
   limit 1";
  $result = mysqli_query($conn, $query);
    
    
    echo "Product that has the largest amount of supply<br><br>";
    
    
    
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
						<label for='.$row['product_id'].'>'.$row['name'].' - '.$row['in_stock'].'</label>'.
						'
						    
					</li>
				</ul>
				</form>';
            
            echo "<br>";
            
        }
        
    }
    
    
    
    
    
    
    
    
    
    
    
}else if(isset($_POST['prem_money'])){
    
    
    
    
    
    
    $query = "select count(Customer.customer_id),sum(total_price) as total
  from Customer,Orders
  where Customer.customer_id = Orders.customer_id and
  membership_type = 'Premium'";
    $result = mysqli_query($conn, $query);
    
    
    
    echo "Premium Users and Money earned from them<br><br>";
    
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
						<label for='.$row['total'].'>'.$row['total'].'</label>'.
						'
						    
					</li>
				</ul>
				</form>';
            
            echo "<br>";
            
        }
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}else if(isset($_POST['clothing_order'])){
    
    
    
    
    
    $query = "select Product.name, quantity, order_date, Orders.total_price
  from Contains,Defines,Includes,Orders,OrderDetails,ProductDetails,Product
  where Defines.product_detail_id = Contains.product_detail_id
  and Contains.order_details_id = Includes.order_details_id
  and Includes.order_id = Orders.order_id
  and OrderDetails.order_details_id = Includes.order_details_id
  and ProductDetails.product_detail_id = Contains.product_detail_id
  and Product.product_id = Defines.product_id
  and Product.category = 'Clothing'";
    $result = mysqli_query($conn, $query);
    
    
    echo "Orders from category Clothing<br><br>";
    
    
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
						'<input type="hidden" name="product_id" value='.$row['name'].' >
						    
					</li>
				</ul>
				</form>';
            
            echo "<br>";
            
        }
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}else if(isset($_POST['money_june'])){
    
    
    
    
    
    $query = "SELECT name FROM Product ORDER BY in_stock DESC LIMIT 1";
    $result = mysqli_query($conn, $query);
    
    
    
    echo "Money Earned between June 1 and 3<br><br>";
    
    
    
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
						'<input type="hidden" name="product_id" value='.$row['name'].' >
						    
					</li>
				</ul>
				</form>';
            
            echo "<br>";
            
        }
        
    }
    
    
    
    
    
    
}else if(isset($_POST['products'])){
    
    
    
    
    
    $query = "SELECT name FROM Product";
    $result = mysqli_query($conn, $query);
    
    
    
    echo "All Products in the Market<br><br>";
    
    
    
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
						<label for='.$row['name'].'>'.$row['name'].'</label>'.
						'
						        
					</li>
				</ul>
				</form>';
            
            echo "<br>";
            
        }
        
    }
    
    
    
    
    
    
    
    
    
}

?>
	
</div>



	
	
</div>



</body>
</html>