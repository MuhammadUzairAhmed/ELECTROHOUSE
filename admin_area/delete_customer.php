<?php
include('includes/db.php');
if(isset($_GET['del_c']))
{
	$del_id = $_GET['del_c'];
	$query = "delete from customers where customer_id = '$del_id'";
	$get_query = mysqli_query($con,$query);
//	$run = mysqli_fetch_array($get_query);
if($get_query)
{
	echo "<script>alert('This customer has deleted successfully!')</script>";
	echo "<script>window.open('index.php?view_custoemr','_self')</script>";
}	
}
?>