<!doctype html>
<html class="no-js" lang="zxx">

<!-- login-register31:27-->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Registration - D Mart</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('landing/images/favicon.png')}}">
        <!-- Material Design Iconic Font-V2.2.0 -->
        <link rel="stylesheet" href="{{asset('landing/css/material-design-iconic-font.min.css')}}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('landing/css/font-awesome.min.css')}}">
        <!-- Font Awesome Stars-->
        <link rel="stylesheet" href="{{asset('landing/css/fontawesome-stars.css')}}">
        <!-- Meanmenu CSS -->
        <link rel="stylesheet" href="{{asset('landing/css/meanmenu.css')}}">
        <!-- owl carousel CSS -->
        <link rel="stylesheet" href="{{asset('landing/css/owl.carousel.min.css')}}">
        <!-- Slick Carousel CSS -->
        <link rel="stylesheet" href="{{asset('landing/css/slick.css')}}">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="{{asset('landing/css/animate.css')}}">
        <!-- Jquery-ui CSS -->
        <link rel="stylesheet" href="{{asset('landing/css/jquery-ui.min.css')}}">
        <!-- Venobox CSS -->
        <link rel="stylesheet" href="{{asset('landing/css/venobox.css')}}">
        <!-- Nice Select CSS -->
        <link rel="stylesheet" href="{{asset('landing/css/nice-select.css')}}">
        <!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="{{asset('landing/css/magnific-popup.css')}}">
        <!-- Bootstrap V4.1.3 Fremwork CSS -->
        <link rel="stylesheet" href="{{asset('landing/css/bootstrap.min.css')}}">
        <!-- Helper CSS -->
        <link rel="stylesheet" href="{{asset('landing/css/helper.css')}}">
        <!-- Main Style CSS -->
        <link rel="stylesheet" href="{{asset('landing/css/style.css')}}">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="{{asset('landing/css/responsive.css')}}">
        <!-- Modernizr js -->
        <script src="{{asset('landing/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    </head>
    <body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
        <!-- Begin Body Wrapper -->
        <div class="body-wrapper">
            <!-- Begin Login Content Area -->
            <div class="page-section">
                <div class="container">
                    <div class="row" style="min-height: 100vh !important;">
                        <div class="col-sm-11 col-md-11 col-lg-6 col-xs-11 m-auto">
                            <form action="sign-up" method="post">
                                @csrf
                                <div class="login-form">
                                <div class="text-center"><img src="admin/img/logo.png" alt="logo" class="w-25"></div>
                                    <h4 class="login-title">Register</h4>
                                    <div class="row">
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>First Name</label>
                                            <input class="mb-0" type="text" placeholder="First Name" name="first-name_txt">
                                            @error('first-name_txt') <p class="text-danger">{{$message}}</p> @enderror
                                        </div>
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Last Name</label>
                                            <input class="mb-0" type="text" placeholder="Last Name" name="last-name_txt">
                                            @error('last-name_txt') <p class="text-danger">{{$message}}</p> @enderror
                                        </div>
                                        <div class="col-md-12 mb-20">
                                            <label>Email</label>
                                            <input class="mb-0" type="email" placeholder="Email" name="email_txt">
                                            @error('email_txt') <p class="text-danger">{{$message}}</p> @enderror
                                        </div>
                                        <div class="col-md-12 mb-20">
                                            <label>Mobile</label>
                                            <input class="mb-0" type="tel" placeholder="Mobile" name="mobile_txt">
                                            @error('mobile_txt') <p class="text-danger">{{$message}}</p> @enderror
                                        </div>
                                        <div class="col-md-6 mb-20">
                                            <label>Password</label>
                                            <input class="mb-0" type="password" placeholder="Password" name="password_txt">
                                            @error('password_txt') <p class="text-danger">{{$message}}</p> @enderror
                                        </div>
                                        <div class="col-md-6 mb-20">
                                            <label>Confirm Password</label>
                                            <input class="mb-0" type="password" placeholder="Confirm Password" name="confirm-password_txt">
                                            @error('confirm-password_txt') <p class="text-danger">{{$message}}</p> @enderror
                                        </div>
                                        <div class="col-12">
                                            <button class="register-button mt-0">Register</button>
                                            <span class="float-right">Already have account <a href="{{asset('sign-in')}}">Login</a></span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Login Content Area End Here -->
        </div>
        <!-- Body Wrapper End Here -->
        <!-- jQuery-V1.12.4 -->
        <script src="{{asset('landing/js/vendor/jquery-1.12.4.min.js')}}"></script>
        <!-- Popper js -->
        <script src="{{asset('landing/js/vendor/popper.min.js')}}"></script>
        <!-- Bootstrap V4.1.3 Fremwork js -->
        <script src="{{asset('landing/js/bootstrap.min.js')}}"></script>
        <!-- Ajax Mail js -->
        <script src="{{asset('landing/js/ajax-mail.js')}}"></script>
        <!-- Meanmenu js -->
        <script src="{{asset('landing/js/jquery.meanmenu.min.js')}}"></script>
        <!-- Wow.min js -->
        <script src="{{asset('landing/js/wow.min.js')}}"></script>
        <!-- Slick Carousel js -->
        <script src="{{asset('landing/js/slick.min.js')}}"></script>
        <!-- Owl Carousel-2 js -->
        <script src="{{asset('landing/js/owl.carousel.min.js')}}"></script>
        <!-- Magnific popup js -->
        <script src="{{asset('landing/js/jquery.magnific-popup.min.js')}}"></script>
        <!-- Isotope js -->
        <script src="{{asset('landing/js/isotope.pkgd.min.js')}}"></script>
        <!-- Imagesloaded js -->
        <script src="{{asset('landing/js/imagesloaded.pkgd.min.js')}}"></script>
        <!-- Mixitup js -->
        <script src="{{asset('landing/js/jquery.mixitup.min.js')}}"></script>
        <!-- Countdown -->
        <script src="{{asset('landing/js/jquery.countdown.min.js')}}"></script>
        <!-- Counterup -->
        <script src="{{asset('landing/js/jquery.counterup.min.js')}}"></script>
        <!-- Waypoints -->
        <script src="{{asset('landing/js/waypoints.min.js')}}"></script>
        <!-- Barrating -->
        <script src="{{asset('landing/js/jquery.barrating.min.js')}}"></script>
        <!-- Jquery-ui -->
        <script src="{{asset('landing/js/jquery-ui.min.js')}}"></script>
        <!-- Venobox -->
        <script src="{{asset('landing/js/venobox.min.js')}}"></script>
        <!-- Nice Select js -->
        <script src="{{asset('landing/js/jquery.nice-select.min.js')}}"></script>
        <!-- ScrollUp js -->
        <script src="{{asset('landing/js/scrollUp.min.js')}}"></script>
        <!-- Main/Activator js -->
        <script src="{{asset('landing/js/main.js')}}"></script>
    </body>

<!-- login-register31:27-->
</html>
