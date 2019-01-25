

<?php
include("includes/db.php")
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>
<form method="post" action="insert_product.php" enctype="multipart/form-data">

<table bgcolor="#EB984E"  width="794" align="center" border="1">
	<tr>
		<td colspan="2"><h2 align="center"  >Insert New Product</h2></td>
	</tr>

	<tr>
	<td><b>Product Title</b></td>
	<td><input type="text"  name="product_title" size="50" ></td>	
	</tr>
	<tr>
	<td><b>Product Categories</b></td>
	<td>
<select name="product_cat">
	<option>Select A Category</option>
	<?php
	$cat_get = "select * from categories";
	$run_cats = mysqli_query($con, $cat_get);
	while ($row_cat=mysqli_fetch_array($run_cats)) {
	$x = $row_cat['cat_id'];
	$y= $row_cat['cat_title'];
	
	echo "<option value='$x'>$y</option>";
	}
	?>
</select>
	</td>	
	</tr>
	<tr>
	<td><b>Product Brand</b></td>
	<td>
<select name="product_brand">
	<option>Select A Brand</option>
	<?php
	$brand_get = "select * from brand";
	$run_brand = mysqli_query($con, $brand_get);
	while ($row_brand=mysqli_fetch_array($run_brand)) {
	$x = $row_brand['brand_id'];
	$y= $row_brand['brand_title'];
	
	echo "<option value='$x'>$y</option>";
	}
	?>
</select>
	</td>	
	</tr>
	<tr>
	<td><b>Product Img1</b></td>
	<td><input type="file" name="product_img1"></td>	
	</tr>
	<tr>
	<td><b>Product Img2</b></td>
	<td><input type="file" name="product_img2"></td>	
	</tr>
	<tr>
	<td><b>Product Img3</b></td>
	<td><input type="file" name="product_img3"></td>	
	</tr>
	<tr>
	<td><b>Product Price</b></td>
	<td><input type="text" name="product_price"></td>	
	</tr>
    <tr>
    <td><b>Product Description</b></td>
	<td><textarea name="product_desc" cols="35" rows="10"></textarea></td>	
	</tr>
	<tr>
	<td><b>Product Keyword</b></td>
	<td><input type="text" name="product_keyword" size="50" ></td>	
	</tr>
	<tr>
	<td colspan="2"><center><input type="submit" name="insert_product" value="insert_product"></center></td>	
	</tr>




</table>
	
</form>
</body>
</html>



<?php

if(isset($_POST['insert_product']))
{
	$a = $_POST['product_title'];
	$b = $_POST['product_cat'];
	$c = $_POST['product_brand'];
	$d = $_POST['product_price'];
	$e = $_POST['product_desc'];
	$f = $_POST['product_keyword'];
	$status = 'on';


	$img1 = $_FILES['product_img1']['name'];
	$img2 = $_FILES['product_img2']['name'];
	$img3 = $_FILES['product_img3']['name'];

	$img11 = $_FILES['product_img1']['tmp_name'];
    $img22 = $_FILES['product_img2']['tmp_name'];
    $img33 = $_FILES['product_img3']['tmp_name'];

if($a=='' OR $b=='' OR $c =='' OR $d=='' OR $e=='' OR $f=='' OR $img1=='' OR $img2=='' OR $img3=='')
{
	echo "<script>alert('Please fill all the fields !')</script>";
	exit();
}
else
{
	//uploading images
	move_uploaded_file($img11, "product_images/$img1");
		move_uploaded_file($img22, "product_images/$img2");
			move_uploaded_file($img33, "product_images/$img3");
 $insert = "insert into products (cat_id,brand_id,date,product_title,product_img1,product_img2,product_img3,product_price,
 product_desc,product_keyword,product_status) values ('$b','$c',NOW(),'$a','$img1','$img2','$img3','$d','$e','$f','$status')";
 $run_product =mysqli_query($con,$insert);
 if ($run_product) {
 	echo "<script>alert('Your Product Is Inserted Successfuly :D !!')</script>";
 echo "<script>window.open('index.php?insert_products','_self')</script>";
 	
 }
 else
 {
 	echo "fail";
 }
 

}
}


?>


