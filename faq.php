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
                                    <li><a href="faq.php" class="me-active-menu">Faq</a></li>
                                    <li><a href="my-account.php">My Account</a></li>
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
                        <h1>Faq</h1>
                        <p><a href="index.php">Home</a>Faq</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Faq single -->
    <div class="me-faq-single me-padder-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="me-faq-box">
                        <div class="accordion" id="accordionExample">
                            <div class="me-faq-list">
                                <p class="me-faq-head me-faq-open" data-toggle="collapse" data-target="#me-faq-one">
                                    Lorem ipsum dolor sit amet, consectetur<button><span></span></button></p>
                                <div id="me-faq-one" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
                                    </div>
                                </div>
                            </div>
                            <div class="me-faq-list">
                                <p class="me-faq-head" data-toggle="collapse" data-target="#me-faq-two">Lorem ipsum dolor sit amet, consectetur adipiscing<button><span></span></button></p>
                                <div id="me-faq-two" class="collapse" data-parent="#accordionExample">
                                    <div class="card-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
                                    </div>
                                </div>
                            </div>
                            <div class="me-faq-list">
                                <p class="me-faq-head" data-toggle="collapse" data-target="#me-faq-three">
                                    Lorem ipsum dolor sit amet, consectetur<button><span></span></button></p>
                                <div id="me-faq-three" class="collapse" data-parent="#accordionExample">
                                    <div class="card-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
                                    </div>
                                </div>
                            </div>
                            <div class="me-faq-list">
                                <p class="me-faq-head" data-toggle="collapse" data-target="#me-faq-four">
                                    Lorem ipsum dolor sit amet, consectetur<button><span></span></button></p>
                                <div id="me-faq-four" class="collapse" data-parent="#accordionExample">
                                    <div class="card-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div> 
                <div class="col-lg-6">
                    <div class="me-faq-img">
                        <img src="assets/images/faq.png" class="img-fluid" alt="image"/>
                    </div>
                </div> 
            </div>
        </div>
    </div>
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