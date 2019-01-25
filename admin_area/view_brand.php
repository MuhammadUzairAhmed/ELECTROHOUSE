
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
	<style type="text/css">
		th,tr {border: 3px groove #000;}
		table {border: 2px solid black;}
	</style>
</head>
<body>
<form>
	
	<table width="794" align="center" bgcolor="#EB984E">
	<tr align="center" ><td colspan='9'><h2 ><u>View All brand</u></h2></td></tr>
		<tr><th>Brand ID</th>
		<th>Brand Title</th>
		<th>Edit</th>
		<th>Delete</th></tr>
		<?php
include('includes/db.php');
$get_cats = "select * from brand";
$run = mysqli_query($con,$get_cats);
while ($row = mysqli_fetch_array($run)) {
	
$a = $row[0];
$b = $row[1];
		?>
		<tr align="center">
			<td><?php echo $a; ?></td>
						<td><?php echo $b; ?></td>
						<td><a href="index.php?edit_brand=<?php echo $a; ?>">Edit</a></td>
						<td><a href="index.php?delete_brand=<?php echo $a; ?>">Delete</a></td>
		</tr>
		<?php } ?>
	</table>
</form>
</body>
</html>

<?php } ?>