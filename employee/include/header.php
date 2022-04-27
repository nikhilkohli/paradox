<nav class="navbar navbar-expand-lg sticky-top"  style="background:linear-gradient(#f18c8e,#f1d1b5,#f0b7a4)">
  <div class="navbar-header">
      <a href="index.php" class="navbar-brand text-dark"><img src="..\image\food1.png" alt="" height=50px width=35%></a>
  </div>

  <!--this code is done for making a three lined button to make the page responsive-->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon color-dark"></span>
  </button>


    <div class="collapse navbar-collapse" id="navbarColor01"><!--this line is written for toggeling the navbar items in smaller screen-->


  <ul class="navbar nav ml-auto">

    <?php
        if(isset($_SESSION['employee'])):
          $log = $_SESSION['employee'];
          $query = mysql_query("SELECT * FROM employee where emp_email='$log'");
          $row = mysql_fetch_array($query);

        ?>

        <li class=nav-item"">  <div class="dropdown nav-link ">
                <div class=" dropdown-toggle text-dark"  id="dropdownMenuButton text-dark" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <img src="../image/<?= $row['emp_img']; ?>" width="20px" class="mr-2 rounded-circle"><?= $row['emp_f_name'];?>
                </div>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="emp_profile.php">My Profile</a>
                  <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
          </div></li>

          <li class="nav-item">
            <a href="index.php" class="text-dark mr-3">Home</a>
          </li>
          <li class="nav-item">
            <a href="emp_insert.php" class="text-dark mr-2">Add Product</a>
          </li>

        <?php endif; ?>






  </ul>
</nav>
