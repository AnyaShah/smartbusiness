<?php
ob_start();
include 'includes/headlinks.php';
include 'includes/nav.php';
if (!isset($_SESSION['user'])) {
   header('location:login.php');
}
if(isset($_SESSION['user'])){
  $email = $_SESSION['user'];
  $sql1 = "select * from tblcustomers where email = '$email'";
 $result =  mysqli_query($conn,$sql1);
 while ($row1 = mysqli_fetch_assoc($result)) {
     $customer_id = $row1['customer_id']; 
 }
}
$subtotal = 0;
$nettotal = 0;
$invoice_number = substr(md5(rand(0,1000000)),0,7);

?>
<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Checkout</h1>
					<ol class="breadcrumb">
						<li><a href="#">Home</a></li>
						<li class="active">checkout</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="page-wrapper">
   <div class="checkout shopping">
      <div class="container">
         <div class="row">
            <div class="col-md-8">
               <div class="block billing-details">
                  <h4 class="widget-title">Reciever's Details</h4>
                  <form class="checkout-form" action="" method="POST">
                     <div class="form-group">
                        <label for="full_name">Full Name</label>
                        <input type="text" class="form-control" name="full_name" id="full_name" placeholder="">
                     </div>
                     <div class="form-group">
                        <label for="user_address">Address</label>
                        <input type="text" class="form-control" name="address" id="user_address" placeholder="">
                     </div>
                    <div class="form-group">
                        <label for="user_country">Phone No</label>
                        <input type="text" class="form-control" name="phone" id="user_country" placeholder="">
                     </div>
                     
                     <div class="form-group">
                        <label for="user_country">City</label>
                        <input type="text" class="form-control" name="city" id="user_country" placeholder="">
                     </div>
                     <div class="form-group">
                     <input placeholder="Date of delivery" class="form-control"  type="text" onfocus="(this.type='date')" name="dod">
                     </div>
                     <label for="user_country">Make your Gift more special To add a Message</label>
                     <div class="form-group">
                        
                        <textarea rows="4" cols="56" placeholder="" name="msg">
                           
                        </textarea>
                     </div>
                     
             
               </div>
               <div class="block">
                  <h4 class="widget-title">Payment Method</h4>
                  <p>Credit Cart Details (Secure payment)</p>
                  <div class="checkout-product-details">
                     <div class="payment">
                        <div class="card-details">
                           
                              <div class="form-group">
                                 <label for="card-number">Card Number <span class="required">*</span></label>
                                 <input  id="card-number" class="form-control"   type="tel" placeholder="•••• •••• •••• ••••" name="creditcard">
                              </div>
                              
                              <button class="btn btn-main mt-20" name="order" type="submit">Place Order</button> 
                              </form>
                             
                           
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="product-checkout-details">
                  <div class="block">
                     <h4 class="widget-title">Order Summary</h4>
                    <?php
                       if(isset($_POST['order'])) {
            
              
                        $placed = false;
                        $shoppingsuccess = false;
                       $fullname = $_POST['full_name'];
                       $address = $_POST['address'];
                       $phone = $_POST['phone'];
                       $city = $_POST['city'];
                       $dod = $_POST['dod'];
                       $message = $_POST['msg'];
                       $creditcard = $_POST['creditcard'];  
            $sql2 = "insert into tblorder (fullname,address,city,phonenumber,dod,message,creditcard,invoicenumber)values('$fullname','$address','$city','$phone','$dod','$message','$creditcard','$invoice_number')";
            $result2 = mysqli_query($conn,$sql2);
            if ($result2) {
               $placed = true;
               $order_id = mysqli_insert_id($conn);

            }
       
       }
                  
              foreach($_SESSION['cart'] as $cart){
               $id = $cart['pid'];
                     $sql = "select * from tblbouquet where bouquetid ='$id'";
                     $result = mysqli_query($conn,$sql);
                     while ($row = mysqli_fetch_assoc($result)){?>
                  
                    <div class="media product-card">
                  

                           
                        <a class="pull-left" href="product-single.html">
                           <img class="media-object" src="images/bouquet/<?php echo $row['bouquet_img'];?>" alt="Image" />
                        </a>
                        <div class="media-body">
              
                        <h4 class="media-heading"><a href="product-single.php"><?php echo $row['bouquetname'];?></a></h4>
                           <span class="remove" >Quantity : <?php echo $qty = $cart['pqty'];?></span>
                           <p class="price">INR ₹  <?php $price =  $row['bouquetprice'];
                              echo $subtotal = $qty*$price;
                           ?></p>
                           
                     
              
                     </div>
                     </div>             
                        
                        <?php
                     $nettotal = $nettotal+$subtotal;

                     if (isset($order_id) && $placed===true) {
                        $sql3 = "INSERT INTO `tblorderdetails`(`bid`, `cid`, `oid`, `qty`, `price`) VALUES ('$id','$customer_id','$order_id','$qty','$subtotal')";
                        $result3 = mysqli_query($conn,$sql3);
                        if ($result3) {
                           unset($_SESSION['cart'][$id]);
                           $shoppingsuccess = true;
                        }
                     }
                  }
               }

               if(isset($shoppingsuccess) && $shoppingsuccess===true) {
              header("location:confirmation.php?invoice=$invoice_number"); 
         }


                
            ?>
                 </form>
                     <div class="discount-code">
                        <p>Have a discount ? <a data-toggle="modal" data-target="#coupon-modal" href="#">enter it here</a></p>
                     </div>
                     <ul class="summary-prices">
                        <li>
                           <span> total:</span>
                           <span class="price">INR ₹ <?php echo $nettotal;?></span>
                        </li>
                        <li>
                           <span>Shipping:</span>
                           <span>INR ₹: <?php echo $shipping=250;?></span>
                        </li>
                     </ul>
                     <div class="summary-total">
                        <span>Total</span>
                        <span>INR ₹ <?php echo $nettotal+$shipping;?></span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
   <!-- Modal -->
   <div class="modal fade" id="coupon-modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-body">
               <form>
                  <div class="form-group">
                     <input class="form-control" type="text" placeholder="Enter Coupon Code">
                  </div>
                  <button type="submit" class="btn btn-main">Apply Coupon</button>
               
            </div>
         </div>
      </div>
   </div>

<?php

include 'includes/footer.php';
ob_end_flush();



?>