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
                            <li class="me-menu-children"><a href="javascript:;" class="me-active-menu">Blog</a>
                                <ul class="me-sub-menu">
                                    <li><a href="blog.php">Blog Grid</a></li>
                                    <li><a href="blog-single.php" class="me-active-menu">Blog Detail</a></li>
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
                        <h1>Blog Single</h1>
                        <p><a href="index.php">Home</a>Blog Single</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Single-->
    <div class="me-blog-single me-padder-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="me-blog-box">
                                <div class="me-blog-img">
                                    <a href="javascript:;"><img src="assets/images/blog.jpg" alt="image" class="img-fluid"/></a>
                                </div>
                                <div class="me-blog-single-content"> 
                                    <div class="me-blog-tags">
                                        <a href="javascript:;">Currency</a>
                                        <a href="javascript:;">Category</a>
                                        <a href="javascript:;">2 Comments</a>
                                        <a href="javascript:;">14 December, 2019</a>
                                    </div>
                                    <h4 class="me-blog-title"><a href="blog-single.php#">Lorem ipsum doler sit amit</a></h4>
                                    <div class="me-blog-content-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                                        <blockquote>
                                            <i class="fas fa-quote-left"></i>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                        </blockquote>
                                        <div class="me-blog-social">
                                            <ul>
                                                <li>Tag :</li>
                                                <li>
                                                    <a href="javascript:;">Price</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">Money</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">Transfer</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">Exchange</a>
                                                </li>
                                            </ul>
                                            <ul>
                                                <li>Share :</li>
                                                <li><a href="javascript:;"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="javascript:;"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="javascript:;"><i class="fab fa-linkedin-in"></i></a></li>
                                                <li><a href="javascript:;"><i class="fab fa-pinterest-p"></i></a></li>
                                                <li><a href="javascript:;"><i class="fab fa-instagram"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="me-bolg-comment">
                                        <h4>Comments</h4>
                                        <ul>
                                            <li>
                                                <div class="me-comment-main">
                                                    <div class="me-comment-user">
                                                        <a href="javascript:;"><img src="assets/images/user.jpg" alt="image" class="img-fluid"/></a>
                                                    </div>
                                                    <div class="me-comment-detail">
                                                        <p class="me-comment-head"><a href="javascript:;">John Doe</a> <span>3 min ago</span></p>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat consectetur adipiscing elit, sed do eiusmod tempor incididunt ut.</p>
                                                        <div class="me-comment-detail-share">
                                                            <a href="javascript:;"><i class="fas fa-share"></i></a>
                                                            <a href="javascript:;"><i class="far fa-heart"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul>
                                                    <li>
                                                        <div class="me-comment-main">
                                                            <div class="me-comment-user">
                                                                <a href="javascript:;"><img src="assets/images/user.jpg" alt="image" class="img-fluid"/></a>
                                                            </div>
                                                            <div class="me-comment-detail">
                                                                <p class="me-comment-head"><a href="javascript:;">John Doe</a> <span>3 min ago</span></p>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat consectetur adipiscing elit, sed do eiusmod tempor incididunt ut.</p>
                                                                <div class="me-comment-detail-share">
                                                                    <a href="javascript:;"><i class="fas fa-share"></i></a>
                                                                    <a href="javascript:;"><i class="far fa-heart"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <div class="me-comment-main">
                                                    <div class="me-comment-user">
                                                        <a href="javascript:;"><img src="assets/images/user.jpg" alt="image" class="img-fluid"/></a>
                                                    </div>
                                                    <div class="me-comment-detail">
                                                        <p class="me-comment-head"><a href="javascript:;">John Doe</a> <span>3 min ago</span></p>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat consectetur adipiscing elit, sed do eiusmod tempor incididunt ut.</p>
                                                        <div class="me-comment-detail-share">
                                                            <a href="javascript:;"><i class="fas fa-share"></i></a>
                                                            <a href="javascript:;"><i class="far fa-heart"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="me-blog-post-comment">
                                    <h4>Post your comments here</h4>
                                    <form>
                                        <textarea placeholder="Message..."></textarea>
                                        <button type="button" class="me-btn">submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="me-blog-sidebar">
                        <div class="me-widget me-widget-search">
                            <input type="text" placeholder="Search" />
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 339.921 339.921">
                                <g>
                                    <path d="M335.165,292.071l-81.385-84.077c-5.836-6.032-13.13-8.447-16.29-5.363
                                        c-3.171,3.062-10.47,0.653-16.306-5.379l-1.164-1.207c36.425-47.907,32.89-116.499-10.851-160.24
                                        c-47.739-47.739-125.142-47.739-172.875,0c-47.739,47.739-47.739,125.131,0,172.87c44.486,44.492,114.699,47.472,162.704,9.045
                                        l0.511,0.533c5.825,6.032,7.995,13.402,4.814,16.469c-3.166,3.068-1.012,10.443,4.83,16.464l81.341,84.11
                                        c5.836,6.016,15.452,6.195,21.49,0.354l22.828-22.088C340.827,307.735,340.99,298.125,335.165,292.071z M182.306,181.81
                                        c-32.852,32.857-86.312,32.857-119.159,0.011c-32.852-32.852-32.847-86.318,0-119.164c32.847-32.852,86.307-32.847,119.148,0.005
                                        C215.152,95.509,215.152,148.964,182.306,181.81z"></path>
                                </g>
                            </svg>
                        </div>
                        <div class="me-widget me-widget-category">
                            <h4 class="me-widget-title">Category</h4>
                            <ul>
                                <li>
                                    <a href="javascript:;">Lorem ipsum doler sit amit<span>(5)</span></a>
                                </li>
                                <li>
                                    <a href="javascript:;">Aute Irure doler sit amit aute irure<span>(5)</span></a>
                                </li>
                                <li>
                                    <a href="javascript:;">Doler sit amit sed do eiusmod<span>(5)</span></a>
                                </li>
                                <li>
                                    <a href="javascript:;">Lorem ipsum doler sit amit<span>(5)</span></a>
                                </li>
                                <li>
                                    <a href="javascript:;">numquam eius modi totam aperiam<span>(5)</span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="me-widget me-widget-recent-post">
                            <h4 class="me-widget-title">Recent Posts</h4>
                            <ul>
                                <li>
                                    <a href="javascript:;">Lorem ipsum dolor sit amet, consectetur</a>
                                    <a href="javascript:;" class="me-widget-date">25 Dec 2019</a>
                                </li>
                                <li>
                                    <a href="javascript:;">Eiusmod tempor doler sit amit</a>
                                    <a href="javascript:;" class="me-widget-date">25 Dec 2019</a>
                                </li>
                                <li>
                                    <a href="javascript:;">Lorem ipsum consectetur adipiscing elit, </a>
                                    <a href="javascript:;" class="me-widget-date">25 Dec 2019</a>
                                </li>
                            </ul>
                        </div>
                        <div class="me-widget me-widget-instagram">
                            <h4 class="me-widget-title">Recent Posts</h4>
                            <ul>
                                <li>
                                    <a href="javascript:;"><img src="assets/images/user.jpg" class="img-fluid" alt="image"></a>
                                </li>
                                <li>
                                    <a href="javascript:;"><img src="assets/images/user5.jpg" class="img-fluid" alt="image"></a>
                                </li>
                                <li>
                                    <a href="javascript:;"><img src="assets/images/user2.jpg" class="img-fluid" alt="image"></a>
                                </li>
                                <li>
                                    <a href="javascript:;"><img src="assets/images/user3.jpg" class="img-fluid" alt="image"></a>
                                </li>
                                <li>
                                    <a href="javascript:;"><img src="assets/images/user4.jpg" class="img-fluid" alt="image"></a>
                                </li>
                                <li>
                                    <a href="javascript:;"><img src="assets/images/user5.jpg" class="img-fluid" alt="image"></a>
                                </li>
                            </ul>
                        </div>
                        <div class="me-widget me-widget-tag">
                            <h4 class="me-widget-title">Tag Cloud</h4>
                            <ul>
                                <li>
                                    <a href="javascript:;">Price</a>
                                </li>
                                <li>
                                    <a href="javascript:;">Money</a>
                                </li>
                                <li>
                                    <a href="javascript:;">Transfer</a>
                                </li>
                                <li>
                                    <a href="javascript:;">Cashback</a>
                                </li>
                                <li>
                                    <a href="javascript:;">Account</a>
                                </li>
                                <li>
                                    <a href="javascript:;">Exchange</a>
                                </li>
                                <li>
                                    <a href="javascript:;">Calculation</a>
                                </li>
                                <li>
                                    <a href="javascript:;">Trade Coin</a>
                                </li>
                            </ul>
                        </div>
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