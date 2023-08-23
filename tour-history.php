<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>TMS | MY TOUR HISTORY</title>
		<body>
<!-- top-header -->
	<div class="top-header">
		<?php include('includes/header.php');?>
		<div class="banner-1 ">
			<div class="container">
				<h1>TMS-Tourism Management System</h1>
			</div>
		</div>
<!--- /banner-1 ---->
<!--- privacy ---->
	<div class="privacy">
		<div class="container">
			<h3>My Tour History</h3>
				<p>
					<table border="1" width="100%">
						<tr align="center">
							<th>#</th>
							<th>Booking Id</th>
							<th>Package Name</th>
							<th>From</th>
							<th>To</th>
							<th>Booking Date</th>
						</tr>
						<?php
						$uemail=$_SESSION['login'];;
						$sql = "SELECT package.pid as bookid,package.tid as pkgid,tourdetails.place as packagename,tourdetails.from_date as fromdate,tourdetails.to_date as todate,package.book_date as regdate from package join tourdetails on tourdetails.tid=package.tid where usermail='$uemail'";
						$cnt=1;
						$query = mysqli_query($con,$sql);
						if(mysqli_num_rows($query)){
						foreach($query as $result)
						{	?>
							<tr align="center">
								<td><?php echo htmlentities($cnt);?></td>
								<td>#BK<?php echo htmlentities($result['bookid']);?></td>
								<td><?php echo htmlentities($result['packagename']);?></a></td>
								<td><?php echo htmlentities($result['fromdate']);?></td>
								<td><?php echo htmlentities($result['todate']);?></td>
								<td><?php echo htmlentities($result['regdate']);?></td>
							</tr>
							<?php $cnt=$cnt+1; }} ?>
						</table>
					</p>
				</form>
			</div>
		</div>
	<?php include('includes/footer.php');?>
	<?php include('includes/signup.php');?>
	<?php include('includes/signin.php');?>
	</body>
</html>
