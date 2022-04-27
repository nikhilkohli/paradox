
<?php include_once "assets/config.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>paradox | online Dairy products available Here</title>
      <link rel = "icon" href = "image\ico.gif" type = "image/x-icon">
      <link rel="stylesheet" href="bootstrap\bootstrap.min.css">
      <link href="https://fonts.googleapis.com/css?family=Satisfy&display=swap" rel="stylesheet">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="css\career.css">
  </head>
  <body style="background:linear-gradient(-90deg, #e8bacb,#ffffff, #e6c2cf)">
    <?php include"assets/header.php"?>
  <!--this will includer header file-->
  <!--in the below section 2nd navbar code is written-->
    <div class="container-fluid bg-dark" style="margin-top:70px">
           <div class="row">
                <div class="col-md-6 m-auto">
                    <a href="" class="btn btn-info text-light px-1 py-0"> <i class="fa fa-facebook"></i> </a>
                    <a href="" class="btn btn-danger text-light px-1 py-0"> <i class="fa fa-youtube"></i> </a>
                    <a href="" class="btn btn-warning text-light px-1 py-0"> <i class="fa fa-twitter"></i> </a>
                    <a href="" class="btn btn-primary text-light px-1 py-0"> <i class="fa fa-instagram"></i> </a>
                </div>

                        <!--2nd section contact us-->
                        <div class="col-md-6 p-2 text-right">
                             <a href="" class=" text-light mr-3"> <i class="fa fa-phone"></i>+91 7033279724</a>
                             <a href="" class="text-light "> <i class="fa fa-envelope"></i>infotheparadox@gmail.com</a>
                    </div>
             </div>
    </div>
<!--2nd navbar code completes-->
    <div class="row">
      <div class="col-lg-12">
        <img src="image\careerbanner.jpg" alt="" class="w-100">
      </div>

    </div>


       <div class="row">
           <div class="col-md-6 m-auto section text-center">
               <h3 class="display-4 text- font-weight-bold title" style="color: #e83e8c">Join our team</h3>
             
               <p class="small text-justify text-center" style="">Our undivided love for grocery products in and around the country, is always in a hunt for those who share the same passion for grocery as we do. We’re a super dynamic team of go-getters, who believe in themselves, and the idea that drives them.</p>
               <p class="small text-justify text-center"><b> paradox</b> is built around the idea that everyone should have access to fresh products, no matter where they stay, what do they do, and how tech savvy are they. If you think you can offer the same level of convenience to our customers through what you do, please drop in or just drop down a mail to <b>infotheparadox@gmailcom.</b></p>
           </div>
       </div><br><br>



       <div class="row px-2">
           <div class="col-md-7 m-auto section1 text-center pt-3">
               <h3 class="h3 m-auto" style="font-family: serif;">Upload Your Resume</h3>
               <div class="">
                   <form action="career.php" class="form">
                       <div class="row">
                           <div class="col-md-10 m-auto">
                               <input type="text" class="" placeholder="name*">
                           </div>
                       </div>
                       <div class="row">
                           <div class="col-md-1"></div>
                           <div class="col-md-5 m-auto">
                               <input type="text" class="" placeholder="phone*">
                               <input type="text" class="" placeholder="Email Address*">
                           </div>
                            <div class="col-md-5 m-auto">
                               <div class="c1">
                                  <input type="checkbox" class="checkbox mr-auto px-4 py-2" name="Location" value="area">Location
                                  <input type="checkbox" class="checkbox mr-auto px-4 py-2" name="city" value="city">City
                                  <input type="checkbox" class="checkbox mr-auto px-4 py-2" name="state" value="state">state
                               </div>
                           </div>
                           <div class="col-md-1"></div>

                       </div>
                       <div class="row">
                           <div class="col-md-10 m-auto">
                               <input type="file">
                           </div>
                       </div>
                       <div class="row">
                           <div class="col-md-10 m-auto pt-4">
                               <textarea name="" id="" cols="30" rows="5" class="" placeholder="Brief Description*"></textarea>
                           </div>
                       </div>
                       <div class="row">
                           <div class="col-md-10 m-auto pt-5">
                                <input type="submit" class="button" value="send" name="send">
                           </div>
                       </div>
                   </form>
               </div>
           </div>
       </div>

<?php include"assets/footer.php"?>

    </body>
</html>
