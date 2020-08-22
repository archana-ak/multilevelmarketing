<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
if (isset($_POST['submit'])){
    $aid = mysqli_escape_string($mysqli,$_SESSION['id']);
    $direct=mysqli_escape_string($mysqli,$_POST['direct']);
    $level=mysqli_escape_string($mysqli,$_POST['level']);
    $daily=mysqli_escape_string($mysqli,$_POST['daily']);
    $dowmline=mysqli_escape_string($mysqli,$_POST['dowmline']);
  $sq=mysqli_query($mysqli,"select * from dashboard where aid='$aid'");
  $num=mysqli_num_rows($sq);
  if($num==0)
  {
$sql=mysqli_query($mysqli,"insert into dashboard(aid,direct,level,daily,downline,date)values('$aid','$direct','$level','$daily','$dowmline',now())")or die(mysqli_error($mysqli));	
  }
else{
$sql=mysqli_query($mysqli,"update dashboard set direct='$direct',level='$level',daily='$daily',downline='$dowmline' where aid='$aid'")or die(mysqli_error($mysqli));
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
	<title>DashBoard</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
<?php include("includes/header.php");?>

	<div class="ts-main-content">
		<?php include("includes/sidebar.php");?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row" ><br><br>
					<div class="col-md-12"style="margin-top:2%">
<?php 
$aid=$_SESSION['id'];
$sql=mysqli_query($mysqli,"select status,id from userregistration where id='$aid'");
while($row=mysqli_fetch_array($sql))
	  {
 if($row['status']=="" || $row['status']==1)
 { 
	 }
else{
echo"<script>swal('Your Id is NOT active..Please ACTIVATE');</script>";
}}?>
			
						<h2 class="page-title" >Dashboard</h2>
						
						<div class="row">
							<!-- copy link area -->
							
	<?php 
$aid=$_SESSION['id'];
$t=mysqli_fetch_array(mysqli_query($mysqli,"select * from userregistration where id='$aid'"),MYSQLI_BOTH);
if((!empty($t['id'])))
{
$id=$t['firstName'];
}
?>
<div class="form-group" style="margin-left: 1%">
<label class="col-sm-1 control-label ">Referal link: </label>
<div class="col-sm-6">
							 <input class="form-control" type="text" value="https://phillmoney.com/registration.php?sponsor_id=<?php echo $id;?>" id="myInput" readonly>
							  </div>
							  <div class="col-sm-4 ">
                             <button class="btn btn-default" onclick="myFunction()">Copy Link</button><hr></div>
                             </div></div>
                             <!-- copy link area closed -->
							<div class="col-md-12">
								<div class="row">
<form method="post" action="dashboard.php" id="myForm" name="myForm">
<?php
$aid=$_SESSION['id'];
$t1=mysqli_fetch_array(mysqli_query($mysqli,"select * from transaction where custid='$aid'"),MYSQLI_BOTH); 
	?>
								 <div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-secondary">
												<div class="stat-panel text-center">
													<div class="stat-panel-number h1 "><?php if(!empty($t1['amount'])){echo $t1['amount']; }else{echo"0";}?></div>
                                                   <div class="stat-panel-title text-uppercase">principal amount</div>
												</div>
											</div>
											<a href="#" class="block-anchor panel-footer"><i class="fa fa-arrow-upper"></i></a>
										</div>
									</div>


                                     <div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-dark text-light">
												<div class="stat-panel text-center">
<?php
$aid=$_SESSION['id'];
//$status=1;
$t=mysqli_fetch_array(mysqli_query($mysqli,"select * from userregistration where id='$aid'"),MYSQLI_BOTH);
if(($t['status']==1))
{
$s=mysqli_query($mysqli,"select * from transaction where custid='$aid'")or die(mysqli_error($mysqli));
while($row=mysqli_fetch_array($s))
{
$date=strtotime($row['date']);
$tdate=strtotime(date("Y-m-d"));
$sec=$tdate-$date;
$in=$sec/86400;//print_r($in);
$dowmline=$_SESSION['count2'];//print_r($dowmline);
//$dowmline=2000;
$direct=$_SESSION['count1'];
//$direct=2;
if (($dowmline>=20 && $dowmline<50) && ($direct==0)) {
	$income=2;
}
elseif (($dowmline>=50 && $dowmline<100) && ($direct==0)) {
	$income=3;
}
elseif (($dowmline>=100 && $dowmline<500) && ($direct==0)) {
	$income=4;
}
elseif (($dowmline>=500 && $dowmline<1000) && ($direct==0)) {
	$income=5;
}
elseif (($dowmline>=1000 && $dowmline<2000) && ($direct==0)) {
	$income=10;
}
elseif (($dowmline>=2000) && ($direct==0)) {
	$income=10;
}
elseif (($dowmline>=2000 && $dowmline<2500) && ($direct>=1)) {
	$income=20;
}
elseif (($dowmline>=2500) && ($direct==1)) {
	$income=20;
}
elseif (($dowmline>=2500 && $dowmline<5000) && ($direct>=2)) {
	$income=30;
}
elseif (($dowmline>=5000) && ($direct==2)) {
	$income=30;
}
elseif (($dowmline>=5000 && $dowmline<10000) && ($direct>=4)) {
	$income=40;
}
elseif (($dowmline>=10000) && ($direct>=6)) {
	$income=50;
}
else
{
	$income=0;//echo $income;
}
$tincome=0;
$tincome+=($income*$in);
?>	<input type="hidden" name="daily" id="daily" value="<?php echo $tincome; ?>">	

													<div class="stat-panel-number h1 ">
														<?php  echo $tincome;?> 
													</div><?php } }

													else
														{
															?>

													<div class="stat-panel-number h1 ">
														<?php  echo "0"?> 
													</div><?php }?>
                                                   <div class="stat-panel-title text-uppercase">Daily income</div>
												</div>
											</div>
											<a href="#" class="block-anchor panel-footer"><i class="fa fa-arrow-top"></i></a>
										</div>
									</div>





  <div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-danger text-light">
												<div class="stat-panel text-center">
<?php
$dowmline=$_SESSION['count2'];//print_r($dowmline);
//$dowmline=8880;
$direct=$_SESSION['count1'];
//$direct=12;

if (($dowmline>=20 && $dowmline<50) && ($direct>=1)) {
	$income=5*10;
}
elseif (($dowmline>=50 && $dowmline<100) && ($direct>=2)) {
	$income=10*10;
}
elseif (($dowmline>=100 && $dowmline<200) && ($direct>=3)) {
	$income=15*10;
}
elseif (($dowmline>=200 && $dowmline<400) && ($direct>=4)) {
	$income=20*10;
}
elseif (($dowmline>=400 && $dowmline<600) && ($direct>=5)) {
	$income=30*10;
}
elseif (($dowmline>=600 && $dowmline<800) && ($direct>=6)) {
	$income=50*10;
}
elseif (($dowmline>=800 && $dowmline<1200) && ($direct>=7)) {
	$income=100*10;
}
elseif (($dowmline>=1200 && $dowmline<1800) && ($direct>=8)) {
	$income=150*10;
}
elseif (($dowmline>=1800 && $dowmline<2500) && ($direct>=9)) {
	$income=200*10;
}
elseif (($dowmline>=2500 && $dowmline<3500) && ($direct>=10)) {
	$income=250*10;
}
elseif (($dowmline>=3500 && $dowmline<5000) && ($direct>=11)) {
	$income=500*10;
}
elseif (($dowmline>=5000 && $dowmline<10000) && ($direct=>=12)) {
	$income=1000*10;
}
elseif (($dowmline>=10000) && ($direct>=13)) {
	$income=2000*10;
}
else
{
	$income=0;
}
$_SESSION['income']=$income;
//$income=10 //print_r($income);
?>		<input type="hidden" name="level" id="level" value="<?php echo $income;?>">	

													<div class="stat-panel-number h1 "><?php echo $income;?></div>
                                                   <div class="stat-panel-title text-uppercase">level income</div>
												</div>
											</div>
											<a href="#" class="block-anchor panel-footer"><i class="fa fa-arrow-top"></i></a>
										</div>
									</div>

                                        <div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-warning text-light">
												<div class="stat-panel text-center">
													<div class="stat-panel-number h1 ">
 <?php	
$aid=$_SESSION['id'];
$t=mysqli_fetch_array(mysqli_query($mysqli,"select * from userregistration where id='$aid'"),MYSQLI_BOTH);
if(($t['status']==1))
{

$rt=mysqli_fetch_array(mysqli_query($mysqli,"select * from transaction where custid='$aid'"),MYSQLI_BOTH);
if(!empty($rt['custid'])){ $date=$rt['date']; }else{echo"Not Found";}
$ret="select count(*) from userregistration where sponsor_id='$aid' and regDate>='$date'";
$stmt= $mysqli->prepare($ret) ;
$stmt->execute() ;//ok
$stmt->bind_result($coun);
$stmt->fetch();
$stmt->close();
$aat=$coun*150;

$amt=$aat+$tincome+ $income;
$rt=mysqli_query($mysqli,"select sum(withdrawlAmount) as sum  from withdrawl where cid='$aid' and status<2")or die(mysqli_error($mysqli));
$row=mysqli_fetch_assoc($rt);
$sum=$amt-$row['sum'];echo $sum;
$t=mysqli_query($mysqli,"select * from withdrawl where cid='$aid'");
	$c=mysqli_num_rows($t);
	if($c>0)
	{

// 		$rt=mysqli_fetch_array(mysqli_query($mysqli,"select MAX(id) from withdrawl where cid='$aid'"),MYSQLI_BOTH);
// if(!empty($rt['MAX(id)'])){ $a=$rt['MAX(id)']; //print_r($a);die();
// }
// $sq=mysqli_fetch_array(mysqli_query($mysqli,"select * from withdrawl where id='$a'"),MYSQLI_BOTH);
// if(!empty($sq)){$amt=$sq['walletAmount'];}else{$amt=0;}
      $u=mysqli_query($mysqli,"update withdrawl set walletAmount='$sum' where cid='$aid'");

	}
else{
$sq=mysqli_query($mysqli,"insert into withdrawl(cid,walletAmount) values('$aid','$amt')");
}

}

else{$amt=0;echo $amt;}
?>	
                                                    </div>
                                                   <div class="stat-panel-title text-uppercase">wallet</div>
												</div>
											</div>
											<a href="pri_wallet	.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>





 <div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-danger text-light">
												<div class="stat-panel text-center">
<?php
$aid=$_SESSION['id'];//print_r($aid);die();
$ret="select MAX(id) from userregistration";
$tr=mysqli_query($mysqli,$ret);
while($row=mysqli_fetch_array($tr))
	  {
$id=$row['MAX(id)'];//print_r($id);die();
$result2 ="SELECT count(*) FROM userregistration where id > '$aid' and id<='$id'" or die(mysqli_error($mysqli));
$stmt2 = $mysqli->prepare($result2);
$stmt2->execute();
$stmt2->bind_result($count2);
$stmt2->fetch();
$stmt2->close();
$count2;//print_r($count1);die();
$_SESSION['count2']=$count2;
?>					<input type="hidden" name="dowmline" id="dowmline" value="<?php echo $count2;?>">		

													<div class="stat-panel-number h1 "><?php echo $count2;?></div>
                                                   <div class="stat-panel-title text-uppercase">DownLine</div>
												</div>
											</div>
											<a href="downline.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
<?php }?>



                                     <div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">
<?php
$aid=$_SESSION['id'];
$result2 ="SELECT count(*) FROM userregistration where sponsor_id='$aid'" or die(mysqli_error($mysqli));
$stmt2 = $mysqli->prepare($result2);
$stmt2->execute();
$stmt2->bind_result($count1);
$stmt2->fetch();
$stmt2->close();
$count1;//print_r($count1);die();
$_SESSION['count1']=$count1;//print_r($count1);die();

?>	<input type="hidden" name="direct" id="direct" value="<?php echo $count1;?>">	

													<div class="stat-panel-number h1 "><?php echo $count1;?></div>
                                                   <div class="stat-panel-title text-uppercase">Direct</div>
												</div>
											</div>
											<a href="direct-sponsor.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>






 <div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">

													<div class="stat-panel-number h1 "><?php echo"-";?></div>
                                                   <div class="stat-panel-title text-uppercase">reward income</div>
												</div>
											</div>
											<a href="#" class="block-anchor panel-footer"><i class="fa fa-arrow-top"></i></a>
										</div>
									</div>



                                   <div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">

													<div class="stat-panel-number h1 "><?php echo"-";?></div>
                                                   <div class="stat-panel-title text-uppercase">total coins credited</div>
												</div>
											</div>
											<a href="#" class="block-anchor panel-footer"><i class="fa fa-arrow-top"></i></a>
										</div>
									</div>

								</div>
							</div>
						</div>
</form>
					</div>
				</div>

			</div>
		</div>
	</div>
<script type="text/javascript">
function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}
</script>
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