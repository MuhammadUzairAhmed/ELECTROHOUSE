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
<form method="POST" action="">
<table width="500" align="center">
	<tr><td colspan="4"><h2>Change Your Password</h2></td></tr>

<tr><td align="right">Enter current password</td>
<td><input type="password" name="old_pass"></td></tr>
<tr><td align="right">Enter new password</td>
<td><input type="password" name="new_pass"></td></tr>

<tr><td align="right">Enter new password again</td>
<td><input type="password" name="new_pass_again"></td></tr>
<tr><td align="right"></td>
<td><input type="submit" name="change_pass" value="Change Pssword"></td></tr>
</table>
</form>
</body>
</html>

<?php

if(isset($_POST['change_pass']))
{
$customer_email = $_SESSION['customer_email'];
	$get_customer = "select * from customers where customer_email='$customer_email'";
	$run_customer = mysqli_query($con,$get_customer);
	$row_customer = mysqli_fetch_array($run_customer);


$customer_id =  $row_customer['customer_id'];
$update = $customer_id;
			$old_pass = $_POST['old_pass'];
			$new_pass = $_POST['new_pass'];
			$new_pass_again = $_POST['new_pass_again'];
$customer = "select * from customers where customer_pass='$old_pass'";
$runcustomer = mysqli_query($con,$customer);
	$rowcustomer = mysqli_fetch_array($runcustomer);
if(mysqli_num_rows($runcustomer)==0)
{
	echo "<script>alert('your password is invalid')</script>";
	exit();
}
if($new_pass!=$new_pass_again)
{
echo "<script>alert('your password did not match')</script>";
	exit();	
}
else
{
	$update_pass = "update customers set customer_pass='$new_pass' where customer_id='$update'";
	$run_pass = mysqli_query($con,$update_pass);
	echo "<script>alert('your password successfully changed')</script>";
	echo "<sccript>window.open('my_account.php','_self')</script>";
}

}


?>