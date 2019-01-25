<?php
//session_start();
include("includes/db.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<div align="center">
<h2>Payment Option</h2>
<?php
$ip = getRealIpAddr();
$get_customer = "select * from customers where customer_ip = '$ip'";
$run_customer =mysqli_query($con,$get_customer);
$chek_customer = mysqli_fetch_array($run_customer);
$customer_id = $chek_customer['customer_id'];
?>
<b> Pay with</b>&nbsp;<a href="payonline.com"><img src="images/paypal.png" height='80' width="200"></a><b>Or <h2><a style="text-decoration: none;color: green;" href="order.php?c_id=<?php echo $customer_id; ?>"> pay offline</a></h2></b>
<p>if you selects "pay offline" then chek your account</p>
</div>
</body>
</html>