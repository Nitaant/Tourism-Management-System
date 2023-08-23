<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
$uname=$_POST['username'];
$password=$_POST['password'];
$sql ="SELECT name,password FROM admin WHERE name='$uname' and password='$password'";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result) == 1)
{
$_SESSION['alogin']=$_POST['username'];
echo "<script type='text/javascript'> document.location = 'admin/dashboard.php'; </script>";
} else{

	echo "<script>alert('Invalid Details');</script>";

}

}

?>

<?php
include('includes/links.php');
?>
<div class="modal fade" id="modalRegisterForm3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
      	<h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
  		</div>
  		<form name="signin" method="post">
      	<div class="modal-body mx-3">
        	<div class="md-form mb-3">
            <input type="text" id="orangeForm-email" class="form-control validate" name="username" required="">
            <label data-error="wrong" data-success="right" for="orangeForm-email">Your username</label>
          </div>
          <div class="md-form mb-3">
            <input type="password" id="orangeForm-pass" class="form-control validate" name="password" required="">
            <label data-error="wrong" data-success="right" for="orangeForm-pass">Your password</label>
          </div>
      	</div>
      	<div class="modal-footer d-flex justify-content-center">
        	<input type="submit" name="login" id="submit" class="btn btn-dark" value="login">
    		</div>
  		</form>
  	</div>
  </div>
</div>
