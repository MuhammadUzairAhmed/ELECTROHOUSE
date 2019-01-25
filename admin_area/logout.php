<?php
session_start();
session_destroy();
echo "<script >window.open('login.php?logout=You are successfully logout ','_self')</script>";


?>