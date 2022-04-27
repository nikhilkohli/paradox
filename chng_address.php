
<?php include_once "assets/config.php";
session_start();
if(!isset($_SESSION['customer'])):
  header("location: login.php");
endif;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>foodstuff | online Dairy products available Here</title>
    <link rel="stylesheet" href="bootstrap\bootstrap.min.css">
    <link rel = "icon" href = "image\icon1.png" type = "image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">

  </head>

  <body style="background:#8f8c8c;">
    <?php include"assets/header.php"?>
    <?php
        $edit= $_GET['edit'];
        $query = mysql_query("SELECT * FROM customer where c_id='$edit'");
        $row=mysql_fetch_array($query);?>

  <div class="container">
    <div class="row mt-5">
      <div class="col-lg-12 ml-auto">

          <form  action="chng_address.php?edit=<?=$_GET['edit']?>" method="post" enctype="multipart/form-data" style="background:#dbd7d7" >
            <h2 class="mb-3 mt-5 text-uppercase text-center" style="font-family: 'Kaushan Script',cursive;color:#ff0867">
              CHANGE YOUR ADDRESS HERE
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
                <th>Address Detail</th>

              </tr>

              <tr class="bordered">
                <td class="bordered">

                        <label for=""> Fist Name</label> <br>
                        <input type="text" class=" text-center form-control-lg" name="c_f_name" value="<?=$row['c_f_name']?>">

                </td>

              </tr>

              <tr class="bordered">
                <td class="bordered">
                    <label for="">Last name</label> <br>
                    <input type="text"  class="  text-center form-control-lg" name="c_L_name" value="<?=$row['c_L_name']?>">
                </div>
              </tr>


              <tr>
                <td>
                      <label for="">Phone no.</label><br>
                      <input type="number" class="  text-center form-control-lg"  name="c_phn" value="<?=$row['c_phn']?>">
                  </td>
              </tr>

              <tr>
                <td>
                      <label for="">Address</label><br>
                      <input type="text" name="c_add"  class="   text-center   form-control-lg" value="<?=$row['c_add']?>">

                </td>
              </tr>

              <tr>
                <td>
                    <label for="">City</label> <br>
                  <input type="text" name="c_city" class="   text-center  form-control-lg" value="<?=$row['c_city']?>">
                </td>
              </tr>


              <tr>
                <td>
                      <label for="">Pin code</label> <br>
                      <input type="number" class="   text-center form-control-lg" name="c_pin" value="<?=$row['c_pin']?>">
                </td>
              </tr>


              <tr >
                <td >
                        <label for="">State</label> <br>
                      <input type="text" class="  text-center form-control-lg" name="c_state" value="<?=$row['c_state']?>">
                  </td>
              </tr>


              <tr>
                <td>  <div class="form-group">
                      <input type="submit" class="btn btn-success btn-block form-control rounded-pill form-control-lg" name="update" value="UPDATE" class="mt-5">
                  </div></td>

              </tr>
            </table>

          </form>

        </div>

    </div>
  </div>



        <?php


          if(isset($_POST['update'])){

              $c_id=$_GET['edit'];
              $c_f_name=$_POST['c_f_name'];
              $c_phn=$_POST['c_phn'];
              $c_add=$_POST['c_add'];
              $c_pin=$_POST['c_pin'];
              $c_L_name=$_POST['c_L_name'];
              $c_city=$_POST['c_city'];
              $c_state=$_POST['c_state'];

              $update="UPDATE customer
              set
              c_f_name='$c_f_name',c_L_name='$c_L_name',c_phn='$c_phn',c_add='$c_add',c_pin='$c_pin',c_city='$c_city',c_state='$c_state' where c_id='$c_id'";
              mysql_query($update);
              echo "<script>alert('data updated')</script>";
              redirect('mycart');

            }


          ?>

          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

          <!--this link is for popper-->
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

          <!--this link is for js-->
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
</html>
