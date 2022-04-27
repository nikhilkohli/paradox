<?php
include_once"../assets/config.php";
session_start();
if(isset($_GET['del'])){

    $del = $_GET['del'];
    $delete=mysql_query( "DELETE FROM
      orders where o_id='$del'");
      header("location: admin_order.php");
}
?>
