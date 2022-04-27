<?php include_once "../assets/config.php";
session_start();
if(!isset($_SESSION['admin'])):
  echo"<script>window.open('admin_login.php','_self')</script>";
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

  <body>
    <?php include "include/header.php"; ?>

    <div class="container-fluid mt-3">
      <div class="row">
        <div class="col-lg-3">
        <?php include "include/side.php";?>
        </div>

        <div class="col-lg-9">
            <div class="row">
                    <div class="col-5">
                        <blockquote class="blockquote"><h2 class="font-weight-bold h5 my-4">All Categories</h2></blockquote>
                    </div>
                    <div class="col-3">
                          <a href="cat_add.php"  class="btn btn-warning mt-3" > <b>Add More Category</b></a>
                    </div>
                    <div class="col-4">

                      <form action="category.php"  method="get" class="form-inline mt-3">
                          <input type="search" placeholder="Search Categories" class="form-control" name="cat_search" value="<?php if(isset($_GET['cat_search'])){echo $_GET['cat_search'];}?>">
                            <?php
                            if(isset($_GET['cat_search'])): ?>
                              <a href="category.php" class="btn btn-danger">X</a>

                            <?php else: ?>
                            <input type="submit" value="Go" name="find" class="btn btn-success">
                            <?php endif;?>


                      </form>

                    </div>
              </div>

          <table class="table table-bordered">
            <tr>
              <th>Serial no.</th>
              <th>Category Name</th>
              <th>Action</th>

            </tr>


            <?php
            if(isset($_GET['find'])):
              $search = $_GET['cat_search'];
              $calling=mysql_query("SELECT * from category where cat_title like '%$search%'");
              $count=mysql_num_rows($calling);
                  if($count==0):
                    echo"<h1>No category of this name</h1>";

                  endif;
            else:
              $calling = mysql_query("SELECT * from category");
            endif;

              $count=mysql_num_rows($calling);
              if($count>0):
                $c=0;
                while($row=mysql_fetch_array($calling)):
                  $c++;

                ?>
                <tr>
                  <td><?=$c?></td>
                  <td><?=$row['cat_title'];?></td>
                <td>



                  <a type="button"  href="#deletecat<?= $row['cat_id'];?>" class="btn btn-danger" data-toggle="modal"><i class="fas fa-trash-alt" name="X"></i></a>
                  <a href='cat_update.php?edit=<?= $row['cat_id']?>' class="btn btn-info">
                    <i class="fas fa-pen-alt" name="edit"></i>
                  </a>

                    <!--  delete Modal -->
                    <div class="modal fade" id="deletecat<?= $row['cat_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-body">

                              <b style="color:red">CAUTION: </b>If you will delete this category then <strong>products</strong> and <strong>orders </strong>related to this category will also be deleted.<br>
                             you can update the category name instead.<br><br>
                              Are you really want to delete <strong><?= $row['cat_title'];?></strong>?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            <a href="cat_delete.php?del=<?= $row['cat_id']?>" class="btn btn-primary">Yes</a>
                          </div>
                        </div>
                      </div>
                    </div>


                    </td>


                    </tr>


                      <?php endwhile;
                      endif;?>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
