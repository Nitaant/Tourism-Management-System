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
$tid=intval($_GET['tid']);
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
$sql="update tourdetails set place='$pname',hotel='$photel',features='$pfeatures',food='$pfood',type='$ptype',cost='$pprice',from_date='$fromdate',to_date='$todate',total_capacity='$totalcapacity' where tid='$tid'";
if (mysqli_query($con,$sql)) {
  echo "<script>alert('Package updated successfully');</script>";
}
}}
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
<?php include('includes/header.php');?>
				     <div class="clearfix"> </div>
				</div>
	<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a><i class="fa fa-angle-right"></i>Update Tour Package </li>
            </ol>
 	<div class="grid-form">
  <div class="grid-form1">
  	       <h3>Update Package</h3>
  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">

<?php
$pid=intval($_GET['pid']);
$sql = "SELECT * from tourdetails where tid='$tid'";
$query = mysqli_query($con,$sql);
$cnt=1;
if(mysqli_num_rows($query) > 0)
{
foreach($query as $result)
{	?>

							<form class="form-horizontal" name="package" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Package Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="packagename" id="packagename" placeholder="Create Package" value="<?php echo htmlentities($result['place']);?>" required>
									</div>
								</div>

<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Hotel</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="hotel" id="hotel" placeholder="Hotel name" value="<?php echo htmlentities($result['hotel']);?>" required>
									</div>
								</div>

<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Package Features</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="packagefeatures" id="packagefeatures" placeholder="Package Features Eg-free Pickup-drop facility" value="<?php echo htmlentities($result['features']);?>" required>
									</div>
								</div>

<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Food</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="food" id="foodtype" placeholder="Veg / Non Veg" value="<?php echo htmlentities($result['food']);?>" required>
									</div>
								</div>

<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Package Type</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="packagetype" id="packagetype" placeholder=" Package Type eg- Family Package / Couple Package" value="<?php echo htmlentities($result['type']);?>" required>
									</div>
								</div>

<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Package Price</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="packageprice" id="packageprice" placeholder=" Package Price" value="<?php echo htmlentities($result['cost']);?>" required>
									</div>
								</div>

<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">From Date</label>
									<div class="col-sm-8">
										<input type="date" class="form-control" rows="5" cols="50" name="fromdate" id="fromdate" placeholder="To Date" value="<?php echo htmlentities($result['from_date']);?>" required>
									</div>
								</div>

<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">To Date</label>
									<div class="col-sm-8">
										<input type="date" class="form-control" rows="5" cols="50" name="todate" id="todate" placeholder="Package Details" value="<?php echo htmlentities($result['to_date']);?>" required>
									</div>
								</div>

<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Total Capacity</label>
									<div class="col-sm-8">
										<input type="number" class="form-control" rows="5" cols="50" name="totalcapacity" id="totalcapacity" placeholder="Total Capacity" value="<?php echo htmlentities($result['total_capacity']);?>" required>
									</div>
								</div>

<div class="form-group">
<label for="focusedinput" class="col-sm-2 control-label">Package Image</label>
<div class="col-sm-8">
<img src="packageimages/<?php echo htmlentities($result['image']);?>" width="200">&nbsp;&nbsp;&nbsp;
</div>
</div>
								<?php }} ?>

								<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<button type="submit" name="submit" class="btn-primary btn">Update</button>
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
					<?php include('includes/sidebarmenu.php');?>
							  <div class="clearfix"></div>
							</div>

</body>
</html>
