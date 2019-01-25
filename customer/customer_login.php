<?php
@session_start();
include("includes/db.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div>
	<form action="checkout.php" method="post">
	<table width="800" align="center" bgcolor="#E6B0AA" style="padding-top: 10px;padding-bottom: 5px;">
		<tr><td><b >Enter Your Email:</b></td><td><input type="text" name="c_email" value="Enter your email address"></td></tr>
		<tr><td><b>Enter Your Password:</b></td><td><input type="password" name="c_pass" value="enter your password"></td></tr>
		<tr><td></td><td><a href="#">Forgot Password</a></td></tr>
		<tr><td></td><td><input type="submit" name="c_login" value="Login"></td></tr>
		</table>
		<a href="customer_register.php" style="text-decoration: none;"><h2 style="color: white;padding-top: 5px;padding-bottom: 2px;text-decoration: none;" align="center">Register Now</h2></a>
	</form>
</div>
</body>
</html>
<?php
if(isset($_POST['c_login']))
{
	$customer_email = $_POST['c_email'];
	$customer_pass = $_POST['c_pass'];
	$sel_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass' ";
	$run_customer = mysqli_query($con,$sel_customer);
	$chek_customer = mysqli_num_rows($run_customer);
	$get_ip = getRealIpAddr();
	$sel_cart ="select * from cart where ip_add='$get_ip'";
	$run_cart = mysqli_query($con,$sel_cart);
	$check_cart = mysqli_num_rows($run_cart);
	if($chek_customer==0){
		echo "<script>alert('sorry wrong pass or email')</script>";
	exit();
	}
	if($chek_customer == 1 AND $check_cart ==0 )
	{   

				$_SESSION['customer_email'] = $customer_email;
		echo "<script>window.open('customer/my_account.php','_self')</script>";
	}
	else
	{  		$_SESSION['customer_email'] = $customer_email;
		include('payment_options.php');
	}


	/*{
		$_SESSION['customer_email'] = $customer_email;
		echo "<script>window.open('index.php','_self')</script>";
	}
	else
	{
		echo "<script>alert('email or pass wrong')</script>";
	}*/

}
?>