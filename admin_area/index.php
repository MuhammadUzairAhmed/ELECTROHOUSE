<?php
session_start();
if(!isset($_SESSION['email']))
{
	echo "<script >window.open('login.php','_self')</script>";

}
else
{




?><!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<link rel="stylesheet" type="text/css" href="styles/style.css" media="all">
</head>
<body>
<div class="main_wrapper">
	
	<div class="header_wrapper" ><img src="1.png" style="width: 1000px;height: 100px;"></div>
	<div class="left">

<?php

	include('includes/db.php');
if(isset($_GET['insert_products']))
{

	include('insert_product.php');
}
if(isset($_GET['view_products']))
{
	include('view_products.php');
}
if(isset($_GET['edit_pro']))
{
	include('edit_pro.php');
}
if(isset($_GET['delete_pro']))
{
	include('delete_pro.php');
}
if(isset($_GET['insert_cat']))
{
	include('insert_cat.php');
}
if(isset($_GET['view_cat']))
{
	include('view_cat.php');
}
if(isset($_GET['delete_cat']))
{
	include('delete_cat.php');
}
if(isset($_GET['edit_cat']))
{
	include('edit_cat.php');
}
if(isset($_GET['insert_brand']))
{
	include('insert_brand.php');
}
if(isset($_GET['view_brand']))
{
	include('view_brand.php');
}
if(isset($_GET['edit_brand']))
{
	include('edit_brand.php');
}
if(isset($_GET['delete_brand']))
{
	include('delete_brand.php');
}
if(isset($_GET['view_custoemr']))
{
	include('view_customers.php');
}
if(isset($_GET['del_c']))
{
	include('delete_customer.php');
}
if(isset($_GET['view_order']))
{
	include('view_order.php');
}
if(isset($_GET['del_order']))
{
	include('delete_order.php');
}
if(isset($_GET['view_payment']))
{
	include('view_payments.php');
}
if(isset($_GET['admin_logout']))
{
	include('logout.php');
}
?>
	</div>
	<div class="right">
	<h2 ><center><u>Manage Content</u></center></h2>
<a href="index.php?insert_products">Insert New Products</a>
<a href="index.php?view_products">View Products</a>
<a href="index.php?insert_cat">Insert New Categoriess</a>
<a href="index.php?view_cat">View Categories</a>
<a href="index.php?insert_brand">Insert New Brand</a>
<a href="index.php?view_brand">View Brand</a>
<a href="index.php?view_custoemr">View Customers</a>
<a href="index.php?view_order">View Orders</a>
<a href="index.php?view_payment">View Payments</a>
<a href="index.php?admin_logout">Logout</a>
	</div>
</div>
</body>
</html>


<?php } ?>