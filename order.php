<?php
include("includes/db.php");
include("functions/functions.php");



if(isset($_GET['c_id']))
{
	$customer_id = $_GET['c_id'];
}


		$ip_add = getRealIpAddr();
		$total = 0;
		$get_price  = "select * from cart where ip_add='$ip_add'";
	
       $run_price =   mysqli_query($dab,$get_price );
       $status = 'pending';
       $invoice_no = mt_rand();
       $count_pro = mysqli_num_rows($run_price);
       while ($record = mysqli_fetch_array($run_price)) {
       	$pro_id = $record['p_id'];

       	$pro_price = "select * from products where product_id='$pro_id'";
        $run_pro_price =   mysqli_query($dab,$pro_price );
        while ( $p_price= mysqli_fetch_array($run_pro_price)) {

        	$product_price = array($p_price['product_price']);
        	$value = array_sum($product_price);
        	$total +=$value; 
        }
       }
$get_cart = "select * from cart ";
$run_cart = mysqli_query($con,$get_cart);
$get_qty = mysqli_fetch_array($run_cart);
$qty = $get_qty['qty'];
if($qty == 0)
{
	$qty =1;
	$subtotal = $total;
}
else
{
	$qty = $qty ;
	$subtotal = $total*$qty;

}
 $insert_order = "insert into customer_orders (customer_id,due_amount,invoice_no,total_products,order_date,order_status) values ('$customer_id','$subtotal','$invoice_no','$count_pro',NOW(),'$status')";

$run_orders = mysqli_query($con,$insert_order);

	echo "<script>alert('order successfully submitted thanks')</script>";
	echo "<script>window.open('customer/my_account.php','_self')</script>";



	$insert_pending = "insert into pending_orders (customer_id,invoice_no,product_id,qty,order_status) values ('$customer_id','$invoice_no','$pro_id','$qty','$status')";
	$run_order_pending = mysqli_query($con,$insert_pending);
	$empty_cart = "delete from cart where ip_add = '$ip_add'";
	$run_empty = mysqli_query($con,$empty_cart);
?>
