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
<table width="794" align="center" bgcolor="#EB984E">
<tr align="center"><td colspan="7"><h2>View All Customers</h2></td></tr>
	<tr align="center"><th>S.NO.</th>
	<th>Name</th>
	<th>Email</th>
	<th>Image</th>
	<th>Country</th>
	<th>Delete</th></tr>
	<tr></tr>
	<?php 
include('includes/db.php');
$customer ="select * from customers";
$get = mysqli_query($con,$customer);
$i=0;
while($run = mysqli_fetch_array($get))
{

$a = $run[0];
$b = $run[1];
$c = $run[2];
$d = $run[8];
$e = $run[4]; 
$i++;

	?>
	<tr align="center"><td><?php echo $i;?></td>
	<td><?php echo $b;?></td>
	<td><?php echo $c;?></td>
	<td><img src="../customer/photos/<?php echo $d; ?>" width='60' height='60'></td>
	<td><?php echo $e;?></td>
	<td><a href="delete_customer.php?del_c=<?php echo $a;?>">Delete</a></td>
	</tr>
	<?php } ?>

</table>
</body>
</html>
<?php } ?>