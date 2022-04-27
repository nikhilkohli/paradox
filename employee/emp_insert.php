<?php include_once "../assets/config.php";
session_start();
if(!isset($_SESSION['employee'])):
  header("location: employee_login.php");
endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Products</title>
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <link rel = "icon" href = "..\image\ico.png" type = "image/x-icon">
</head>
    <body class="bg-light" >
        <?php include"include/header.php"?>
        <div class="container">
          <h1 class="text-center mt-5 mb-4"><u>Add your product here</u></h1>
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="card">
                        <div class="card-body">
                          <!--this form is created for vendor to add the product detail in database-->
                            <form action="emp_insert.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="">P_name</label>
                                    <input type="text" name="p_name" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="">P_price</label>
                                    <input type="text" name="p_price" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="">Each_product_quantity</label>
                                    <input type="text" name="each_qty" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="">P_mfg</label>
                                    <input type="date" name="p_mfg" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="">P_cat_title</label>
                                    <!--this is a dynamic select tag where the option for category is depend on the categories available ib database-->
                                    <select name="p_cat_title" class="form-control">
                                         <?php
                                         /*this $cat variable will store all the  product categories available in DB*/
                                            $cat = mysql_query("SELECT * FROM category");

                                            /*this while loop will fetch all the selected row in option tag one-by-one*/
                                            while ($c = mysql_fetch_array($cat)):
                                          ?>
                                          <option><?= $c['cat_title'];?></option>

                                          <?php endwhile;?>
                                    </select>
                                </div>

                                <div class="form-group">
                                      <label for="">Brand</label>
                                      <input type="text" name="p_brand" class="form-control">
                                </div>


                                <div class="form-group">
                                      <label for="">P_img</label>
                                      <input type="file" name="p_img" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="">P_desc</label>
                                    <textarea name="p_desc" class="form-control"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="">P_qty</label>
                                    <input type="text" name="p_qty" class="form-control">
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
if(isset($_POST['send'])){    /*when employee will press submit button by filling the form records then the all data  will be stored in DB */


    $log='Product From FOODSTUFF';
    $p_name = $_POST['p_name'];   /*stores product name*/
    $p_price =$_POST['p_price'];
    $each_qty=$_POST['each_qty'];
    $p_cat_title = $_POST['p_cat_title'];
    $p_mfg = $_POST['p_mfg'];
    $p_desc = $_POST['p_desc'];
    $qty = $_POST['p_qty'];
    $p_brand = $_POST['p_brand'];

    $p_img = $_FILES['p_img']['name'];  // this is for storing the image in a variable
    $p_img_tmp =  $_FILES['p_img']['tmp_name'];  //this is for temporarily store the the image.it helps  untill image is getting uploaded

    move_uploaded_file($p_img_tmp,"../image/$p_img"); //when image is uploaded then it will be stored in image folder we have used


    //the below section is for sql query to insert the all variable values in the corrospondence field of product table
    $query = mysql_query("INSERT INTO product (p_name,p_brand,p_price,each_qty,p_mfg,p_img,cat_title,p_desc,Qty,v_email) value ('$p_name','$p_brand','$p_price','$each_qty','$p_mfg','$p_img','$p_cat_title','".mysql_real_escape_string($p_desc)."','$qty','$log')");
echo"<script>window.open('index.php','_self')</script>";
}


?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<!--this link is for popper-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<!--this link is for js-->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
