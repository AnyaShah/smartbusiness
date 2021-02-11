<?php
include 'userheader.php';
$pid=$_GET['id'];
$quer="SELECT * FROM productdetail where p_id='$pid'";
$connection = mysqli_connect("localhost","root","","smartbusiness");
$sql= "select * from productdetail where p_id ='$pid'";
$result =mysqli_query($connection,$sql);
while($row = mysqli_fetch_assoc($result))
{
  
  $totalquantity=$row['p_qty']; 
  $nam=$row['p_name'];
  $img=$row['p_img'];
  $dec=$row['p_disc'];
}
$queryp=mysqli_query($connection,$quer);
?>
 <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/hero_1.jpg);" data-aos="fade">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-5 mx-auto mt-lg-5 text-center">
            <h1></h1>
            <p class="mb-5">Our Product<strong class="text-white"></strong></p>
            
          </div>
        </div>
      </div>

      <a href="#property-details" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a>
    </div>  

    
    
    <div class="site-section" id="property-details">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <div class="">
              <div><img src="dashboard/<?php echo $img?>" alt="Image" class="img-fluid"></div>
            
            </div>
          </div>
          <div class="col-lg-5 pl-lg-5 ml-auto">
            <div class="mb-5">
              <h3 class="text-black mb-4"><?php echo $nam?></h3>
              <p><?php echo $dec?></p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa tempore repudiandae optio aliquam perspiciatis est quae enim quaerat eos hic dolorem accusamus molestias repellat consequatur velit, officiis nihil magnam placeat!</p>
              <p>Ex, esse? Obcaecati nam in cum eius quaerat repellendus adipisci ducimus dolorum sed quos. Amet recusandae cumque reprehenderit nam quia voluptatibus, repellat, aspernatur ut fuga perferendis consectetur excepturi neque in!</p>
              <p class="mb-4">Neque facilis iure earum, placeat odit ipsum, amet, optio accusantium voluptatem quasi obcaecati fugit? Explicabo eius dolorem provident quis non voluptas, dignissimos tempora eligendi, in, nam velit, quasi tenetur. Animi!</p>
              <!-- <p><a href="#" class="btn btn-primary">Add to cart</a></p> -->
            </div>

            <div class="mb-5">
            <?php
          

foreach($queryp as $value){
  
  ?>
            <form action="addtocart.php" method="GET">
<div class="quantity-button" >
<input type="hidden" name="pid" value="<?php echo $value['p_id'] ?>;">
<input type="number" value="1" min="1" max="<?php echo $totalquantity;?>" name="qty">
<input type="submit"  class="btn btn-primary" name=btn value="Add to Cart">
</div>

</div>
<?php
}
?>
            
          </div>
        </div>
      </div>
    </div>


    <?php
include 'footer.php';
    ?>