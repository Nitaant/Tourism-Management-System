<?php
session_start();
error_reporting(0);
include 'includes/config.php';
?>
<!DOCTYPE HTML>
<html>
  <head>
    <title>TMS  | Package List</title>
  </head>
  <body>
    <?php
    include('includes/header.php');
    ?>
<!--- banner ---->
  <div class="banner-3">
    <div class="container">
      <h1> TMS- Package List</h1>
    </div>
  </div>
<!--- /banner ---->
<!--- rooms ---->
  <div class="rooms">
    <div class="container">
      <div class="room-bottom">
        <h3>Package List</h3>
        <?php
        $sql = "SELECT * from tourdetails";
        $query = mysqli_query($con,$sql);
        if(mysqli_num_rows($query)){
        foreach($query as $result)
        {	?>
          <div class="rom-btm">
            <div class="col-md-3 room-left">
              <img src="admin/packageimages/<?php echo htmlentities($result['image']);?>" class="img-responsive" alt="">
            </div>
            <div class="col-md-6 room-midle">
              <h4>Package Location :<?php echo htmlentities($result['place']);?></h4>
              <h6>Package Type : <?php echo htmlentities($result['type']);?></h6>
              <p>Food : <?php echo htmlentities($result['place']);?></p>
              <p><b>Features :</b> <?php echo htmlentities($result['features']);?></p>
            </div>
            <div class="col-md-3 room-right">
              <h5>Rs.<?php echo htmlentities($result['cost']);?></h5>
              <a href="package-details.php?tid=<?=$result['tid']?>" class="view">Details</a>
            </div>
            <div class="clearfix"></div>
          </div>
        <?php }} ?>
      </div>
    </div>
  </div>
  <?php include('includes/footer.php');?>
  <?php include('includes/signup.php');?>
  <?php include('includes/signin.php');?>
  </body>
</html>
