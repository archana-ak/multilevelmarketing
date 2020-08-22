 <div class="modal fade me-login-model" id="meLogin">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="close me-team-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <div class="modal-body">
                    <h1 class="me-login-title">Login</h1>
                    <form action="" method="post" id="form1">
                        <div class="me-login-form">
                            <input type="text" name="username" placeholder="Username" />
                            <input type="password" name="password" placeholder="Password" />
                            <div class="me-remember">
                                <label>Remember Me
                                    <input type="checkbox">
                                    <span class="s_checkbox"></span>
                                </label>
                                <a href="javascript:;" class="me-forgot-password" data-toggle="modal" data-target="#meforgot" data-dismiss="modal" aria-label="Close">Forgot Password ?</a>
                            </div>
                            <div class="me-login-btn">
                               <button type="submit" value="submit" name="login" form="form1" class="me-btn">Login</button> 
                                <p>Don't have an account? <a href="registration.php" >Sign up</a></p>
                            </div>
                        </div>
                    </form>
                    <div class="me-login-with-social">
                        <span>or</span>
                        <p>Login with another account</p>
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
        </div>
    </div>
    <!-- Signup Modal -->
    <div class="modal fade me-login-model" id="meSignup">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="close me-team-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <div class="modal-body">
                    <h1 class="me-login-title">Sign Up</h1>
                    <form action="" method="post">
                        <div class="me-login-form">
                            <input type="text" placeholder="Username" />
                            <input type="text" placeholder="Email" />
                            <input type="password" placeholder="Password" />
                            <input type="password" placeholder="Confirm Password" />
                            
                            <div class="me-login-btn">
                                <button class="me-btn">Sign up</button>
                                <p>Already have an account? <a href="javascript:;" data-toggle="modal" data-target="#meLogin" data-dismiss="modal" aria-label="Close">Login</a></p>
                            </div>
                        </div>
                    </form>
                    <div class="me-login-with-social">
                        <span>or</span>
                        <p>Login with another account</p>
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
        </div>
    </div>
    <!-- Forgot Modal -->
    <div class="modal fade me-login-model" id="meforgot">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="close me-team-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <div class="modal-body">
                    <h1 class="me-login-title">Forgot</h1>
                    <form action="index.php" method="post" id="form2">
                        <div class="me-login-form">
                            <input type="text" name="email" placeholder="Registered Email" />
                            <div class="me-login-btn">
                                <button type="submit" value="submit" name="forgot" form="form2" class="me-btn">Forgot</button>
                                <p>Don't have an account? <a href="registration.php" >Sign up</a></p>
                            </div>
                        </div>
                    </form>
                    <div class="me-login-with-social">
                        <span>or</span>
                        <p>Login with another account</p>
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
        </div>
    </div>