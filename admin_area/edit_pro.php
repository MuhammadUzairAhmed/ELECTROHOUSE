<?php
include("includes/db.php");
if(isset($_GET['edit_pro']))
{
	$p_id = $_GET['edit_pro'];
	$query = "select * from products where product_id = '$p_id'";
	$get_query = mysqli_query($con,$query);
	$run_query = mysqli_fetch_array($get_query);
	$ids = $run_query[0];
	$a =  $run_query[1];
	$b =  $run_query[2];
	$c =  $run_query[3];
	$d =  $run_query[4];
	$e =  $run_query[5];
	$f =  $run_query[6];
	$g =  $run_query[7];
	$h =  $run_query[8];
	$i =  $run_query[9];
	$j =  $run_query[10];
	$k =  $run_query[11];

	$cat = "select * from categories where cat_id='$a'";
	$get_cat = mysqli_query($con,$cat);
	$run_cat = mysqli_fetch_array($get_cat);
	$z = $run_cat['cat_title'];




$brand = "select * from brand where brand_id='$b'";
	$get_brand = mysqli_query($con,$brand);
	$run_brand = mysqli_fetch_array($get_brand);
	$n = $run_brand['brand_title'];

}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	

</head>
<body>
<form method="post" action="" enctype="multipart/form-data">

<table bgcolor="#EB984E"  width="794" align="center" border="1">
	<tr>
		<td colspan="2"><h2 align="center"  >Update Or Edit Product</h2></td>
	</tr>

	<tr>
	<td><b>Product Title</b></td>
	<td><input type="text"  name="product_title" size="50" value="<?php echo $d;?>" ></td>	
	</tr>
	<tr>
	<td><b>Product Categories</b></td>
	<td>
<select name="product_cat">
	<option value="<?php echo $a ;?>"><?php echo $z;?></option>
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
	<option value="<?php echo $b ;?>"><?php echo $n; ?></option>
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
	<td><img src="product_images/<?php echo $e;?>" width='80' height='80'><br><input type="file" name="product_img1"></td>	
	</tr>
	<tr>
	<td><b>Product Img2</b></td>
	<td><img src="product_images/<?php echo $f;?>" width='80' height='80'><br><input type="file" name="product_img2"></td>	
	</tr>
	<tr>
	<td><b>Product Img3</b></td>
	<td><img src="product_images/<?php echo $g;?>" width='80' height='80'><br><input type="file" name="product_img3"></td>	
	</tr>
	<tr>
	<td><b>Product Price</b></td>
	<td><input type="text" name="product_price" value="<?php echo $h;?>"></td>	
	</tr>
    <tr>
    <td><b>Product Description</b></td>
	<td><textarea name="product_desc" cols="35" rows="10" ><?php echo $i ;?></textarea></td>	
	</tr>
	<tr>
	<td><b>Product Keyword</b></td>
	<td><input type="text" name="product_keyword" size="50" value="<?php echo $j ;?>"></td>	
	</tr>
	<tr>
	<td colspan="2"><center><input type="submit" name="update_product" value="Update product"></center></td>	
	</tr>




</table>
	
</form>
</body>
</html>



<?php

if(isset($_POST['update_product']))
{
	$ab = $_POST['product_title'];
	$bc = $_POST['product_cat'];
	$cd = $_POST['product_brand'];
	$de = $_POST['product_price'];
	$ef = $_POST['product_desc'];
	$fg = $_POST['product_keyword'];
	$status = 'on';
$update = $ids;

	$img1 = $_FILES['product_img1']['name'];
	$img2 = $_FILES['product_img2']['name'];
	$img3 = $_FILES['product_img3']['name'];

	$img11 = $_FILES['product_img1']['tmp_name'];
    $img22 = $_FILES['product_img2']['tmp_name'];
    $img33 = $_FILES['product_img3']['tmp_name'];


	//uploading images
	move_uploaded_file($img11, "product_images/$img1");
		move_uploaded_file($img22, "product_images/$img2");
			move_uploaded_file($img33, "product_images/$img3");
 $insert = "update products set product_title='$ab',product_img1='$img1',product_img2='$img2',product_img3='$img3',product_price='$de',product_desc='$ef',product_keyword='$fg',date=NOW() where product_id = '$update'";
 $run_product =mysqli_query($con,$insert);
 if ($run_product) {
 	echo "<script>alert('Your Product Is Updated Successfuly :D !!')</script>";
 echo "<script>window.open('index.php?view_products','_self')</script>";
 	
 }
 else
 {
 	echo "fail";
 }
 


}


?>