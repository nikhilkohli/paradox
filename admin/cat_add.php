<?php include_once "../assets/config.php";
session_start();
if(!isset($_SESSION['admin'])):
  echo"<script>window.open('admin_login.php','_self')</script>";
endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Products</title>
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <link rel = "icon" href = "..\image\icon1.png" type = "image/x-icon">
</head>
    <body class="bg-light" >
        <?php include"include/header.php"?>
        <div class="container">
          <h1 class="text-center mt-5 mb-4"><u>Add More Categories</u></h1>
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="card">
                        <div class="card-body">
                          <!--this form is created for vendor to add the product detail in database-->
                            <form action="cat_add.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="">Category name</label>
                                    <input type="text" name="cat_title" class="form-control">
                                </div>

                                <div class="form-group">
                                    <input type="submit" name="send" class="btn btn-warning btn-block">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include"../assets/footer.php"?>
    </body>
</html>

<?php
if(isset($_POST['send'])){    /*when admin will press submit button by filling the form records then the all data  will be stored in DB */



    $cat_title = $_POST['cat_title'];   /*stores product name*/

    //the below section is for sql query to insert the all variable values in the corrospondence field of product table
    $query = mysql_query("INSERT INTO category (cat_title) value ('$cat_title')");

    echo"<script>window.open('category.php','_self')</script>";
}


?>
