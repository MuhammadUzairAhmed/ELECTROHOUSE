<?php
if(!isset($_SESSION['email']))
{
	echo "<script >window.open('login.php','_self')</script>";

}
else
{
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post" action="">
	<input type="text" name="insert_new_cat">
	<input type="submit" name="insert" value="Inset New Category">
</form>
</body>
</html>
<?php
include('includes/db.php');
if(isset($_POST['insert']))
{
	$title = $_POST['insert_new_cat'];
	$cat = "insert into categories (cat_title) values ('$title') ";
	$run = mysqli_query($con,$cat);
	if($run)
	{
		echo "<script>alert('category has inserted successfully')</script>";
		echo "<script>window.open('index.php?insert_cat','_self')</script>";
	}
}
?>

<?php } ?>