<?php
include('includes/db.php');
if(isset($_GET['del_order']))
{
	$del_id = $_GET['del_order'];
	$query = "delete from pending_orders where order_id = '$del_id'";
	$get_query = mysqli_query($con,$query);
//	$run = mysqli_fetch_array($get_query);
if($get_query)
{
	echo "<script>alert('your order has deleted successfully!')</script>";
	echo "<script>window.open('index.php?view_order','_self')</script>";
}	
}
?>