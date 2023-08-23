<?php
session_start();
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{
header('location:index.php');
}
else{
?>
<?php
include 'includes/links.php';
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>TMS | Admin Dashboard</title>
	</head>
	<body>
	<div class="page-container">
		<div class="left-content">
			<div class="mother-grid-inner">
				<?php
				include 'includes/header.php';
				?>
	 			<ol class="breadcrumb">
				 	<li class="breadcrumb-item"><a href="">Home</a> <i class="fa fa-angle-right"></i></li>
				 </ol>
			 </div>
		 </div>
		 <?php include('includes/sidebarmenu.php');?>
						 <div class="clearfix"></div>
	 </div>
	</body>
</html>
<?php } ?>
<?php
include 'includes/footer.php';
?>
