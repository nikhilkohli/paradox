<?php
include_once"../assets/config.php";
session_start();
if(isset($_GET['del'])){

    $del = $_GET['del'];
    $disable=mysql_query( "DELETE FROM
      product where p_id='$del'");
      header("location: products.php");
}
?>
