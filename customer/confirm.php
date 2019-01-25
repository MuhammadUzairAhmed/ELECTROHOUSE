<?php
session_start();
include("includes/db.php");
if(isset($_GET['order_id']))
{
	$order_id = $_GET['order_id']; 
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="confirm.php?update_id=<?php echo $order_id; ?>" method="post">
<table width="500" align="center" border="2" bgcolor="#CCCCCC">
	<tr><td colspan="2" align="center"><h2>Please confirm your payment</h2></td></tr>
	<tr><td>Invoice no.</td>
	<td><input type="text" name="invoice_no"></td></tr>

<tr><td>Amount sent</td>
	<td><input type="text" name="amount"></td></tr>
	<tr><td>Select payment method</td>
	<td><select name="payment_method">
		
		<option>select payment</option>
		<option>bank transfer</option>
		<option>easy paisa/ubl omni</option>
		<option>paypal</option>
	</select></td></tr>

	<tr><td>Transaction Reference ID</td>
	<td><input type="text" name="tr"></td></tr>
<tr><td>Easy Paisa/UBLomni code</td>
	<td><input type="text" name="code"></td></tr>
	<tr>

	<tr><td>Date</td>
	<td><input type="text" name="date"></td></tr>
	<tr>
	<td>click to confirm</td>
	<td colspan="2"><input type="submit" name="confirm" value="confirm payment"></td></tr>
</table>
</form>
</body>
</html>
<?php
if(isset($_POST['confirm']))
{

$update_id = $_GET['update_id'];
$invoice = $_POST['invoice_no'];
$amount = $_POST['amount'];
$payment_method = $_POST['payment_method'];
$ref_no = $_POST['tr'];
$code = $_POST['code'];
$date = $_POST['date'];
$complete = 'complete';
$insert_payments = "insert into payments (invoice_no,amount,payment_mode,ref_no,code,payment_date) values ('$invoice','$amount','$payment_method','$ref_no','$code','$date')";


$run_payment = mysqli_query($con,$insert_payments);


if($run_payment)
{

echo "<h2 style='text-align:center;color:black;'>Payment recieved,your orders will be completed within 24 hours</h2>";

echo "<h3><a style='color:green;text-decoration:none;' align='center' href='my_account.php'>Back To Account</a></h3>";
}

$update_orders = "update customer_orders set order_status = '$complete' where order_id ='$update_id'";

$run_orders = mysqli_query($con,$update_orders);

$update_customers = "update pending_orders set order_status = '$complete' where order_id ='$update_id'";

$run_customers = mysqli_query($con,$update_customers);






}
?>