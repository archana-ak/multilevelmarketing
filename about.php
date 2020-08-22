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
                            <li><a href="about.php" class="me-active-menu">About</a></li>
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
                        <h1>About</h1>
                        <p><a href="index.php">Home</a>About</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about -->
    <div class="me-about me-about-single">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="me-about-img">
                        <img src="assets/images/about.jpg" alt="about" class="img-fluid" />
                    </div>
                </div>   
                <div class="col-md-6">
                    <div class="me-heading">
                        <h4>Lorem ipsum doler</h4>
                        <h1>About money x-change</h1>
                    </div>
                    <div class="me-about-text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <!-- Team -->
    <div class="me-team me-padder-top-less me-padder-bottom">
        <div class="container">
            <div class="me-heading2">
                <h4>Lorem ipsum doler</h4>
                <h1>Our experts</h1>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="me-team-box">
                        <img src="assets/images/team1.jpg" class="img-fluid" alt="image" />
                        <div class="me-team-info">
                            <h4 data-toggle="modal" data-target="#team-modal-one"><a href="javascript:;">John doe</a></h4>
                            <p>Team leader</p>
                        </div>
                        <div class="me-team-social">
                            <ul>
                                <li><a href="javascript:;"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="javascript:;"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="javascript:;"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="javascript:;"><i class="fab fa-pinterest-p"></i></a></li>
                                <li><a href="javascript:;"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="me-team-box">
                        <img src="assets/images/team2.jpg" class="img-fluid" alt="image" />
                        <div class="me-team-info">
                            <h4 data-toggle="modal" data-target="#team-modal-two"><a href="javascript:;">Nancy Martin</a></h4>
                            <p>Team leader</p>
                        </div>
                        <div class="me-team-social">
                            <ul>
                                <li><a href="javascript:;"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="javascript:;"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="javascript:;"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="javascript:;"><i class="fab fa-pinterest-p"></i></a></li>
                                <li><a href="javascript:;"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="me-team-box">
                        <img src="assets/images/team3.jpg" class="img-fluid" alt="image" />
                        <div class="me-team-info">
                            <h4 data-toggle="modal" data-target="#team-modal-three"><a href="javascript:;">Maurice Victor</a></h4>
                            <p>Team leader</p>
                        </div>
                        <div class="me-team-social">
                            <ul>
                                <li><a href="javascript:;"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="javascript:;"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="javascript:;"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="javascript:;"><i class="fab fa-pinterest-p"></i></a></li>
                                <li><a href="javascript:;"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="me-team-box">
                        <img src="assets/images/team4.jpg" class="img-fluid" alt="image" />
                        <div class="me-team-info">
                            <h4 data-toggle="modal" data-target="#team-modal-four"><a href="javascript:;">Joolie Desuza</a></h4>
                            <p>Team leader</p>
                        </div>
                        <div class="me-team-social">
                            <ul>
                                <li><a href="javascript:;"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="javascript:;"><i class="fab fa-twitter"></i></a></li
                                <li><a href="javascript:;"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="javascript:;"><i class="fab fa-pinterest-p"></i></a></li>
                                <li><a href="javascript:;"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="team-modal-one" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close me-team-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="me-modal-body">
                    <div class="me-modal-team-img">
                        <img src="assets/images/team11.jpg" class="img-fluid" alt="image" />
                        <p class="me-team-designation">Team leader</p>
                    </div>
                    <div class="me-modal-team-data">
                        <h4>John doe</h4>
                        <p>Team leader</p>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                        <ul> 
                            <li><h4>Skills</h4></li>
                            <li>Web Designer</li>
                            <li>HTML</li>
                            <li>PHP</li>
                            <li>Laravel</li>
                            <li>.NET</li>
                            <li>WordPress</li>
                            <li>Photoshop</li>
                            <li>Android</li>
                        </ul>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="team-modal-two" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close me-team-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="me-modal-body">
                    <div class="me-modal-team-img">
                        <img src="assets/images/team22.jpg" class="img-fluid" alt="image" />
                        <p class="me-team-designation">Team leader</p>
                    </div>
                    <div class="me-modal-team-data">
                        <h4>Nancy Martin</h4>
                        <p>Team leader</p>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                        <ul> 
                            <li><h4>Skills</h4></li>
                            <li>Web Designer</li>
                            <li>HTML</li>
                            <li>PHP</li>
                            <li>Laravel</li>
                            <li>.NET</li>
                            <li>WordPress</li>
                            <li>Photoshop</li>
                            <li>Android</li>
                        </ul>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="team-modal-three" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close me-team-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="me-modal-body">
                    <div class="me-modal-team-img">
                        <img src="assets/images/team33.jpg" class="img-fluid" alt="image" />
                        <p class="me-team-designation">Team leader</p>
                    </div>
                    <div class="me-modal-team-data">
                        <h4>Maurice Victor</h4>
                        <p>Team leader</p>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                        <ul> 
                            <li><h4>Skills</h4></li>
                            <li>Web Designer</li>
                            <li>HTML</li>
                            <li>PHP</li>
                            <li>Laravel</li>
                            <li>.NET</li>
                            <li>WordPress</li>
                            <li>Photoshop</li>
                            <li>Android</li>
                        </ul>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="team-modal-four" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close me-team-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="me-modal-body">
                    <div class="me-modal-team-img">
                        <img src="assets/images/team44.jpg" class="img-fluid" alt="image" />
                        <p class="me-team-designation">Team leader</p>
                    </div>
                    <div class="me-modal-team-data">
                        <h4>Joolie Desuza</h4>
                        <p>Team leader</p>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                        <ul> 
                            <li><h4>Skills</h4></li>
                            <li>Web Designer</li>
                            <li>HTML</li>
                            <li>PHP</li>
                            <li>Laravel</li>
                            <li>.NET</li>
                            <li>WordPress</li>
                            <li>Photoshop</li>
                            <li>Android</li>
                        </ul>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <!-- Counters -->
    <div class="me-counter">
        <div class="me-counter-heading">
            <h1>Why we are the best for you</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
            <p>sed do eiusmod tempor incididunt ut labore</p>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="me-counter-box" id="counter">
                        <ul>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <g>
                                        <path d="M108.512,275.939c4.15,0,7.515-3.364,7.515-7.515v-5.21c0-11.984-9.157-21.87-20.841-23.03v-8.231
                                            c0-4.151-3.365-7.515-7.515-7.515c-4.15,0-7.515,3.364-7.515,7.515v8.591c-11.858,2.299-20.841,12.756-20.841,25.275
                                            c0,14.199,11.552,25.75,25.75,25.75h5.21c5.912,0,10.721,4.809,10.721,10.721s-4.809,10.721-10.721,10.721h-7.815
                                            c-4.475,0-8.116-3.641-8.116-8.117c0-4.151-3.365-7.515-7.515-7.515c-4.15,0-7.515,3.364-7.515,7.515
                                            c0,11.984,9.156,21.87,20.841,23.03v8.231c0,4.151,3.365,7.515,7.515,7.515c4.15,0,7.515-3.364,7.515-7.515v-8.591
                                            c11.858-2.299,20.841-12.756,20.841-25.275c0-14.199-11.552-25.75-25.75-25.75h-5.21c-5.912,0-10.721-4.809-10.721-10.721
                                            s4.809-10.721,10.721-10.721h7.815c4.475,0,8.116,3.641,8.116,8.117v5.21C100.997,272.575,104.362,275.939,108.512,275.939z"></path>
                                    </g>
                                    <g>
                                        <path d="M276.841,83.563c4.151,0,7.515-3.364,7.515-7.515v-5.21c0-11.984-9.157-21.87-20.841-23.03v-8.231
                                            c0-4.151-3.364-7.515-7.515-7.515c-4.15,0-7.515,3.364-7.515,7.515v8.591c-11.858,2.299-20.841,12.756-20.841,25.275
                                            c0,14.199,11.552,25.75,25.75,25.75h5.21c5.912,0,10.721,4.809,10.721,10.721s-4.809,10.721-10.721,10.721h-7.815
                                            c-4.475,0-8.116-3.641-8.116-8.117c0-4.151-3.365-7.515-7.515-7.515s-7.515,3.364-7.515,7.515c0,11.984,9.156,21.87,20.841,23.03
                                            v8.231c0,4.151,3.365,7.515,7.515,7.515c4.151,0,7.515-3.364,7.515-7.515v-8.591c11.857-2.299,20.841-12.756,20.841-25.275
                                            c0-14.199-11.552-25.75-25.75-25.75h-5.21c-5.912,0-10.721-4.809-10.721-10.721s4.809-10.721,10.721-10.721h7.815
                                            c4.475,0,8.116,3.641,8.116,8.117v5.21C269.326,80.2,272.69,83.563,276.841,83.563z"></path>
                                    </g>
                                    <g>
                                        <path d="M424.329,148.29c-21.722,0-41.622,7.945-56.954,21.076l-37.201-31.001c8.545-13.527,13.497-29.538,13.497-46.686
                                            c0-48.342-39.329-87.671-87.671-87.671s-87.671,39.329-87.671,87.671c0,25.365,10.831,48.243,28.107,64.266l-61.262,54.455
                                            c-13.697-8.864-30.009-14.017-47.503-14.017C39.329,196.384,0,235.712,0,284.055s39.329,87.671,87.671,87.671
                                            c48.342,0,87.671-39.329,87.671-87.671c0-25.365-10.831-48.243-28.107-64.267l61.262-54.455
                                            c13.697,8.864,30.009,14.017,47.503,14.017c25.798,0,49.027-11.203,65.084-28.996l35.713,29.76
                                            c-12.573,15.177-20.139,34.644-20.139,55.846c0,48.342,39.329,87.671,87.671,87.671c48.342,0,87.671-39.329,87.671-87.671
                                            S472.671,148.29,424.329,148.29z M160.313,284.055c0,40.055-32.587,72.642-72.642,72.642s-72.642-32.587-72.642-72.642
                                            c0-40.055,32.587-72.642,72.642-72.642C127.726,211.413,160.313,244,160.313,284.055z M256,164.321
                                            c-40.055,0-72.642-32.587-72.642-72.642S215.945,19.037,256,19.037s72.642,32.587,72.642,72.642S296.055,164.321,256,164.321z
                                             M424.329,308.603c-40.055,0-72.642-32.587-72.642-72.642c0-18.9,7.26-36.133,19.132-49.068c1.195-0.44,2.298-1.182,3.173-2.231
                                            c0.565-0.678,0.982-1.43,1.271-2.213c12.935-11.869,30.166-19.129,49.065-19.129c40.055,0,72.642,32.587,72.642,72.642
                                            C496.971,276.016,464.384,308.603,424.329,308.603z"></path>
                                    </g>
                                    <g>
                                        <path d="M445.169,227.845c4.151,0,7.515-3.364,7.515-7.515v-5.21c0-11.984-9.157-21.87-20.841-23.03v-8.231
                                            c0-4.151-3.364-7.515-7.515-7.515c-4.151,0-7.515,3.364-7.515,7.515v8.591c-11.857,2.299-20.841,12.756-20.841,25.275
                                            c0,14.199,11.552,25.75,25.75,25.75h5.209c5.912,0,10.721,4.809,10.721,10.721c0,5.912-4.809,10.721-10.721,10.721h-7.815
                                            c-4.475,0-8.116-3.641-8.116-8.117c0-4.151-3.364-7.515-7.515-7.515c-4.151,0-7.515,3.364-7.515,7.515
                                            c0,11.984,9.156,21.87,20.841,23.03v8.231c0,4.151,3.364,7.515,7.515,7.515c4.151,0,7.515-3.364,7.515-7.515v-8.591
                                            c11.857-2.299,20.841-12.756,20.841-25.275c0-14.199-11.552-25.75-25.75-25.75h-5.209c-5.912,0-10.721-4.809-10.721-10.721
                                            s4.809-10.721,10.721-10.721h7.815c4.475,0,8.116,3.641,8.116,8.117v5.21C437.655,224.481,441.018,227.845,445.169,227.845z"></path>
                                    </g>
                                    <g>
                                        <path d="M159.812,396.775H95.687c-4.15,0-7.515,3.364-7.515,7.515v96.188c0,4.151,3.365,7.515,7.515,7.515h64.125
                                            c4.15,0,7.515-3.364,7.515-7.515V404.29C167.327,400.138,163.962,396.775,159.812,396.775z M152.297,492.963h-49.096v-81.159
                                            h49.096V492.963z"></path>
                                    </g>
                                    <g>
                                        <path d="M472.423,396.775h-64.125c-4.151,0-7.515,3.364-7.515,7.515v96.188c0,4.151,3.364,7.515,7.515,7.515h64.125
                                            c4.151,0,7.515-3.364,7.515-7.515V404.29C479.937,400.138,476.574,396.775,472.423,396.775z M464.908,492.963h-49.096v-81.159
                                            h49.096V492.963z"></path>
                                    </g>
                                    <g>
                                        <path d="M264.016,428.34c4.151,0,7.515-3.364,7.515-7.515V308.102c0-4.151-3.364-7.515-7.515-7.515H199.89
                                            c-4.15,0-7.515,3.364-7.515,7.515v192.376c0,4.151,3.365,7.515,7.515,7.515h64.125c4.151,0,7.515-3.364,7.515-7.515v-44.585
                                            c0-4.151-3.364-7.515-7.515-7.515c-4.151,0-7.515,3.364-7.515,7.515v37.07h-49.096V315.616h49.096v105.208
                                            C256.501,424.976,259.865,428.34,264.016,428.34z"></path>
                                    </g>
                                    <g>
                                        <path d="M368.219,348.681h-64.125c-4.151,0-7.515,3.364-7.515,7.515v144.282c0,4.151,3.364,7.515,7.515,7.515h64.125
                                            c4.151,0,7.515-3.364,7.515-7.515V356.196C375.734,352.045,372.37,348.681,368.219,348.681z M360.705,492.963h-49.096V363.71
                                            h49.096V492.963z"></path>
                                    </g>
                                </svg>
                                <div class="me-counter-no">
                                    <h4 class="counter-value" data-count="15">0</h4>
                                    <p>Year of business</p>
                                </div>
                            </li>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 489.544 489.544" >
                                    <g>
                                        <path d="M138.943,205.941c-7-7.1-18.4-7.1-25.5-0.1c-7.1,7-7.1,18.4-0.1,25.5l85.4,86c3.4,3.4,7.9,5.3,12.7,5.3c0,0,0,0,0.1,0
                                            c4.8,0,9.3-1.9,12.7-5.2l260-258.6c7-7,7.1-18.4,0.1-25.5s-18.4-7.1-25.5-0.1l-91.9,91.3c-39.1-48.1-97.9-76.3-160.4-76.3
                                            c-29.2,0-57.4,6-83.8,17.7c-25.5,11.4-48.2,27.5-67.3,48.1c-19.1,20.5-33.6,44.2-43.1,70.4c-9.9,27.3-13.9,56-11.8,85.4
                                            c7.1,101.7,89.2,183.9,190.9,191.2c5,0.4,10.1,0.5,15.1,0.5c47.3,0,93-16,129.8-45.8c40.2-32.4,66.6-78.3,74.5-129.1
                                            c1.6-10.4,2.4-21.1,2.4-31.8c0-9.9-8.1-18-18-18c-9.9,0-18,8.1-18,18c0,8.8-0.7,17.6-2,26.3c-13.4,87-93,150.2-181.2,143.9
                                            c-83.9-6-151.7-73.8-157.6-157.8c-3.4-48,12.7-93.7,45.3-128.7c32.2-34.5,77.7-54.3,124.8-54.3c52.8,0,102.4,24.5,134.7,65.9
                                            l-129.6,129L138.943,205.941z"/>
                                    </g>
                                </svg>                                
                                <div class="me-counter-no">
                                    <h4 class="counter-value" data-count="100">0</h4><span> %</span>
                                    <p>Successful transaction</p>
                                </div>
                            </li>
                            <li>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 482.9 482.9">
                                    <g>
                                        <path d="M239.7,260.2c0.5,0,1,0,1.6,0c0.2,0,0.4,0,0.6,0c0.3,0,0.7,0,1,0c29.3-0.5,53-10.8,70.5-30.5
                                            c38.5-43.4,32.1-117.8,31.4-124.9c-2.5-53.3-27.7-78.8-48.5-90.7C280.8,5.2,262.7,0.4,242.5,0h-0.7c-0.1,0-0.3,0-0.4,0h-0.6
                                            c-11.1,0-32.9,1.8-53.8,13.7c-21,11.9-46.6,37.4-49.1,91.1c-0.7,7.1-7.1,81.5,31.4,124.9C186.7,249.4,210.4,259.7,239.7,260.2z
                                             M164.6,107.3c0-0.3,0.1-0.6,0.1-0.8c3.3-71.7,54.2-79.4,76-79.4h0.4c0.2,0,0.5,0,0.8,0c27,0.6,72.9,11.6,76,79.4
                                            c0,0.3,0,0.6,0.1,0.8c0.1,0.7,7.1,68.7-24.7,104.5c-12.6,14.2-29.4,21.2-51.5,21.4c-0.2,0-0.3,0-0.5,0l0,0c-0.2,0-0.3,0-0.5,0
                                            c-22-0.2-38.9-7.2-51.4-21.4C157.7,176.2,164.5,107.9,164.6,107.3z"/>
                                        <path d="M446.8,383.6c0-0.1,0-0.2,0-0.3c0-0.8-0.1-1.6-0.1-2.5c-0.6-19.8-1.9-66.1-45.3-80.9c-0.3-0.1-0.7-0.2-1-0.3
                                            c-45.1-11.5-82.6-37.5-83-37.8c-6.1-4.3-14.5-2.8-18.8,3.3c-4.3,6.1-2.8,14.5,3.3,18.8c1.7,1.2,41.5,28.9,91.3,41.7
                                            c23.3,8.3,25.9,33.2,26.6,56c0,0.9,0,1.7,0.1,2.5c0.1,9-0.5,22.9-2.1,30.9c-16.2,9.2-79.7,41-176.3,41
                                            c-96.2,0-160.1-31.9-176.4-41.1c-1.6-8-2.3-21.9-2.1-30.9c0-0.8,0.1-1.6,0.1-2.5c0.7-22.8,3.3-47.7,26.6-56
                                            c49.8-12.8,89.6-40.6,91.3-41.7c6.1-4.3,7.6-12.7,3.3-18.8c-4.3-6.1-12.7-7.6-18.8-3.3c-0.4,0.3-37.7,26.3-83,37.8
                                            c-0.4,0.1-0.7,0.2-1,0.3c-43.4,14.9-44.7,61.2-45.3,80.9c0,0.9,0,1.7-0.1,2.5c0,0.1,0,0.2,0,0.3c-0.1,5.2-0.2,31.9,5.1,45.3
                                            c1,2.6,2.8,4.8,5.2,6.3c3,2,74.9,47.8,195.2,47.8s192.2-45.9,195.2-47.8c2.3-1.5,4.2-3.7,5.2-6.3
                                            C447,415.5,446.9,388.8,446.8,383.6z"/>
                                    </g>
                                </svg>                                
                                <div class="me-counter-no">
                                    <h4 class="counter-value" data-count="750">0</h4>
                                    <p>Member since year</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- History -->
    <div class="me-history me-padder-top-less me-padder-bottom">
        <div class="container">
            <div class="me-heading2">
                <h4>Lorem ipsum doler</h4>
                <h1>Our history</h1>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="me-history-point">
                        <div class="me-history-point-shape">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.039 512.039">
                                <g>
                                    <path d="M509.067,215.358c-2.367-2.366-5.766-3.391-9.044-2.732l-86.184,17.345    c-3.613,0.728-6.534,3.384-7.6,6.911c-1.066,3.528-0.105,7.357,2.501,9.964l11.66,11.66l-45.762,45.762l-35.426-35.426    c-1.876-1.875-4.419-2.929-7.071-2.929s-5.195,1.054-7.071,2.929L281.6,312.313l16.306-58.59    c3.964-14.243,1.108-29.163-7.835-40.936c-5.478-7.21-12.71-12.526-20.886-15.572l13.035-37.236    c3.597,0.316,7.185,0.477,10.732,0.477c28.876,0,57.03-10.178,79.277-28.657l2.383-1.979c11.729-9.745,13.733-26.68,4.565-38.552    c-4.649-6.021-11.367-9.797-18.917-10.631c-7.553-0.835-14.933,1.381-20.777,6.236l-2.707,2.249    c-3.989,3.313-8.351,6.174-12.965,8.501c-15.42,7.778-34.676,4.314-47.471-8.349c18.612-5.765,32.17-23.139,32.17-43.621    C308.511,20.48,288.03,0,262.856,0c-25.175,0-45.655,20.48-45.655,45.654c0,10.018,3.251,19.286,8.742,26.822    c-10.386,2.236-19.733,7.591-26.885,15.162c-0.417,0.366-0.817,0.762-1.179,1.208c-17.629,21.654-41.131,37.186-67.964,44.915    c-7.265,2.094-13.015,6.918-16.466,13.034l-20.496-20.496c-8.968-8.967-23.558-8.966-32.527,0l-26.823,26.824l0,0l0,0    L6.78,179.946c-4.345,4.344-6.737,10.119-6.737,16.264c0,6.144,2.393,11.919,6.736,16.264l73.905,73.905    c4.345,4.344,10.12,6.736,16.264,6.736c6.145,0,11.92-2.393,16.264-6.736l27.773-27.773l-13.169,34.532    c-1.968,5.16,0.62,10.939,5.78,12.907c1.173,0.447,2.377,0.659,3.562,0.659c4.028,0,7.825-2.452,9.346-6.439l32.798-86.001h62.61    h10.823c8.479,0,16.282,3.872,21.411,10.623s6.767,15.307,4.493,23.474l-22.723,81.646c-1.022,3.674-4.4,6.24-8.214,6.24    c-3.422,0-5.532-1.874-6.485-2.991s-2.473-3.496-1.936-6.874l12.091-76.012c0.46-2.891-0.37-5.837-2.27-8.063    c-1.9-2.226-4.68-3.508-7.606-3.508h-23.708c-3.771,0-7.222,2.121-8.924,5.486c-0.584,1.154-58.605,115.875-78.157,154.639    c-1.957,3.882-6.212,6.097-10.575,5.5l-0.474-0.064c-2.977-0.402-5.563-2.114-7.098-4.697s-1.8-5.674-0.729-8.48l6.162-16.157    c1.968-5.16-0.62-10.938-5.78-12.907c-5.159-1.968-10.938,0.621-12.907,5.78l-6.162,16.157    c-3.259,8.546-2.449,17.957,2.222,25.821c4.671,7.863,12.548,13.077,21.604,14.303l0.474,0.063    c1.371,0.187,2.737,0.276,4.094,0.276c11.322,0,21.852-6.326,27.027-16.588c17.078-33.86,63.524-125.706,75.372-149.132h5.843    l-10.25,64.441c-1.313,8.257,1.047,16.641,6.476,23c3.492,4.091,8.014,7.052,13.02,8.649L127.629,466.286    c-1.875,1.876-2.929,4.419-2.929,7.071s1.054,5.196,2.929,7.071l28.683,28.682c1.953,1.952,4.512,2.929,7.071,2.929    s5.118-0.977,7.071-2.929l55.141-55.141c3.905-3.905,3.905-10.237,0-14.143c-3.906-3.904-10.236-3.904-14.143,0l-48.069,48.07    l-14.54-14.54l183.3-183.302l35.426,35.426c1.876,1.875,4.419,2.929,7.071,2.929s5.195-1.054,7.071-2.929l59.903-59.904    c3.905-3.905,3.905-10.237,0-14.143l-5.538-5.538l53.149-10.696l-10.696,53.149l-8.231-8.231c-3.906-3.904-10.236-3.904-14.143,0    l-81.516,81.516l-35.426-35.426c-3.906-3.904-10.236-3.904-14.143,0l-57.051,57.051c-3.905,3.905-3.905,10.237,0,14.143    c3.906,3.904,10.236,3.904,14.143,0l49.979-49.979l35.426,35.426c3.906,3.904,10.236,3.904,14.143,0l81.516-81.516l14.354,14.354    c2.606,2.606,6.437,3.569,9.963,2.501c3.528-1.065,6.185-3.986,6.912-7.6l17.345-86.185    C512.46,221.121,511.434,217.726,509.067,215.358z M262.856,20c14.146,0,25.654,11.509,25.654,25.654    c0,14.146-11.509,25.655-25.654,25.655c-14.146,0-25.655-11.509-25.655-25.655C237.201,31.509,248.71,20,262.856,20z     M163.904,197.25l-12.17-12.17c5.78-1.886,11.457-4.043,17.015-6.456L163.904,197.25z M130.155,162.562    c-1.182-4.102,1.195-8.4,5.297-9.582c16.439-4.736,31.772-12.048,45.586-21.597l-5.647,21.71    c-11.242,6.212-23.211,11.18-35.657,14.765c-0.231,0.066-0.473,0.124-0.712,0.17c-1.845,0.351-3.691-0.016-5.241-0.9l-2.929-2.929    C130.563,163.688,130.323,163.144,130.155,162.562z M74.567,140.441c0.585-0.585,1.354-0.877,2.122-0.877s1.537,0.292,2.121,0.877    l36.452,36.452c1.691,2.309,3.707,4.322,5.978,5.978l31.476,31.476c1.17,1.169,1.17,3.073,0,4.242l-19.752,19.752l-21.967-21.967    l4.184-4.184c3.905-3.905,3.905-10.237,0-14.143l-22.51-22.51c-3.906-3.904-10.236-3.904-14.143,0l-4.184,4.184l-19.529-19.529    L74.567,140.441z M88.255,210.832c-0.957,0.957-2.074,1.101-2.655,1.101c-0.58,0-1.697-0.144-2.654-1.1v-0.001l-3.059-3.058    c-0.956-0.957-1.1-2.074-1.1-2.654c0-0.581,0.144-1.698,1.101-2.655l5.712-5.712l8.367,8.367L88.255,210.832z M99.069,272.237    c-0.727,0.726-1.554,0.878-2.121,0.878c-0.566,0-1.395-0.152-2.121-0.879l-73.905-73.905c-0.727-0.727-0.879-1.555-0.879-2.121    c0-0.567,0.152-1.395,0.879-2.121l19.751-19.752L61.137,194.8c-1.535,3.178-2.35,6.686-2.35,10.32    c0,6.346,2.472,12.311,6.958,16.797l3.058,3.057v0.001c4.486,4.486,10.452,6.958,16.797,6.958c3.634,0,7.142-0.814,10.32-2.35    l22.902,22.902L99.069,272.237z M241.911,194.264h-56.564l20.543-78.973c3.674-14.12,16.429-23.981,31.019-23.981    c9.013,0,17.35,3.634,23.475,10.233c18.788,20.244,48.577,25.975,72.436,13.938c5.958-3.005,11.59-6.696,16.738-10.974    l2.707-2.249c1.632-1.356,3.691-1.978,5.801-1.74c2.105,0.232,3.981,1.288,5.283,2.975c2.513,3.253,1.832,8.163-1.516,10.944    l-2.382,1.979c-18.664,15.504-42.28,24.042-66.498,24.042c-5.259,0-10.634-0.421-15.977-1.252    c-4.769-0.748-9.382,2.024-10.976,6.577l-16.972,48.481H241.911z"/>
                                    <path d="M246.996,408.8c-2.63,0-5.21,1.069-7.07,2.93c-1.86,1.859-2.93,4.439-2.93,7.07    c0,2.64,1.069,5.21,2.93,7.069c1.86,1.87,4.44,2.931,7.07,2.931s5.21-1.061,7.069-2.931c1.86-1.859,2.931-4.43,2.931-7.069    c0-2.631-1.07-5.211-2.931-7.07C252.206,409.869,249.626,408.8,246.996,408.8z"/>
                                    <path d="M122.886,344.14c2.63,0,5.21-1.07,7.07-2.931c1.859-1.859,2.93-4.439,2.93-7.069s-1.07-5.21-2.93-7.07    c-1.87-1.86-4.44-2.93-7.07-2.93s-5.21,1.069-7.08,2.93c-1.859,1.86-2.92,4.44-2.92,7.07s1.061,5.21,2.92,7.069    C117.676,343.069,120.246,344.14,122.886,344.14z"/>
                                </g>
                            </svg>
                            <h2>5yr history</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="me-history-box">
                        <div class="me-history-box-shape">
                            <div class="me-history-box-circle">
                                <h2>01</h2>
                            </div>
                            <div class="me-history-box-data">
                                <span class="me-history-data-shape"></span>
                                <span class="me-history-data-shape-two"></span>
                                <span class="me-history-data-year">2019</span>
                                <h4>Starting our business</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>
                            </div>
                        </div>
                        <div class="me-history-box-shape">
                            <div class="me-history-box-circle">
                                <h2>02</h2>
                            </div>
                            <div class="me-history-box-data">
                                <span class="me-history-data-shape"></span>
                                <span class="me-history-data-shape-two"></span>
                                <span class="me-history-data-year">2018</span>
                                <h4>Starting our business</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>
                            </div>
                        </div>
                        <div class="me-history-box-shape">
                            <div class="me-history-box-circle">
                                <h2>03</h2>
                            </div>
                            <div class="me-history-box-data">
                                <span class="me-history-data-shape"></span>
                                <span class="me-history-data-shape-two"></span>
                                <span class="me-history-data-year">2017</span>
                                <h4>Starting our business</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>
                            </div>
                        </div>
                        <div class="me-history-box-shape">
                            <div class="me-history-box-circle">
                                <h2>04</h2>
                            </div>
                            <div class="me-history-box-data">
                                <span class="me-history-data-shape"></span>
                                <span class="me-history-data-shape-two"></span>
                                <span class="me-history-data-year">2016</span>
                                <h4>Starting our business</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>
                            </div>
                        </div>
                        <div class="me-history-box-shape">
                            <div class="me-history-box-circle">
                                <h2>05</h2>
                            </div>
                            <div class="me-history-box-data">
                                <span class="me-history-data-shape"></span>
                                <span class="me-history-data-shape-two"></span>
                                <span class="me-history-data-year">2015</span>
                                <h4>Starting our business</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial -->
    <div class="me-testimonial me-padder-top-less me-padder-bottom">
        <div class="container">
            <div class="me-heading2">
                <h4>Lorem ipsum doler</h4>
                <h1>Testimonial</h1>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="me-testimonial-user">
                        <img src="assets/images/user.jpg" class="img-fluid" alt="image" title="John Doe"/>
                        <img src="assets/images/user2.jpg" class="img-fluid" alt="image" title="John Doe"/>
                        <img src="assets/images/user3.jpg" class="img-fluid" alt="image" title="John Doe"/>
                        <img src="assets/images/user4.jpg" class="img-fluid" alt="image" title="Joolie Desuza"/>
                        <img src="assets/images/user5.jpg" class="img-fluid" alt="image" title="Joolie Desuza"/>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="me-testimonial-slider">
                        <div class="me-testimonial-box-shape">
                        </div>
                        <div class="me-testimonial-slider-box">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="me-testimonial-data">
                                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                            <h4>John Doe</h4>
                                            <h6>Chief Executive Officer</h6>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="me-testimonial-data">
                                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                            <h4>Joolie Desuza</h4>
                                            <h6>Hr Manager</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Add Arrows -->
                        <div class="me-testimonial-button">
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Partners -->
    <div class="me-partners me-padder-bottom me-padder-top">
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
        <?php include('includes/modal.php');?>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/swiper.min.js"></script>
<script src="assets/js/SmoothScroll.min.js"></script>
<script src="assets/js/ui_range_slider.js"></script>
<script src="assets/js/canvasjs.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>