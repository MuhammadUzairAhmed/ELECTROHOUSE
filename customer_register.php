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
	<span>- Items: <?php item();?> - Price: <?php total_price();?> - <a href="cart.php" style="color: yellow;text-decoration: none;"><strong>Go To Cart</strong></a>
	<?php
	if(!isset($_SESSION['customer_email'])){
		echo "<a href='checkout.php' style='color: red;text-decoration: none;'>not loggedIn</a>";
	}
	else
	{
		echo "<a href='logout.php' style='color: red;text-decoration: none;'>Logout</a>";
	}
	?>
	</span>
</div>
			</div>

<div >
<form action="customer_register.php" method='POST' enctype="multipart/form-data">
	<table width="750" align="center">
		
		<tr><td></td><td><h2 style="padding-bottom: 16px;padding-top: 15px;color: yellow">Create An Account</h2></td></tr>
		<tr><td align="right"><b>Customer Name :</b></td>
		     <td><input type="text" name="c_name" required="Please enter your name"></td></tr>

		     		<tr><td align="right"><b>Customer email :</b></td>
		     <td><input type="text" name="c_email" required="Please enter your email"></td></tr>

		     		<tr><td align="right"><b>Customer Password :</b></td>
		     <td><input type="password" name="c_pass" required="Please enter your password"></td></tr>

		     		<tr><td align="right"><b>Customer country :</b></td>
		     <td><select name="c_country" required="Please enter your country">
		     	<option>select country</option>
		     	<option>china</option>
		     	<option>japan</option>
		     	<option>london</option>
		     	<option>pakistan</option>
		     	<option>afghanistan</option>
		     	<option>USA</option>
		     </select></td></tr>

		     		<tr><td align="right"><b>Customer city :</b></td>
		     <td><input type="text" name="c_city" required="Please enter your city"></td></tr>


		     		<tr><td align="right"><b>Customer contact no. :</b></td>
		     <td><input type="text" name="c_contact" required="Please enter your contact number"></td></tr>

		     		<tr><td align="right"><b>Customer address :</b></td>
		     <td><input type="text" name="c_address" required="Please enter your address"></td></tr>

		     		<tr><td align="right"><b>Customer picture :</b></td>
		     <td><input type="file" name="c_image" ></td></tr>
		     <tr><td></td><td><input type="submit" name="register" value="submit"></td></tr>
	</table>
</form>
</div>

		</div>
		</div>
		
		
			
<div class="footer" style="color: white;padding-top: 30px;text-align: center;"><h2>&copy; - By www.uzair.com</h2></div>

</div>

</body>
</html>

<?php
if(isset($_POST['register']))
{
	$c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
			$c_pass = $_POST['c_pass'];
				$c_country = $_POST['c_country'];
					$c_city = $_POST['c_city'];
						$c_contact = $_POST['c_contact'];
							$c_address = $_POST['c_address'];
								$img1 = $_FILES['c_image']['name'];
									$c_image_tmp = $_FILES['c_image']['tmp_name'];
                                       $c_ip = getRealIpAddr();
                                       
                                       move_uploaded_file($c_image_tmp, "customer/photos/$img1");

	$incsert = "insert into customers(customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip) values ('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$img1','$c_ip')";	
	$run_customer = mysqli_query($con,$incsert);

$sel_cart ="select * from cart where ip_add='$c_ip'";
	$run_cart = mysqli_query($con,$sel_cart);
	$check_cart = mysqli_num_rows($run_cart);
	if($check_cart==1)
	{
		$_SESSION['customer_email'] = $c_email;
		echo "<script>alert('your account created successfully')</script>";
		echo "<script>window.open('checkout.php','_self')</script>";
	}							
	else
	{   
		$_SESSION['customer_email'] = $c_email;
		echo "<script>alert('your account created successfully')</script>";
				echo "<script>window.open('index.php','_self')</script>";
	}
}
?>