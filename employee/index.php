<?php include_once "../assets/config.php";
session_start();
if(!isset($_SESSION['employee'])):
  header("location: ../employee_login.php");
endif;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>FoodStuff | online Dairy products available Here</title>
  <link rel = "icon" href = "..\image\ico.gif" type = "image/x-icon">
  <link rel="stylesheet" href="..\bootstrap\bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/body.css">
  <link href="https://fonts.googleapis.com/css?family=Satisfy&display=swap" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="../css/product.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>
  <body class="bg-light">

    <!--this line includes header file-->
    <?php include"include/header.php"?>

        <div class="container">
          <div class="row">

            <!--this section is for product container-->
            <div class="col-12 col-lg-12 ">
              <div class="row">
                <div class="col-12" style="text-align:center;">
                  <?php
                    $e= mysql_num_rows(mysql_query(" SELECT * from product "));
                  ?>
                  <b> <h3 class="btn btn-warning"  id="inf">Company's Products (<?=$e?>)</h3><hr></b>
                </div>

                <!--the below section is used for adding the prodects dynamically from DB-->
                <?php


                      $calling = mysql_query("SELECT * FROM product order by p_id DESC");  /*collects all data from product table*/

                      $count = mysql_num_rows($calling);  /*$count will store the no. of row in product*/
                      if ($count > 0):
                      while($row = mysql_fetch_array($calling)):  /*while loop starts and fetch one-by-one row in $row variable*/
                ?>

                <div class="col-9 col-lg-3 col-md-4 col-sm-6 ">
                    <div class="card shadow m-4">

                        <!--this will dynamically add product details in product page-->
                        <img src="..\image\<?= $row['p_img'];?>" alt="" height="170px" class="w-100"><hr>

                        <div class="card-body">
                          <span class="desc_p" id="titlep<?= $row['p_id'];?>"><?= $row['p_name'];?></span><br>

                          <span class="price"> ₹<?= $row['p_price'];?>/-</span>
                        </div>
                    </div>
                </div>

                <?php endwhile;

              else:  /*if no product is available related to search the this else will be executed*/
                ?>
                  <div class='card'>
                      <div class='card-body'>
                        <h1> No Product Yet</h1>
                      </div>
                  </div>
                <?php endif;?>

          </div>
        </div>
      </div>
    </div>

   <?php include"../assets/footer.php"?>

    </body>
</html>
