<?php

if (!isset($_SESSION['CUSID'])){
redirect(web_root."index.php");
}

$customerid =$_SESSION['CUSID'];
$customer = New Customer();
$singlecustomer = $customer->single_customer($customerid);

  ?>

<?php
  $autonumber = New Autonumber();
  $res = $autonumber->set_autonumber('ordernumber');
?>


<form onsubmit="return orderfilter()" action="customer/controller.php?action=processorder" method="post">
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Order Details</li>
                </ol>
            </div>
            <div class="row">
                <div class="col-md-10 pull-left">
                    <div style="float:left">
                        Name:
                    </div>
                    <div class="col-md-2 col-lg-10 col-sm-3" style="float:left">
                        <?php echo $singlecustomer->FNAME .' '.$singlecustomer->LNAME; ?>
                    </div>

                    <div style="float:left">
                        Province:
                    </div>
                    <div class="col-md-2 col-lg-10 col-sm-3" style="float:left">
                        <?php echo $singlecustomer->CUSTPROVINCE ?>
                    </div>
                    <div style="float:left">
                        District:
                    </div>
                    <div class="col-md-4 col-lg-10 col-sm-3" style="float:left">
                        <?php echo $singlecustomer->CUSTDISTRICT ?>
                    </div>

                </div>
                <div class="col-md-2 pull-right">
                    <div class="col-md-10 col-lg-12 col-sm-8">
                        <input type="hidden" value="<?php echo $res->AUTO; ?>" id="ORDEREDNUM" name="ORDEREDNUM">
                        Order Number :<?php echo $res->AUTO; ?>
                    </div>
                </div>
            </div>
            <div class="table-responsive cart_info">

                <table class="table table-condensed" id="table">
                    <thead>
                        <tr class="cart_menu">
                            <th style="width:12%; align:center; ">Product</th>
                            <th>Description</th>
                            <th style="width:15%; align:center; ">Quantity</th>
                            <th style="width:15%; align:center; ">Price</th>
                            <th style="width:15%; align:center; ">Total</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

              $tot = 0;
                if (!empty($_SESSION['gcCart'])){
                      $count_cart = @count($_SESSION['gcCart']);
                      for ($i=0; $i < $count_cart  ; $i++) {

                      $query = "SELECT * FROM `tblpromopro` pr , `tblproduct` p , `tblcategory` c
                           WHERE pr.`PROID`=p.`PROID` AND  p.`CATEGID` = c.`CATEGID`  and p.PROID='".$_SESSION['gcCart'][$i]['productid']."'";
                        $mydb->setQuery($query);
                        $cur = $mydb->loadResultList();
                        foreach ($cur as $result){
              ?>

                        <tr>
                            <!-- <td></td> -->
                            <td><img src="admin/products/<?php echo $result->IMAGES ?>" width="50px" height="50px">
                            </td>
                            <td><?php echo $result->PRODESC ; ?></td>
                            <td align="center"><?php echo $_SESSION['gcCart'][$i]['qty']; ?></td>
                            <td>&#36; <?php echo  $result->PRODISPRICE ?></td>
                            <td>&#36; <output><?php echo $_SESSION['gcCart'][$i]['price']?></output></td>
                        </tr>
                        <?php
              $tot +=$_SESSION['gcCart'][$i]['price'];
                        }

                      }
                }
              ?>


                    </tbody>

                </table>
                <div class="  pull-right">
                    <p align="right">
                    <div> Total Price : &#36; <span id="sum">0.00</span></div>
                    <div> Delivery Fee : &#36; <span id="fee">0.00</span></div>
                    <div> Overall Price : &#36; <span id="overall"><?php echo $tot ;?></span></div>
                    <input type="hidden" name="alltot" id="alltot" value="<?php echo $tot ;?>" />
                    </p>
                </div>

            </div>
        </div>
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your
                delivery cost.
            </p>
        </div>
    </section>

    <section id="do_action">
        <div class="form-group">
            <label> Payment Method : </label>
            <div>
                <label><input type="radio" name="paymethod" checked="true" value="cashondelivery"> Cash
                    on delivery</label>
                <label><input type="radio" name="paymethod" value="onlinepayment">
                    payment By payPal</label>
            </div>
        </div>
        <div class="container cashondelivery box">
            <div class="row">
                <div class="row">
                    <div class="col-md-12">


                        <div class="panel">
                            <div class="panel-body">
                                <div class="form-group ">
                                    <div class="col-md-2">
                                        <label>Address where to deliver</label>
                                    </div>
                                    <div class="col-md-2">
                                        <select class="form-control paymethod" name="province"
                                            onchange="validatedate()">
                                            <option value="0">Province</option>
                                            <?php
                                            $query = "SELECT * FROM `tblsetting` ";
                                            $mydb->setQuery($query);
                                            $cur = $mydb->loadResultList();

                                            foreach ($cur as $result) {
                                            }
                                            ?>

                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <select name="district" class="form-control">District
                                            <?php
                                            $query = "SELECT * FROM `tblsetting` ";
                                            $mydb->setQuery($query);
                                            $cur = $mydb->loadResultList();

                                            foreach ($cur as $result) {
                                              echo '<option value= >'.$result->district.' </option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <select name="sector" id="sector-dropdown" class="form-control">Sector

                                            <?php
                                            $query = "SELECT * FROM `tblsetting` ";
                                            $mydb->setQuery($query);
                                            $cur = $mydb->loadResultList();

                                            foreach ($cur as $result) {
                                              echo '<option value= >'.$result->sector.' </option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <input type="hidden" placeholder="HH-MM-AM/PM" id="CLAIMEDDATE" name="CLAIMEDDATE"
                            value="<?php echo date('y-m-d h:i:s') ?>" class="form-control" />

                    </div>



                </div>
                <br />
                <div class="row">
                    <div class="col-md-6">
                        <a href="index.php?q=cart" class="btn btn-default pull-left"><span
                                class="glyphicon glyphicon-arrow-left"></span>&nbsp;<strong>View Cart</strong></a>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-pup  pull-right " name="btn" id="btn"
                            onclick="return validatedate();" /> Submit Order <span
                            class="glyphicon glyphicon-chevron-right"></span></button>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--/#do_action-->
</form>

<!--Main layout-->
<main class="mt-5 pt-4">
    <div class="container wow fadeIn onlinepayment box">
        <?php
        //if (isset($_SESSION['CUSID']))

        ?>
        <?php
        $ses=$_SESSION['CUSID'];
    
if (isset($_SESSION['CUSID']))
  {
$tot = 0;

        $query = "SELECT * FROM  `tblorder` ord , `tblproduct` p 
             WHERE p.`PROID`=ord.`PROID` AND ord.CUSTOMERID='$ses'";
          $mydb->setQuery($query);
          $cur = $mydb->loadResultList();
          $x=0;
          
          foreach ($cur as $result){
            $x++;
         ?>

        <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="cmd" value="_cart">
            <input type="hidden" name="business" value="shoppingcart@ecommerceastro.com">
            <input type="hidden" name="upload" value="1">
            <?php
            /*
           ; $sql="SELECT a.PROID,a.PRODESC,a.PROPRICE,b.PROID,b.ORDEREDQTY FROM tblproduct a,tblorder
            b WHERE a.PROID=b.PROID AND b.CUSTOMERID='$_SESSION[CUSID]'" ;
             $mydb->setQuery($sql);
                $cur = $mydb->loadResultList();
                foreach ($cur as $result){
                $x++;*/
                //$tot +=$_SESSION['gcCart'][$i]['price'];
                ?>
            <input type="hidden" name="item_name_1" value="<?php echo $result->PRODESC; ?>">
            <input type="hidden" name="item_number_2" value="<?php echo $x; ?>">
            <input type="hidden" name="amount_3" value="<?php echo $result->PROPRICE; ?>">
            <input type="hidden" name="ordered_4" value="<?php echo $result->ORDEREDQTY; ?>">

            <?php        
          }
             ?>
            <input type="hidden" name="return" value="http://localhost/" />
            <input type="hidden" name="notify_url" value="http://localhost/">
            <input type="hidden" name="cancel_return" value="http://localhost/">
            <input type="hidden" name="currency_code" value="USD" />
            <input type="hidden" name="custom" value="'<?php echo $_SESSION["CUSID"];?>'" />
            <input style="float:right;margin-right:80px;" type="image" name="submit" value="checkout"
                src=" https://www.paypalobjects.com/webstatic/en_US/i/btn/png/blue-rect-paypalcheckout-60px.png"
                alt="PayPal Checkout" alt="PayPal - The safer, easier way to pay online">
        </form>
        <?php
            } ?>hhhj
    </div>
</main>
<!--Main layout-->