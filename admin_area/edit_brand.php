
<?php
include("includes/db.php");
if(isset($_GET['edit_brand']))
{
	$p_id = $_GET['edit_brand'];
	$query = "select * from brand where brand_id = '$p_id'";
	$get_query = mysqli_query($con,$query);
	$run_query = mysqli_fetch_array($get_query);
	$ids = $run_query[0];
	$a =  $run_query[1];
	
	

}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post" action="">
<h2>Edit Brand</h2>
	<input type="text" name="insert_new_brand" value="<?php echo $a ;?>">
	<input type="submit" name="update" value="Update Band">
</form>
</body>
</html>

<?php
if(isset($_POST['update']))
{
	$update_id = $_GET['edit_brand'];
	$n = $_POST['insert_new_brand'];
	$get = "update brand set brand_title = '$n' where brand_id='$update_id '";
	$getss= mysqli_query($con,$get);
	if($getss)
	{
		echo "<script>alert('brand has updated successfully')</script>";
		echo "<script>window.open('index.php?view_brand','_self')</script>";
	}
}

?>