<!DOCTYPE html>
<!-- 
Template Name: Trade Coin - Digital Exchange HTML Template 
Version: 1.0.0
Author: Kamleshyadav
Website: 
Purchase: 
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');

if(isset($_POST['login']))
{
$email=mysqli_escape_string($mysqli,$_POST['username']);
$password=mysqli_escape_string($mysqli,md5($_POST['password']));

$stmt=$mysqli->prepare("SELECT firstName,email,password,id FROM userregistration WHERE (firstName=?|| email=?)  and password=? ");
				$stmt->bind_param('sss',$email,$email,$password);
				$stmt->execute();
				$stmt -> bind_result($email,$email,$password,$id);
				$rs=$stmt->fetch();
				$stmt->close();
				$_SESSION['id']=$id;
                $_SESSION['login']=$email;
				$uip=$_SERVER['REMOTE_ADDR'];
				$ldate=date('d/m/Y h:i:s', time());
				if($rs)
				{
 $uid=$_SESSION['id'];
 $uemail=$_SESSION['login'];
$ip=$_SERVER['REMOTE_ADDR'];
$geopluginURL='http://www.geoplugin.net/php.gp?ip='.$ip;
$addrDetailsArr = unserialize(file_get_contents($geopluginURL));
$city = $addrDetailsArr['geoplugin_city'];
$country = $addrDetailsArr['geoplugin_countryName'];
$log="insert into userLog(userId,userEmail,userIp,city,country) values('$uid','$uemail','$ip','$city','$country')" or die(mysqli_error());
$mysqli->query($log);
if($log)
{
header("location:dashboard.php");
}
}
				else
				{
					echo "<script>alert('Invalid Username/Email or password');</script>";
				}
			}
				?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trade Coin - Digital Exchange HTML Template</title>
    <meta name="description" content="">
    <meta name="keywords" content="	advisor, analytical, audit, broker, brokerage, business, company, consulting, currency, exchange, finance, financial, insurance, modern, trader">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font.css">
    <link rel="stylesheet" type="text/css" href="assets/css/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery-jvectormap-2.0.3.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="icon" type="image/png" href="assets/images/fav.png"/>
</head>
<body>
<div class="me-main-wraper">
    <!-- top header -->
    <div class="me-top-header">
        <div class="container">
            <div class="me-top-head">
                <div class="me-top-header-left">
                    <ul>
                        <li>Follow Us :</li>
                        <li><a href="javascript:;"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="javascript:;"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="javascript:;"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="javascript:;"><i class="fab fa-pinterest-p"></i></a></li>
                        <li><a href="javascript:;"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
                <div class="me-top-header-right">
                    <ul>
                        <li>
                            <i class="far fa-envelope-open"></i> example@gmail.com</li>
                        <li>
                            <i class="fas fa-mobile-alt"></i> +789-5654-123
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- main header -->
    <div class="me-main-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-7">
                    <div class="me-logo">
                        <a href="index.php"><img src="assets/images/logo.svg" alt="logo" class="img-fluid"/></a>
                    </div>
                </div>
                <div class="col-sm-9 col-5">
                    <div class="me-menu">
                        <ul>
                            <li class="me-menu-children"><a href="javascript:;">Demos</a>
                                <ul class="me-sub-menu">
                                    <li><a href="index.php">Home 1</a></li>
                                    <li><a href="index-two.php">Home 2</a></li>
                                    <li><a href="index-three.php">Home 3</a></li>
                                </ul>
                            </li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="service.php">Service</a></li>
                            <li class="me-menu-children"><a href="javascript:;" class="me-active-menu">Pages</a>
                                <ul class="me-sub-menu">
                                    <li><a href="plans.php">Investment Plan</a></li>
                                    <li><a href="faq.php">Faq</a></li>
                                    <li><a href="my-account.php" class="me-active-menu">My Account</a></li>
                                </ul>
                            </li>
                            <li class="me-menu-children"><a href="javascript:;">Blog</a>
                                <ul class="me-sub-menu">
                                    <li><a href="blog.php">Blog Grid</a></li>
                                    <li><a href="blog-single.php">Blog Detail</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                        <div class="me-toggle-nav">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <a href="javascript:;" class="me-login-menu" data-toggle="modal" data-target="#meLogin">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
    <div class="me-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="me-breadcrumb-box">
                        <h1>My Account</h1>
                        <p><a href="index.php">Home</a>my account</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- My Account -->
    <div class="me-my-account me-padder-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="me-my-account-profile">
                        <div class="me-my-profile-head">
                            <div class="me-profile-name">
                                <h4>My profile : John Doe</h4>
                                <p>Last login: 24 Dec 2019, 4:00pm</p>
                                <p>California, America (USA)</p>
                            </div>
                            <div class="me-my-profile-img">
                                <div class="me-my-profile-img-main">
                                    <img src="assets/images/user.jpg" class="img-fluid" alt="image">
                                    <div class="me-my-profile-svg" data-toggle="modal" data-target="#me-profile-modal">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 55.25 55.25">
                                        <path d="M52.618,2.631c-3.51-3.508-9.219-3.508-12.729,0L3.827,38.693C3.81,38.71,3.8,38.731,3.785,38.749
                                            c-0.021,0.024-0.039,0.05-0.058,0.076c-0.053,0.074-0.094,0.153-0.125,0.239c-0.009,0.026-0.022,0.049-0.029,0.075
                                            c-0.003,0.01-0.009,0.02-0.012,0.03l-3.535,14.85c-0.016,0.067-0.02,0.135-0.022,0.202C0.004,54.234,0,54.246,0,54.259
                                            c0.001,0.114,0.026,0.225,0.065,0.332c0.009,0.025,0.019,0.047,0.03,0.071c0.049,0.107,0.11,0.21,0.196,0.296
                                            c0.095,0.095,0.207,0.168,0.328,0.218c0.121,0.05,0.25,0.075,0.379,0.075c0.077,0,0.155-0.009,0.231-0.027l14.85-3.535
                                            c0.027-0.006,0.051-0.021,0.077-0.03c0.034-0.011,0.066-0.024,0.099-0.039c0.072-0.033,0.139-0.074,0.201-0.123
                                            c0.024-0.019,0.049-0.033,0.072-0.054c0.008-0.008,0.018-0.012,0.026-0.02l36.063-36.063C56.127,11.85,56.127,6.14,52.618,2.631z
                                            M51.204,4.045c2.488,2.489,2.7,6.397,0.65,9.137l-9.787-9.787C44.808,1.345,48.716,1.557,51.204,4.045z M46.254,18.895l-9.9-9.9
                                            l1.414-1.414l9.9,9.9L46.254,18.895z M4.961,50.288c-0.391-0.391-1.023-0.391-1.414,0L2.79,51.045l2.554-10.728l4.422-0.491
                                            l-0.569,5.122c-0.004,0.038,0.01,0.073,0.01,0.11c0,0.038-0.014,0.072-0.01,0.11c0.004,0.033,0.021,0.06,0.028,0.092
                                            c0.012,0.058,0.029,0.111,0.05,0.165c0.026,0.065,0.057,0.124,0.095,0.181c0.031,0.046,0.062,0.087,0.1,0.127
                                            c0.048,0.051,0.1,0.094,0.157,0.134c0.045,0.031,0.088,0.06,0.138,0.084C9.831,45.982,9.9,46,9.972,46.017
                                            c0.038,0.009,0.069,0.03,0.108,0.035c0.036,0.004,0.072,0.006,0.109,0.006c0,0,0.001,0,0.001,0c0,0,0.001,0,0.001,0h0.001
                                            c0,0,0.001,0,0.001,0c0.036,0,0.073-0.002,0.109-0.006l5.122-0.569l-0.491,4.422L4.204,52.459l0.757-0.757
                                            C5.351,51.312,5.351,50.679,4.961,50.288z M17.511,44.809L39.889,22.43c0.391-0.391,0.391-1.023,0-1.414s-1.023-0.391-1.414,0
                                            L16.097,43.395l-4.773,0.53l0.53-4.773l22.38-22.378c0.391-0.391,0.391-1.023,0-1.414s-1.023-0.391-1.414,0L10.44,37.738
                                            l-3.183,0.354L34.94,10.409l9.9,9.9L17.157,47.992L17.511,44.809z M49.082,16.067l-9.9-9.9l1.415-1.415l9.9,9.9L49.082,16.067z"/>
                                        </svg>     
                                    </div>                               
                                </div>
                            </div>
                        </div>
                        <div  class="me-account-profile-shape">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none" height="50" width="100%"> <path class="exqute-fill-white" d="M790.5,93.1c-59.3-5.3-116.8-18-192.6-50c-29.6-12.7-76.9-31-100.5-35.9c-23.6-4.9-52.6-7.8-75.5-5.3 c-10.2,1.1-22.6,1.4-50.1,7.4c-27.2,6.3-58.2,16.6-79.4,24.7c-41.3,15.9-94.9,21.9-134,22.6C72,58.2,0,25.8,0,25.8V100h1000V65.3 c0,0-51.5,19.4-106.2,25.7C839.5,97,814.1,95.2,790.5,93.1z"></path></svg>
                        </div>
                        <div class="me-my-profile-body">
                            <ul>
                                <li>
                                    <div class="me-profile-data">
                                        <p>tradecoindummy@support.com</p>
                                    </div>
                                    <div class="me-profile-data">
                                        <p>+91 4568591753</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="me-profile-data">
                                        <p>Permanent Address</p>
                                    </div>
                                    <div class="me-profile-data">
                                        <p>California, America (USA)</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="me-profile-data">
                                        <p>Temporary Address</p>
                                    </div>
                                    <div class="me-profile-data">
                                        <p>Mumbai, India </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="me-profile-data">
                                        <p>User Code</p>
                                    </div>
                                    <div class="me-profile-data">
                                        <p>ZXcv852</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="me-profile-data">
                                        <p>Accounts Type</p>
                                    </div>
                                    <div class="me-profile-data">
                                        <p>Invester</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="me-profile-data">
                                        <p>Accounts No.</p>
                                    </div>
                                    <div class="me-profile-data">
                                        <p>7894xxxxxxxx123</p>
                                    </div>
                                </li>
                                <li><button class="me-btn">logout</button></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="me-account-summary">
                        <div class="me-account-summary-head">
                            <div>
                                <h4>Account detail</h4>
                            </div>
                        </div>
                        <div class="me-account-summary-body me-account-money-detail">
                            <ul>
                                <li>
                                    <div class="me-summary-data">
                                        <p>Account balance</p>
                                        <p><strong>$4,56,966.00</strong></p>
                                    </div>
                                    <div class="me-summary-data-add">
                                        <input type="number" placeholder="Add Money" />
                                        <button>Add</button>
                                    </div>
                                </li>
                                <li>
                                    <div class="me-summary-data">
                                        <p>Invest amount</p>
                                        <p><strong>$85,259.99</strong></p>
                                    </div>
                                    <div class="me-summary-data-add">
                                        <input type="number" placeholder="Invest Money" />
                                        <button>Invest</button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="me-account-summary">
                        <div class="me-account-summary-head">
                            <div>
                                <h4>Recent status</h4>
                            </div>
                            <div class="me-account-summary-head-form">
                                <input type="text" placeholder="Search" />
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 339.921 339.921">
                                    <g>
                                        <path d="M335.165,292.071l-81.385-84.077c-5.836-6.032-13.13-8.447-16.29-5.363
                                            c-3.171,3.062-10.47,0.653-16.306-5.379l-1.164-1.207c36.425-47.907,32.89-116.499-10.851-160.24
                                            c-47.739-47.739-125.142-47.739-172.875,0c-47.739,47.739-47.739,125.131,0,172.87c44.486,44.492,114.699,47.472,162.704,9.045
                                            l0.511,0.533c5.825,6.032,7.995,13.402,4.814,16.469c-3.166,3.068-1.012,10.443,4.83,16.464l81.341,84.11
                                            c5.836,6.016,15.452,6.195,21.49,0.354l22.828-22.088C340.827,307.735,340.99,298.125,335.165,292.071z M182.306,181.81
                                            c-32.852,32.857-86.312,32.857-119.159,0.011c-32.852-32.852-32.847-86.318,0-119.164c32.847-32.852,86.307-32.847,119.148,0.005
                                            C215.152,95.509,215.152,148.964,182.306,181.81z"/>
                                    </g>
                                </svg>
                            </div>
                        </div>
                        <div class="me-account-summary-body">
                            <ul>
                                <li>
                                    <div class="me-summary-data">
                                        <p>Last withdrawl</p>
                                        <p><strong>$5,629.00</strong></p>
                                    </div>
                                    <div class="me-summary-data">
                                        <p class="me-data-success">Successful</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="me-summary-data">
                                        <p>Last invest</p>
                                        <p><strong>$2,951.00</strong></p>
                                    </div>
                                    <div class="me-summary-data">
                                        <p class="me-data-success">Successful</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- My Account Modal-->
    <div class="modal fade" id="me-profile-modal">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <div class="me-my-profile-head me-my-profile-change">
                <div class="me-profile-name">
                    <h4>Edit profile information</h4>
                    <h4>Profile name : John Doe</h4>
                </div>
                <div class="me-my-profile-img">
                    <div class="me-my-profile-img-main">
                        <img src="assets/images/user.jpg" class="img-fluid" alt="image">
                        <div class="me-my-profile-svg">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 55.25 55.25">
                                <path d="M52.618,2.631c-3.51-3.508-9.219-3.508-12.729,0L3.827,38.693C3.81,38.71,3.8,38.731,3.785,38.749
                                    c-0.021,0.024-0.039,0.05-0.058,0.076c-0.053,0.074-0.094,0.153-0.125,0.239c-0.009,0.026-0.022,0.049-0.029,0.075
                                    c-0.003,0.01-0.009,0.02-0.012,0.03l-3.535,14.85c-0.016,0.067-0.02,0.135-0.022,0.202C0.004,54.234,0,54.246,0,54.259
                                    c0.001,0.114,0.026,0.225,0.065,0.332c0.009,0.025,0.019,0.047,0.03,0.071c0.049,0.107,0.11,0.21,0.196,0.296
                                    c0.095,0.095,0.207,0.168,0.328,0.218c0.121,0.05,0.25,0.075,0.379,0.075c0.077,0,0.155-0.009,0.231-0.027l14.85-3.535
                                    c0.027-0.006,0.051-0.021,0.077-0.03c0.034-0.011,0.066-0.024,0.099-0.039c0.072-0.033,0.139-0.074,0.201-0.123
                                    c0.024-0.019,0.049-0.033,0.072-0.054c0.008-0.008,0.018-0.012,0.026-0.02l36.063-36.063C56.127,11.85,56.127,6.14,52.618,2.631z
                                    M51.204,4.045c2.488,2.489,2.7,6.397,0.65,9.137l-9.787-9.787C44.808,1.345,48.716,1.557,51.204,4.045z M46.254,18.895l-9.9-9.9
                                    l1.414-1.414l9.9,9.9L46.254,18.895z M4.961,50.288c-0.391-0.391-1.023-0.391-1.414,0L2.79,51.045l2.554-10.728l4.422-0.491
                                    l-0.569,5.122c-0.004,0.038,0.01,0.073,0.01,0.11c0,0.038-0.014,0.072-0.01,0.11c0.004,0.033,0.021,0.06,0.028,0.092
                                    c0.012,0.058,0.029,0.111,0.05,0.165c0.026,0.065,0.057,0.124,0.095,0.181c0.031,0.046,0.062,0.087,0.1,0.127
                                    c0.048,0.051,0.1,0.094,0.157,0.134c0.045,0.031,0.088,0.06,0.138,0.084C9.831,45.982,9.9,46,9.972,46.017
                                    c0.038,0.009,0.069,0.03,0.108,0.035c0.036,0.004,0.072,0.006,0.109,0.006c0,0,0.001,0,0.001,0c0,0,0.001,0,0.001,0h0.001
                                    c0,0,0.001,0,0.001,0c0.036,0,0.073-0.002,0.109-0.006l5.122-0.569l-0.491,4.422L4.204,52.459l0.757-0.757
                                    C5.351,51.312,5.351,50.679,4.961,50.288z M17.511,44.809L39.889,22.43c0.391-0.391,0.391-1.023,0-1.414s-1.023-0.391-1.414,0
                                    L16.097,43.395l-4.773,0.53l0.53-4.773l22.38-22.378c0.391-0.391,0.391-1.023,0-1.414s-1.023-0.391-1.414,0L10.44,37.738
                                    l-3.183,0.354L34.94,10.409l9.9,9.9L17.157,47.992L17.511,44.809z M49.082,16.067l-9.9-9.9l1.415-1.415l9.9,9.9L49.082,16.067z"/>
                            </svg>      
                            <input type="file" name="myfile" />
                        </div>                               
                    </div>
                </div>
            </div>
            <div class="me-account-profile-shape">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none" height="50" width="100%"> <path class="exqute-fill-white" d="M790.5,93.1c-59.3-5.3-116.8-18-192.6-50c-29.6-12.7-76.9-31-100.5-35.9c-23.6-4.9-52.6-7.8-75.5-5.3 c-10.2,1.1-22.6,1.4-50.1,7.4c-27.2,6.3-58.2,16.6-79.4,24.7c-41.3,15.9-94.9,21.9-134,22.6C72,58.2,0,25.8,0,25.8V100h1000V65.3 c0,0-51.5,19.4-106.2,25.7C839.5,97,814.1,95.2,790.5,93.1z"></path></svg>
            </div>
            <div class="modal-body">
             <form>
                 <label>
                     <span>Name</span>
                     <input type="text" />
                 </label>
                 <label>
                     <span>Email</span>
                     <input type="text" />
                 </label>
                 <label>
                     <span>Mobile</span>
                     <input type="number" />
                 </label>
                 <label>
                     <span>Permanent Address</span>
                     <input type="text" />
                 </label>
                 <label>
                     <span>Temporary Address</span>
                     <input type="text" />
                 </label>
                 <label>
                     <span>User Code</span>
                     <input type="text" />
                 </label>
                 <label>
                     <span>Accounts Type</span>
                     <input type="text" />
                 </label>
                 <label>
                     <span>Accounts No.</span>
                     <input type="number" />
                 </label>
             </form>
            </div>
            <div class="modal-footer">
                <button class="me-btn">Save changes</button>
            </div>
          </div>
        </div>
    </div>
      <!-- My Account Modal-->
    <!-- Partners -->
    <div class="me-partners me-padder-top me-padder-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="me-partners-logo">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <a href="javascript:;"><img src="assets/images/client2.jpg" alt="image"/></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="javascript:;"><img src="assets/images/client1.jpg" alt="image"/></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="javascript:;"><img src="assets/images/client3.jpg" alt="image"/></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="javascript:;"><img src="assets/images/client4.jpg" alt="image"/></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="javascript:;"><img src="assets/images/client5.jpg" alt="image"/></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <div class="me-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="me-footer-block">
                        <div class="me-logo">
                            <a href="index.php"><img src="assets/images/logo.svg" alt="logo" class="img-fluid"/></a>
                        </div>
                        <ul>
                            <li class="me-footer-emial">support@moneyexchange.com</li>
                            <li>+11-789-6542-852</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="me-footer-block">
                        <h4>Services</h4>
                        <ul>
                            <li><a href="javascript:;">Duis aute irure</a></li>
                            <li><a href="javascript:;">voluptate velit</a></li>
                            <li><a href="javascript:;">cupidatat non</a></li>
                            <li><a href="javascript:;">Excepteur</a></li>
                            <li><a href="javascript:;">sunt in culpa</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="me-footer-block">
                        <h4>About us</h4>
                        <ul>
                            <li><a href="javascript:;">aute irure</a></li>
                            <li><a href="javascript:;">voluptate velit</a></li>
                            <li><a href="javascript:;">cupidatat</a></li>
                            <li><a href="javascript:;">Excepteur</a></li>
                            <li><a href="javascript:;">sunt culpa</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="me-footer-block">
                        <h4>Address</h4>
                        <ul>
                            <li>Akshya Nagar 1st Block 1st Cross, Rammurthy nagar, Bangalore-560016</li>
                        </ul>
                        <ul class="me-footer-share">
                            <li><a href="javascript:;"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="javascript:;"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="javascript:;"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="javascript:;"><i class="fab fa-pinterest-p"></i></a></li>
                            <li><a href="javascript:;"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright Footer -->
    <div class="me-footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="me-copyright-block">
                        <p>&copy; 2020 copyright all right reserved by <a href="javascript:;">trade coin</a></p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="me-copyright-block">
                        <ul>
                            <li><a href="javascript:;">privacy policy</a></li>
                            <li><a href="javascript:;">Terms & condition</a></li>
                            <li><a href="javascript:;">faq</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Rate -->
    <div id="me-rate">
        <p>
            <span>EUR/USD -0.54559%</span>
            <span>USD/JPY -0.12283%</span>
            <span>GBP/USD -0.44243%</span>
            <span>USD/CHF +0.15403%</span>
            <span>USD/CAD +0.03873%</span>
            <span>EUR/JPY -0.66775%</span>
            <span>AUD/USD -0.59356%</span>
            <span>CNY/USD +0.10728%</span>
            <span>EUR/USD -0.54559%</span>
            <span>USD/JPY -0.12283%</span>
            <span>GBP/USD -0.44243%</span>
            <span>USD/CHF +0.15403%</span>
            <span>USD/CAD +0.03873%</span>
            <span>EUR/JPY -0.66775%</span>
        </p>
    </div>
    <!-- Login Modal -->
           <?php include('includes/modal.php');?>

</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/swiper.min.js"></script>
<script src="assets/js/SmoothScroll.min.js"></script>
<script src="assets/js/ui_range_slider.js"></script>
<script src="assets/js/canvasjs.js"></script>
<script src="assets/js/jquery-jvectormap.min.js"></script>
<script src="assets/js/jquery-jvectormap-world-mill.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>