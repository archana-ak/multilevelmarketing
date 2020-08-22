<?php
session_start();
include('includes/config.php');
date_default_timezone_set('Asia/Kolkata');
include('includes/checklogin.php');
check_login();
if(isset($_POST['submit']))
{
$bit=$_POST['bit'];
$aid=$_SESSION['id'];
$query=mysqli_query($mysqli,"update userregistration set bitcoin='$bit'  where id='$aid'");
if($query)
{
	echo "<script>alert('Bitcoin address saved');</script>";
}
else
{
	echo "<script>alert('Bitcoin address not saved');</script>";
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
						<h2 class="page-title">Wallet </h2>

						<div class="row">
							<div class="col-md-8">
								<div class="panel panel-primary">
									<div class="panel-heading">Wallet</div>
									<div class="panel-body">
<form method="post"  name="registration" class="form-horizontal">
<div class="form-group">
<label class="col-sm-2 control-label"> Primary Amount : </label>
<div class="col-sm-4">
<input type="text" name="pname" id="pname"  class="form-control" value="<?php $aid=$_SESSION['id'];
 $rt=mysqli_fetch_array(mysqli_query($mysqli,"select * from withdrawl where cid='$aid'"),MYSQLI_BOTH);
if(!empty($rt['cid'])){ $a=$rt['walletAmount']; echo $a; }else{echo"0";}  ?>"   required="required" readonly>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Secondary Amount : </label>
<div class="col-sm-4">
<input type="text" name="fname" id="fname"  class="form-control" value="0"   required="required" readonly >
</div>
</div>
<div class="col-sm-6 col-sm-offset-4">
<button class="btn btn-default" type="submit">Cancel</button>
<input type="submit" name="withdraw" id="withdraw"  value="Amount" class="btn btn-primary">
</div>
</div>
</form>

										</div>
									</div>
								</div>
							</div>
						</div>
					
					</div>
				</div> 	
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