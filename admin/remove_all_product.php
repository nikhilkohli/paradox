<?php
include_once("../assets/config.php");
session_start();
if(!isset($_SESSION['admin'])):
  echo"<script>window.open('admin_login.php','_self')</script>";
endif;
session_start();

    $delete=mysql_query( "DELETE  FROM
    product");

      header("location: products.php");

?>
