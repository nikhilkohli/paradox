
<?php include_once"assets/config.php";
use PHPMailer\PHPMailer\PHPMailer;
require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>foodstuff | online Dairy products available Here</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel = "icon" href = "image\ico.gif" type = "image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Satisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">

    <link rel="stylesheet" type="text/css" href="css/Sign_style.css">
    <link rel="stylesheet" href="css\body.css">
 </head>

 <body>
    <?php include"assets/header.php";?>

    <div style="background:url('image/15.jpg');background-repeat:no-repeat;background-size:cover;position:relative;">
      <div style="background-color:rgba(0,0,0,.6);position:relative">
        <div class="container-fluid mt-5" class="login-container d-flex align-items-center justify-content-cent" style="margin-top:60px">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <form class="login-form text-center" method="post" action="register_customer_account.php" enctype="multipart/form-data">
                                <h2 class="mb-5 mt-3 text-uppercase text-white" style="font-family: 'Kaushan Script',cursive;color:#ff0867">
                                  Sign Up Here
                                </h2>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <input type="text" class="form-control rounded-pill form-control-lg" placeholder="First Name"  name="c_f_name" required>
                                    </div>

                                    <div class="form-group col-6">
                                        <input type="text" class="form-control rounded-pill form-control-lg" placeholder="Last Name" name="c_L_name" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <input type="password" id="txtNewPassword" placeholder="Enter passward" name="c_pass"class="form-control rounded-pill form-control-lg" required>
                                    </div>

                                    <div class="form-group col-5">
                                        <input  type="password" id="txtConfirmPassword" placeholder="Confirm Passward" name="c_con_pass" class="form-control rounded-pill form-control-lg" required>
                                    </div>


                                      <div class="col-lg-1 py-3" style="margin-left:-5%;">
                                        <div style="color:red; float:right" id="CheckPasswordMatch"></div>
                                      </div>

                                </div>

                                  <div class="row">
                                    <div class="form-group col-6">
                                        <input type="number" class="form-control rounded-pill form-control-lg" placeholder="Age" name="c_age" required>
                                    </div>

                                    <div class="form-group col-6">
                                        <select class="form-control rounded-pill form-control-lg" name="c_gen">
                                            <option value="" selected disabled hidden>Gender</option>
                                            <option>male</option>
                                            <option>female</option>
                                            <option>other</option>
                                        </select>
                                   </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <input type="email" class="form-control rounded-pill form-control-lg"placeholder="Email" name="c_email" required>
                                    </div>

                                    <div class="form-group col-6">
                                        <input  oninput="count()" onfocusout="chkPhn()" id="inp" type="number" class="form-control rounded-pill form-control-lg"placeholder=" Phone" name="c_phn" required><b><span  style="opacity:0.0"id="invalid">inavalid</span></b>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <input type="textarea" class="form-control rounded-pill form-control-lg"placeholder="Address" name="c_add" required>
                                    </div>

                                    <div class="form-group col-6">
                                        <select class="form-control rounded-pill form-control-lg" name="c_city">
                                          <option selected="selected">City</option>
                                           <option disabled="disabled" style="background-color:#3E3E3E"><font color="#000000"><i>-Top Metropolitan Cities-</i></font></option>
                                           <option>Ahmedabad</option>
                                           <option>Bengaluru/Bangalore</option>
                                           <option>Chandigarh</option>
                                           <option>Chennai</option>
                                           <option>Delhi</option>
                                           <option>Gurgaon</option>
                                           <option>Hyderabad/Secunderabad</option>
                                           <option>Kolkatta</option>
                                           <option>Mumbai</option>
                                           <option>Noida</option>
                                           <option>Pune</option>
                                           <option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Andhra Pradesh-</i></font></option>
                                           <option>Anantapur</option>
                                           <option>Guntakal</option>
                                           <option>Guntur</option>
                                           <option>Hyderabad/Secunderabad</option>
                                           <option>kakinada</option>
                                           <option>kurnool</option>
                                           <option>Nellore</option>
                                           <option>Nizamabad</option>
                                           <option>Rajahmundry</option>
                                           <option>Tirupati</option>
                                           <option>Vijayawada</option>
                                           <option>Visakhapatnam</option>
                                           <option>Warangal</option>
                                           <option>Andra Pradesh-Other</option>
                                           <option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Arunachal Pradesh-</i></font></option>
                                           <option>Itanagar</option>
                                           <option>Arunachal Pradesh-Other</option>
                                           <option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Assam-</i></font></option>
                                           <option>Guwahati</option>
                                           <option>Silchar</option>
                                           <option>Assam-Other</option>
                                           <option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Bihar-</i></font></option>
                                           <option>Bhagalpur</option>
                                           <option>Patna</option>
                                           <option>Purnia</option>
                                           <option>katihar</option>
                                           <option>Bihar-Other</option>
                                           <option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Chhattisgarh-</i></font></option>
                                           <option>Bhillai</option>
                                           <option>Bilaspur</option>
                                           <option>Raipur</option>
                                           <option>Chhattisgarh-Other</option>
                                           <option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Goa-</i></font></option>
                                           <option>Panjim/Panaji</option>
                                           <option>Vasco Da Gama</option>
                                           <option>Goa-Other</option>
                                           <option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Gujarat-</i></font></option>
                                           <option>Ahmedabad</option>
                                           <option>Anand</option>
                                           <option>Ankleshwar</option>
                                           <option>Bharuch</option>
                                           <option>Bhavnagar</option>
                                           <option>Bhuj</option>
                                           <option>Gandhinagar</option>
                                           <option>Gir</option>
                                           <option>Jamnagar</option>
                                           <option>Kandla</option>
                                           <option>Porbandar</option>
                                           <option>Rajkot</option>
                                           <option>Surat</option>
                                           <option>Vadodara/Baroda</option>
                                           <option>Valsad</option>
                                           <option>Vapi</option>
                                           <option>Gujarat-Other</option>
                                           <option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Haryana-</i></font></option>
                                           <option>Ambala</option>
                                           <option>Chandigarh</option>
                                           <option>Faridabad</option>
                                           <option>Gurgaon</option>
                                           <option>Hisar</option>
                                           <option>Karnal</option>
                                           <option>Kurukshetra</option>
                                           <option>Panipat</option>
                                           <option>Rohtak</option>
                                           <option>Haryana-Other</option>
                                           <option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Himachal Pradesh-</i></font></option>
                                           <option>Dalhousie</option>
                                           <option>Dharmasala</option>
                                           <option>Kulu/Manali</option>
                                           <option>Shimla</option>
                                           <option>Himachal Pradesh-Other</option>
                                           <option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Jammu and Kashmir-</i></font></option>
                                           <option>Jammu</option>
                                           <option>Srinagar</option>
                                           <option>Jammu and Kashmir-Other</option>
                                           <option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Jharkhand-</i></font></option>
                                           <option>Bokaro</option>
                                           <option>Dhanbad</option>
                                           <option>Jamshedpur</option>
                                           <option>Ranchi</option>
                                           <option>Jharkhand-Other</option>
                                           <option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Karnataka-</i></font></option>
                                           <option>Bengaluru/Bangalore</option>
                                           <option>Belgaum</option>
                                           <option>Bellary</option>
                                           <option>Bidar</option>
                                           <option>Dharwad</option>
                                           <option>Gulbarga</option>
                                           <option>Hubli</option>
                                           <option>Kolar</option>
                                           <option>Mangalore</option>
                                           <option>Mysoru/Mysore</option>
                                           <option>Karnataka-Other</option>
                                           <option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Kerala-</i></font></option>
                                           <option>Calicut</option>
                                           <option>Cochin</option>
                                           <option>Ernakulam</option>
                                           <option>Kannur</option>
                                           <option>Kochi</option>
                                           <option>Kollam</option>
                                           <option>Kottayam</option>
                                           <option>Kozhikode</option>
                                           <option>Palakkad</option>
                                           <option>Palghat</option>
                                           <option>Thrissur</option>
                                           <option>Trivandrum</option>
                                           <option>Kerela-Other</option>
                                           <option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Madhya Pradesh-</i></font></option>
                                           <option>Bhopal</option>
                                           <option>Gwalior</option>
                                           <option>Indore</option>
                                           <option>Jabalpur</option>
                                           <option>Ujjain</option>
                                           <option>Madhya Pradesh-Other</option>
                                           <option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Maharashtra-</i></font></option>
                                           <option>Ahmednagar</option>
                                           <option>Aurangabad</option>
                                           <option>Jalgaon</option>
                                           <option>Kolhapur</option>
                                           <option>Mumbai</option>
                                           <option>Mumbai Suburbs</option>
                                           <option>Nagpur</option>
                                           <option>Nasik</option>
                                           <option>Navi Mumbai</option>
                                           <option>Pune</option>
                                           <option>Solapur</option>
                                           <option>Maharashtra-Other</option>
                                           <option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Manipur-</i></font></option>
                                           <option>Imphal</option>
                                           <option>Manipur-Other</option>
                                           <option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Meghalaya-</i></font></option>
                                           <option>Shillong</option>
                                           <option>Meghalaya-Other</option>
                                           <option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Mizoram-</i></font></option>
                                           <option>Aizawal</option>
                                           <option>Mizoram-Other</option>
                                           <option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Nagaland-</i></font></option>
                                           <option>Dimapur</option>
                                           <option>Nagaland-Other</option>
                                           <option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Orissa-</i></font></option>
                                           <option>Bhubaneshwar</option>
                                           <option>Cuttak</option>
                                           <option>Paradeep</option>
                                           <option>Puri</option>
                                           <option>Rourkela</option>
                                           <option>Orissa-Other</option>
                                           <option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Punjab-</i></font></option>
                                           <option>Amritsar</option>
                                           <option>Bathinda</option>
                                           <option>Chandigarh</option>
                                           <option>Jalandhar</option>
                                           <option>Ludhiana</option>
                                           <option>Mohali</option>
                                           <option>Pathankot</option>
                                           <option>Patiala</option>
                                           <option>Punjab-Other</option>
                                           <option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Rajasthan-</i></font></option>
                                           <option>Ajmer</option>
                                           <option>Jaipur</option>
                                           <option>Jaisalmer</option>
                                           <option>Jodhpur</option>
                                           <option>Kota</option>
                                           <option>Udaipur</option>
                                           <option>Rajasthan-Other</option>
                                           <option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Sikkim-</i></font></option>
                                           <option>Gangtok</option>
                                           <option>Sikkim-Other</option>
                                           <option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Tamil Nadu-</i></font></option>
                                           <option>Chennai</option>
                                           <option>Coimbatore</option>
                                           <option>Cuddalore</option>
                                           <option>Erode</option>
                                           <option>Hosur</option>
                                           <option>Madurai</option>
                                           <option>Nagerkoil</option>
                                           <option>Ooty</option>
                                           <option>Salem</option>
                                           <option>Thanjavur</option>
                                           <option>Tirunalveli</option>
                                           <option>Trichy</option>
                                           <option>Tuticorin</option>
                                           <option>Vellore</option>
                                           <option>Tamil Nadu-Other</option>
                                           <option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Tripura-</i></font></option>
                                           <option>Agartala</option>
                                           <option>Tripura-Other</option>
                                           <option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Union Territories-</i></font></option>
                                           <option>Chandigarh</option>
                                           <option>Dadra & Nagar Haveli-Silvassa</option>
                                           <option>Daman & Diu</option>
                                           <option>Delhi</option>
                                           <option>Pondichery</option>
                                           <option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Uttar Pradesh-</i></font></option>
                                           <option>Agra</option>
                                           <option>Aligarh</option>
                                           <option>Allahabad</option>
                                           <option>Bareilly</option>
                                           <option>Faizabad</option>
                                           <option>Ghaziabad</option>
                                           <option>Gorakhpur</option>
                                           <option>Kanpur</option>
                                           <option>Lucknow</option>
                                           <option>Mathura</option>
                                           <option>Meerut</option>
                                           <option>Moradabad</option>
                                           <option>Noida</option>
                                           <option>Varanasi/Banaras</option>
                                           <option>Uttar Pradesh-Other</option>
                                           <option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Uttaranchal-</i></font></option>
                                           <option>Dehradun</option>
                                           <option>Roorkee</option>
                                           <option>Uttaranchal-Other</option>
                                           <option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-West Bengal-</i></font></option>
                                           <option>Asansol</option>
                                           <option>Durgapur</option>
                                           <option>Haldia</option>
                                           <option>Kharagpur</option>
                                           <option>Kolkatta</option>
                                           <option>Siliguri</option>
                                           <option>West Bengal - Other</option>
                                           <option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Other-</i></font></option>
                                           <option>Other</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <select class="form-control rounded-pill form-control-lg" name="c_state">
                                          <option  selected disabled hidden>State</option>
                                          <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                          <option value="Andhra Pradesh">Andhra Pradesh</option>
                                          <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                          <option value="Assam">Assam</option>
                                          <option value="Bihar">Bihar</option>
                                          <option value="Chandigarh">Chandigarh</option>
                                          <option value="Chhattisgarh">Chhattisgarh</option>
                                          <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                          <option value="Daman and Diu">Daman and Diu</option>
                                          <option value="Delhi">Delhi</option>
                                          <option value="Goa">Goa</option>
                                          <option value="Gujarat">Gujarat</option>
                                          <option value="Haryana">Haryana</option>
                                          <option value="Himachal Pradesh">Himachal Pradesh</option>
                                          <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                          <option value="Jharkhand">Jharkhand</option>
                                          <option value="Karnataka">Karnataka</option>
                                          <option value="Kerala">Kerala</option>
                                          <option value="Lakshadweep">Lakshadweep</option>
                                          <option value="Madhya Pradesh">Madhya Pradesh</option>
                                          <option value="Maharashtra">Maharashtra</option>
                                          <option value="Manipur">Manipur</option>
                                          <option value="Meghalaya">Meghalaya</option>
                                          <option value="Mizoram">Mizoram</option>
                                          <option value="Nagaland">Nagaland</option>
                                          <option value="Orissa">Orissa</option>
                                          <option value="Pondicherry">Pondicherry</option>
                                          <option value="Punjab">Punjab</option>
                                          <option value="Rajasthan">Rajasthan</option>
                                          <option value="Sikkim">Sikkim</option>
                                          <option value="Tamil Nadu">Tamil Nadu</option>
                                          <option value="Tripura">Tripura</option>
                                          <option value="Uttaranchal">Uttaranchal</option>
                                          <option value="Uttar Pradesh">Uttar Pradesh</option>
                                          <option value="West Bengal">West Bengal</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-6">
                                        <input type="number" class="form-control rounded-pill form-control-lg"placeholder="Pin code" name="c_pin" required>
                                    </div>
                                  </div>

                                  <div class="col-12 form-group">
                                      <label for="" class="text-white">Profile Photo</label>
                                          <input type="file" name="c_img" class="form-control rounded-pill form-control-lg" >
                                  </div>



                                 <div class="form-group">
                                        <input type="submit" class="btn btn-success btn-block form-control rounded-pill form-control-lg" value="REGISTER ACCOUNT" name="c_register">
                                 </div>

                                 <div class="col-12 text-right text-small text-white" >
                                      Already hava an account? <a href="login.php" >Login</a>
                                 </div>
                          </form>
                    </div>
               </div>
           </div>

           <script>
              function checkPasswordMatch() {
                  var password = $("#txtNewPassword").val();
                  var confirmPassword = $("#txtConfirmPassword").val();
                  if (password != confirmPassword)
                      $("#CheckPasswordMatch").html('<i class="fas fa-times-circle" style="height:30px;width:10%"></i>');
                  else {
                      $("#CheckPasswordMatch").html(' <i class="fas fa-check-circle" style="color:green" style="height:30px;width:10%"></i>');
                  }
              }
              $(document).ready(function () {
                 $("#txtConfirmPassword").keyup(checkPasswordMatch);
              });

              var c=0;
              var v=0;
              function count()
              {

              var i=document.getElementById("invalid");

                 i.style.color="white";
                 i.style.opacity"0.9";
                 c=c+1;
                 var x= document.getElementById("inp");
                 if(c==1 && x.value<6)

                 {
                   v=1;
                 }

                }



                function chkPhn()
                      {
                       var y= document.getElementById("inp");
                       var a=y.value;

                       if(v==1 || a.length!=10)
                       {
                         var i=document.getElementById("invalid");

                         i.style.color="red";
                         i.style.opacity="0.9";
                         y.style.border="solid 1px red";
                       }
                       else{
                         y.style.border="solid 1px #ccc";
                       }
                     }

              </script>
               <?php include"assets/footer.php"?>
         </div></div>
     </body>
 </html>

 <?php
 if(isset($_POST['c_register'])){
   $c_f_name=$_POST['c_f_name'];
   $c_phn=$_POST['c_phn'];
   $c_email=$_POST['c_email'];
   $c_add=$_POST['c_add'];
   $c_pin=$_POST['c_pin'];
   $c_pass=$_POST['c_pass'];
   $c_L_name=$_POST['c_L_name'];
   $c_age=$_POST['c_age'];
   $c_gen=$_POST['c_gen'];
   $c_city=$_POST['c_city'];
   $c_state=$_POST['c_state'];
   $c_img = $_FILES['c_img']['name'];
   $c_img_tmp =  $_FILES['c_img']['tmp_name'];
   move_uploaded_file($c_img_tmp,"image/$c_img");

   $duplicate=mysql_query("SELECT * FROM customer WHERE c_email='$c_email'");
   if(mysql_num_rows($duplicate)>0){
     	echo "<script>alert('This Email Id is Already Existed')</script>";
   }
   else{
     $query = mysql_query("INSERT INTO customer (c_f_name,c_phn,c_email,c_add,c_pin,c_pass,c_img,c_L_name,c_age,c_gen,c_city,c_state) value('$c_f_name','$c_phn','$c_email','".mysql_real_escape_string($c_add)."','$c_pin','$c_pass','$c_img','$c_L_name','$c_age','$c_gen','$c_city','$c_state')");
     $c_code_update=mysql_query("UPDATE customer SET c_code = concat( cstr, c_id )");
  //   send_sms($_POST['c_phn'],"Dear " . $_POST['c_f_name'] . ", your account for foodstuff is created successfully :)  KEEP SHOPPING");

     $c_code=mysql_query("SELECT c_code FROM customer WHERE c_email='$c_email'");
     $mail = new PHPMailer(true);

       $name = $_POST['c_f_name'];
       $email = $c_email;

       try{
      $mail->isSMTP();
         $mail->Host = 'smtp.gmail.com';
         $mail->SMTPAuth = true;
         $mail->Username = 'ideasdo.edu@gmail.com'; // Gmail address which you want to use as SMTP server
         $mail->Password = '1234divya*'; // Gmail address Password
         $mail->SMTPSecure = "tls";
         $mail->Port = 587;
         $mail->CharSet = "UTF-8";

         $mail->setFrom('ideasdo.edu@gmail.com'); // Gmail address which you used as SMTP server
         $mail->addAddress($email); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

         $mail->isHTML(true);
         $mail->Subject = 'Your Order has been placed ';
         $mail->Body = "<h3>Dear $name , <br>You have successfully registered as a vendor with FOODSTUFF.<br>Your vendor ID is $v_code <br>Thanks For being the member of our family!</h3>";


       } catch (Exception $e){}

  echo "<script>window.open('login.php','_self')</script>";


   }

 }


 ?>
