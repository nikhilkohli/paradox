

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
        $query = mysql_query("SELECT * FROM product where p_id='$edit'");
        $row=mysql_fetch_array($query);?>

  <div class="container">
    <div class="row mt-5">
      <div class="col-lg-12 ml-auto">

          <form  action="p_edit.php?edit=<?=$_GET['edit']?>" method="post" enctype="multipart/form-data" style="background:#dbd7d7" >
            <h2 class="mb-5 mt-3 text-uppercase text-center" style="font-family: 'Kaushan Script',cursive;color:#ff0867">
              UPDATE PRODUCT
            </h2>
            <style>
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
                padding: 6px;
                text-align: center;
                color:#255;
                width: 70%;
            }
        </style>
            <table class="m-auto">
              <tr>
                <th>Product Detail</th>
                <th> Product Photo</th>
              </tr>

              <tr class="bordered">
                <td class="bordered">

                        <label for=""> Product name</label> <br>
                        <input type="text" class=" text-center form-control-lg" name="p_name" value="<?=$row['p_name']?>">

                </td>
                <td rowspan="7" class="bordered">
                  <lable><img src="..\image\<?=$row['p_img'];?>" alt="" height="200px" width="200px"></label><br> <br>
                  <label for="imageUpload" class="btn btn-primary ml-5">Choose Picture</label>
                  <input type="file"  id="imageUpload" accept="image/*" style="display: none" name="p_img"  value="<?=$row['p_img']?>" alt="" height="80px" width="80px">
                </td>
              </tr>

              <tr class="bordered">
                <td class="bordered">
                    <label for=""> Single Unit Price</label> <br>
                    <input type="text"  class="  text-center form-control-lg" name="p_price" value="<?=$row['p_price']?>">
                </div>
              </tr>

              <tr class="bordered">
                <td class="bordered">
                    <label for=""> Discount in Percent</label> <br>
                    <input type="text"  class="  text-center form-control-lg" name="p_discount" value="<?=$row['p_discount']?>">
                </div>
              </tr>

              <tr class="bordered">
                <td class="bordered">
                    <label for="">Mfg Date</label><br>
                    <input type="date" class=" text-center form-control-lg" name="p_mfg" value="<?=$row['p_mfg']?>">
                </td>
              </tr>

              <tr>
                <td>
                      <label for="">product category.</label><br>
                      <input type="text" class="  text-center form-control-lg"  name="cat_title" value="<?=$row['cat_title']?>">
                  </td>
              </tr>

              <tr>
                <td>
                      <label for="">Single unit Weight</label><br>
                      <input type="text" name="each_qty"  class="   text-center   form-control-lg" value="<?=$row['each_qty']?>">

                </td>
              </tr>

              <tr>
                <td>
                    <label for="">Available in Stock</label> <br>
                  <input type="text" name="Qty" class="   text-center  form-control-lg" value="<?=$row['Qty']?>">
                </td>
              </tr>


              <tr>
                <td>
                      <label for="">Brand</label> <br>
                      <input type="text" class="   text-center form-control-lg" name="p_brand" value="<?=$row['p_brand']?>">
                </td>
              </tr>
              <tr>
                <td>
                      <label for="">Product Description</label> <br>
                      <textarea class="   text-center form-control-lg" name="p_desc"><?=$row['p_desc']?></textarea>
                </td>
              </tr>


              <tr>
                <td>  <div class="form-group">
                      <input type="submit" class="btn btn-success btn-block form-control rounded-pill form-control-lg" name="update" value="Update Product Detail" class="mt-5">
                  </div></td>
                <td>
                  <div class="form-group">
                        <input type="submit" class="btn btn-warning btn-block form-control rounded-pill  form-control-lg" name="cng_img" value="Change Product Image" class="mt-5">
                    </div>
                </td>
              </tr>
            </table>

          </form>

        </div>

    </div>
  </div>



        <?php


        if(isset($_POST['cng_img']) ){
          $p_id=$_GET['edit'];
          $p_name=$_POST['p_name'];
          $p_price=$_POST['p_price'];

          $p_mfg=$_POST['p_mfg'];
          $cat_title=$_POST['cat_title'];
          $Qty=$_POST['Qty'];
          $each_qty=$_POST['each_qty'];
          $p_brand=$_POST['p_brand'];
          $p_desc=$_POST['p_desc'];
          $p_img = $_FILES['p_img']['name'];
          $p_img_tmp =  $_FILES['p_img']['tmp_name'];
          move_uploaded_file($p_img_tmp,"../image/$p_img");


          $update="UPDATE product
          set
          p_name='$p_name',p_price='$p_price',p_mfg='$p_mfg',cat_title='$cat_title',Qty='$Qty',p_brand='".mysql_real_escape_string($p_brand)."',p_desc='".mysql_real_escape_string($p_desc)."',p_img='$p_img',each_qty='$each_qty' where p_id='$p_id'";
          mysql_query($update);
          echo "<script>alert('data updated')</script>";
          redirect('products');

          }



          elseif(isset($_POST['update'])){

            $p_id=$_GET['edit'];
            $p_name=$_POST['p_name'];
            $p_price=$_POST['p_price'];
              $p_discount=$_POST['p_discount'];
            $p_mfg=$_POST['p_mfg'];
            $cat_title=$_POST['cat_title'];
            $Qty=$_POST['Qty'];
            $each_qty=$_POST['each_qty'];
            $p_brand=$_POST['p_brand'];
            $p_desc=$_POST['p_desc'];

            $update="UPDATE product
            set
            p_name='$p_name',p_price='$p_price',p_discount='$p_discount',p_mfg='$p_mfg',cat_title='$cat_title',Qty='$Qty',p_brand='".mysql_real_escape_string($p_brand)."',p_desc='".mysql_real_escape_string($p_desc)."',each_qty='$each_qty' where p_id='$p_id'";
            mysql_query($update);
            echo "<script>alert('data updated')</script>";
            redirect('products');

}
          ?>


  </body>
</html>
