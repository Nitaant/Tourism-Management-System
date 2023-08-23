<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html>

  <head>
    <title>TOURISM MANAGEMENT SYSTEM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  </head>
  <body>
  <?php
  include 'includes/header.php';
  include 'includes/config.php';
  ?>
    <div class="banner">
      <div class="container">
        <h1 class="wow">Tourism Management System</h1>
      </div>
    </div>
    <div class="container">
      <div class="rupes">
        <div class="col-md-4 rupes-left">
          <div class="rup-left">
            <i class="fa fa-usd"></i>
          </div>
          <div class="rup-rgt">
            <h3>UP TO 50% OFF</h3>
            <h4>TRAVEL SMART</h4>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="col-md-4 rupes-left">
          <div class="rup-left">
            <i class="fa fa-h-square"></i>
          </div>
          <div class="rup-rgt">
            <h3>UP TO 70% OFF</h3>
            <h4>ON HOTELS ACROSS WORLD</h4>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="col-md-4 rupes-left">
          <div class="rup-left">
            <i class="fa fa-mobile"></i>
          </div>
          <div class="rup-rgt">
            <h3>FLAT 30% OFF</h3>
            <h4>US APP OFFER</h4>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
<!---holiday---->
    <div class="container">
    <div class="holiday">
      <h3>Package List</h3>
      <?php $sql = "SELECT * from tourdetails order by rand() limit 4";
      $query = mysqli_query($con,$sql);
      $cnt=1;
      if(mysqli_num_rows($query)){
        foreach($query as $result)
        {	?>
        <div class="rom-btm">
          <div class="col-md-3 room-left">
            <img src="admin/packageimages/<?php echo htmlentities($result['image']);?>" class="img-responsive" alt="">
          </div>
          <div class="col-md-6 room-midle wow fadeInUp animated" data-wow-delay=".5s">
            <h4>Package Locaton: <?php echo htmlentities($result['place']);?></h4>
            <h6>Package Type : <?php echo htmlentities($result['type']);?></h6>
            <p><b>Features</b>
            <?php echo htmlentities($result['features']);?>
            </p>
          </div>
          <div class="col-md-3 room-right">
            <h5>Rs.<?php echo htmlentities($result['cost']);?></h5>
            <a href="package-details.php?tid=<?php echo htmlentities($result['tid']);?>" class="view">Details</a>
          </div>
          <div class="clearfix"></div>
        </div>
      <?php }} ?>
        <div><a href="package-list.php" class="view">View More Packages</a></div>
      </div>
      <div class="clearfix"></div>
    </div>

<!--- routes ---->
    <div class="routes">
      <div class="container">
        <div class="col-md-4 routes-left">
          <div class="rou-left">
            <a href="#"><i class="fa fa-list"></i></a>
          </div>
          <div class="rou-rgt">
            <h3>80000</h3>
            <p>Enquiries</p>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="col-md-4 routes-left">
          <div class="rou-left">
            <a href="#"><i class="fa fa-user"></i></a>
          </div>
          <div class="rou-rgt">
            <h3>1900</h3>
            <p>Regestered users</p>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="col-md-4 routes-left">
          <div class="rou-left">
            <a href="#"><i class="fa fa-ticket"></i></a>
          </div>
          <div class="rou-rgt">
            <h3>7,00,00,000+</h3>
            <p>Booking</p>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    <?php
     include 'includes/footer.php';
     ?>
  </body>
</html>
