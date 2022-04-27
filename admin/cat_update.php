

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
    <title>Admin Panel| Update Category | Ghar Ka Rashan</title>
    <link rel="stylesheet" href="..\bootstrap\bootstrap.min.css">
    <link rel = "icon" href = "..\image\icon1.png" type = "image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">

  </head>

  <body style="background:#8f8c8c;">
    <?php include"include/header.php"?>
    <?php
        $edit= $_GET['edit'];

        $query = mysql_query("SELECT * FROM category where cat_id='$edit'");
        $row=mysql_fetch_array($query);?>

  <div class="container">
    <h5><b style="color:red">ALERT!</b><br>    If you will update this category name then "category name of products" related to this category will also be changed.</h5>
    <div class="row mt-5">
      <div class="col-lg-12 ml-auto">
          <form  action="cat_update.php?edit=<?=$_GET['edit']?>" method="post" enctype="multipart/form-data" style="background:#dbd7d7" >
            <h2 class="mb-5 mt-3 text-uppercase text-center" style="font-family: 'Kaushan Script',cursive;color:#ff0867">
              UPDATE CATEGORY NAME
            </h2>

            <div class="form-group col-6">

                  <input type="text" class="form-control rounded-pill form-control-lg" name="cat_title" value="<?=$row['cat_title']?>">
            </div>
            <div class="form-group">
                 <input type="submit" class="btn btn-success btn-block form-control rounded-pill form-control-lg" name="cat_update" value="Update" class="mt-5">
             </div>

          </form>

        </div>

    </div>
  </div>



        <?php


        if(isset($_POST['cat_update']) ){
          $cat_id=$_GET['edit'];
          $old_cat= $row['cat_title'];
          $cat_title=$_POST['cat_title'];


          $update_category="UPDATE category
          set
          cat_title='$cat_title' where cat_id='$cat_id' ";
          mysql_query($update_category);

          $update_product="UPDATE product
          set
          cat_title='$cat_title' where cat_title='$old_cat' ";
            mysql_query($update_product);
          echo "<script>alert('data updated')</script>";
          redirect('category');

          }

          ?>


  </body>
</html>
