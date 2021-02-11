<?php

include 'userheader.php';
include 'slider.php';
print_r($_SESSION);

?>
<?php


?>

<div class="container site-section justify-content-center">

<h1 style="margin-top:5%; margin-left:40%;  margin-bottom:5%;" class=" row">
Check Out
</h1>
  <form class="row g-3">
  <div class="col-md-6">
    <label for="inputname4" class="form-label">Full name</label>
    <input type="text" class="form-control" name="cname" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control" name="cemail" id="inputEmail4">
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Contact</label>
    <input type="text"name="ccont" class="form-control" id="inputAddress" placeholder="Enter Contact number">
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Address</label>
    <input type="text" name="caddress" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  
  <div class="col-md-6">
    <label for="inputCity" class="form-label">City</label>
    <input type="text" class="form-control" name="ccity" id="inputCity">
  </div>
 

  <div class="col-12">
  
  </div>
 
</form>
</div>

<table class="table container site-section bg-image justify-content-center">
  <thead>
    <tr>
            <th scope="col">Product name</th>
            <th scope="col">Product image</th>
            <th scope="col">Product quantityh</th>
            <th scope="col">Product price</th>
            <th scope="col">total price</th>
 
    </tr>
  </thead>
<?php
$subtotal=0;
$grandtotal=0;
if(!isset($_SESSION['cart'])){
    echo "no item selected";
}
if(isset($_SESSION['cart'])){
    $cart=$_SESSION['cart'];
    foreach ($cart as $value){
        $id= $value['id'];
        $querys="SELECT * FROM productdetail where p_id='$id'";
	$connection = mysqli_connect('localhost','root','','smartbusiness');

        $res=mysqli_query($connection,$querys);

if(mysqli_num_rows($res)>0){
    foreach($res as $key){


        ?>

  <tbody>
    <tr>
    <td><?php  echo $key['p_name'];?></td>
       
       <td><img width=100px height=100px src="dashboard/<?php  echo $key['p_img'];?>" alt=""></td>

       <td><?php  echo $value['qty']?></td>
       <td><?php  echo $key['p_price']?></td>

       <td><?php  
                  echo      $st=$subtotal + ($value['qty'] * $key['p_price']);
        $grandtotal=$grandtotal+$st;
        ?></td>
    </tr>
      


<?php
    }
}

    }

}
if(isset($_POST['btn'])){
  $userid = $_SESSION['userid'];
   
  $cn=$_POST['cname'];
   $ce=$_POST['cemail'];
   $ccon=$_POST['ccont'];
   $cc=$_POST['ccity'];
   $ccountry=$_POST['ccountry'];
   $cadd=$_POST['caddress'];
  
   $cuq="INSERT INTO orderdetail(u_id, u_role, p_id, p_qty, totalamount) 
   VALUES ('$userid','$_SESSION[userRole]','$id','','','','','',)";

$cexe=mysqli_query($connection,$cuq);

}


?>
<td>Total <span class="price" style="color:black"><b><?php 
        echo $grandtotal;
 ?></b></span></td>
<td class="row">
<a href="distributerproducts.php">
<button type="submit" name="btn"  class="btn btn-primary">Checkout</button>
</a></td>
  </tbody>
</table> 

</div>
<?php
include 'footer.php';
?>
