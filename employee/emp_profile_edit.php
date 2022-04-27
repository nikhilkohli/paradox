
<?php include_once "../assets/config.php";
session_start();
if(!isset($_SESSION['employee'])):
  header("location: employee_login.php");
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
    <?php include"include/header.php"?>
    <?php
        $edit= $_GET['edit'];
        $query = mysql_query("SELECT * FROM employee where emp_id='$edit'");
        $row=mysql_fetch_array($query);?>

  <div class="container">
    <div class="row mt-5">
      <div class="col-lg-12 ml-auto">

          <form  action="emp_profile_edit.php?edit=<?=$_GET['edit']?>" method="post" enctype="multipart/form-data" style="background:#dbd7d7" >
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
                        <input type="text" class=" text-center form-control-lg" name="emp_f_name" value="<?=$row['emp_f_name']?>">

                </td>
                <td rowspan="8" class="bordered">
                  <lable><img src="..\image\<?=$row['emp_img'];?>" alt="" height="200px" width="200px"></label><br> <br>
                  <label for="imageUpload" class="btn btn-primary ml-5">Choose Picture</label>
                  <input type="file"  id="imageUpload" accept="image/*" style="display: none" name="emp_img"  value="<?=$row['emp_img']?>" alt="" height="80px" width="80px">
                </td>
              </tr>

              <tr class="bordered">
                <td class="bordered">
                    <label for="">Last name</label> <br>
                    <input type="text"  class="  text-center form-control-lg" name="emp_L_name" value="<?=$row['emp_L_name']?>">
                </div>
              </tr>

              <tr class="bordered">
                <td class="bordered">
                    <label for="">Age</label><br>
                    <input type="text" class=" text-center form-control-lg" name="emp_age" value="<?=$row['emp_age']?>">
                </td>
              </tr>
              <tr class="bordered">
                <td class="bordered">
                    <label for="">Adhaar Card No.</label><br>
                    <input type="text" class=" text-center form-control-lg" name="emp_adhaar" value="<?=$row['emp_adhaar']?>">
                </td>
              </tr>

              <tr>
                <td>
                      <label for="">Phone no.</label><br>
                      <input type="number" class="  text-center form-control-lg"  name="emp_phn" value="<?=$row['emp_phn']?>">
                  </td>
              </tr>

              <tr>
                <td>
                      <label for="">Address</label><br>
                      <input type="text" name="emp_add"  class="   text-center   form-control-lg" value="<?=$row['emp_add']?>">

                </td>
              </tr>

              <tr>
                <td>
                    <label for="">City</label> <br>
                  <input type="text" name="emp_city" class="   text-center  form-control-lg" value="<?=$row['emp_city']?>">
                </td>
              </tr>


              <tr>
                <td>
                      <label for="">Pin code</label> <br>
                      <input type="number" class="   text-center form-control-lg" name="emp_pin" value="<?=$row['emp_pin']?>">
                </td>
              </tr>



              <tr >
                <td >
                        <label for="">State</label> <br>
                      <input type="text" class="  text-center form-control-lg" name="emp_state" value="<?=$row['emp_state']?>">
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

            $emp_id=$_GET['edit'];
            $emp_f_name=$_POST['emp_f_name'];
            $emp_phn=$_POST['emp_phn'];
            $emp_add=$_POST['emp_add'];
            $emp_pin=$_POST['emp_pin'];

            $emp_L_name=$_POST['emp_L_name'];
            $emp_age=$_POST['emp_age'];
            $emp_city=$_POST['emp_city'];
            $emp_state=$_POST['emp_state'];
            $emp_img = $_FILES['emp_img']['name'];
            $emp_img_tmp =  $_FILES['emp_img']['tmp_name'];
            move_uploaded_file($emp_img_temp,"../image/$emp_img");

            $update="UPDATE employee
            set
            emp_f_name='$emp_f_name',emp_L_name='$emp_L_name',emp_phn='$emp_phn',emp_add=  '".mysql_real_escape_string($emp_add)."',emp_pin='$emp_pin',emp_age='$emp_age',emp_city='$emp_city',emp_state='$emp_state',emp_img='$emp_img' where emp_id='$emp_id'";
            mysql_query($update);
            echo "<script>alert('data updated')</script>";
            redirect('emp_profile');
          }



          elseif(isset($_POST['update'])){

              $emp_id=$_GET['edit'];
              $emp_f_name=$_POST['emp_f_name'];
              $emp_phn=$_POST['emp_phn'];
              $emp_add=$_POST['emp_add'];
              $emp_pin=$_POST['emp_pin'];
              $emp_adhaar=$_POST['emp_adhaar'];
              $emp_L_name=$_POST['emp_L_name'];
              $emp_age=$_POST['emp_age'];
              $emp_city=$_POST['emp_city'];
              $emp_state=$_POST['emp_state'];

              $update="UPDATE employee
              set
              emp_f_name='$emp_f_name',emp_L_name='$emp_L_name',emp_phn='$emp_phn',emp_add='".mysql_real_escape_string($emp_add)."',emp_pin='$emp_pin',emp_adhaar='$emp_adhaar',emp_age='$emp_age',emp_city='$emp_city',emp_state='$emp_state' where emp_id='$emp_id'";
              mysql_query($update);
              echo "<script>alert('data updated')</script>";
              redirect('emp_profile');

            }


          ?>

          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

          <!--this link is for popper-->
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

          <!--this link is for js-->
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
</html>
