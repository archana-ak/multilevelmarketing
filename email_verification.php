<?php
include 'includes/config.php';
if(!empty($_GET['code']) && isset($_GET['code']))
{
$code=$_GET['code'];
$sql=mysqli_query($mysqli,"SELECT * FROM userregistration WHERE activationcode='$code'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
  
$st=0;
$result =mysqli_query($mysqli,"SELECT id FROM userregistration WHERE activationcode='$code' and status='$st'");
$result4=mysqli_fetch_array($result);   

if($result4>0) 
  {
$st=1;
$result1=mysqli_query($mysqli,"UPDATE userregistration SET status='$st' WHERE activationcode='$code'");
$msg="Your account is activated Login with your email id and password entered at the registration time"; 
}
else
{
$msg ="Your account is already active, no need to activate again. Login with your previous registered id and password";
}
}
else
{
$msg ="Wrong activation code.";
}
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Activation link</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">


</nav>

<div class="container-fluid">
  
 
      
     
 <!--/left-->
  
  <!--center-->
  <div class="col-sm-6">
    <div class="row">
      <div class="col-xs-12">
        <h3>PHP Email Verification Script </h3>
		<hr >
	<p><?php echo htmlentities($msg); ?></p>
   <p> Now you can login</p>
   <p>For login <a href="index.php">Click Here</a></p>
 
      </div>
    </div>
    <hr>
        
   
  </div><!--/center-->

  <!--right-->
  <div class="col-sm-4">
  
    	<div class="panel panel-default">
         	
         
</div>
        </div>
    
      
     
  </div>
<!--/right-->
  <hr>
</div><!--/container-fluid-->
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>