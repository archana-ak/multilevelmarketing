<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
$aid=$_SESSION['id'];
 if (isset($_POST['submit']))
 {
    $daily=mysqli_escape_string($mysqli,$_POST['daily']);
$wm=$daily;//print_r($wm);die();
$sql=mysqli_query($mysqli,"UPDATE withdrawl set money_a='$wm',ddate=now() where cid='$aid'")or die(mysqli_error($mysqli));	
  
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
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">
<?php
$aid=$_SESSION['id'];
$result2 ="SELECT count(*) FROM userregistration where sponsor_id='$aid' and status=1" or die(mysqli_error($mysqli));
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
<?php
$aid=$_SESSION['id'];//print_r($aid);die();
$ret="select MAX(id) from userregistration";
$tr=mysqli_query($mysqli,$ret);
while($row=mysqli_fetch_array($tr))
	  {
$id=$row['MAX(id)'];//print_r($id);die();
$result2 ="SELECT count(*) FROM userregistration where id > '$aid' and id<='$id' and status=1" or die(mysqli_error($mysqli));
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
											<div class="panel-body bk-danger text-light">
												<div class="stat-panel text-center">
<?php
$aid=$_SESSION['id'];
//$status=1;
$t=mysqli_fetch_array(mysqli_query($mysqli,"select * from userregistration where id='$aid'"),MYSQLI_BOTH);
if(($t['status']==1))
{
//$dowmline=$_SESSION['count2'];//print_r($dowmline);
$dowmline=700;
//$direct=$_SESSION['count1'];
$direct=4;

if (($dowmline>=100 && $dowmline<200) && ($direct>=3)) {
	$income=100;
}
elseif (($dowmline>=200 && $dowmline<500) && ($direct>=4 || $direct<4)) {
	$income=(200)+100;
}
elseif (($dowmline>=500 && $dowmline<800) && ($direct>=5 || $direct <5)) {
	$income=(300)+300;
}
elseif (($dowmline>=800 && $dowmline<1500) && ($direct>=6 || $direct<6)) {
	$income=(500)+600;
}
elseif (($dowmline>=1500 && $dowmline<2500) && ($direct>=8 || $direct<8)) {
	$income=(700)+1100;
}
elseif (($dowmline>=2500 && $dowmline<3500) && ($direct>=10)) {
	$income=(1000)+1800;
}
elseif (($dowmline>=3500 && $dowmline<5000) && ($direct>=14)) {
	$income=(1200)+2800;
}
elseif (($dowmline>=5000 && $dowmline<8000) && ($direct>=17)) {
	$income=(1500)+4000;
}
elseif (($dowmline>=8000 && $dowmline<12000) && ($direct>=30)) {
	$income=(8000)+5500;
}
elseif (($dowmline>=12000 && $dowmline<20000) && ($direct>=35)) {
	$income=(15000)+13500;
}
elseif (($dowmline>=20000 && $dowmline<30000) && ($direct>=40)) {
	$income=(30000)+28500;
}
elseif (($dowmline>=30000 && $dowmline<50000) && ($direct>=45)) {
	$income=(60000)+58500;
}
elseif (($dowmline>=50000 && $dowmline<70000) && ($direct>=50)) {
	$income=(100000)+118500;
}
elseif (($dowmline>=70000 && $dowmline<100000) && ($direct>=60)) {
	$income=(130000)+128500;
}
elseif (($dowmline>=100000) && ($direct>=100)) {
	$income=(200000)+141500;
}
else
{
	$income=0;
}
//$_SESSION['income']=$income; //print_r($income);
?>	

													<div class="stat-panel-number h1 "><?php echo $income;?></div><?php } 

													else
														{
															?>

													<div class="stat-panel-number h1 ">
														<?php  echo "0"?> 
													</div><?php }?>
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
$ret="select count(*) from userregistration where sponsor_id='$aid' and regDate>='$date' and status=1";
$stmt= $mysqli->prepare($ret) ;
$stmt->execute() ;//ok
$stmt->bind_result($coun);
$stmt->fetch();
$stmt->close();
$aat=$coun*150; //$_SESSION['amt']=$amt; echo $_SESSION['amt'];
$s=mysqli_fetch_array(mysqli_query($mysqli,"select * from withdrawl where cid='$aid'"),MYSQLI_BOTH);
if(!empty($s['money_a'])){$w=$s['money_a'];}else{$w=0;}
$amt=$aat+$income+$w;
$t=mysqli_query($mysqli,"select * from withdrawl where cid='$aid'");
	$c=mysqli_num_rows($t);
	if($c>0)
	{
      $u=mysqli_query($mysqli,"update withdrawl set walletAmount='$amt' where cid='$aid'");

	}
else{
$sq=mysqli_query($mysqli,"insert into withdrawl(cid,walletAmount) values('$aid','$amt')")or die(mysqli_error($mysqli));
}

$rt=mysqli_query($mysqli,"select sum(withdrawlAmount) as sum  from withdrawl where cid='$aid' and status<2")or die(mysqli_error($mysqli));
$row=mysqli_fetch_assoc($rt);
$sum0=$amt-$row['sum'];  echo $sum0;
 $u=mysqli_query($mysqli,"update withdrawl set walletAmount='$sum0' where cid='$aid'");
}



else{$amt=0;echo $amt;}
?>	
                                                    </div>
                                                   <div class="stat-panel-title text-uppercase">wallet</div>
												</div>
											</div>
											<a href="#" class="block-anchor panel-footer"><i class="fa fa-arrow-top"></i></a>
										</div>
									</div>





<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-dark text-light">
												<div class="stat-panel text-center">
<?php
$aid=$_SESSION['id'];
$t=mysqli_fetch_array(mysqli_query($mysqli,"select * from userregistration where id='$aid'"),MYSQLI_BOTH);
if(($t['status']==1))
{

$dowmline=$_SESSION['count2'];//print_r($dowmline);
//$dowmline=101;
$direct=$_SESSION['count1'];
//$direct=0;
if (($dowmline>=20 && $dowmline<50) && ($direct>=0)) {
	$dincome=2;
}
elseif (($dowmline>=50 && $dowmline<100) && ($direct>=0)) {
	$dincome=3;
}
elseif (($dowmline>=100 && $dowmline<500) && ($direct>=0)) {
	$dincome=4;
}
elseif (($dowmline>=500 && $dowmline<1000) && ($direct>=0)) {
	$dincome=5;
}
elseif (($dowmline>=1000 && $dowmline<2000) && ($direct>=0)) {
	$dincome=10;
}
elseif (($dowmline>=2000) && ($direct==0)) {
	$dincome=10;
}
elseif (($dowmline>=2000 && $dowmline<2500) && ($direct>=1)) {
	$dincome=20;
}
elseif (($dowmline>=2500) && ($direct==1)) {
	$dincome=20;
}
elseif (($dowmline>=2500 && $dowmline<5000) && ($direct>=2)) {
	$dincome=30;
}
elseif (($dowmline>=5000) && ($direct==2)) {
	$dincome=30;
}
elseif (($dowmline>=5000 && $dowmline<10000) && ($direct>=4)) {
	$dincome=40;
}
elseif (($dowmline>=10000) && ($direct>=6)) {
	$dincome=50;
}
else
{
	$dincome=0;
}
?>	<input type="hidden" name="daily" id="daily" value="<?php echo $dincome; ?>">	

													<div class="stat-panel-number h1 ">
														<?php  
    $s=mysqli_fetch_array(mysqli_query($mysqli,"select * from withdrawl where cid='$aid'"),MYSQLI_BOTH)or die(mysqli_error($mysqli));
   //print_r( $s['ddate']);
    if($s['ddate']<date("Y-m-d"))
    {

														echo $dincome;}
														else{ 
															echo "Collected";}?> 
													</div><?php }


													else
														{
															?>

													<div class="stat-panel-number h1 ">
														<?php  echo "0"?> 
													</div><?php }?>
                                                   <div class="stat-panel-title text-uppercase">Daily income</div>
												</div>
											</div>
											<!-- <input type="submit"class="block-anchor panel-footer" name="daily"> -->
											<a href="#" class="block-anchor panel-footer">
<form>
	<input type="submit" name="submit" value="ADD">
</form>
												ADD TO WALLET<i class="fa fa-arrow-top"></i></a>
										</div>
									</div>





 <div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-danger text-light">
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