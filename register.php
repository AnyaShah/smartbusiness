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
	$u_email = $_POST['uemail'];
  $userPassword = $_POST['upass'];
	$u_cpass = $_POST['cpass'];
  $u_contact = $_POST['ucont'];
  $u_city = $_POST['ucity'];
  $u_address = $_POST['uadd'];
  $u_role=$_POST['urole'];
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
  $query ="INSERT INTO userlogin(u_name, u_email, u_pass, u_contact, u_city, u_address, u_role) 
  VALUES ('$userName','$u_email','$userPassword','$u_contact','$u_city','$u_address','$u_role')";
  $execute = mysqli_query($connection,$query);
	if ($execute) {
     header('Location:index.php');
    }
		else{
      echo "not";
    }
 }
?>
  <div class="site-section bg-light bg-image justify-content-center" style="background-image: url(images/hero_2.jpg);">
<form method='POST' class='mt-5'>
     
      <div class="row m-3 g-3 justify-content-center text-center align-items-center">
        <div class="col-md-4">
         <h1 class="text-break">Member Registration</h1>
       </div>
     </div>
     <div class="row m-3 g-3 justify-content-center align-items-center">
      <div class="col-md-4">
        <div class="form-floating">
         
          <input type="text" name="uname" class="form-control" id="floatingInput" placeholder="Username" required>
          <label for="floatingInput">Username</label>
        </div>
      </div>
    </div>

    <div class="row m-3 g-3 justify-content-center align-items-center">
      <div class="col-md-4 ">
    <div class="form-floating">
    <input type="email" name="uemail" class="form-control" id="floatingPassword" placeholder="Confirm Password" required>
    <label for="floatingEmail">Email</label>
  
  </div>
  
    </div>
  </div>
    
      <div class="row m-3 g-3 justify-content-center align-items-center">
      <div class="col-md-4 ">
    <div class="form-floating">
    <input type="password" name="upass" class="form-control" id="floatingPassword" placeholder="Password" required>
    <label for="floatingPassword">Password</label>
  
  </div>
  
    </div>
  </div>
    <div class="row m-3 g-3 justify-content-center align-items-center">
      <div class="col-md-4 ">
    <div class="form-floating">
    <input type="password" name="cpass" class="form-control" id="floatingPassword" placeholder="Confirm Password" required>
    <label for="floatingPassword">Confirm Password</label>
  
  </div>
  
    </div>
  </div>




  <div class="row m-3 g-3 justify-content-center align-items-center">
      <div class="col-md-4 ">
    <div class="form-floating">
    <input type="text" name="ucont" class="form-control" id="floatingPassword" placeholder="Confirm Password" required>
    <label for="floatingContact">Contact no</label>
  
  </div>
  
    </div>
  </div>

  <div class="row m-3 g-3 justify-content-center align-items-center">
      <div class="col-md-4 ">
    <div class="form-floating">
    <input type="text" name="ucity" class="form-control" id="floatingPassword" placeholder="Confirm Password" required>
    <label for="floatingCity">City</label>
  
  </div>
  
    </div>
  </div>

  <div class="row m-3 g-3 justify-content-center align-items-center">
      <div class="col-md-4 ">
    <div class="form-floating">
    <input type="text" name="uadd" class="form-control" id="floatingPassword" placeholder="Confirm Password" required>
    <label for="floatingAddress">Residential Address</label>
  
  </div>
  
    </div>
  </div>


  <div class="row m-3 g-3 justify-content-center align-items-center">
      <div class="col-md-4 ">

     
      <select name="urole" class="form-control">
      <option value="" disabled selected>Select User Catagorie</option>
        <?php 
        $con = mysqli_connect("localhost","root","","smartbusiness");
        $roles = mysqli_query($con,'select * from user_role');
            while($role = mysqli_fetch_array($roles))
            {
              ?>
                <option value="<?php echo $role['u_roleid']?>"> <?php echo $role['u_role']?></option>
        <?php
            }
        ?>
  <option></option>

</select>
  </div>
  
    </div>
  </div>

  <div class="row p-2 m-3 g-3 justify-content-center align-items-center">
    <div class="d-grid gap-2 col-md-4 mx-auto">
      <input style="background-color:#37CFA2;" class="btn btn-primary" onclick="" name="btn" type="submit">
      <span  class="text-center"  >Have an account <a href="userlogin.php"style="font-color:#37CFA2;" >Login?</a></span>
    </div>
  </div>

</div>


</form>


</div>


<script>
function call()
{
  alert ("Registered scessufully");
}
</script>

<?php
include 'footer.php';
?>