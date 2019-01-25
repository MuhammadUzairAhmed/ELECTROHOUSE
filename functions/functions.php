<!DOCTYPE html>
<html>
<head>
	<title></title>

	<style type="text/css">
		#images:hover
		{
			width: 200px;
			transition: 2s;


			
			
		}
		a:hover
		{
						transition: 1s;

		}
	</style>
</head>
<body>

</body>
</html>
<?php

$dab = mysqli_connect("localhost","root","","myshop");


function getRealIpAddr()
{
if(!empty($_SERVER['HTTP_CLIENT_IP']))
{
	$ip = $_SERVER['HTTP_CLIENT_IP'];

}
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

}
else 
{
	$ip = $_SERVER['REMOTE_ADDR'];
}
return $ip;
}

function getpro(){


 global $dab;

if(!isset($_GET['cat'])){
	if(!isset($_GET['brand'])){
	$products_get = "select * from products order by RAND() LIMIT 0,6";
	$run_products = mysqli_query($dab, $products_get);
	while ($row_products=mysqli_fetch_array($run_products)) {
	
    $a = $row_products['product_id'];
	$b = $row_products['product_title'];
	$e = $row_products['product_desc'];
	$f = $row_products['product_price'];
	$g = $row_products['product_img1'];	
	

echo "
<div id='single_product'>
<h3>$b</h3>
<img src='admin_area/product_images/$g' width='180' height='180'><br>
<p><b>price: $ $f</b></p>
<a href='details.php?pro_id=$a' style='float:left;color:white;background-color:black;'>Details</a>
<a href='index.php?add_cart=$a'><button style='float:right;'>Add to Cart</button></a>
</div>
";

	}
	}
}

}


function getCatPro(){
global $dab;
if(isset($_GET['cat']))
{
	$cat_id = $_GET['cat'];


   

	$get_cat_pro = "select * from products where cat_id='$cat_id'";
	$run_get_cat_pro = mysqli_query($dab, $get_cat_pro);
	$count = mysqli_num_rows($run_get_cat_pro);
	if($count == 0)
	{
		echo "<h2>No product founs in this category!</h2>";
	}
	while ($row_get_cat_pro=mysqli_fetch_array($run_get_cat_pro)) {
	
    $a = $row_get_cat_pro['product_id'];
	$b = $row_get_cat_pro['product_title'];
	$e = $row_get_cat_pro['product_desc'];
	$f = $row_get_cat_pro['product_price'];
	$g = $row_get_cat_pro['product_img1'];	
	

echo "
<div id='single_product'>
<h3>$b</h3>
<img src='admin_area/product_images/$g' width='180' height='180'><br>
<p><b>price: $ $f</b></p>
<a href='details.php?pro_id=$a' style='float:left;'>Details</a>
<a href='index.php?add_cart=$a'><button style='float:right;'>Add to Cart</button></a>
</div>
";

	}
	

}
}

function getBrandPro(){
global $dab;
if(isset($_GET['brand']))
{
	$brand_id = $_GET['brand'];


   

	$get_brand_pro = "select * from products where brand_id='$brand_id'";
	$run_get_brand_pro = mysqli_query($dab, $get_brand_pro);
	$count = mysqli_num_rows($run_get_brand_pro);
	if($count == 0)
	{
		echo "<h2>No product founs in this brand!</h2>";
	}
	while ($row_get_brand_pro=mysqli_fetch_array($run_get_brand_pro)) {
	
    $a = $row_get_brand_pro['product_id'];
	$b = $row_get_brand_pro['product_title'];
	$e = $row_get_brand_pro['product_desc'];
	$f = $row_get_brand_pro['product_price'];
	$g = $row_get_brand_pro['product_img1'];	
	

echo "
<div id='single_product'>
<h3>$b</h3>
<img src='admin_area/product_images/$g' width='180' height='180'><br>
<p><b>price: $ $f</b></p>
<a href='details.php?pro_id=$a' style='float:left;'>Details</a>
<a href='index.php?add_cart=$a'><button style='float:right;'>Add to Cart</button></a>
</div>
";

	}
	

}
}


function categories()
{
  global $dab;
	$cat_get = "select * from categories";
	$run_cats = mysqli_query($dab, $cat_get);
	while ($row_cat=mysqli_fetch_array($run_cats)) {
	$x = $row_cat['cat_id'];
	$y= $row_cat['cat_title'];
	
	echo "<li><a href='index.php?cat=$x'>$y</a></li>";
	}
}



function getBrands(){
global $dab;
$brand_get = "select * from brand";
	$run_brand = mysqli_query($dab, $brand_get);
	while ($row_cat=mysqli_fetch_array($run_brand)) {
	$x = $row_cat['brand_id'];
	$y= $row_cat['brand_title'];
	
	echo "<li><a href='index.php?brand=$x'>$y</a></li>";
	}

}




function Cart()
{
	global $dab;
	if(isset($_GET['add_cart']))
	{
		$ip_add = getRealIpAddr();
		$p_id = $_GET['add_cart'];
		$chek_pro = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
		$run_chek = mysqli_query($dab,$chek_pro);
		if(mysqli_num_rows($run_chek)>0)
		{
			echo "";
		}
		else
		{
			$q = "insert into cart (p_id,ip_add) values ('$p_id','$ip_add')";
			$run_q = mysqli_query($dab,$q);
		
echo "<script>window.open('index.php','_self')</script>";
		}
	}
}



function item()
{
	
	if(isset($_GET['add_cart']))
	{ global $dab; 
		$ip_add = getRealIpAddr();
		$get_item  = "select * from cart where ip_add='$ip_add'";
	
       $run_item =   mysqli_query($dab,$get_item );
       $count_item = mysqli_num_rows($run_item); 
	}
	else
	{
		global $dab;
		$ip_add = getRealIpAddr();
	$get_item  = "select * from cart where ip_add='$ip_add'";
	
       $run_item =   mysqli_query($dab,$get_item );
       $count_item = mysqli_num_rows($run_item); 	
	}
	echo "$count_item";

}



function total_price()
{
	global $dab; 
		$ip_add = getRealIpAddr();
		$total = 0;
		$get_price  = "select * from cart where ip_add='$ip_add'";
	
       $run_price =   mysqli_query($dab,$get_price );
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

       echo "$"."$total";
}





?>