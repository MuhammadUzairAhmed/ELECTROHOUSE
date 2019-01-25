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
<?php 
include("includes/db.php");
if(isset($_GET['view_products'])) { ?>
<table align="center" width="794" bgcolor="#EB984E">
	<tr align="center">
		<td colspan="8" style="padding-bottom: 15px;" ><h2><u>View All Products</u></h2></td>
	</tr>
	<tr>
		<th>Product Id</th>
		<th>Title</th>
		<th>Image</th>
		<th>Price</th>
		<th>Total Sold</th>
		<th>Status</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>


<?php
include("includes/db.php");

$product = "select * from products";
$i = 0;
$get_pro = mysqli_query($con,$product);
while ($row = mysqli_fetch_array($get_pro)) {
	$a = $row[0];
	$b = $row[4];
	$c = $row[5];
	$d = $row[8];
	$status = $row[11];
	$i++;


?>

<tr align="center">
	<td ><?php echo $i ;?></td>
		<td ><?php echo $b ;?></td>
			<td><img src="product_images/<?php echo $c ;?>" width='60' height = '60'></td>
		<td><?php echo $d ;?></td>
		<td><?php
$order = "select * from pending_orders where product_id = '$a'";
$get_orders = mysqli_query($con,$order);
$count = mysqli_num_rows($get_orders);
echo $count;
		?></td>
		<td>
			<?php echo $status; ?>

		</td>
		<td><a href="index.php?edit_pro=<?php echo $a;?>">Edit</a></td>
		<td><a href="index.php?delete_pro=<?php echo $a;?>">Delete</a></td>
</tr>
<?php } ?>
</table>
<?php }
 ?>


</body>
</html>

<?php }?>