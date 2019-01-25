<?php
session_start();
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
<?php Cart();?>			
			<div id="headings">
<div id="heading_content">
	<b>Welcom Guest! </b><b style="color: yellow;">Shopping Cart</b>
	<span>- Items: <?php item();?> - Price: <?php total_price();?> - <a href="index.php" style="color: yellow;text-decoration: none;"><strong>Back To Shop</strong></a>
<?php
	if(!isset($_SESSION['customer_email'])){
		echo "<a href='checkout.php' style='color: red;text-decoration: none;'>login</a>";
	}
	else
	{
		echo "<a href='logout.php' style='color: red;text-decoration: none;'>Logout</a>";
	}
	?>
	</span>
</div>
			</div>
<br><br>
<div id="products_box">

<form action="cart.php" method="post">
	<table width="750" align="center" bgcolor="#7B241C">
	<tr align="center">
		<br><td><b><u>Remove</u></b><br><br><br></td>
		<td><b><u>Products(s)</u></b><br><br><br></td>
		<td><b><u>Quantity</u></b><br><br><br></td>
		<td><b><u>Total Price</u></b><br><br><br></td>
	
	</tr>

	<?php
    $ip_add = getRealIpAddr();
		$total = 0;
		$get_price  = "select * from cart where ip_add='$ip_add'";
	
       $run_price =   mysqli_query($con,$get_price );
       while ($record = mysqli_fetch_array($run_price)) {
       	$pro_id = $record['p_id'];

       	$pro_price = "select * from products where product_id='$pro_id'";
        $run_pro_price =   mysqli_query($con,$pro_price );
        while ( $p_price= mysqli_fetch_array($run_pro_price)) {

        	$product_price = array($p_price['product_price']);
        	$pro_title = $p_price['product_title'];
        	$pro_img = $p_price['product_img1'];
        	$value = array_sum($product_price);
        	$total +=$value; 
        	$only_price = $p_price['product_price'];
        

       
	?>
		<tr>
			<td><input type="checkbox" name="remove[]" value='<?php echo "$pro_id";?>' /></td>
			<td><?php echo $pro_title; ?><br><img src="admin_area/product_images/<?php echo $pro_img; ?>" height='80' width='80' style='border:2px solid black;' ></td>
			<td><input type="text" name="qty" value="1" size="3"></td>
			<?php 
            if(isset($_POST['update']))
            {
            	$qty = $_POST['qty'];
            	$insert = "update cart set qty='$qty' where ip_add='$ip_add'";
            	$run_insert = mysqli_query($con,$insert);
            	$total = $total * $qty;
            }
			?>
			<td>$ <?php echo $only_price; ?></td>
		</tr>
		<?php }} ?>
		<tr>
			<td colspan="3" align="right"><b>SubTotal: </b></td>
			<td><b><u>$ <?php echo $total; ?></u></b></td>
		</tr>
		<tr>
			<td><input type="submit" name="update" value="update"></td>
			<td><input type="submit" name="continue" value="continue shopping"></td>
			<td><button><a href="checkout.php" style="text-decoration: none;color: black;">CheckOut</a></button></td>
		</tr>
	</table>

</form>
<?php
function updatecart(){
global $con;
if(isset($_POST['update']))
{
	foreach ($_POST['remove'] as $removeid) {
		$delete_pro = "delete from cart where p_id='$removeid'";
		$run_del = mysqli_query($con,$delete_pro);
		if($run_del)
		{
			echo "<script>window.open('cart.php','_self')</script>";
		}
	}
}
if(isset($_POST['continue']))
{
	echo "<script>window.open('index.php','_self')</script>";
}
}
echo @$upcart = updatecart();
?>
</div>

		</div>
		</div>
		
		
			<div class="footer" style="color: white;padding-top: 30px;text-align: center;"><h2>&copy; - By www.uzair.com</h2></div>

</div>

</body>
</html>