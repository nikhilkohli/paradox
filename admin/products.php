<?php include_once "../assets/config.php";
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
          <div class="row">
                  <div class="col-5">
                      <blockquote class="blockquote"><h2 class="font-weight-bold h5 my-4">Manage Products </h2></blockquote>
                    </div>

                    <div class="col-3">
                      <a href="#remove_all_product"  class="btn btn-warning mt-3" data-toggle="modal"> <b>Remove All Product</b></a>
                    </div>

                    <!--Modal for remove all product-->

                    <div class="modal fade" id="remove_all_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-body">
                              Are you really want to <strong style="color:red">DELETE all Products?</strong><img src="https://img.icons8.com/emoji/25/000000/warning-emoji.png"/>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            <a href="remove_all_product.php" class="btn btn-primary">Yes</a>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!--Modal end-->
            <div class="col-4">
              <form action="products.php"  method="get" class="form-inline mt-3">
                  <input type="search" placeholder="Search Employee" class="form-control" name="p_search" value="<?php if(isset($_GET['p_search'])){echo $_GET['p_search'];}?>">
                    <?php
                    if(isset($_GET['p_search'])): ?>
                      <a href="products.php" class="btn btn-danger">X</a>

                    <?php else: ?>
                    <input type="submit" value="Go" name="find" class="btn btn-success">
                    <?php endif;?>


              </form>

            </div>
            </div>
          <table class="table table-bordered text-center">
            <tr>
              <th>Serial No.</th>
              <th>Name</th>
              <th>Action</th>
              <th>Status</th>
            </tr>

            <tr>
              <?php

              if(isset($_GET['find'])):
                $search=$_GET['p_search'];
                $calling = mysql_query("SELECT * from product where p_name like '%$search%' or p_code= '$search' order by p_id DESC");
                $count=mysql_num_rows($calling);
                      if($count==0):
                        echo"<h1>No Product of this name</h1>";
                      endif;
            else:
              $calling=mysql_query("SELECT * from product  order by p_id DESC");
            endif;

                $count=mysql_num_rows($calling);
                if($count>0):
                  $c=0;
                  while($row=mysql_fetch_array($calling)):
                    $c++;
              ?>

              <td><?= $c?></td>
              <td><?= $row["p_name"]?></td>
              <td>
                <a type="button"  href="#viewProduct<?= $row['p_id'];?>" class="btn btn-success" data-toggle="modal"><i class="fas fa-eye" name="view"></i></a>


                <a href='p_edit.php?edit=<?= $row['p_id']?>' class="btn btn-info">
                  <i class="fas fa-pen-alt" name="edit"></i>
                </a>

                <a type="button"  href="#deleteProduct<?= $row['p_id'];?>" class="btn btn-danger" data-toggle="modal"><i class="fas fa-trash-alt" name="X"></i></a>

                <!--  delete Modal -->
                <div class="modal fade" id="deleteProduct<?= $row['p_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-body" >
                          Are you really want to<strong style="color:red"> Delete</strong> <strong><?= $row['p_name'];?></strong>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <a href="p_delete.php?del=<?= $row['p_id']?>" class="btn btn-primary">Yes</a>
                      </div>
                    </div>
                  </div>
                </div>

                <!--  View Modal -->
                <div class="modal fade" id="viewProduct<?= $row['p_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                          <strong >PRODUCTS</strong>
                      </div>
                      <div class="modal-body">
                        <table class="table table-bordered mt-5">
                              <tr>
                                <th>product Id No.</th>
                                <td><?= $row['p_code']?></td>
                              </tr>
                              <tr>
                                <th>product name</th>
                                <td><?= $row['p_name'];?></td>
                              </tr>
                              <tr>
                                <th>Image</th>
                                <td> <img src="../image/<?= $row['p_img'];?>" alt="" height="70px" width="70px"></td>
                              </tr>
                              <tr>
                                <th>Price</th>
                                  <td>₹<?= $row['p_price'];?>/-</td>
                              </tr>
                              <tr>
                                <th>Discount</th>
                                  <td><?= $row['p_discount'];?></td>
                              </tr>
                              <tr>
                                <th>Manufacturing date</th>
                                  <td><?= $row['p_mfg'];?></td>
                              </tr>

                              <tr>
                                <th>product Category</th>
                                  <td><?= $row['cat_title'];?></td>
                              </tr>
                              <tr>
                                <th>Quantity</th>
                                  <td><?= $row['Qty'];?></td>
                              </tr>
                              <th>Product seller (vendor)</th>
                                <td><?= $row['v_email'];?></td>
                              </tr>
                              <tr>
                                <th>product description</th>
                                  <td><?= $row['p_desc'];?></td>
                              </tr>
                              <tr>
                                <th>Brand</th>
                                  <td><?= $row['p_brand'];?></td>
                              </tr>
                              <tr>
                                <th>Status</th>
                                  <td> <a href="#" style="color:#21c416"><?= $row['p_status'];?></a> </td>
                              </tr>
                              <tr>

                            <u><h5 class="text-center mt-3 mb-4 text-uppercase"><?= $row['p_name']?><span class="text-lowercase">'s complete details here</span></h5></u>
                        </table>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                      </div>
                    </div>
                  </div>
                </div>



              </td>
              <td><?= $row['p_status']?></td>
            </tr>
          <?php
                endwhile;
                endif;?>
          </table>
        </div>
      </div>
    </div>





  </body>
</html>
