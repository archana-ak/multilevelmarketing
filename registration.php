<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require("mail/Exception.php");
require("mail/PHPMailer.php");
require("mail/SMTP.php");

include('includes/config.php');
if(isset($_POST['submit']))
{
$fname=mysqli_escape_string($mysqli,$_POST['fname']);
$lname=mysqli_escape_string($mysqli,$_POST['lname']);
$emailid=mysqli_escape_string($mysqli,$_POST['email']);
$password=mysqli_escape_string($mysqli,$_POST['password']);
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

$mail = new PHPMailer();
$mail->IsSMTP();

$mail->Mailer = "smtp";
$mail->Host = "mail.smtp2go.com";
$mail->Port = "2525";
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Username = "phillmoney.com";
$mail->Password = "sMp765LsbAEM";

$mail->From = "Support@phillmoney.com";
$mail->FromName = "Phillmoney";
$mail->AddAddress("$emailid");
$mail->AddReplyTo("support@phillmoney.com", "Phillmoney");
$mail->From = "Support@phillmoney.com";
$mail->isHTML(true);

$mail->Subject = "Welcome Email (PhillMoney)";
$mail->Body = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'><html xmlns='http://www.w3.org/1999/xhtml' xmlns:o='urn:schemas-microsoft-com:office:office' style='width:100%;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0'><head><meta charset='UTF-8'><meta content='width=device-width, initial-scale=1' name='viewport'><meta name='x-apple-disable-message-reformatting'><meta http-equiv='X-UA-Compatible' content='IE=edge'><meta content='telephone=no' name='format-detection'><title>New email template 2020-08-21</title> 

<link href='https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i' rel='stylesheet'> <!--<![endif]--><style type='text/css'>
@media only screen and (max-width:600px) {p, ul li, ol li, a { font-size:16px!important; line-height:150%!important } h1 { font-size:30px!important; text-align:center; line-height:120%!important } h2 { font-size:26px!important; text-align:center; line-height:120%!important } h3 { font-size:20px!important; text-align:center; line-height:120%!important } h1 a { font-size:30px!important } h2 a { font-size:26px!important } h3 a { font-size:20px!important } .es-menu td a { font-size:14px!important } .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a { font-size:14px!important } .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a { font-size:14px!important } .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a { font-size:12px!important } *[class='gmail-fix'] { display:none!important } .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 { 
text-align:center!important } .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 { text-align:right!important } .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 { text-align:left!important } .es-m-txt-r img, .es-m-txt-c img, .es-m-txt-l img { display:inline!important } .es-button-border { display:inline-block!important } a.es-button { font-size:20px!important; display:inline-block!important } .es-btn-fw { border-width:10px 0px!important; text-align:center!important } .es-adaptive table, .es-btn-fw, .es-btn-fw-brdr, .es-left, .es-right { width:100%!important } .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header { width:100%!important; max-width:600px!important } .es-adapt-td { display:block!important; width:100%!important } .adapt-img { width:100%!important; height:auto!important } .es-m-p0 { padding:0px!important } .es-m-p0r { padding-right:0px!important } .es-m-p0l { 
padding-left:0px!important } .es-m-p0t { padding-top:0px!important } .es-m-p0b { padding-bottom:0!important } .es-m-p20b { padding-bottom:20px!important } .es-mobile-hidden, .es-hidden { display:none!important } tr.es-desk-hidden, td.es-desk-hidden, table.es-desk-hidden { width:auto!important; overflow:visible!important; float:none!important; max-height:inherit!important; line-height:inherit!important } tr.es-desk-hidden { display:table-row!important } table.es-desk-hidden { display:table!important } td.es-desk-menu-hidden { display:table-cell!important } table.es-table-not-adapt, .esd-block-html table { width:auto!important } table.es-social { display:inline-block!important } table.es-social td { display:inline-block!important } }#outlook a {	padding:0;}.ExternalClass {	width:100%;}.ExternalClass,.ExternalClass p,.ExternalClass span,.ExternalClass font,.ExternalClass td,.ExternalClass div {	line-height:100%;}.es-button 
{	mso-style-priority:100!important;	text-decoration:none!important;}a[x-apple-data-detectors] {	color:inherit!important;	text-decoration:none!important;	font-size:inherit!important;	font-family:inherit!important;	font-weight:inherit!important;	line-height:inherit!important;}.es-desk-hidden {	display:none;	float:left;	overflow:hidden;	width:0;	max-height:0;	line-height:0;	mso-hide:all;}</style></head>

<body style='width:100%;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0'><div class='es-wrapper-color' style='background-color:#FFFFFF'>
<table class='es-wrapper' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top' width='100%' cellspacing='0' cellpadding='0'><tr style='border-collapse:collapse'><td valign='top' style='padding:0;Margin:0'><table cellpadding='0' cellspacing='0' class='es-content' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%'><tr style='border-collapse:collapse'><td class='es-adaptive' align='center' style='padding:0;Margin:0'><table class='es-content-body' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px' cellspacing='0' cellpadding='0' bgcolor='#ffffff' align='center'><tr style='border-collapse:collapse'>
<td align='left' style='padding:10px;Margin:0'> <!--[if mso]><table style='width:580px'><tr><td style='width:280px' valign='top'><![endif]--><table class='es-left' cellspacing='0' cellpadding='0' align='left' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left'><tr style='border-collapse:collapse'><td align='left' style='padding:0;Margin:0;width:280px'><table width='100%' cellspacing='0' cellpadding='0' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'><tr style='border-collapse:collapse'><td class='es-infoblock es-m-txt-c' align='left' style='padding:0;Margin:0;line-height:14px;font-size:12px;color:#CCCCCC'>
<p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:14px;color:#CCCCCC'>PhillMoney Traders</p></td></tr></table></td></tr></table> <!--[if mso]></td><td style='width:20px'></td><td style='width:280px' valign='top'><![endif]--><table class='es-right' cellspacing='0' cellpadding='0' align='right' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right'><tr style='border-collapse:collapse'><td align='left' style='padding:0;Margin:0;width:280px'><table width='100%' cellspacing='0' cellpadding='0' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'><tr style='border-collapse:collapse'>
<td align='right' class='es-infoblock es-m-txt-c' style='padding:0;Margin:0;line-height:14px;font-size:12px;color:#CCCCCC'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:14px;color:#CCCCCC'>
<a href='https://phillmoney.com/' target='_blank' class='view' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;font-size:12px;text-decoration:none;color:#CCCCCC'>View in browser</a></p></td></tr></table></td></tr></table> <!--[if mso]></td></tr></table><![endif]--></td></tr></table></td></tr></table>
<table class='es-header' cellspacing='0' cellpadding='0' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top'><tr style='border-collapse:collapse'><td align='center' style='padding:0;Margin:0'><table class='es-header-body' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px' cellspacing='0' cellpadding='0' align='center'><tr style='border-collapse:collapse'><td align='left' style='padding:0;Margin:0'><table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'><tr style='border-collapse:collapse'><td valign='top' align='center' style='padding:0;Margin:0;width:600px'>
<table width='100%' cellspacing='0' cellpadding='0' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'><tr style='border-collapse:collapse'><td align='center' style='padding:0;Margin:0;padding-bottom:20px;font-size:0px'><a href='https://phillmoney.com' target='_blank' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;font-size:14px;text-decoration:none;color:#F6A1B4'><img src='https://iyeign.stripocdn.email/content/guids/e2286fb7-504e-431b-b922-56910e98f938/images/15401597961394931.png' alt style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic' width='74'></a></td></tr></table></td></tr></table></td></tr></table></td></tr></table>
<table class='es-content' cellspacing='0' cellpadding='0' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%'><tr style='border-collapse:collapse'><td align='center' style='padding:0;Margin:0'><table class='es-content-body' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px' cellspacing='0' cellpadding='0' align='center'><tr style='border-collapse:collapse'><td align='left' style='padding:0;Margin:0'><table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'><tr style='border-collapse:collapse'><td valign='top' align='center' style='padding:0;Margin:0;width:600px'>
<table style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-radius:3px;background-color:#FCFCFC' width='100%' cellspacing='0' cellpadding='0' bgcolor='#fcfcfc' role='presentation'><tr style='border-collapse:collapse'><td class='es-m-txt-l' align='left' style='padding:0;Margin:0;padding-left:20px;padding-right:20px;padding-top:30px'><h2 style='Margin:0;line-height:31px;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;font-size:26px;font-style:normal;font-weight:normal;color:#333333'>Welcome To PhillMoney!</h2></td></tr><tr style='border-collapse:collapse'><td bgcolor='#fcfcfc' align='left' style='padding:0;Margin:0;padding-top:10px;padding-left:20px;padding-right:20px'>
<p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#333333'> 
 
 Hi   $fname, we’re glad you’re here! You can enjoy earnig here on daily basis and many more stay activated for more income and encourage others to join our platform for effortless earning. It will help you earn more. Happy Earning.

 </p></td></tr></table></td></tr></table></td></tr><tr style='border-collapse:collapse'><td style='padding:0;Margin:0;padding-left:20px;padding-right:20px;padding-top:30px;background-color:#FCFCFC' bgcolor='#fcfcfc' align='left'><table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'><tr style='border-collapse:collapse'><td valign='top' align='center' style='padding:0;Margin:0;width:560px'>
<table style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-color:#EFEFEF;border-style:solid;border-width:1px;border-radius:3px;background-color:#FFFFFF' width='100%' cellspacing='0' cellpadding='0' bgcolor='#ffffff' role='presentation'><tr style='border-collapse:collapse'><td align='center' style='padding:0;Margin:0;padding-bottom:15px;padding-top:20px'><h3 style='Margin:0;line-height:22px;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;font-size:18px;font-style:normal;font-weight:normal;color:#333333'>


Your account information:</h3></td></tr><tr style='border-collapse:collapse'><td align='center' style='padding:0;Margin:0'>

<p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:24px;color:#64434A'>
Password: $password1</p>

<p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:24px;color:#64434A'>Email:  $emailid</p>

<p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:24px;color:#64434A'>Username: $fname</p>


</td></tr><tr style='border-collapse:collapse'><td align='center' style='Margin:0;padding-left:10px;padding-right:10px;padding-top:20px;padding-bottom:20px'><span class='es-button-border' style='border-style:solid;border-color:transparent;background:#F8F3EF none repeat scroll 0% 0%;border-width:0px;display:inline-block;border-radius:3px;width:auto'>
<a href='https://phillmoney.com/index.php' class='es-button' target='_blank' style='mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;font-size:17px;color:#64434A;border-style:solid;border-color:#F8F3EF;border-width:10px 20px 10px 20px;display:inline-block;background:#F8F3EF none repeat scroll 0% 0%;border-radius:3px;font-weight:normal;font-style:normal;line-height:20px;width:auto;text-align:center'>Log In Now</a></span></td></tr></table></td></tr></table></td></tr></table></td></tr></table><table class='es-content' cellspacing='0' cellpadding='0' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%'><tr style='border-collapse:collapse'><td align='center' style='padding:0;Margin:0'>
<table class='es-content-body' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FCFCFC;width:600px' cellspacing='0' cellpadding='0' bgcolor='#fcfcfc' align='center'><tr style='border-collapse:collapse'><td align='left' style='Margin:0;padding-left:20px;padding-right:20px;padding-bottom:25px;padding-top:40px'> <!--[if mso]><table style='width:560px' cellpadding='0' cellspacing='0'><tr><td style='width:274px' valign='top'><![endif]--><table class='es-left' cellspacing='0' cellpadding='0' align='left' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left'><tr style='border-collapse:collapse'><td class='es-m-p0r es-m-p20b' align='center' style='padding:0;Margin:0;width:254px'>
<table width='100%' cellspacing='0' cellpadding='0' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'><tr style='border-collapse:collapse'><td align='left' style='padding:0;Margin:0'><h3 style='Margin:0;line-height:20px;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;font-size:17px;font-style:normal;font-weight:normal;color:#333333'>Download the app and enjoy purchases</h3></td></tr></table></td><td class='es-hidden' style='padding:0;Margin:0;width:20px'></td></tr></table> <!--[if mso]></td><td style='width:133px' valign='top'><![endif]--><table class='es-left' cellspacing='0' cellpadding='0' align='left' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left'><tr style='border-collapse:collapse'><td class='es-m-p20b' align='center' style='padding:0;Margin:0;width:133px'>
<table width='100%' cellspacing='0' cellpadding='0' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'><tr style='border-collapse:collapse'><td align='center' style='padding:0;Margin:0;font-size:0'><a target='_blank' href='#' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;font-size:14px;text-decoration:none;color:#F6A1B4'><img src='https://iyeign.stripocdn.email/content/guids/CABINET_e48ed8a1cdc6a86a71047ec89b3eabf6/images/92051534250512328.png' alt='App Store' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic' class='adapt-img' title='App Store' width='133'></a></td></tr></table></td></tr></table> <!--[if mso]></td><td style='width:20px'></td><td style='width:133px' valign='top'><![endif]-->
<table class='es-right' cellspacing='0' cellpadding='0' align='right' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right'><tr style='border-collapse:collapse'><td align='center' style='padding:0;Margin:0;width:133px'><table width='100%' cellspacing='0' cellpadding='0' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'><tr style='border-collapse:collapse'><td align='center' style='padding:0;Margin:0;font-size:0'><a target='_blank' href='#' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;font-size:14px;text-decoration:none;color:#F6A1B4'>
<img class='adapt-img' src='https://iyeign.stripocdn.email/content/guids/CABINET_e48ed8a1cdc6a86a71047ec89b3eabf6/images/82871534250557673.png' alt='Google Play' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic' title='Google Play' width='133'></a></td></tr></table></td></tr></table> <!--[if mso]></td></tr></table><![endif]--></td></tr></table></td></tr></table><table class='es-content' cellspacing='0' cellpadding='0' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%'><tr style='border-collapse:collapse'><td align='center' style='padding:0;Margin:0'><table class='es-content-body' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px' cellspacing='0' cellpadding='0' bgcolor='#ffffff' align='center'>
<tr style='border-collapse:collapse'><td align='left' style='padding:0;Margin:0'><table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'><tr style='border-collapse:collapse'><td valign='top' align='center' style='padding:0;Margin:0;width:600px'><table style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFF4F7' width='100%' cellspacing='0' cellpadding='0' bgcolor='#fff4f7' role='presentation'><tr style='border-collapse:collapse'><td align='center' style='Margin:0;padding-bottom:5px;padding-top:20px;padding-left:20px;padding-right:20px'><h3 style='Margin:0;line-height:22px;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;font-size:18px;font-style:normal;font-weight:normal;color:#333333'>Lets get social</h3></td></tr></table></td></tr></table>
</td></tr></table></td></tr></table><table class='es-content' cellspacing='0' cellpadding='0' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%'><tr style='border-collapse:collapse'><td style='padding:0;Margin:0;background-color:#666666' bgcolor='#666666' align='center'><table class='es-content-body' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px' cellspacing='0' cellpadding='0' bgcolor='#ffffff' align='center'><tr style='border-collapse:collapse'><td align='left' style='padding:0;Margin:0'><table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'><tr style='border-collapse:collapse'><td valign='top' align='center' style='padding:0;Margin:0;width:600px'>
<table style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;background-color:#FFF4F7;border-radius:3px' width='100%' cellspacing='0' cellpadding='0' bgcolor='#fff4f7' role='presentation'><tr style='border-collapse:collapse'><td bgcolor='#fff4f7' align='center' style='Margin:0;padding-top:5px;padding-bottom:5px;padding-left:20px;padding-right:20px;font-size:0'><table width='100%' height='100%' cellspacing='0' cellpadding='0' border='0' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'><tr style='border-collapse:collapse'><td style='padding:0;Margin:0;border-bottom:1px solid #FFF4F7;background:#FFFFFFnone repeat scroll 0% 0%;height:1px;width:100%;margin:0px'></td></tr></table></td></tr><tr style='border-collapse:collapse'>
<td align='center' style='Margin:0;padding-top:5px;padding-left:20px;padding-right:20px;padding-bottom:25px;font-size:0'><table class='es-table-not-adapt es-social' cellspacing='0' cellpadding='0' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'><tr style='border-collapse:collapse'><td valign='top' align='center' style='padding:0;Margin:0;padding-right:10px'><a target='_blank' href='#' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;font-size:14px;text-decoration:none;color:#F6A1B4'><img title='Facebook' src='https://iyeign.stripocdn.email/content/assets/img/social-icons/logo-black/facebook-logo-black.png' alt='Fb' width='32' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic'></a></td>
<td valign='top' align='center' style='padding:0;Margin:0;padding-right:10px'><a target='_blank' href='#' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;font-size:14px;text-decoration:none;color:#F6A1B4'><img title='Twitter' src='https://iyeign.stripocdn.email/content/assets/img/social-icons/logo-black/twitter-logo-black.png' alt='Tw' width='32' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic'></a></td><td valign='top' align='center' style='padding:0;Margin:0;padding-right:10px'><a target='_blank' href='#' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;font-size:14px;text-decoration:none;color:#F6A1B4'>
<img title='Instagram' src='https://iyeign.stripocdn.email/content/assets/img/social-icons/logo-black/instagram-logo-black.png' alt='Inst' width='32' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic'></a></td><td valign='top' align='center' style='padding:0;Margin:0;padding-right:10px'><a target='_blank' href='#' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;font-size:14px;text-decoration:none;color:#F6A1B4'><img title='Youtube' src='https://iyeign.stripocdn.email/content/assets/img/social-icons/logo-black/youtube-logo-black.png' alt='Yt' width='32' style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic'></a></td></tr></table></td></tr></table></td></tr></table></td></tr></table></td></tr></table>
<table cellpadding='0' cellspacing='0' class='es-footer' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top'><tr style='border-collapse:collapse'><td style='padding:0;Margin:0;background-color:#666666' bgcolor='#666666' align='center'><table class='es-footer-body' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#666666;width:600px' cellspacing='0' cellpadding='0' bgcolor='#666666' align='center'><tr style='border-collapse:collapse'><td align='left' style='Margin:0;padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right:20px'><table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
<tr style='border-collapse:collapse'><td valign='top' align='center' style='padding:0;Margin:0;width:560px'><table width='100%' cellspacing='0' cellpadding='0' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'><tr style='border-collapse:collapse'><td esdev-links-color='#999999' align='center' style='padding:0;Margin:0'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#FFFFFF'>You are receiving this email because you registered on our platform. This email is to inform you yours login details. </p></td></tr><tr style='border-collapse:collapse'><td align='center' style='padding:0;Margin:0;padding-bottom:5px'>
<p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#FFFFFF'>You can <a class='unsubscribe' target='_blank' href='' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;font-size:14px;text-decoration:none;color:#F6A1B4'>unsubscribe</a> from these emails.</p></td></tr><tr style='border-collapse:collapse'><td esdev-links-color='#999999' align='center' style='padding:0;Margin:0;padding-bottom:5px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#FFFFFF'>Akshya Nagar 1st Block 1st Cross, Rammurthy Nagar, Bangalore-560016</p></td></tr>
</table></td></tr></table></td></tr></table></td></tr></table></td></tr></table></div></body>
</html>";

if(!$mail->Send()) {
	echo "<script>alert('Email not sent');</script>";
echo 'Mailer error: ' . $mail->ErrorInfo;
exit;
} 
else {
	echo "<script>alert('You have been registered sucessfully.');</script>";
}	

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
<input type="email" name="email" id="email"  class="form-control" onBlur="checkAvailability()" required="required">
<span id="user-availability-status" style="font-size:12px;"></span>
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