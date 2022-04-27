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
     <link rel="stylesheet" href="..\css\body.css">
     <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Satisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
  </head>
  <body style="background:#f1f3f6">

      <?php include"header.php"?>
      <div class="container-fluid" style="padding-right:100px;padding-left:100px;margin-top:100px">
<u> <h2 style="font-family:'cursive'">MY PROFILE</h2></u>
      <?php

        if(isset($_SESSION['vendor'])):
          $log=$_SESSION['vendor'];
          $calling = mysql_query("select * from vendor where v_email='$log'");
          $row = mysql_fetch_array($calling);?>

		  <table class="table table-bordered mt-5">

                                <tr>
                                  <th> Your Vendor ID No.</th>
                                  <td><?= $row['v_code'];?> </td>
                                </tr>
                                <tr>
                                  <th> name</th>
                                  <td><?= $row['v_f_name'];?> <?= $row['v_L_name'];?></td>
                                </tr>
                                <tr>
                                  <th> age</th>
                                  <td><?= $row['v_age'];?></td>
                                </tr>
                                <tr>
                                  <th> Phone No.</th>
                                  <td><?= $row['v_email'];?></td>
                                </tr>
                                <tr>
                                  <th> Address</th>
                                  <td><?= $row['v_add'];?></td>
                                </tr>
                                <tr>
                                  <th> City</th>
                                  <td><?= $row['v_city'];?></td>
                                </tr>
                                <tr>
                                  <th> state</th>
                                  <td><?= $row['v_state'];?></td>
                                </tr>
                                <tr>
                                  <th> pin</th>
                                  <td><?= $row['v_pin'];?></td>
                                </tr>
                                <tr>
                                  <th> photo</th>

                                          <td><img src="..\image\<?= $row['v_img'];?>" alt="" height="40px" width="40px"></a></td>

                                </tr>
      </table>
<?php endif;?>
                  <a href='v_profile_edit.php?edit=<?= $row['v_id']?>' class="btn btn-info">
                    <i class="fas fa-pen-alt" name="edit">UPDATE?</i>
                  </a>


                  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

                  <!--this link is for popper-->
                  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

                  <!--this link is for js-->
                  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
