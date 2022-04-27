
<?php include_once "../assets/config.php";
session_start();
if(!isset($_SESSION['vendor'])):
  header("location: vendor_login.php");
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

  <body style="background:#8f8c8c;">
    <?php include"header.php"?>
    <?php
        $edit= $_GET['edit'];
        $query = mysql_query("SELECT * FROM vendor where v_id='$edit'");
        $row=mysql_fetch_array($query);?>

  <div class="container">
    <div class="row mt-5">
      <div class="col-lg-12 ml-auto">

          <form  action="v_profile_edit.php?edit=<?=$_GET['edit']?>" method="post" enctype="multipart/form-data" style="background:#dbd7d7" >
            <h2 class="mb-5 mt-3 text-uppercase text-center" style="font-family: 'Kaushan Script',cursive;color:#ff0867">
              UPDATE PROFILE
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
                <th>Profile Detail</th>
                <th> Profile Photo</th>
              </tr>

              <tr class="bordered">
                <td class="bordered">

                        <label for=""> Fist Name</label> <br>
                        <input type="text" class=" text-center form-control-lg" name="v_f_name" value="<?=$row['v_f_name']?>">

                </td>
                <td rowspan="8" class="bordered">
                  <lable><img src="..\image\<?=$row['v_img'];?>" alt="" height="200px" width="200px"></label><br> <br>
                  <label for="imageUpload" class="btn btn-primary ml-5">Choose Picture</label>
                  <input type="file"  id="imageUpload" accept="image/*" style="display: none" name="v_img"  value="<?=$row['v_img']?>" alt="" height="80px" width="80px">
                </td>
              </tr>

              <tr class="bordered">
                <td class="bordered">
                    <label for="">Last name</label> <br>
                    <input type="text"  class="  text-center form-control-lg" name="v_L_name" value="<?=$row['v_L_name']?>">
                </div>
              </tr>

              <tr class="bordered">
                <td class="bordered">
                    <label for="">Age</label><br>
                    <input type="text" class=" text-center form-control-lg" name="v_age" value="<?=$row['v_age']?>">
                </td>
              </tr>

              <tr>
                <td>
                      <label for="">Phone no.</label><br>
                      <input type="number" class="  text-center form-control-lg"  name="v_phn" value="<?=$row['v_phn']?>">
                  </td>
              </tr>

              <tr>
                <td>
                      <label for="">Address</label><br>
                      <textarea name="v_add"  class="   text-center   form-control-lg"><?=$row['v_add']?></textarea>



                </td>
              </tr>

              <tr>
                <td>
                    <label for="">City</label> <br>
                  <input type="text" name="v_city" class="   text-center  form-control-lg" value="<?=$row['v_city']?>">
                </td>
              </tr>


              <tr>
                <td>
                      <label for="">Pin code</label> <br>
                      <input type="number" class="   text-center form-control-lg" name="v_pin" value="<?=$row['v_pin']?>">
                </td>
              </tr>


              <tr >
                <td >
                        <label for="">State</label> <br>
                      <input type="text" class="  text-center form-control-lg" name="v_state" value="<?=$row['v_state']?>">
                  </td>
              </tr>


              <tr>
                <td>  <div class="form-group">
                      <input type="submit" class="btn btn-success btn-block form-control rounded-pill form-control-lg" name="update" value="CHANGE PROFILE DETAIL" class="mt-5">
                  </div></td>
                <td>
                  <div class="form-group">
                        <input type="submit" class="btn btn-warning btn-block form-control rounded-pill  form-control-lg" name="cng_img" value="CHANGE PHOTO HERE" class="mt-5">
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

            $v_id=$_GET['edit'];
            $v_f_name=$_POST['v_f_name'];
            $v_phn=$_POST['v_phn'];
            $v_add=$_POST['v_add'];
            $v_pin=$_POST['v_pin'];
            $v_L_name=$_POST['v_L_name'];
            $v_age=$_POST['v_age'];
            $v_city=$_POST['v_city'];
            $v_state=$_POST['v_state'];
            $v_img = $_FILES['v_img']['name'];
            $v_img_tmp =  $_FILES['v_img']['tmp_name'];
            move_uploaded_file($v_img_temp,"../image/$v_img");

            $update="UPDATE vendor
            set
            v_f_name='$v_f_name',v_L_name='$v_L_name',v_phn='$v_phn',v_add=  '".mysql_real_escape_string($v_add)."',v_pin='$v_pin',v_age='$v_age',v_city='$v_city',v_state='$v_state',v_img='$v_img' where v_id='$v_id'";
            mysql_query($update);
            echo "<script>alert('data updated')</script>";
            redirect('v_profile');
          }



          elseif(isset($_POST['update'])){

              $v_id=$_GET['edit'];
              $v_f_name=$_POST['v_f_name'];
              $v_phn=$_POST['v_phn'];
              $v_add=$_POST['v_add'];
              $v_pin=$_POST['v_pin'];
              $v_L_name=$_POST['v_L_name'];
              $v_age=$_POST['v_age'];
              $v_city=$_POST['v_city'];
              $v_state=$_POST['v_state'];

              $update="UPDATE vendor
              set
              v_f_name='$v_f_name',v_L_name='$v_L_name',v_phn='$v_phn',v_add='".mysql_real_escape_string($v_add)."',v_pin='$v_pin',v_age='$v_age',v_city='$v_city',v_state='$v_state' where v_id='$v_id'";
              mysql_query($update);
              echo "<script>alert('data updated')</script>";
              redirect('v_profile');

            }


          ?>

          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

          <!--this link is for popper-->
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

          <!--this link is for js-->
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
</html>
