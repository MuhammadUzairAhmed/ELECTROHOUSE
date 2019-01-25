<?php
include("includes/db.php");
include("functions/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>My Shop</title>
	<link rel="stylesheet" type="text/css" href="styles/style.css">
<style>
	body {
    background: url('bc.jpg');
    background-repeat: no-repeat;
    background-position: center center;
    background-attachment: fixed;
    -webkit-background-size: cover;
}

	.header_wrapper
{
	width: 1000px;
	height: 100px;
		background-color: transparent; /* white type color */
}
#navbar
{
	width: 1000px;
	height: 50px;
	background-color: black;
	color: white;
}

.left_sidebar
{
width: 200px;
height: 595px;
background-color: #21618C;
float: left;
opacity: 0.7;
}
#cats a
{
	color: white;
	font-size: 20px;
	text-decoration: none;
	margin: 5px;
	padding: 10px;
}
#cats a:hover
{
	text-decoration: underline;
	color: white;
	background-color: #BB8FCE;
}
.footer
{
	width: 1000px;
	height: 100px;
		background-color: #4A235A;s	color: #FFF;
	clear: both;
opacity: 0.9;
}
#sidebar_title
{
	
	background-color: #212F3C;
	color: white;
	padding-top : 10px;
	padding-left: 15px;
	font-size: 20px;
	font-family: arial;
}
.right_content
{
	width: 800px;
	
	background-color: #17202A;
	float: right;
	color: white;
opacity: 0.7;
	}
	#menu a:hover
{
	text-decoration: underline;
	font-weight: bolder;
	background-color: #BB8FCE;
	color:white;
}

	</style>
	</head>
<body>

<!-- main container -->
<div class="main_wrapper">


    <!--header starts-->
	<div class="header_wrapper">
		
	</div>
	<!-- header end -->
	
	<div id="navbar" >
		<ul id="menu">
			<li><a href="index.php">Home</a></li>
			<li><a href="all_products.php">All Products</a></li>
			<li><a href="customer_register.php">Sign Up</a></li>
			<li><a href="cart.php">Shopping Cart</a></li>
			<li><a href="contact.php">Contact Us</a></li>

		</ul>
		<div id="form">
			<form method="get" action="results.php">
				<input type="text" name="search_a_product" placeholder="search a Products">
				<input type="submit" name="search" value="search">
			</form>
		</div>
	</div>
	<div class="content_wrapper">
		<div class="left_sidebar">
	 		
       <div id="sidebar_title"><center>Categories</center></div>
<ul id="cats">
	<?php
	categories();
	?>
</ul>
<div id="sidebar_title"><center>Brands</center></div>
<ul id="cats">
	<?php
	getBrands();
	?>
	
</ul>
		</div>
		<div class="right_content">
			
			<div id="headings">
<div id="heading_content">
	<b>Welcom Guest! </b><b style="color: yellow;">Shopping Cart</b>
	<span>- Items: - Price:</span>
</div>
			</div>

<div id="products_box">
<?php 


$products_get = "select * from products";
	$run_products = mysqli_query($con, $products_get);
	while ($row_products=mysqli_fetch_array($run_products)) {
	
    $a = $row_products['product_id'];
	$b = $row_products['product_title'];
	$e = $row_products['product_desc'];
	$f = $row_products['product_price'];
	$g = $row_products['product_img1'];	
	

echo "
<div id='single_product'>
<h3>$b</h3>
<img src='admin_area/product_images/$g' width='180' height='180'><br>
<p><b>price: $ $f</b></p>
<a href='details.php?pro_id=$a' style='float:left;'>Details</a>
<a href='index.php?add_cart=$a'><button style='float:right;'>Add to Cart</button></a>
</div>
";

	}
	

       ?>
</div>

		</div>
		</div>
		
		
			<div class="footer" style="color: white;padding-top: 30px;text-align: center;"><h2>&copy; - By www.uzair.com</h2></div>

</div>

</body>
</html>