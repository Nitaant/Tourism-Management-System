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
<title>TMS | Admin manage Bookings</title>
</head>
<body>
   <div class="page-container">
<div class="left-content">
	   <div class="mother-grid-inner">
				<?php include('includes/header.php');?>
				     <div class="clearfix"> </div>
				</div>
<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a><i class="fa fa-angle-right"></i>Manage Bookings</li>
            </ol>
<div class="agile-grids">
				<div class="agile-tables">
					<div class="w3l-table-info">
					  <h2>Manage Bookings</h2>
					    <table id="table" border="1" width="100%">
						  <tr align="center">
						  <th>Booikng id</th>
							<th>Name</th>
							<th>Mobile No.</th>
							<th>Email Id</th>
							<th>Destination</th>
							<th>From /To </th>
							<th>Booking date </th>
						  </tr>
<?php $sql = "SELECT package.pid as bookid,package.tid as tid,user.name as fname,user.phone as mnumber,user.email as email,tourdetails.place as pckname,tourdetails.from_date as fdate,tourdetails.to_date as tdate,package.book_date as upddate from user join package on package.usermail=user.email join tourdetails on
tourdetails.tid=package.tid";
$query = mysqli_query($con,$sql);
$cnt=1;
if(mysqli_num_rows($query)){
foreach($query as $result)
{	?>					<tr align="center">
							<td>#BK-<?php echo htmlentities($result['bookid']);?></td>
							<td><?php echo htmlentities($result['fname']);?></td>
							<td><?php echo htmlentities($result['mnumber']);?></td>
							<td><?php echo htmlentities($result['email']);?></td>
							<td><a href="update-package.php?tid=<?php echo htmlentities($result['tid']);?>"><?php echo htmlentities($result['pckname']);?></a></td>
							<td><?php echo htmlentities($result['fdate']);?> To <?php echo htmlentities($result['tdate']);?></td>
							<td><?php echo htmlentities($result['upddate']);?></td>
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
