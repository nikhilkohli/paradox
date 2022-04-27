<?php
include_once"../assets/config.php";
session_start();
if(isset($_GET['del'])){

    $del = $_GET['del'];

    $query1= mysql_query("SELECT * FROM category where cat_id='$del'");
    $row1=mysql_fetch_array($query1);
    $query2= mysql_query("SELECT * FROM product where cat_title='".$row1['cat_title']."'");
    while($row2=mysql_fetch_array($query2)){
      $delete_order=mysql_query( "DELETE from orders where p_id='".$row2['p_id']."'");
    }
    $delete_category=mysql_query( "DELETE from category where cat_id='$del'");
    $delete_product=mysql_query( "DELETE from product where cat_title='".$row1['cat_title']."'");
      header("location: category.php");
}
