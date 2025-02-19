
<?php include_once "../assets/config.php";
session_start();
if(!isset($_SESSION['admin'])):
  echo"<script>window.open('admin_login.php','_self')</script>";
endif;
?><!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Panel| Order List | Foodstuff</title>
    <link rel="stylesheet" href="..\bootstrap\bootstrap.min.css">
    <link rel = "icon" href = "..\image\ico.gif" type = "image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
  </head>

  <body>
    <?php include"include/header.php"?>

    <div class="container-fluid mt-3">
      <div class="row">
        <div class="col-lg-3">
        <?php include"include/side.php"?>
        </div>

        <div class="col-lg-9">

          <div class="row">
                    <div class="col-8">
                      <blockquote class="blockquote"><h2 class="font-weight-bold h5 my-4">Manage orders </h2></blockquote>
                    </div>
            <div class="col-4">
              <form action="admin_order.php"  method="get" class="form-inline mt-3">
                  <input type="search" placeholder="Search Order No." class="form-control" name="a_o_search" value="<?php if(isset($_GET['a_o_search'])){echo $_GET['a_o_search'];}?>">
                    <?php
                    if(isset($_GET['a_o_search'])): ?>
                      <a href="admin_order.php" class="btn btn-danger">Clear Search</a>

                    <?php else: ?>
                      <input type="submit" value="Go" name="find" class="btn btn-success">
                    <?php endif;?>


              </form>
            </div>
            </div>

              <?php
              if(isset($_GET['find'])):
                $search = $_GET['a_o_search'];
                $calling = mysql_query("SELECT DISTINCT invoice_no from orders where  invoice_no= '$search'  order by o_id");
                $count=mysql_num_rows($calling);
                      if($count==0):
                        echo"<h1>No Order of this name</h1>";
                      endif;
              else:
              $calling=mysql_query("SELECT DISTINCT invoice_no from orders order by o_id DESC");
              endif;
                $count=mysql_num_rows($calling);
                if($count>0){
                  $c=0;
                  while($row=mysql_fetch_array($calling)){

                    $c++;
              ?>
              <table class="table table-bordered " style="border:10px solid 	#5FCEFD; background-color:	#E7E7E7; margin-bottom:0px; border-bottom: solid #cccccc 5px; ">
                <th>Serial No.<?=$c?></th>
                <th>Order No.<?=$row['invoice_no']?></th>
              </table>

              <table class="table table-bordered" style="border:10px solid #5FCEFD; background-color:	#E7E7E7;border-top:0px">
                <tr>

                  <th>Product Name</th>
                  <th>View Order Detail</th>
                  <th>Order Status</th>
                  <th>Amount</th>
                </tr>
                <?php
                  $order = mysql_query("SELECT * from orders inner join customer
                  on orders.c_id=customer.c_id
                  inner join product
                    on orders.p_id=product.p_id
                  inner join vendor
                  on orders.v_email=vendor.v_email order by o_id DESC" );
                  $total=0;
                  while ($data = mysql_fetch_array($order)){
                  if($row['invoice_no']==$data['invoice_no']){
                      ?>

                <tr>


              <td><?= $data["p_name"]?></td>
              <td>
                <a type="button"  href="#admin_order<?= $data['o_id'];?>" class="btn btn-success" data-toggle="modal"><i class="fas fa-eye" name="view"></i></a>
                <a type="button"  href="order_update.php?edit=<?= $data['o_id'];?>" class="btn btn-info" ><i class="fas fa-pen-alt" name="update"></i></a>
                <a type="button"  href="delete_order.php?del=<?= $data['o_id'];?>" class="btn btn-danger" ><i class="fas fa-trash-alt" name="update"></i></a>

                <!--  View Modal -->
                <div class="modal fade" id="admin_order<?= $data['o_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-scrollable modal-xl " role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                          <strong >PRODUCTS</strong>
                      </div>
                      <div class="modal-body">
                        <table class="table table-bordered mt-5">

                          <tr>
                            <th>Order No.</th>
                            <td><?= $data['invoice_no'];?></td>
                          </tr>

                          <tr>
                            <th>Customer Id No.</th>
                            <td> <?= $data['c_code']?></td>
                          </tr>

                          <tr>
                            <th>product ID No.</th>
                            <td><?= $data['p_code'];?></td>
                          </tr>
                              <tr>
                                <th>product name</th>
                                <td><?= $data['p_name'];?></td>
                              </tr>
                              <tr>
                                <th>product image</th>
                                <td> <img src="../image/<?= $data['p_img']?>" alt="" height="70px" width="70px"> </td>
                              </tr>
                              <tr>
                                <th>Ordered By</th>
                                <td><?= $data['c_f_name']?> <?= $data['c_L_name']?>  <img src="../image/<?= $data['c_img']?>" alt="" height="70px" width="70px"> </td>
                              </tr>
                              <tr>
                                <th>Total Unit</th>
                                <td><?= $data['qty']?> Unit. </td>
                              </tr>
                              <tr>
                                <th>Price</th>
                                <td><?= $data['qty']?>x<?=$data['p_price'];?> = ₹<?= $data['qty']*$data['p_price'];?>/- </td>
                              </tr>


                              <tr>
                                <th>Delivery Address</th>
                                <td>Address: <?= $data['c_add']?> <br> City: <?= $data['c_city']?> <br>State: <?= $data['c_state']?> <br> Pin: <?= $data['c_pin']?></td>
                              </tr>
                              <tr>
                                <th>Customer Phone No.</th>
                                <td> <?= $data['c_phn']?></td>
                              </tr>
                              <tr>
                                <th>Customer Email Id</th>
                                <td> <?= $data['c_email']?></td>
                              </tr>

                              <tr>
                                <th>Order Time&nbsp;&nbsp;&nbsp;<u><i style="color:blue">(According 24-Hour Format)</i></u></th>
                                <td> <?= $data['order_time']?></td>
                              </tr>

                              <tr>
                                <th>Seller</th>
                                  <td> <?= $data['v_email'];?>
                                   </td>
                              </tr>


                              <tr>
                                <th>Order Status</th>
                                  <td> <a href="#" style="color:#21c416"><?= $data['order_status'];?></a> </td>
                              </tr>




                            <u><h5 class="text-center mt-3 mb-4 text-uppercase"><?= $data['p_name']?><span class="text-lowercase">'s complete details here</span></h5></u>
                        </table>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                      </div>
                    </div>
                  </div>
                </div>



              </td>
              <td><?= $data['order_status']?></td>
              <td><?= $data['qty']?>x<?=$data['p_price'];?> = ₹<?= $data['qty']*$data['p_price'];?>/-</td>
            </tr>

          <?php
            $total=$total+($data['qty']*$data['p_price']);
            }
          }?>
          <tr style="border-top: solid #cccccc 5px;">
            <td></td>
            <td></td>
            <th class="text-right" >Subtotal</th>
            <th>₹ <?=$total?>/-</th>
          </tr>


    <?php    }
      }?>
          </table>

        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
</html>
