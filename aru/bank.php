<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
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
	<title>Bank Details</title>
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
						<h2 class="page-title">Bank Details
						</h2>
						<div class="panel panel-primary">
							<div class="panel-heading">All Bank Details</div>
							<div class="panel-body" style="overflow-x:auto;">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Sno.</th>
											<th>Username</th>
											<th>Account Holder Name</th>
											<th>Bank Name</th>
											<th>Account Number</th>
											<th>IFSC Code</th>
											<th>Mobile Number</th>
											
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>Sno.</th>
											<th>Username</th>
											<th>Account Holder Name</th>
											<th>Bank Name</th>
											<th>Account Number</th>
											<th>IFSC Code</th>
											<th>Mobile Number</th>
											
										</tr>
									</tfoot>
									<tbody>
<?php	
$aid=$_SESSION['id'];
$ret="select * from bank";
$stmt= $mysqli->prepare($ret) ;
//$stmt->bind_param('i',$aid);
$stmt->execute() ;//ok
$res=$stmt->get_result();
$cnt=1;
while($row=$res->fetch_object())
	  {
	  	?>


											<tr>
												<td><?php echo $cnt;?>.</td>
												<?php
	 $sid= $row->cid;//print_r($sid);
     $s=mysqli_fetch_array(mysqli_query($mysqli,"select * from userregistration where id='$sid'"),MYSQLI_BOTH)or die(mysqli_error($mysqli));
	 ?>
												<td><?php if(!empty($s['firstName'])){echo $s['firstName']; }else{echo"No User Found";}?></td>
												<td><?php echo $row->name;?></td>
												<td><?php echo $row->bank;?></td>
												<td><?php echo $row->accoutno;?></td>
												<td><?php echo $row->code;?></td>
												<td><?php echo $row->phoneno;?></td>
												
												
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
