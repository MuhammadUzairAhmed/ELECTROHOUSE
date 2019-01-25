
<?php
include("includes/db.php");
if(isset($_GET['edit_cat']))
{
	$p_id = $_GET['edit_cat'];
	$query = "select * from categories where cat_id = '$p_id'";
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
<h2>Edit category</h2>
	<input type="text" name="insert_new_cat" value="<?php echo $a ;?>">
	<input type="submit" name="update" value="Update Category">
</form>
</body>
</html>

<?php
if(isset($_POST['update']))
{
	$update_id = $_GET['edit_cat'];
	$n = $_POST['insert_new_cat'];
	$get = "update categories set cat_title = '$n' where cat_id='$update_id '";
	$getss= mysqli_query($con,$get);
	if($getss)
	{
		echo "<script>alert('category has updated successfully')</script>";
		echo "<script>window.open('index.php?view_cat','_self')</script>";
	}
}

?>