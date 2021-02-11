<?php
 ob_start();
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Smart Business </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Free-Template.co" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="shortcut icon" href="ftco-32x32.png">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,900|Oswald:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  
  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-6 col-xl-2">
            <h1 class="mb-0 site-logo m-0 p-0"><a href="index.html" class="mb-0">SmartBusiness</a></h1>
          </div>

          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="index.php" class="nav-link">Home</a></li>
                
              
<?php
if(isset($_SESSION['userName']))
{
if($_SESSION['userRole']==3)
{
?>
<li><a href="product.php" class="nav-link">Products</a>
<?php
}
if($_SESSION['userRole']==4)
{
?>
<li><a href="retailerproducts.php" class="nav-link">Products</a>
<?php
}

}
else
{
  ?>
  <li><a href="userlogin.php" class="nav-link">Products</a>
  <?php
  }
?>
                
                
              
                </li>
                <li><a href="about.php" class="nav-link">About</a></li>
                <!-- <li><a href="userlogin.php" class="nav-link btn btn-primary btn-sm ">Login</a></li>
                <li><a href="register.php" class="nav-link btn btn-primary btn-sm ">Register</a></li> -->
                <?php
if(isset($_SESSION['userName']))
{
if($_SESSION['userRole']==3)
{
?>
<li><a href="pdetail.php" class="nav-link">Your Products</a></li>
<?php
}
}
?>
               <?php
if(isset($_SESSION['userName']))
{
?>
<li><a href="cart.php" class="nav-link"><img width="40px" src='images/icon.png'></a></li>
<?php
}


else
{
  ?>
<li><a href="userlogin.php" class="nav-link"><img width="40px" src='images/icon.png'></a></li>

  <?php
  }
?>
               
                 <li>  
                   
                 <?php 
      if(isset($_SESSION['userName'])){
                   ?>
                 <li class="dropdown">
                    <a href="#" class=" nav-link btn btn-primary btn-sm dropdown-toggle fw600 p15" data-toggle="dropdown"> 
                        <img src="dashboard/assets/img/avatars/placeholder.png" width="25px"  class="mw30 br64 mr15">
                        <span><?php echo isset($_SESSION['userName']) ? $_SESSION['userName'] : null ?></span>
                        
                    </a>
                    <ul class="dropdown-menu btn-primary " role="menu">
                        <li class="btn-primary text-center">
                            <a href="./logout.php">
                             Logout
                            </a>
                        </li>
                
                   
                <?php
      }
        else{
  echo '<li class="nav-item ">
        <a class="nav-link btn btn-primary btn-sm " href="userlogin.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link btn btn-primary btn-sm " href="register.php">Register</a>
      </li>';
}
      ?></li> 
                
                
              </ul>
            </nav>
          </div>


          <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white float-right"><span class="icon-menu h3"></span></a></div>

        </div>
      </div>
      
    </header>