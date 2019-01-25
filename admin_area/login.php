<?php
session_start();
    include('includes/db.php');

?><!DOCTYPE html>
<html>
<style>
form {
    border: 3px solid #f1f1f1;
}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
<body>
<h1><?php echo @$_GET['logout'];?></h1>
<h2 align="center">Admin Login</h2>

<form action="" method="post">
  

  <div class="container">
    <label><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pass" required>
        
    <button type="submit" name="admin_login">Login</button>
    <input type="checkbox" checked="checked"> Remember me
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>

</body>
</html>
<?php
if(isset($_POST['admin_login']))
{
$a = $_POST['email'];
$b = $_POST['pass'];

$get = "select * from admins where admin_email = '$a' and admin_pass = '$b'";
$admin = mysqli_query($con,$get);
$chek_admin = mysqli_num_rows($admin);
if($chek_admin==1)
{
$_SESSION['email']=$a;
echo "<script >window.open('index.php?loggedin=You are successfully loggedin ','_self')</script>";
}
else
{
echo "<script >alert('wrong email or password')</script>";
}
}

?>