
<?php include_once "../assets/config.php";
session_start();
if(!isset($_SESSION['admin'])):
  echo"<script>window.open('admin_login.php','_self')</script>";
endif;
?><!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>FoodStuff | online Dairy products available Here</title>
    <link rel="stylesheet" href="..\bootstrap\bootstrap.min.css">
    <link rel = "icon" href = "..\image\ico.gif" type = "image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
  </head>

  <body>
    <?php include"include/header.php"?>

    <div class="container-fluid mt-3">
      <div class="row">
        <div class="col-lg-3">
        <?php include"include/side.php"?>
        </div>

        <div class="col-lg-9">

              <?php

              $calling=mysql_query("SELECT * from contact order by cont_id DESC");

                $count=mysql_num_rows($calling);
                if($count>0):
                  $c=0;
                  while($row=mysql_fetch_array($calling)):

                    $c++;
              ?>
              <style>
                .table{
                  margin-top: 2%;
                  text-align: center;

                }
              </style>
              <table class="table table-bordered text-center" style="border:10px solid pink;">
                <tr>
                  <th>Serial No.</th>
                  <th>User Name</th>
                  <th>Phone No.</th>
                  <th>Email</th>
                  <th>Message</th>
                </tr>

            <tr>
              <td><?= $c?></td>
              <td><?= $row["f_name"]?></td>
              <td><?= $row['phone']?></td>
              <td><?= $row['email']?></td>
              <td><?= $row['message']?></td>
            </tr>
            <hr>
          <?php
                endwhile;
              else:?>
                <h1>No Message yet</h1>
              <?php
              endif;?>
          </table>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
</html>
