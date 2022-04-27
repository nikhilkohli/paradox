
<?php include"../assets/config.php";
session_start();
if(!isset($_SESSION['admin'])):
  echo"<script>window.open('admin_login.php','_self')</script>";
endif;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>foodstuff | online Dairy products available Here</title>
    <link rel="stylesheet" href="..\bootstrap\bootstrap.min.css">
    <link rel = "icon" href = "..\image\ico.gif" type = "image/x-icon">
  </head>

  <body>
  <?php include "include/header.php"; ?>
  <div class="container-fluid mt-4">
    <div class="row">
      <div class="col-lg-3">
      <?php include "include/side.php";?>
      </div>

      <div class="col-lg-9">
        <div class="row text-white">
          <div class="col-lg-4 mb-3">
            <div class="card bg-danger">
              <a href="employee.php" class="text-white"><div class="card-body">
                <?php
                  $e= mysql_num_rows(mysql_query(" SELECT * from employee "));
                ?>
                <h4><?=$e?>+</h4>
                <h6>Total Employee</h6>
              </div></a>
            </div>
          </div>

          <div class="col-lg-4 mb-3">
            <div class="card bg-warning">
            <a href="products.php" class="text-white">  <div class="card-body">
                <?php
                    $p= mysql_num_rows(mysql_query(" SELECT * from product "));
                  ?>
                <h4> <?=$p?>+ </h4>
                <h6>Total Products</h6>
              </div></a>
            </div>
          </div>

          <div class="col-lg-4 mb-3">
            <div class="card bg-info">
            <a href="vendors.php" class="text-white">  <div class="card-body">
                <?php
                    $v= mysql_num_rows(mysql_query(" SELECT * from vendor "));
                  ?>
                <h4><?=  $v ?>+</h4>
                <h6>Vendors</h6>
              </div></a>
            </div>
          </div>

          <div class="col-lg-4 mb-3">
            <div class="card bg-success">
            <a href="customers.php" class="text-white">  <div class="card-body">
                <?php
                    $c= mysql_num_rows(mysql_query(" SELECT * from customer "));
                  ?>
                <h4><?=$c?>+</h4>
                <h6>Customers</h6>
              </div></a>
            </div>
          </div>

          <div class="col-lg-4 mb-3">
            <div class="card bg-primary">
              <a href="admin_order.php" class="text-white"><div class="card-body">
                <?php
                    $oa= mysql_num_rows(mysql_query(" SELECT * from orders where order_status='Active' "));
                  ?>
                <h4><?=$oa?></h4>
                <h6>Active Orders</h6>
              </div></a>
            </div>
          </div>

          <div class="col-lg-4 mb-3">
            <div class="card bg-danger">
              <a href="admin_order.php" class="text-white"><div class="card-body">
                <?php
                    $od= mysql_num_rows(mysql_query(" SELECT * from orders where order_status='delivered' or order_status='deliver' "));
                  ?>
                <h4><?=$od?></h4>
                <h6>Delivered Orders</h6>
              </div></a>
            </div>
          </div>

          <div class="col-lg-4 mb-3">
            <div class="card bg-dark">
              <a href="message.php" class="text-white"><div class="card-body">
                <?php
                    $m= mysql_num_rows(mysql_query(" SELECT * from contact "));
                  ?>
                <h4><?=$m?>+</h4>
                <h6>Feedback Messages</h6>
              </div></a>
            </div>
          </div>



        </div>
      </div>
    </div>

  </div>

  </body>
</html>
