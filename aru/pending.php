<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

if(isset($_REQUEST['status']))
	{
$eid=intval($_GET['status']);
$status=2;
$sq=mysqli_fetch_array(mysqli_query($mysqli,"SELECT * from withdrawl WHERE id='$eid'"),MYSQLI_BOTH);//or die(mysqli_error($mysqli));
if(!empty($sq)){
$amt=$sq['walletAmount']; 
$with=$sq['withdrawlAmount'];//print_r($with);die();
$newamt=$amt+$with;}//print_r($newamt);die();
$w=0;
$sql = "UPDATE withdrawl SET status='$status', walletAmount='$newamt' WHERE  id='$eid'";
$query = mysqli_query($mysqli,$sql);
if(!$query)
{
	echo"<script>alert('some problem occured');</script>";
}

}
if(isset($_REQUEST['status1']))
	{
$aeid=intval($_GET['status1']);
$status1=1;
$sql = "UPDATE withdrawl SET status='$status1' WHERE  id='$aeid'";
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
	<title>Approved Withdrawl</title>
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
					<div class="col-md-12">
						<h2 class="page-title" style="margin-top:4%">Withdrawl Requests</h2>
						<div class="panel panel-primary">
							<div class="panel-heading">All Details</div>
							<div class="panel-body"style="overflow-x:auto;">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Sno.</th>
											<th>Username</th>
											<th>Wallet Amount</th>
											<th>Withdrawl Amount</th>
											<th>Withdrawl Date</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>Sno.</th>
											<th>Username</th>
											<th>Wallet Amount</th>
											<th>Withdrawl Amount</th>
											<th>Withdrawl Date</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</tfoot>
									<tbody>
<?php	
$aid=$_SESSION['id'];
$ret="select * from withdrawl where status=0 and withdrawlAmount!=0 order by date desc";
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
<?php
	 $cid= $row->cid;
     $s=mysqli_fetch_array(mysqli_query($mysqli,"select * from userregistration where id='$cid'"),MYSQLI_BOTH);
	 ?>
<td><?php if(!empty($s['firstName'])){echo $s['firstName']; }else{echo"No Sponsor";}?> </td>
<td><?php echo $row->walletAmount;?></td>
<td><?php echo $row->withdrawlAmount;?></td>
<td><?php echo $row->date;?></td>

<?php
	 $cid= $row->status;//print_r($cid);die();
	 ?>
<td><?php if($cid==0){echo "Pending" ;}elseif($cid==2){echo"Declined";} elseif($cid==1){echo"Accepted";} else echo "Not found" ;?> </td>



<td><?php if($row->status=="" || $row->status==0)//onclick="return confirmation()"
{
	?><a href="pending.php?status1=<?php echo htmlentities($row->id);?>" onclick="return confirm('Approve Withdrawl')">Approve</a>
<?php } else {?>

<a href="pending.php?status=<?php echo htmlentities($row->id);?>" onclick="return confirm('Decline Withdrawl')">Decline </a>
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
