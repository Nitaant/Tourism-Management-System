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
	?>
<!DOCTYPE HTML>
<html>
<head>
<title>TMS | admin manage packages</title>

</head>
<body>
   <div class="page-container">
<div class="left-content">
	   <div class="mother-grid-inner">
				<?php include('includes/header.php')?>
				     <div class="clearfix"> </div>
				</div>
<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a><i class="fa fa-angle-right"></i>Manage Packages</li>
            </ol>
<div class="agile-grids">

				<div class="agile-tables">
					<div class="w3l-table-info">
					  <h2>Manage Packages</h2>
					    <table id="table" border="1" width="100%">
						  <tr align="center">
						  <th>#</th>
							<th >Name</th>
							<th>Type</th>
							<th>Price</th>
							<th>Action</th>
						  </tr>
<?php $sql = "SELECT * from tourdetails";
$query = mysqli_query($con,$sql);
$cnt=1;
if(mysqli_num_rows($query) > 0)
{
foreach($query as $result)
{				?>
						  <tr align="center">
							<td><?php echo htmlentities($cnt);?></td>
							<td><?php echo htmlentities($result['place']);?></td>
							<td><?php echo htmlentities($result['type']);?></td>
							<td>Rs.<?php echo htmlentities($result['cost']);?></td>
							<td><a href="update-package.php?tid=<?php echo htmlentities($result['tid']);?>"><button type="button" class="btn btn-primary ">View Details</button></a></td>
						  </tr>
						 <?php $cnt=$cnt+1;} }?>
					  </table>
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
<?php } ?>
