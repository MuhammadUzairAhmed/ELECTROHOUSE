<?php
include('includes/db.php');
if(isset($_GET['delete_brand']))
{
	$del_id = $_GET['delete_brand'];
	$query = "delete from brand where brand_id = '$del_id'";
	$get_query = mysqli_query($con,$query);
//	$run = mysqli_fetch_array($get_query);
if($get_query)
{
	echo "<script>alert('your brand has deleted successfully!')</script>";
	echo "<script>window.open('index.php?view_brand','_self')</script>";
}	
}
?>