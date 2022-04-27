<?php
include_once "assets/config.php";
use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);
  $alert='';


if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $query=mysql_query("SELECT * FROM vendor where v_email='$email' ");
  $row = mysql_fetch_array($query);
  $c=mysql_num_rows($query);
      if($c>0){

  $pass=$row['v_pass'];
  $v_code=$row['v_code'];



  try{
   $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'youremail@gmail.com'; // Gmail address from which you want to use as SMTP server
    $mail->Password = 'your_gmail_password'; // Gmail address Password
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;
    $mail->CharSet = "UTF-8";

    $mail->setFrom('ideasdo.edu@gmail.com'); // Gmail address which you used as SMTP server
    $mail->addAddress($email); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = 'Foodstuff ';
    $mail->Body = "<h3>Dear $name , <br>your password is $pass .<br>Thank you!</h3>";

    $mail->send();
    $alert = '<div class="alert-success">
                 <span>Your password is sent to your registered email! Please check your email.</span>
                </div>';
  } catch (Exception $e){
    $alert = '<div class="alert-error">
                <span>'.$e->getMessage().'</span>
              </div>';
  }

}

else{
  $alert = '<div class="alert-error">
              <span>You are not registered user</span>
            </div>';
}

}

?>
