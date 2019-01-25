
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
<tr align="center"><td colspan="7"><h2>View All Orders</h2></td></tr>
	<tr align="center"><th>Order no.</th>
	<th>Customer</th>
	<th>InvoiceNo</th>
	<th>Product Id</th>
	<th>Qty</th>
	<th>Status</th>
	<th>Delete</th></tr>
	<tr></tr>
	<?php 
include('includes/db.php');
$customer ="select * from pending_orders";
$get = mysqli_query($con,$customer);
$i=0;
while($run = mysqli_fetch_array($get))
{

$a = $run[0];
$b = $run[1];
$c = $run[2];
$d = $run[3];
$e = $run[4];
$l = $run[5]; 
$i++;

	?>
	<tr align="center"><td><?php echo $i;?></td>
	<td><?php $gh = "select * from customers where customer_id='$b'";
   $kjh = mysqli_query($con,$gh);
   $gas = mysqli_fetch_array($kjh);
   $email = $gas['customer_email'];
   echo $email;  



	?></td>
	<td><?php echo $c;?></td>
	<td><?php echo $d;?></td>
	<td><?php echo $e;?></td>
	<td><?php 

if ($l == 'pending') {
	echo $l = 'pending';
}
if($l == 'complete')
{
	echo $l =  'complete';
}


	?></td>
	<td><a href="delete_order.php?del_order=<?php echo $a;?>">Delete</a></td>
	</tr>
	<?php } ?>

</table>
</body>
</html>
<?php } ?>