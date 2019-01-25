<?php
include('includes/db.php');
if(isset($_GET['delete_pro']))
{
	$del_id = $_GET['delete_pro'];
	$query = "delete from products where product_id = '$del_id'";
	$get_query = mysqli_query($con,$query);
//	$run = mysqli_fetch_array($get_query);
if($get_query)
{
	echo "<script>alert('your product has deleted successfully!')</script>";
	echo "<script>window.open('index.php?view_products','_self')</script>";
}	
}
?>