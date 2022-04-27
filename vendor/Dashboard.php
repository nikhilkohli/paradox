<?php include"../assets/config.php";
session_start();
if(!isset($_SESSION['vendor'])):
  header("location: vendor_login.php");
endif;

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>FoodStuff | online Dairy products available Here</title>
    <link rel = "icon" href = "..\image\ico.gif" type = "image/x-icon">
    <link rel="stylesheet" href="..\bootstrap\bootstrap.min.css">

  </head>

  <body>
  <?php include "header.php"; ?>
  <div class="container-fluid mt-4">
    <div class="row">
      <div class="col-lg-3">
      <?php include "include/side.php";
        $_SESSION['vendor']=$log;?>
      </div>
      <div class="col-lg-9">
        <div class="row text-white">

        <div class="col-lg-4 mb-3">
            <div class="card bg-warning">
              <a href="v_products.php" class="text-white"><div class="card-body">
                <?php
                  $p= mysql_num_rows(mysql_query(" SELECT * from product where v_email='$log'"));
                ?>
                <h4><?=$p?></h4>
                <h6>Products</h6>
              </div></a>
            </div>
          </div>

        <div class="col-lg-4 mb-3">
            <div class="card bg-success">
              <a href="v_order.php" class="text-white"><div class="card-body">
                <?php
                  $o= mysql_num_rows(mysql_query(" SELECT * from orders where v_email='$log'"));
                ?>
                <h4><?=$o?></h4>
                <h6>Orders</h6>
              </div></a>
            </div>
          </div>

        </div>
      </div>
    </div>

  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

  <!--this link is for popper-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

  <!--this link is for js-->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


  </body>
</html>
