
<?php include_once "../assets/config.php";
session_start();
if(!isset($_SESSION['admin'])):
  echo"<script>window.open('admin_login.php','_self')</script>";
endif;
if(isset($_GET['del'])){

    $del = $_GET['del'];
    $a=mysql_query( "SELECT * from vendor
     where v_id='$del'");
     $f=mysql_fetch_array($a);
     $v_email=$f['v_email'];

    //$delete = mysql_query("DELETE FROM vendor where v_id='$del'");

  $disable=mysql_query( "Delete from vendor
   where v_id='$del'");
  $disable1=mysql_query("DELETE FROM product where v_email='$v_email'");
    header("location: vendors.php");

}
