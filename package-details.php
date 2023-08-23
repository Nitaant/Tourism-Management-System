<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/links.php');
if(isset($_POST['submit2'])){
  $tid=$_GET['tid'];
  $useremail=$_SESSION['login'];
  $members=$_POST['member'];
  $sql="INSERT INTO package(tid,usermail,no_of_ppl) VALUES('$tid','$useremail','$members')";
  if(mysqli_query($con,$sql)){
    echo "<script>alert('booked successfully');</script>";
  }else {
    echo "<script>alert('Something went wrong. Please try again');</script>";
  }
}
?>
<!DOCTYPE HTML>
<html>
  <head>
    <title>TMS | Package Details</title>
  </head>
  <body>
<!-- top-header -->
  <?php include('includes/header.php');?>
  <div class="banner-3">
    <div class="container">
      <h1> TMS -Package Details</h1>
    </div>
  </div>
<!--- /banner ---->
<!--- selectroom ---->
  <div class="selectroom">
    <div class="container">
      <?php
      $tid = $_GET['tid'];
      $sql = "SELECT * from tourdetails where tid='$tid'";
      $query = mysqli_query($con,$sql);
      if(mysqli_num_rows($query)){
        foreach($query as $result)
        {	?>

          <form name="book" method="post">
            <div class="selectroom_top">
              <div class="col-md-4 selectroom_left">
                <img src="admin/packageimages/<?php echo htmlentities($result['image']);?>" class="img-responsive" alt="">
              </div>
              <div class="col-md-8 selectroom_right">
                <h2><?php echo htmlentities($result['place']);?></h2>
                <p class="dow">#PKG-
                  <?php echo htmlentities($result['tid']);?>
                </p>
                <p><b>Package Type :</b>
                  <?php echo htmlentities($result['type']);?>
                </p>
                <p><b>Hotel :</b>
                  <?php echo htmlentities($result['hotel']);?>
                </p>
                <p><b>Food :</b>
                  <?php echo htmlentities($result['food']);?>
                </p>
                <p><b>Features :</b>
                  <?php echo htmlentities($result['features']);?>
                </p>
                <p><b>From Date :</b>
                  <?php echo htmlentities($result['from_date']);?>
                </p>
                <p><b>To Date :</b>
                  <?php echo htmlentities($result['to_date']);?>
                </p>
                <p><b>Total Capacity :</b>
                  <?php echo htmlentities($result['total_capacity']);?>
                </p>
                <div class="clearfix"></div>
                <div class="grand">
                  <p>Grand Total :</p>
                  <h3>Rs.<?php echo htmlentities($result['cost']);?></h3>
                </div>
                <p><b>Members :</b>
                  <input type="number" name="member">
                </p>
              </div>
              <div class="clearfix"></div>
            </div>
                  <?php if($_SESSION['login'])
                  {?>
                    <div class="book-button">
                      <button type="submit" name="submit2" class="btn-primary btn">Book</button>
                    </div>
                  <?php } else {?>
                    <div class="book-button">
                      <a href="#" data-toggle="modal" data-target="#modalRegisterForm2" class="btn-primary btn"> Book</a>
                    </div>
                    <?php } ?>
                    <div class="clearfix"></div>
            </form>
          <?php }} ?>
        </div>
      </div>
      <?php include('includes/footer.php');?>

      <?php include('includes/signup.php');?>

      <?php include('includes/signin.php');?>
  </body>
</html>
