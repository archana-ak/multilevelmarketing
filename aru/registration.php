<?php
session_start();
include('includes/config.php');
if(isset($_POST['submit']))
{
$fname=mysqli_escape_string($mysqli,$_POST['fname']);
$lname=mysqli_escape_string($mysqli,$_POST['lname']);
$emailid=mysqli_escape_string($mysqli,$_POST['email']);
$password=mysqli_escape_string($mysqli,md5($_POST['password']));
$password1=mysqli_escape_string($mysqli,$_POST['password']);
$status=0;
$activationcode=md5($emailid.time());
$sponso=mysqli_escape_string($mysqli,$_POST['sponsor']);//print_r($sponso);die();
$parent=mysqli_escape_string($mysqli,$_POST['parent']);

$sql=mysqli_query($mysqli,"select * from userregistration where firstName='$fname'");
$count=mysqli_num_rows($sql);
if($count>0)
{
echo "<script>alert('customer already exists.');</script>";
}
else
{
$sql=mysqli_fetch_array(mysqli_query($mysqli,"select id from userregistration where firstName='$sponso'"),MYSQLI_BOTH);
 if(empty($sql['id']))
{
$sponsor=0; 
}
else{
	$sponsor=$sql['id']; 
//print_r($sponsor);die();
$query=mysqli_query($mysqli,"insert into userregistration(sponsor_id,parent_id,firstName,lastName,email,password,status,activationcode,regDate) values('$sponsor','$parent','$fname','$lname','$emailid','$password','$status','$activationcode',now())")or die(mysqli_error($mysqli));}}
if($query)
{	
	$id=mysqli_insert_id($mysqli) ;
    $sql=mysqli_query($mysqli,"select * from userregistration where id='$id'") or die(mysqli_error($mysqli));
    while ($row=mysqli_fetch_array($sql))
    {
    $parentid=$row['parent_id'];//print_r($parentid);
    $sponsorid=$row['sponsor_id'];//print_r($sponsorid);die();

    if($sponsorid!=0 &&$parentid==0)
    {
    	$sq=mysqli_query($mysqli,"Update userregistration set parent_id='$sponsor' where id='$id'") or die(mysqli_error($mysqli));	

}
}
echo "<script>alert('Registration sucessfull.');</script>";
}


else
{
	  echo "<script>alert('Registration not sucessfull.');</script>";
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
	<title>User Registration</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="js/validation.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
function valid()
{
if(document.registration.password.value!= document.registration.cpassword.value)
{
alert("Password and Re-Type Password Field do not match  !!");
document.registration.cpassword.focus();
return false;
}
return true;
}
</script>
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
						<h2 class="page-title">Registration </h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">Fill all Info</div>
									<div class="panel-body">
			<form method="post" action="" name="registration" class="form-horizontal" onSubmit="return valid();">
											
										
<div class="form-group">
<label class="col-sm-2 control-label">Sponsor Username: </label>
<div class="col-sm-8">
	<?php
	if(isset($_GET['sponsor_id']))
	{
		$sid=$_GET['sponsor_id'];
	}
	?>
<input type="text" name="sponsor" id="sponsor" value="<?php  if(!empty($sid)){echo $sid; }else{echo"";}?>" onBlur="checkAvailability1()"  onChange="getSeater(this.value);" class="form-control" required="required">
<span id="user-availability-status1" style="font-size:12px;"></span>
</div>
</div>
<?php
if(isset($_GET['sponsor_id']))
	{
$id=$_GET['sponsor_id'];
$sql=mysqli_query($mysqli,"select * from userregistration where firstName='$id'")or die(); 
 while ($ro=mysqli_fetch_array($sql)) {
$s=$ro['id'];
$stmt =mysqli_fetch_array(mysqli_query($mysqli,"SELECT MAX(id) FROM userregistration WHERE sponsor_id  = '$s'"),MYSQLI_BOTH)or die();  
 if(!empty($stmt['MAX(id)'])){$pid= $stmt['MAX(id)'];}else{$pid=0;}
}
}?>
<input type="hidden" name="parent" value="<?php if(!empty($pid)){echo $pid; }else{echo"";}?>" id="parent_id" class="form-control">

<div class="form-group">
<label class="col-sm-2 control-label"> Userame : </label>
<div class="col-sm-8">
<input type="text" name="fname" id="fname"  class="form-control" onBlur="checkAvailability0()" required="required" >
<span id="user-availability-status0" style="font-size:12px;"></span>

</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Full Name : </label>
<div class="col-sm-8">
<input type="text" name="lname" id="lname"  class="form-control" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Email id: </label>
<div class="col-sm-8">
<input type="email" name="email" id="email"  class="form-control"  required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Password: </label>
<div class="col-sm-8">
<input type="password" name="password" id="password"  class="form-control" required="required">
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Confirm Password : </label>
<div class="col-sm-8">
<input type="password" name="cpassword" id="cpassword"  class="form-control" required="required">
</div>
</div>
						



<div class="col-sm-6 col-sm-offset-4">
<button class="btn btn-default" type="submit">Cancel</button>
<input type="submit" name="submit" Value="Register" class="btn btn-primary">
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
<script>
		if(window.history.replaceState){
			window.history.replaceState(null,null,window.location.href);
		}
	</script>
	<script>

function checkAvailability() {

$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function ()
{
event.preventDefault();
alert('error');
}
});
}
</script>
<script>
function checkAvailability0() {

$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'fname='+$("#fname").val(),
type: "POST",
success:function(data){
$("#user-availability-status0").html(data);
$("#loaderIcon").hide();
},
error:function ()
{
event.preventDefault();
alert('error');
}
});
}
</script>
<script>
function checkAvailability1() {

$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid1='+$("#sponsor").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function ()
{
event.preventDefault();
alert('error');
}
});
}
</script>
<script>
function getSeater(val) {
$.ajax({
type: "POST",
url: "get_seater.php",
data:'parent_id='+val,
success: function(data){
//alert(data);
$('#parent_id').val(data);
}
});

}
</script>
</html>