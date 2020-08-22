<?php
session_start();
include('includes/config.php');
date_default_timezone_set('Asia/Kolkata');
include('includes/checklogin.php');
check_login();
$aid=$_SESSION['id'];
if(isset($_POST['submit']))
{
$cid=mysqli_escape_string($mysqli,$_POST['cid']);
$act_name=mysqli_escape_string($mysqli,$_POST['act_name']);
$bank=mysqli_escape_string($mysqli,$_POST['bank']);
$act_num=mysqli_escape_string($mysqli,$_POST['act_num']);
$code=mysqli_escape_string($mysqli,$_POST['code']);
$phone=mysqli_escape_string($mysqli,$_POST['phone']);
if (!preg_match('/^[0-9]{3}[0-9]{3}[0-9]{4}$/',$phone)) {

	echo"<script>alert('Enter Valid Phone Number');</script>";
	}
	else{
$t=mysqli_query($mysqli,"select * from bank where cid='$aid'");
$c=mysqli_num_rows($t);
if($c>0)
{

$u=mysqli_query($mysqli,"update bank set cid='$aid',name='$act_name',bank='$bank',accoutno='$act_num',code='$code',phoneno='$phone' where cid='$aid'")or die(mysqli_error($mysqli));
if($u)
{
echo"<script>alert('Updated Successfully');</script>";
}
else{
	echo"<script>alert('NOT Updated');</script>";

}
}
else
{
$sq=mysqli_query($mysqli,"insert into bank(cid,name,bank,accoutno,code,phoneno) values('$aid','$act_name','$bank','$act_num','$code','$phone')")or die(mysqli_error($mysqli));
if($sq)
{
echo"<script>alert('Submitted Successfully');</script>";
}
else{
	echo"<script>alert('NOT Submitted');</script>";

}
}
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
	<title>Bank Details</title>
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
					<div class="col-md-12"><br>
						<h2 class="page-title">Make sure you provide correct details</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">
Bank details 
</div>
									
<?php
	 $aid= $_SESSION['id'];
     $s=mysqli_fetch_array(mysqli_query($mysqli,"select * from bank where cid='$aid'"),MYSQLI_BOTH);
	 ?>
<div class="panel-body">
<form method="post" action="" name="registration" class="form-horizontal">
<input type="hidden" name="cid" id="cid"  class="form-control" value="<?php echo $row->aid;?>" readonly  required="required" >

<div class="form-group">
<label class="col-sm-2 control-label">Account Holder Name : </label>
<div class="col-sm-8">
	
<input type="text" name="act_name" id="act_name"  class="form-control" value="<?php if(!empty($s['name'])){echo $s['name'];} else{echo "";}?>" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Name of Bank: </label>
<div class="col-sm-8">
<select name="bank" id="bank"  class="form-control" required="required">
	<option value="">Select Bank Name</option>
	<option value="Allahabad Bank"<?php if($s['bank']=="Allahabad Bank")echo "selected"; ?>>Allahabad Bank</option>
	<option value="Andhra Bank"<?php if($s['bank']=="Andhra Bank")echo "selected"; ?>>Andhra Bank</option>
	<option value="Bank of Baroda"<?php if($s['bank']=="Bank of Baroda")echo "selected"; ?>>Bank of Baroda</option>
	<option value="Bank of India"<?php if($s['bank']=="Bank of India")echo "selected"; ?>>Bank of India</option>
	<option value="Bank of Maharashtra"<?php if($s['bank']=="Bank of Maharashtra")echo "selected"; ?>>Bank of Maharashtra</option>
	<option value="Canara Bank"<?php if($s['bank']=="Canara Bank")echo "selected"; ?>>Canara Bank</option>
	<option value="Central Bank of India"<?php if($s['bank']=="Central Bank of India")echo "selected"; ?>>Central Bank of India</option>
	<option value="Corporation Bank"<?php if($s['bank']=="Corporation Bank")echo "selected"; ?>>Corporation Bank</option>
	<option value="Dena Bank"<?php if($s['bank']=="Dena Bank")echo "selected"; ?>>Dena Bank</option>
	<option value="Indian Bank"<?php if($s['bank']=="Indian Bank")echo "selected"; ?>>Indian Bank</option>
	<option value="Oriental Bank of Commerce"<?php if($s['bank']=="Oriental Bank of Commerce")echo "selected"; ?>>Oriental Bank of Commerce</option>
	<option value="Punjab National Bank"<?php if($s['bank']=="Punjab National Bank")echo "selected"; ?>>Punjab National Bank</option>
	<option value="Syndicate Bank"<?php if($s['bank']=="Syndicate Bank")echo "selected"; ?>>Syndicate Bank</option>
	<option value="UCO Bank"<?php if($s['bank']=="UCO Bank")echo "selected"; ?>>UCO Bank</option>
	<option value="Union Bank of India"<?php if($s['bank']=="Union Bank of India")echo "selected"; ?>>Union Bank of India</option>
	<option value="United Bank of India"<?php if($s['bank']=="United Bank of India")echo "selected"; ?>>United Bank of India</option>
	<option value="Vijaya Bank"<?php if($s['bank']=="Vijaya Bank")echo "selected"; ?>>Vijaya Bank</option>
	<option value="IDBI Bank"<?php if($s['bank']=="IDBI Bank")echo "selected"; ?>>IDBI Bank</option>
	<option value="State Bank of India"<?php if($s['bank']=="State Bank of India")echo "selected"; ?>>State Bank of India</option>
	<option value="Paytm  Bank"<?php if($s['bank']=="Paytm Bank")echo "selected"; ?>>Paytm  Bank</option>
	<option value="National Bank"<?php if($s['bank']=="National Bank")echo "selected"; ?>>National Bank</option>
	<option value="HDFC Bank"<?php if($s['bank']=="HDFC Bank")echo "selected"; ?>>HDFC Bank</option>
	<option value="ICICI Bank"<?php if($s['bank']=="ICICI Bank")echo "selected"; ?>>ICICI Bank</option>
	<option value="Axis Bank"<?php if($s['bank']=="Axis Bank")echo "selected"; ?>>Axis Bank</option>
	<option value="Kotak Mahindra Bank"<?php if($s['bank']=="Kotak Mahindra Bank")echo "selected"; ?>>Kotak Mahindra Bank</option>
	<option value="Yes Bank"<?php if($s['bank']=="Yes Bank")echo "selected"; ?>>Yes Bank</option>
	<option value="State Bank of Hyderabad"<?php if($s['bank']=="State Bank of Hyderabad")echo "selected"; ?>>State Bank of Hyderabad</option>
	<option value="State Bank of Patiala"<?php if($s['bank']=="State Bank of Patiala")echo "selected"; ?>>State Bank of Patiala</option>
	<option value="State Bank of Mysore"<?php if($s['bank']=="State Bank of Mysore")echo "selected"; ?>>State Bank of Mysore</option>
	<option value="Others"<?php if($s['bank']=="Others")echo "selected"; ?>>Others</option>

</select>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Account Number : </label>
<div class="col-sm-8">
<input type="text" name="act_num" id="act_num"  class="form-control" value="<?php if(!empty($s['accoutno'])){echo $s['accoutno'];}else{echo "";}?>" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">IFSC Code : </label>
<div class="col-sm-8">
<input type="text" name="code" id="code"  class="form-control" value="<?php if(!empty($s['code'])){echo $s['code'];}else{ echo "";}?>" required="required">
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Mobile Number : </label>
<div class="col-sm-8">
<input type="text" name="phone" id="phone"  class="form-control" value="<?php if(!empty($s['phoneno'])){echo $s['phoneno'];}else{ echo "";}?>" required="required">
</div>
</div>


<div class="col-sm-6 col-sm-offset-4">

<input type="submit" name="submit" Value="Submit Details" class="btn btn-primary">
</div>
</form>

									</div>
									</div>
								</div>
							</div>
						</div>
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
	<script src="js/main.js"></script>
</body>
</html>