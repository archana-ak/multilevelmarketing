<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

if(isset($_REQUEST['status']))
	{
$eid=intval($_GET['status']);
$status=0;
$sql = "UPDATE userregistration SET status='$status' ,updationDate=now() WHERE  id='$eid'";
$sq=mysqli_query($mysqli,"delete from transaction where custid='$eid'")or die();
$query = mysqli_query($mysqli,$sql);
}


if(isset($_REQUEST['status1']))
	{
$aeid=intval($_GET['status1']);
$status1=1;
$amount=500;
$orderid="ORDS" . rand(10000,99999999);
$sql = "UPDATE userregistration SET status='$status1',updationDate=now() WHERE  id='$aeid'";

$sq=mysqli_query($mysqli,"insert into transaction(orderid,amount,custid,date) values('$orderid','$amount','$aeid',now())") or die();
$query = mysqli_query($mysqli,$sql);
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
	<title>Manage Registrations</title>
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
						<h2 class="page-title">Manage Registration</h2>
						<div class="panel panel-primary">
							<div class="panel-heading">All Details</div>
							<div class="panel-body"style="overflow-x:auto;">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Sno.</th>
											<th>Username</th>
											<th>Fullname</th>
											<th>Sponsor Username</th>
											<th>Parent Username</th>
											<th>Email</th>
											<th>Registration Date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>Sno.</th>
											<th>Username</th>
											<th>Fullname</th>
											<th>Sponsor Username</th>
											<th>Parent Username</th>
											<th>Email</th>
											<th>Registration Date</th>
											<th>Action</th>
										</tr>
									</tfoot>
									<tbody>
<?php	
$aid=$_SESSION['id'];
$ret="select * from userregistration";
$stmt= $mysqli->prepare($ret) ;
//$stmt->bind_param('i',$aid);
$stmt->execute() ;//ok
$res=$stmt->get_result();
$cnt=1;
while($row=$res->fetch_object())
	  {
	  	?>
<tr>
<td><?php echo $cnt;;?></td>
<td><?php echo $row->firstName;?></td>
<td><?php echo $row->lastName;?></td>
<?php
	 $sid= $row->sponsor_id;
     $s=mysqli_fetch_array(mysqli_query($mysqli,"select * from userregistration where id='$sid'"),MYSQLI_BOTH);
	 ?>
<td><?php if(!empty($s['firstName'])){echo $s['firstName']; }else{echo"No Sponsor";}?> </td>

<?php
	 $pid= $row->parent_id;
     $t=mysqli_fetch_array(mysqli_query($mysqli,"select * from userregistration where id='$pid'"),MYSQLI_BOTH);
	 ?>
<td><?php if(!empty($t['firstName'])){ echo $t['firstName']; }else{echo"No parent";}?></td>
<td><?php echo $row->email;?></td>
<td><?php echo $row->regDate;?></td>

<td><?php if($row->status=="" || $row->status==0)//onclick="return confirmation()"
{
	?><a href="manage-reg.php?status1=<?php echo htmlentities($row->id);?>" onclick="return confirm('Do you really want to Activate')"> Inactive</a>
<?php } else {?>

<a href="manage-reg.php?status=<?php echo htmlentities($row->id);?>" onclick="return confirm('Do you really want to DEactivate')"> Active</a>
</td>
<?php } ?></td>

</tr>
									<?php
$cnt=$cnt+1;
									 } ?>
											
										
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
