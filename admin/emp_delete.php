<?php
include_once"../assets/config.php";
session_start();
if(isset($_GET['del'])){

    $del = $_GET['del'];
    $disable=mysql_query( "DELETE from employee where emp_id='$del'");
      header("location: employee.php");
}
