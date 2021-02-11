<?php

include 'userheader.php';
include 'slider.php';
$subtotal=0;
$grandtotal=0;
?>

<section class=" container site-section bg-image justify-content-center"  >

<form action="" method="POST">
<table class="table">
  <thead>
    <tr>
            <th scope="col">Product name</th>
            <th scope="col">Product image</th>
            <th scope="col">Product quantity</th>
            <th scope="col">Product price</th>
            <th scope="col">total price</th>
 
    </tr>
  </thead>
<?php
if(!isset($_SESSION['cart'])){
    echo "no item selected";
}
if(isset($_SESSION['cart'])){
    $cart=$_SESSION['cart'];
    foreach ($cart as $value){
      $userid = $_SESSION['userid'];
      $userrole = $_SESSION['userRole'];
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

       <td><?php  echo $qty = $value['qty']?></td>
       <td><?php  echo $key['p_price']?></td>

      
                      
                      <td><?php  
                  echo      $st=$subtotal + ($value['qty'] * $key['p_price']);
        $grandtotal=$grandtotal+$st;
        ?></td>   
    </tr>
    

    <script>
  function abc()
  {
  alert('Your Order has been placed sucessfully');
  }
  </script>

<?php
 
    if(isset($_POST['btn-submit']))
    {
    $succ = false;
    $sql = "INSERT INTO `orderdetail`(`u_id`, `u_role`, `p_id`, `p_qty`, `totalamount`) VALUES ('$userid','$userrole','$id','$qty','$subtotal')";
      $result = mysqli_query($connection,$sql);
      if($result){
        $succ = true;
        unset($_SESSION['cart']);
      }
    }
}

    }


  }
}
if(isset($_POST['btn-submit']))
{

if($_SESSION['userRole']==3)
{
header('Location:product.php');
}
if($_SESSION['userRole']==4)
{
header('Location:retailerproducts.php');
}
}
if(isset($_POST['btn-submit1']))
{

if($_SESSION['userRole']==3)
{
header('Location:product.php');
}
if($_SESSION['userRole']==4)
{
header('Location:retailerproducts.php');
}
}

?>

  </tbody>
</table> 
<div class="text-right"> Grand Total <span class="price" style="color:black"><b><?php 
        echo $grandtotal;
 ?></b></span></div>
<div  style=" width:30%; margin:0 auto;" class="row" >


<pre>


<button type="submit" name="btn-submit1" class=" btn btn-primary " href="product.php" >Continue to shop</button>
            ||
<button type="submit" name="btn-submit" onclick="abc()" class=" btn btn-primary">place your order</button>
</pre>
</div>

<form>
</div>
</section>

<?php
include 'footer.php';
?>