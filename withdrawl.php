<?php
session_start();
include('includes/config.php');
date_default_timezone_set('Asia/Kolkata');
include('includes/checklogin.php');
check_login();
if(isset($_POST['withdraw']))
{
$bit=$_POST['bit'];
$aid=$_SESSION['id'];
$rt=mysqli_fetch_array(mysqli_query($mysqli,"select MAX(id) from withdrawl where cid='$aid'"),MYSQLI_BOTH);
if(!empty($rt['MAX(id)'])){ $a=$rt['MAX(id)']; //print_r($a);die();
}
$sq=mysqli_fetch_array(mysqli_query($mysqli,"select * from withdrawl where id='$a'"),MYSQLI_BOTH);
if(!empty($sq)){$amt=$sq['walletAmount'];}else{$amt=0;}
$t=mysqli_query($mysqli,"select * from bank where cid='$aid'");
$c=mysqli_num_rows($t);
if($c>0)
{
if($amt>=$bit)
{
	if($bit<100)
	{
				echo "<script>alert('Minimum withdrawlAmount is 100');</script>";

	}
else{
$bit=$_POST['bit'];
$newamt=$amt-$bit;
$query=mysqli_query($mysqli,"insert into withdrawl (withdrawlAmount,walletAmount,cid) values('$bit','$newamt','$aid')");
}
}
else
{
		echo "<script>alert('Your wallet has not this much of money');</script>";

}
}
else{
			echo "<script>alert('Please fill bank details first');</script>";

}
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
	<title> Wallet</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">>
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="js/validation.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
</head>
<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/sidebar.php');?>
			<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					<br>
						<h2 class="page-title">Withdrawl </h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">Withdrawl</div>
									<div class="panel-body">
<form method="post"  name="registration" class="form-horizontal">
<div class="form-group">
<label class="col-sm-2 control-label"> Wallet Amount : </label>
 <div class="col-sm-2">
<input type="text" name="pname" id="pname"  class="form-control" value="<?php
 $aid=$_SESSION['id'];
 $rt=mysqli_fetch_array(mysqli_query($mysqli,"select MAX(id) from withdrawl where cid='$aid'"),MYSQLI_BOTH);
if(!empty($rt['MAX(id)'])){ $a=$rt['MAX(id)']; //print_r($a);die();

 $t=mysqli_fetch_array(mysqli_query($mysqli,"select * from withdrawl where id='$a'"),MYSQLI_BOTH);
 if(!empty($t['walletAmount'])){ echo $t['walletAmount']; }else{echo "0";}
}
else{echo "not found";}
 ?>"   required="required" readonly>
</div>

<label class="col-sm-2 control-label">Withdrawl Amount : </label>
<div class="col-sm-2">
<input type="text" name="bit" id="bit" class="form-control"  required="required" placeholder="Input Your withdrawl amount" >
</div>
<div class="col-sm-8 col-sm-offset-8">
<button class="btn btn-default" type="submit">Cancel</button>
<input type="submit" name="withdraw" id="withdraw"  value="Withdraw" class="btn btn-primary">
</div>
</div>
</form>	</div>
									</div>
								</div>
							</div>
						</div></div>
<div class="row">
							<div class="col-md-12">
							<div class="panel panel-default">
				           <div class="panel-heading" style="color: black;">All Requests</div>
							<div class="panel-body"  style="overflow-x:auto;">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Sno.</th>
											<th>Username</th>
											<th>Wallet Amount</th>
											<th>Withdrawl Amount</th>
											<th>Withdrawl Date</th>
											<th>Status</th>
											
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
										</tr>
									</tfoot>
									<tbody>
<?php	
$aid=$_SESSION['id'];
$ret="select * from withdrawl where cid='$aid' and withdrawlAmount!=0 order by date desc";
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
				</div> 	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript">
</script>
	<script src="js/main.js"></script>
	<script>
		if(window.history.replaceState){
			window.history.replaceState(null,null,window.location.href);
		}
	</script>
</body>

</html>