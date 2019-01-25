<?php
include('includes/db.php');
if(isset($_GET['delete_cat']))
{
	$del_id = $_GET['delete_cat'];
	$query = "delete from categories where cat_id = '$del_id'";
	$get_query = mysqli_query($con,$query);
//	$run = mysqli_fetch_array($get_query);
if($get_query)
{
	echo "<script>alert('your category has deleted successfully!')</script>";
	echo "<script>window.open('index.php?view_cat','_self')</script>";
}	
}
?>