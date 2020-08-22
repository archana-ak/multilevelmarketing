<?php
// session_start();
$tempid=substr($_GET['id'], 3,-3);
// $cookie_name = $tempid;
// setcookie($cookie_name);
// if(!isset($_COOKIE[$cookie_name])) {
//   echo "Cookie named '" . $cookie_name . "' is not set!";
// } else {
//   echo "Cookie '" . $cookie_name . "' is set!<br>";}
if(!isset($tempid))
{
echo "Session expired active your acount manually by showing transaction details to admin";
}

header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");
require_once("./lib/config.php");


$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.
?>
<center>
<?php
if($isValidChecksum == "TRUE") {
	//echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		echo "<b><h1>Transaction status is success</h1
		></b>" . "<br/>";
		if(isset($_POST['ORDERID'], $_POST['TXNAMOUNT']))
		{
			//save in db here
			//echo 'order id='.$_POST['ORDERID'];
			//echo 'transaction amount='.$_POST['TXNAMOUNT'];

			$orderid=$_POST['ORDERID'];
			$amount=$_POST['TXNAMOUNT'];
			//$aid = $_SESSION['id'];
			$aid = $tempid;
			$sq=mysqli_query($mysqli,"insert into transaction(orderid,custid,amount,date) values('$orderid','$aid','$amount',now())") or die();
			$status1=1;
$sql = "UPDATE userregistration SET status='$status1' WHERE  id='$aid'";
$query = mysqli_query($mysqli,$sql);
			if(!$sql)
			{
                echo "<script>alert('Your Session Expired');</script>";
			}


		}
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
	}
	else
	{
		echo "<b>Transaction status is failure</b>" . "<br/>";
	}

	 
	if(isset($_POST['ORDERID'], $_POST['TXNAMOUNT']))
		{
			echo 'Order id is = '.$_POST['ORDERID']; echo "<br>";
			echo 'Transaction Amount is = '.$_POST['TXNAMOUNT'];
			 // echo 'ID is = '.$tempid;
			?><br><br><input type="submit" name="paynow"  value="OK" onclick="window.location='../../dashboard.php'" style="color: black; background-color: white;font-size: 40px; width: 90px; "></center>
			<?php
		}	
	
	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}
//setcookie(ID, "", time()-3600);

?>