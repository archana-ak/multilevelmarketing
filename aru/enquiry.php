<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

if(isset($_POST['delete']))
{
	$sql=mysqli_query($mysqli,"delete from userlog");
}
?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	<title>Enquiries</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
			<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12"><br><br>
						<h2 class="page-title">Enquiries
						</h2>
						<div class="panel panel-primary">
							<div class="panel-heading">All Enquiries </div>
							<div class="panel-body" style="overflow-x:auto;">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Sno.</th>
											<th>Name</th>
											<th>Subject</th>
											<th>Email</th>
											<th>Message</th>
											
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>Sno.</th>
											<th>Name</th>
											<th>Subject</th>
											<th>Email</th>
											<th>Message</th>
											
										</tr>
									</tfoot>
									<tbody>
<?php
$sql=mysqli_query($mysqli,"select * from enquiry order by id desc");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>


											<tr>
												<td><?php echo $cnt;?>.</td>
												<td><?php echo $row['name'];?></td>
												<td><?php echo $row['subject'];?></td>
												<td><?php echo $row['email'];?></td>
												
												<td><?php echo $row['msg'];?></td>
												
												
											</tr>
											
											<?php 
$cnt=$cnt+1;
											 }?>
											
											
										</tbody>
									</table>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>

</body>

</html>
