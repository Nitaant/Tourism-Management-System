<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{
header('location:index.php');
}
else{
include('includes/links.php');
if(isset($_POST['submit']))
{
$pname=$_POST['packagename'];
$photel=$_POST['hotel'];
$pfeatures=$_POST['packagefeatures'];
$pfood=$_POST['food'];
$ptype=$_POST['packagetype'];
$pprice=$_POST['packageprice'];
$fromdate=$_POST['fromdate'];
$todate=$_POST['todate'];
$totalcapacity=$_POST['totalcapacity'];
$pimage=$_FILES["packageimage"]["name"];
move_uploaded_file($_FILES["packageimage"]["tmp_name"],"packageimages/".$_FILES["packageimage"]["name"]);
$sql="INSERT INTO tourdetails(place,hotel,features,food,type,cost,from_date,to_date,total_capacity,image) VALUES('$pname','$photel','$pfeatures','$pfood','$ptype','$pprice','$fromdate','$todate','$totalcapacity','$pimage')";
if(mysqli_query($con,$sql))
{
echo "<script>alert('Package created successfully');</script>";
}
else
{
echo "<script>alert('Wrong');</script>";
}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>TMS | Admin Package Creation</title>

</head>
<body>
   <div class="page-container">
<div class="left-content">
	   <div class="mother-grid-inner">
<?php
include('includes/header.php');
include('includes/sidebarmenu.php');
?>

				     <div class="clearfix"> </div>
				</div>
	<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a><i class="fa fa-angle-right"></i>Update Package </li>
            </ol>

 	<div class="grid-form">

  <div class="grid-form1">
  	       <h3>Create Package</h3>

  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" name="package" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Package Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="packagename" id="packagename" placeholder="Create Package" required>
									</div>
								</div>
<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Hotel</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="hotel" id="hotel" placeholder="hotel name" required>
									</div>
								</div>
<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Package Features</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="packagefeatures" id="packagefeatures" placeholder="Package Features" required>
									</div>
								</div>
<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Food Type</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="food" id="foodtype" placeholder="Veg or Non Veg" required>
									</div>
								</div>
<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Package Type</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="packagetype" id="packagetype" placeholder=" Package Type eg- Family Package / Couple Package" required>
									</div>
								</div>

<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Package Price</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="packageprice" id="packageprice" placeholder=" Package Price" required>
									</div>
								</div>

<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">From Date</label>
									<div class="col-sm-8">
										<input type="date" class="form-control" rows="5" cols="50" name="fromdate" id="fromdate" required>
									</div>
								</div>

<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">To Date</label>
									<div class="col-sm-8">
										<input type="date" class="form-control" rows="5" cols="50" name="todate" id="todate" required>
									</div>
								</div>

<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Total Capacity</label>
									<div class="col-sm-8">
										<input type="number" class="form-control" rows="5" cols="50" name="totalcapacity" id="totalcapacity" required>
									</div>
								</div>
<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Package Image</label>
									<div class="col-sm-8">
										<input type="file" name="packageimage" id="packageimage" required>
									</div>
								</div>

								<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<button type="submit" name="submit" class="btn-primary btn">Create</button>

				<button type="reset" class="btn-primary btn">Reset</button>
			</div>
		</div>
					</div>
					</form>
      <div class="panel-footer">
	 </div>
    </form>
  </div>
 	</div>
<div class="inner-block">
</div>
<?php include('includes/footer.php');?>

</div>
</div>

</body>
</html>
<?php } ?>
