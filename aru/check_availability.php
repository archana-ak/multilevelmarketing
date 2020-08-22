<?php
require_once("includes/config.php");


if(!empty($_POST["oldpassword"])) 
{
$pass=$_POST["oldpassword"];
$result ="SELECT password FROM admin WHERE password=?";
$stmt = $mysqli->prepare($result);
$stmt->bind_param('s',$pass);
$stmt->execute();
$stmt -> bind_result($result);
$stmt -> fetch();
$opass=$result;
if($opass==$pass) 
echo "<span style='color:green'> Password matched .</span>";
else echo "<span style='color:red'> Password not matched</span>";
}

if(!empty($_POST["emailid"])) {
	$email= $_POST["emailid"];
	if (filter_var($email, FILTER_VALIDATE_EMAIL)===false) {

		echo "error : You did not enter a valid email.";
	}
	else {
		$result ="SELECT count(*) FROM userregistration WHERE email=?";
		$stmt = $mysqli->prepare($result);
		$stmt->bind_param('s',$email);
		$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();
if($count>0)
{
echo "<span style='color:red'> Email already exist .</span>";
}
else{
	echo "<span style='color:green'> Email available for registration .</span>";
}
}
}



if(!empty($_POST["fname"]))
 {                                         //for phone personal number
	$fname= $_POST["fname"];
	if (!preg_match('/^[\w-]+$/i',$fname)) {

		echo "error:Enter albhaumeric characters only";
	}
	else {
		$result ="SELECT count(*) FROM userregistration WHERE firstName=? ";
		$stmt = $mysqli->prepare($result);
		$stmt->bind_param('s',$fname);
		$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();
if($count>0)
{
echo "<span style='color:red'> Username already exist! Try another.</span>";
}
else{
	echo "<span style='color:green'> Username available for registration .</span>";
}
}
}


if(!empty($_POST["emailid1"])) {
	$email1= $_POST["emailid1"];
		$result ="SELECT count(*) FROM userregistration WHERE firstName=?";
		$stmt = $mysqli->prepare($result);
		$stmt->bind_param('s',$email1);
		$stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();
if($count>0)
{
echo "<span style='color:green'>Sponsor exists.</span>";
}
else{
	echo "<span style='color:red'>No such Sponsor exists</span>";
}
}

?>