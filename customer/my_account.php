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
		background-color: black;	color: white;
	clear: both;

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
			<li><a href="../all_products.php">All Products</a></li>
			<?php
if(!isset($_SESSION['customer_email'])){
			?>
			<li><a href="../customer_register.php">Sign Up</a></li>
			<?php }?>
			<li><a href="../cart.php">Shopping Cart</a></li>
			<li><a href="../contact.php">Contact Us</a></li>

		</ul>
		<div id="form">
			<form method="get" action="results.php">
				<input type="text" name="search_a_product" placeholder="search a Products">
				<input type="submit" name="search" value="search">
			</form>
		</div>
	</div>
	<div class="content_wrapper">
		<div class="left_sidebar" style="float: right;height: auto;">
	 		
       <div id="sidebar_title"><center>Manage Account</center></div>
<ul id="cats">
<?php
$user_session = $_SESSION['customer_email'];
$get_customer_pic = "select * from customers where customer_email='$user_session'";
$run_customer = mysqli_query($con,$get_customer_pic);
$row_customer = mysqli_fetch_array($run_customer);

     $customer_pic = $row_customer[8];

echo "<img src='photos/$customer_pic' width='130' height='130'><br><b><a href='change_pic.php'>Change Picture</a></b>"; 
?>
	<li><a href="my_account.php?my_orders">My Orders</a></li>
		<li><a href="my_account.php?edit_account">Edit Account</a></li>
			<li><a href="my_account.php?change_pass">Edit Password</a></li>
				<li><a href="my_account.php?delete_account">Delete Account</a></li>
					<li><a href="logout.php">Logout</a></li>
</ul>
	
		</div>
		<div class="right_content" style="float: left;">
<?php Cart();?>			
			<div id="headings">
<div id="heading_content">
<?php	
if(!isset($_SESSION['customer_email'])){
	echo "<b>Welcome Guest";
}
else
{
	echo "<b>Welcome ".$_SESSION['customer_email']."</b>";
}

?>
	
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

<div id="products_box">
<h2>Manage Your Account Here</h2>

<?php if(isset($_GET['my_orders']))

{
	include('my_orders.php');
	}
	if(isset($_GET['edit_account']))
	{
		include('edit_account.php');
	}
	if(isset($_GET['change_pass']))
	{
		include('change_pass.php');
	}
	else
{
	getDefault();
}
	 ?>
</div>

		</div>
		</div>
		
		
			<div class="footer" style="color: white;padding-top: 30px;text-align: center;"><h2>&copy; - By www.uzair.com</h2></div>

</div>

</body>
</html>