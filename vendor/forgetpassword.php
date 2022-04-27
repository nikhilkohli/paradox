<?php
use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['name']) && isset($_POST['email'])){
  $email = $_POST['email'];

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

    $mail = new PHPMailer();

    //smtp settings
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "ideasdo.edu@gmail.com";
    $mail->Password = '1234divya*';
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    //email settings
    $mail->isHTML(true);
    $mail->setFrom("ideasdo.edu@gmail.com");
      $mail->addAddress($email);

  /*  $mail->setFrom($email, $name);
    $mail->addAddress("divyasuman184@gmail.com");*/
    $mail->Subject = 'hi';
    $mail->Body = 'hlow';

    if($mail->send()){
        $status = "success";
        $response = "Email is sent!";
    }
    else
    {
        $status = "failed";
        $response = "Something is wrong: <br>" . $mail->ErrorInfo;
    }

    exit(json_encode(array("status" => $status, "response" => $response)));
}



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

  <div class="container">
    <div class="row mt-5">
      <div class="col-lg-12 ml-auto">

        <form   id="myForm" method="post" enctype="multipart/form-data" style="background:#dbd7d7" >
          <h2 class="mb-5 mt-3 text-uppercase text-center" style="font-family: 'Kaushan Script',cursive;color:#ff0867">
            confirm password
          </h2>
          <div class="form-group col-6">

                <input type="text" id="name" class="form-control rounded-pill form-control-lg" name="name" placeholder="enter your name">
          </div>
          <div class="form-group col-6">

                <input type="text"   id="email" class="form-control rounded-pill form-control-lg" name="email" placeholder="enter your registere email">
          </div>
          <div class="form-group">
               <input type="button" onclick="sendEmail()" class="btn btn-success btn-block form-control rounded-pill form-control-lg" name="chkmail" value="confirm your email" class="mt-5">
           </div>

        </form>

        </div>

    </div>
  </div>

  <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
        function sendEmail() {
            var name = $("#name");
            var email = $("#email");


            if (isNotEmpty(name) && isNotEmpty(email)) {
                $.ajax({
                   url: 'sendEmail.php',
                   method: 'POST',
                   dataType: 'json',
                   data: {
                       name: name.val(),
                       email: email.val(),

                   }, success: function (response) {
                        $('#myForm')[0].reset();
                        $('.sent-notification').text("Message Sent Successfully.");
                   }
                });
            }
        }

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }
    </script>




</body>
</html>
