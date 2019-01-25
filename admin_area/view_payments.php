<?php
if(!isset($_SESSION['email']))
{
	echo "<script >window.open('login.php','_self')</script>";

}
else
{
?><!DOCTYPE html>
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
<tr align="center"><td colspan="7"><h2>View All Payments</h2></td></tr>
	<tr align="center"><th>Payment no.</th>
	<th>InvoiceNo</th>
	<th>Amount Paid</th>
	<th>Payment Method</th>
	<th>Ref No</th>
	<th>Code</th>
	<th>Payent Date</th></tr>
	<tr></tr>
	<?php 
include('includes/db.php');
$customer ="select * from payments";
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
$x = $run[6];
$i++;

	?>
	<tr align="center"><td><?php echo $i;?></td>
	<td><?php echo $b;?></td>
	<td><?php echo $c;?></td>
        	<td><?php echo $d;?></td>
	

	<td><?php echo $e;?></td>
	<td><?php echo $l;?></td>
	<td><?php echo $x;?></td>
	</tr>
	<?php } ?>

</table>
</body>
</html>
<?php } ?>