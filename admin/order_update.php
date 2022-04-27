

<?php include_once "../assets/config.php";
session_start();
if(!isset($_SESSION['admin'])):
  echo"<script>window.open('admin_login.php','_self')</script>";
endif;
?>
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>foodstuff | online Dairy products available Here</title>
    <link rel="stylesheet" href="..\bootstrap\bootstrap.min.css">
    <link rel = "icon" href = "..\image\ico.gif" type = "image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">

  </head>

  <body style="background:#8f8c8c;">
    <?php include"include/header.php"?>
    <?php
        $edit= $_GET['edit'];

        $query = mysql_query("SELECT * FROM orders where o_id='$edit'");
        $row=mysql_fetch_array($query);?>

  <div class="container">
    <div class="row mt-5">
      <div class="col-lg-12 ml-auto">
          <form  action="order_update.php?edit=<?=$_GET['edit']?>" method="post" enctype="multipart/form-data" style="background:#dbd7d7" >
            <h2 class="mb-5 mt-3 text-uppercase text-center" style="font-family: 'Kaushan Script',cursive;color:#ff0867">
              UPDATE ORDER STATUS
            </h2>
            <div class="form-group col-6">

                  <input type="text" class="form-control rounded-pill form-control-lg" name="order_status" value="<?=$row['order_status']?>">
            </div>
            <div class="form-group">
                 <input type="submit" class="btn btn-success btn-block form-control rounded-pill form-control-lg" name="order_update" value="Update Order Status" class="mt-5">
             </div>

          </form>

        </div>

    </div>
  </div>



        <?php


        if(isset($_POST['order_update']) ){
          $o_id=$_GET['edit'];

          $order_status=$_POST['order_status'];


          $update="UPDATE orders
          set
          order_status='$order_status' where o_id='$o_id' ";
          mysql_query($update);
          echo "<script>alert('data updated')</script>";
          redirect('admin_order');

          }

          ?>


  </body>
</html>
