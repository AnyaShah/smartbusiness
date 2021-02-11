<?php
include 'userheader.php';
include 'slider.php';
$connection = mysqli_connect("localhost","root","","smartbusiness");
  $products = mysqli_query($connection, "select * from productdetail");
  
                      ?>
  <div class="site-section" id="properties-section">
      <div class="container">
      
        <div class="row large-gutters">
        <?php
   while($product = mysqli_fetch_array($products))
   {
 
			
		?>
          <div class="col-md-6 col-lg-4 mb-5 mb-lg-5 ">
            <div class="ftco-media-1">
              <div class="ftco-media-1-inner">
                <a href="productdetail.php?id=<?php echo $product['p_id']?>" class="d-inline-block mb-4"><img src="dashboard/<?php echo $product['p_img'];?>" class="img-fluid"></a>
                <div class="ftco-media-details">
                  <h3><?php echo $product['p_name']?></h3>
                  <p><?php echo $product['p_disc']?></p>
                  <strong><?php echo $product['p_price']?></strong>
    <!-- <a href="productdetail.php?id=<?php echo $product['p_id']?>" name="btn" class="btn btn-primary">Add to cart</a> -->

                </div>
  
              </div> 
            </div>
          </div>
          <?php

}
?>

      </div>
    </div>
    
                                    </div>

        

         
  <?php

include 'footer.php';
?> 