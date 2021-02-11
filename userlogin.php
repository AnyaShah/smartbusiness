<?php

include 'userheader.php';


if(isset($_SESSION['userName'])){
  header('Location:index.php');
}
$nameMessage ='';
$passwordMessage = '';
$error = '';
if(isset($_POST['btn'])){
	$userName = $_POST['uname'];
  $userPassword = $_POST['upass'];
	if ($userName =='') {
		$nameMessage = 'User Name Cant be empty';
		exit();
	}
	if ($userPassword =='') {
		$passwordMessage = 'Password Cant be empty';
		exit();
	}
	$connection = mysqli_connect('localhost','root','','smartbusiness');
	// $userPassword = md5($userPassword);
	$query = "SELECT * FROM userlogin WHERE u_name = '$userName' AND u_pass = '$userPassword'";
	$execute = mysqli_query($connection,$query);
	if (mysqli_num_rows($execute)>0) {
    $data = mysqli_fetch_assoc($execute);
    $id=$data['u_id'];
    $dt=$data['u_role'];
     
    $_SESSION['userid'] = $id;
    $_SESSION['userName'] = $userName;
    $_SESSION['userRole'] =  $dt;
      
  

    foreach($execute as $value)		{
       if($value['u_role']==1)
    {
       header('Location:dashboard/products.php');
    }
     
    if($value['u_role']==2)
    {
       header('Location:dashboard/stockiestproducts.php');
    }
     
    if($value['u_role']==3)
    {
       header('Location:distributerproducts.php');
    }
       if($value['u_role']==4)
    {
       header('Location:retailerproducts.php');
    }
    }
	}
	else {
		$error = 'Username or Password are incorrect';
	}


}
?>

<section class="site-section bg-light bg-image justify-content-center" style="background-image: url(images/hero_2.jpg);" >

  <form method='POST' class=''>
    <div class="container ">
     
      <div class="row m-3 g-3 justify-content-center text-center align-items-center">
        <div class="col-md-4">
         <div>  <img class="img-fluid" src="logo.jpg" alt=""></div> 
         <h1 class="text-break">Login Form</h1>
         <span class="text-danger error-message"><?php echo $error;  ?></span>
       </div>
     </div>
     <div class="row m-3 g-3 justify-content-center align-items-center">
      <div class="col-md-4">
        <div class="form-floating">
         
          <input type="text" name="uname" class="form-control" id="floatingInput" placeholder="Username" required>
          <label for="floatingInput">Username</label>
          <span class="text-danger error-message"><?php echo "$nameMessage"; ?></span>
        </div>
      </div>
    </div>
      <div class="row m-3 g-3 justify-content-center align-items-center">
      <div class="col-md-4 ">
    <div class="form-floating">
    <input type="password" name="upass" class="form-control" id="floatingPassword" placeholder="Password" required>
    <label for="floatingPassword">Password</label>
  	<span class="text-danger error-message"><?php echo "$passwordMessage"; ?></span>
  </div>
  
    </div>
  </div>


 



  <div class="row p-2 m-3 g-3 justify-content-center align-items-center">
    <div class="d-grid gap-2 col-md-4 mx-auto">
      <input style="background-color:#37CFA2;" class="btn btn-success text-white" name="btn" type="submit" value="Login">
      <span class="text-center" >Don't Have an account <a href="register.php"style="font-color:#37CFA2;" >Register?</a></span>
    </div>
  </div>

</div>



</form>
</section>

<?php
include 'footer.php';

ob_end_flush();
?>

