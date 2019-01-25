<?php
@session_start();
include("includes/db.php");

if(isset($_GET['edit_account']))
{
	$customer_email = $_SESSION['customer_email'];
	$get_customer = "select * from customers where customer_email='$customer_email'";
	$run_customer = mysqli_query($con,$get_customer);
	$row_customer = mysqli_fetch_array($run_customer);


$customer_id =  $row_customer['customer_id'];
$c_name = $row_customer[1];
		$c_email = $row_customer[2];
			$c_pass = $row_customer[3];
				$c_country = $row_customer[4];
					$c_city = $row_customer[5];
						$c_contact = $row_customer[6];
							$c_address = $row_customer[7];
							$image = $row_customer[8];


}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="edit_account.php" method='POST' enctype="multipart/form-data">
	<table width="750" align="center">
		
		<tr><td></td><td><h2 style="padding-bottom: 16px;padding-top: 15px;color: yellow">Update Your Account</h2></td></tr>
		<tr><td align="right"><b>Customer Name :</b></td>
		     <td><input type="text" name="c_name" value="<?php echo $c_name ;?>"></td></tr>

		     		<tr><td align="right"><b>Customer email :</b></td>
		     <td><input type="text" name="c_email" value="<?php echo $c_email ;?>"></td></tr>

		     		<tr><td align="right"><b>Customer Password :</b></td>
		     <td><input type="password" name="c_pass" value="<?php echo $c_pass ;?>"></td></tr>

		     		<tr><td align="right"><b>Customer country :</b></td>
		     <td><select name="c_country" disabled >
		     	<option value="<?php echo $c_country ;?>"><?php echo $c_country ;?></option>
		     	<option>china</option>
		     	<option>japan</option>
		     	<option>london</option>
		     	<option>pakistan</option>
		     	<option>afghanistan</option>
		     	<option>USA</option>
		     </select></td></tr>

		     		<tr><td align="right"><b>Customer city :</b></td>
		     <td><input type="text" name="c_city" value="<?php echo $c_city ;?>"></td></tr>


		     		<tr><td align="right"><b>Customer contact no. :</b></td>
		     <td><input type="text" name="c_contact" value="<?php echo $c_contact ;?>"></td></tr>

		     		<tr><td align="right"><b>Customer address :</b></td>
		     <td><input type="text" name="c_address" value="<?php echo $c_address ;?>"></td></tr>

		     		<tr><td align="right"><b>Customer picture :</b></td>
		     <td><input type="file" name="customer_image" size="60"><img src="photos/<?php echo $image ;?> " height='50'></td></tr>
		     <tr><td></td><td><input type="submit" name="update_account" value="Update"></td></tr>
	</table>
</form>
</body>
</html>

<?php

if(isset($_POST['update_account']))
{
$customer_email = $_SESSION['customer_email'];
	$get_customer = "select * from customers where customer_email='$customer_email'";
	$run_customer = mysqli_query($con,$get_customer);
	$row_customer = mysqli_fetch_array($run_customer);


$customer_id =  $row_customer['customer_id'];
$update = $customer_id;
$c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
			$c_pass = $_POST['c_pass'];
				//$c_country = $_POST['c_country'];
					$c_city = $_POST['c_city'];
						$c_contact = $_POST['c_contact'];
							$c_address = $_POST['c_address'];
							$image = $_FILES['customer_image']['name'];
							$image_tmp = $_FILES['customer_image']['tmp_name'];
							move_uploaded_file($image_tmp, "photos/$image");
								
$update_customer = "update customers set customer_name = '$c_name',customer_email='$c_email' , customer_pass='$c_pass',customer_city = '$c_city',customer_contact = '$c_contact',customer_address = '$c_address',customer_image='$image' where customer_id='$update'" ;

$run_c = mysqli_query($con,$update_customer);
if($run_c)
{
	echo "<script>alert('Your account has been updated')</script>";
	echo "<script>window.open('my_account.php','_self')</script>";
}



}


?>