<?php
include 'userheader.php';
include 'slider.php';
$connection = mysqli_connect("localhost","root","","smartbusiness");

ob_start();


$products = mysqli_query($connection, "SELECT * FROM productdetail,orderdetail WHERE productdetail.p_id=orderdetail.p_id && orderdetail.u_role=3");
?>
        <!-- Start: Content-Wrapper -->
        <section id="content_wrapper">

            <!-- Begin: Content -->
            <section id="content" class="animated  container site-section justify-content-center fadeIn">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-users"></i><span class="panel-title">Products You already Have</span>
                            

                        </div>
                        <div class="panel-body">
                            <table class="table table-striped table-hover table-responsive" id="datatable2" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Image</th>
                                        <th>Category</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Qunatity</th>
                                        <th>Description</th>
                                        <th>Expiry</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    while($product = mysqli_fetch_array($products))
                                    {
                                ?>
                                    <tr>
                                        <td><?php echo $product['p_id']?></td>
                                        <td><img width="50px" src="dashboard/<?php echo $product['p_img'];?>" ></td>
                                        <td><?php echo $product['cat_id']?></td>
                                        <td><?php echo $product['p_name']?></td>
                                        <td><?php echo $product['p_price']?></td>
                                        <td><?php echo $product['p_qty']?></td>
                                        <td><?php echo $product['p_disc']?></td>
                                        <td><?php echo $product['p_exp']?></td>
                                       
                                    </tr>
                                <?php
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    
            </section>
            <!-- End: Content -->

        </section>
        <!-- End: Content-Wrapper -->
    </div>
    <!-- End: Main -->

    <!-- BEGIN: PAGE SCRIPTS -->

    <!-- jQuery -->
    <script type="text/javascript" src="vendor/jquery/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="vendor/jquery/jquery_ui/jquery-ui.min.js"></script>

    <!-- Bootstrap -->
    <script type="text/javascript" src="assets/js/bootstrap/bootstrap.min.js"></script>

    <!-- Sparklines CDN -->
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-sparklines/2.1.2/jquery.sparkline.min.js"></script>

    <!-- Chart Plugins -->
    <script type="text/javascript" src="vendor/plugins/highcharts/highcharts.js"></script>
    <script type="text/javascript" src="vendor/plugins/circles/circles.js"></script>
    <script type="text/javascript" src="vendor/plugins/raphael/raphael.js"></script>

    <!-- Holder js  -->
    <script type="text/javascript" src="assets/js/bootstrap/holder.min.js"></script>

    <!-- Datatables -->
    <script type="text/javascript" src="vendor/plugins/datatables/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="vendor/plugins/datatables/media/js/dataTables.bootstrap.js"></script>

    <!-- Theme Javascript -->
    <script type="text/javascript" src="assets/js/utility/utility.js"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>
    <script type="text/javascript" src="assets/js/demo.js"></script>

    <!-- Admin Panels  -->
    <script type="text/javascript" src="assets/admin-tools/admin-plugins/admin-panels/json2.js"></script>
    <script type="text/javascript" src="assets/admin-tools/admin-plugins/admin-panels/jquery.ui.touch-punch.min.js"></script>
    <script type="text/javascript" src="assets/admin-tools/admin-plugins/admin-panels/adminpanels.js"></script>

    <!-- Page Javascript -->
    <script type="text/javascript" src="assets/js/pages/widgets.js"></script>
   

    <!-- END: PAGE SCRIPTS -->

</body>

</html>
<?php
ob_end_flush();
?>
<?php

include 'footer.php';
?> 