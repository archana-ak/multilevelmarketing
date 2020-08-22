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
                            <li class="me-menu-children"><a href="javascript:;">Pages</a>
                                <ul class="me-sub-menu">
                                    <li><a href="plans.php">Investment Plan</a></li>
                                    <li><a href="faq.php">Faq</a></li>
                                    <li><a href="my-account.php">My Account</a></li>
                                </ul>
                            </li>
                            <li class="me-menu-children"><a href="javascript:;">Blog</a>
                                <ul class="me-sub-menu">
                                    <li><a href="blog.php">Blog Grid</a></li>
                                    <li><a href="blog-single.php">Blog Detail</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.php" class="me-active-menu">Contact</a></li>
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
                        <h1>Contact</h1>
                        <p><a href="index.php">Home</a>Contact</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact -->
    <div class="me-contact me-padder-top">
        <div class="container">
            <div class="me-contaict-detail">
                <div class="row">
                    <div class="col-md-4">
                        <div class="me-contact-info">
                            <svg viewBox="-66 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                <path d="m90 190c0 55.140625 44.859375 100 100 100s100-44.859375 100-100-44.859375-100-100-100-100 44.859375-100 100zm100-80c44.113281 0 80 35.886719 80 80s-35.886719 80-80 80-80-35.886719-80-80 35.886719-80 80-80zm0 0"/><path d="m200 10c0 5.523438-4.476562 10-10 10s-10-4.476562-10-10 4.476562-10 10-10 10 4.476562 10 10zm0 0"/><path d="m142.871094 5.894531c-84.121094 21.472657-142.871094 97.179688-142.871094 184.105469 0 79.226562 27.214844 111.644531 182 318 1.890625 2.519531 4.851562 4 8 4s6.109375-1.480469 8-4c154.757812-206.316406 182-238.800781 182-318 0-86.925781-58.75-162.632812-142.871094-184.105469-5.351562-1.363281-10.796875 1.863281-12.164062 7.214844-1.363282 5.351563 1.867187 10.796875 7.21875 12.164063 75.253906 19.207031 127.816406 86.949218 127.816406 164.726562 0 70.929688-22.304688 98.535156-170 295.335938-147.636719-196.738282-170-224.339844-170-295.335938 0-77.777344 52.5625-145.519531 127.816406-164.726562 5.355469-1.367188 8.582032-6.8125 7.21875-12.164063-1.367187-5.351563-6.8125-8.582031-12.164062-7.214844zm0 0"/>
                                </svg>
                                <h4>Location</h4>
                                <p>Akshya Nagar 5est Block 1st Cross, Rammurthy Nagar, Singapur-4550998</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="me-contact-info">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 349.313 349.313">
                                <g>
                                    <path d="M333.302,255.092L266.944,225.6c-3.185-1.412-6.993-2.158-11.015-2.158c-8.206,0-16.438,3.052-21.47,7.941l-20.906,20.246
                                        c-3.112,3.017-8.632,5.042-13.751,5.042c-2.188,0-4.107-0.391-5.565-1.122c-14.102-7.068-36.285-21.19-61.847-48.312
                                        c-22.706-24.085-33.474-40.573-38.514-50.163c-2.821-5.38,0.127-14.678,4.55-19.101l18.613-18.598
                                        c7.734-7.718,11.209-21.947,7.924-32.39l-20.919-66.43C100.868,10.458,90.139,0,77.604,0C60.27,0.576,35.946,6.776,18.432,33.045
                                        C-8.625,73.651-6.998,151.813,42.804,207.309c46.332,51.622,115.141,108.612,115.742,109.101
                                        c1.485,1.345,36.971,32.904,88.883,32.904c5.002,0,10.115-0.31,15.213-0.908c56.533-6.835,77.257-43.071,84.579-64.054
                                        C351.4,272.438,343.398,259.602,333.302,255.092z M336.029,280.431c-6.413,18.388-24.663,50.146-74.813,56.203
                                        c-4.565,0.554-9.206,0.828-13.792,0.828c-46.722,0-79.691-28.731-81.158-30.026c-2.829-2.355-69.932-58.233-114.653-108.049
                                        C7.047,149.737,3.564,76.685,28.276,39.608c14.701-22.057,35.279-27.279,49.967-27.777c5.987,0.025,12.695,6.614,14.488,12.279
                                        l20.918,66.43c1.968,6.256-0.371,15.808-5.007,20.447l-18.605,18.595c-7.599,7.592-12.096,22.666-6.652,32.992
                                        c5.396,10.27,16.788,27.759,40.37,52.788c26.749,28.365,50.196,43.27,65.161,50.779c3.062,1.539,6.835,2.356,10.902,2.356
                                        c8.231,0,16.65-3.199,21.967-8.368l20.906-20.262c4.185-4.047,14.076-5.824,19.424-3.453l66.354,29.488
                                        C333.531,268.183,337.933,275.008,336.029,280.431z"/>
                                    <path d="M161.098,102.801c-3.271,0-5.926,2.664-5.926,5.926s2.655,5.923,5.926,5.923c40.827,0,74.037,33.213,74.037,74.032
                                        c0,3.265,2.655,5.926,5.926,5.926s5.926-2.661,5.926-5.926C246.987,141.33,208.46,102.801,161.098,102.801z"/>
                                    <path d="M278.303,202.713c3.27,0,5.926-2.661,5.926-5.926c0-72.356-58.879-131.226-131.246-131.226
                                        c-3.27,0-5.923,2.661-5.923,5.924s2.653,5.926,5.923,5.926c65.831,0,119.393,53.555,119.393,119.376
                                        C272.376,200.052,275.038,202.713,278.303,202.713z"/>
                                </g>
                            </svg>
                            <h4>Contact detail</h4>
                            <p>+789-5654-123</p>
                            <p>+789-5654-123</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="me-contact-info">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <g>
                                    <path d="M174.545,302.545H81.455c-6.982,0-11.636,4.655-11.636,11.636s4.655,11.636,11.636,11.636h93.091
                                        c6.982,0,11.636-4.655,11.636-11.636S181.527,302.545,174.545,302.545z"/>
                                </g>
                                <g>
                                    <path d="M139.636,244.364H46.545c-6.982,0-11.636,4.655-11.636,11.636s4.655,11.636,11.636,11.636h93.091
                                        c6.982,0,11.636-4.655,11.636-11.636S146.618,244.364,139.636,244.364z"/>
                                </g>
                                <g>
                                    <path d="M104.727,186.182H11.636C4.655,186.182,0,190.836,0,197.818s4.655,11.636,11.636,11.636h93.091
                                        c6.982,0,11.636-4.655,11.636-11.636S111.709,186.182,104.727,186.182z"/>
                                </g>
                                <g>
                                    <path d="M463.127,155.927c-3.491-4.655-11.636-5.818-16.291-2.327l-123.345,94.255c-12.8,9.309-30.255,9.309-43.055,0
                                        L157.091,153.6c-4.655-3.491-12.8-3.491-16.291,2.327c-3.491,4.655-3.491,12.8,2.327,16.291l124.509,94.255
                                        c10.473,8.145,23.273,11.636,34.909,11.636s25.6-3.491,34.909-11.636L460.8,172.218
                                        C465.455,168.727,466.618,160.582,463.127,155.927z"/>
                                </g>
                                <g>
                                    <path d="M477.091,104.727H104.727c-6.982,0-11.636,4.655-11.636,11.636S97.745,128,104.727,128h372.364
                                        c6.982,0,11.636,4.655,11.636,11.636v232.727c0,6.982-4.655,11.636-11.636,11.636H104.727c-6.982,0-11.636,4.655-11.636,11.636
                                        c0,6.982,4.655,11.636,11.636,11.636h372.364c19.782,0,34.909-15.127,34.909-34.909V139.636
                                        C512,119.855,496.873,104.727,477.091,104.727z"/>
                                </g>
                                <g>
                                    <path d="M461.964,340.945l-69.818-69.818c-4.655-4.655-11.636-4.655-16.291,0s-4.655,11.636,0,16.291l69.818,69.818
                                        c2.327,2.327,5.818,3.491,8.145,3.491s5.818-1.164,8.146-3.491C466.618,352.582,466.618,345.6,461.964,340.945z"/>
                                </g>
                            </svg>                                                        
                            <h4>Email</h4>
                            <p>example@gmail.com</p>
                            <p>support.example@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <?php 
                    if(isset($_POST['contact']))
                    {
                     $name=mysqli_escape_string($mysqli,$_POST['full_name']);
                      $subj=mysqli_escape_string($mysqli,$_POST['subject']); 
                      $email=mysqli_escape_string($mysqli,$_POST['email']); 
                      $msg=mysqli_escape_string($mysqli,$_POST['message']);
$sq=mysqli_query($mysqli,"insert into enquiry (name,subject,email,msg)values('$name','$subj','$email','$msg')")or die(mysqli_error($mysqli));
}
                    ?>
                    <form action="" method="post">
                        <div class="me-contact-form">
                            <input type="text" placeholder="Name" name="full_name" id="full_name" class="require"/>
                            <input type="text" placeholder="Subject" name="subject" id="subject"/>
                            <input type="email" placeholder="Email" name="email" id="email" class="require" data-valid="email" data-error="Email should be valid."/>
                            <textarea placeholder="Message" name="message" id="message"></textarea>
                            <button type="submit" name="contact" class="me-btn submitForm">Submit</button>
                            <div class="response"></div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <div class="me-global-map">
                        <div id="world-map" class="jvmap-smart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Partners -->
    <div class="me-partners me-padder-top me-padder-bottom me-contact-partner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="me-partners-logo">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <a href="javascript:;"><img src="assets/images/client2.jpg" class="img-fluid" alt="image"/></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="javascript:;"><img src="assets/images/client1.jpg" class="img-fluid" alt="image"/></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="javascript:;"><img src="assets/images/client3.jpg" class="img-fluid" alt="image"/></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="javascript:;"><img src="assets/images/client4.jpg" class="img-fluid" alt="image"/></a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="javascript:;"><img src="assets/images/client5.jpg" class="img-fluid" alt="image"/></a>
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