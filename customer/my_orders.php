<?php

include("includes/db.php");


$c = $_SESSION['customer_email'];
$get_customer_pic = "select * from customers where customer_email='$c'";
$run_customer = mysqli_query($con,$get_customer_pic);
$row_customer = mysqli_fetch_array($run_customer);
$customer_id = $row_customer['customer_id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table width="750" align="center">
	<tr>
		<th>Order no</th>
		<th>Due amount</th>
		<th>Invoice no</th>
		<th>Tortal products</th>
		<th>Order date</th>
		<th>Paid/Unpaid</th>
		<th>Status</th>
	</tr>
	<?php
$get_orders ="select * from customer_orders where customer_id='$customer_id'";
$run_orders = mysqli_query($con,$get_orders);
$i=0;
echo "<h2>All Order Details </h2>";
while ($row_orders = mysqli_fetch_array($run_orders)) {

	$order_id = $row_orders['order_id'];
		$due_amount = $row_orders['due_amount'];
			$invoice_no = $row_orders['invoice_no'];
				$products = $row_orders['total_products'];
					$date = $row_orders['order_date'];
						$status = $row_orders['order_status']; 
						$i++;
						if($status == 'pending')
						{
							$status = 'unpaid';
						}
						else
						{
							$status='paid';
						}
						echo "

<tr align='center'>
<td>$i</td>
<td>$due_amount</td>
<td>$invoice_no</td>
<td>$products</td>
<td>$date</td>
<td>$status</td>
<td><a href='confirm.php?order_id=$order_id'>confirm if paid</a></td>

</tr>

						";
}
   ?>
</table>
</body>
</html>