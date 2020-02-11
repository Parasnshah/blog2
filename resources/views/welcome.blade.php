<!DOCTYPE html>
<html lang="en">
  <style>
      .text-danger{color: #ff0500 !important;font-weight: normal;}
  </style>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
     <!-- Site Metas -->
    <title>HostCloud - Responsive HTML5 Template</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{ asset('public/frontend/images/favicon.ico')}}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{ asset('public/frontend/images/apple-touch-icon.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('public/frontend/css/bootstrap.min.css')}}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('public/style.css')}}">

    <!-- Colors CSS -->
    <link rel="stylesheet" href="{{ asset('public/frontend/css/colors.css')}}">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="{{ asset('public/frontend/css/versions.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('public/frontend/css/responsive.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('public/frontend/css/custom.css')}}">
    <link rel="stylesheet" href="{{ asset('public/css/jquery_notification.css')}}">
    <link rel="stylesheet" href="{{ asset('public/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{ asset('public/css/font-awesome.min.css')}}">
    <!-- Modernizer for Portfolio -->
    <script src="{{ asset('public/frontend/js/modernizer.js')}}"></script>

 
</head>
<body class="host_version"> 


    <!-- Modal -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
        
            <div class="modal-header tit-up">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title set_title">Login</h4>
            </div>

            <div class="modal-body customer-box row">
                <div class="col-md-12">
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                           {{$errors->first()}}
                        </div>
                    @endif 
                    <ul class="nav nav-tabs">
                        <li class="active loginbtn"><a href="#Login" data-toggle="tab">Login</a></li>
                        <li class="registerbtn"><a href="#Registration" data-toggle="tab">Registration</a></li>
                    </ul>
                    
                 

                    <div class="alert alert-success" id="success_msg"  style="display: none;" ></div>

                    <div id="error_msg" class="text-danger" style="display: none;"></div>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="Login">
                        <form method="POST"  id="myform" autocomplete="off">
                        @csrf
                            <div class="form-group">
                                <div class="col-sm-12">
                                      <input id="email" type="text" class="form-control" name="email" autocomplete="off">
                                      <span>{{ $errors->first('email') }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input id="password" type="password" class="form-control" name="password"  autocomplete="off">
                                    <span>{{ $errors->first('password') }}</span>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-10">
                                    <input type="submit" name="submit" id="submit" value="Login" class="btn btn-light btn-radius btn-brd grd1">
                                    <a class="for-pwd" href="javascript:;">Forgot your password?</a>
                                </div>
                                @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                           {{$errors->first()}}
                        </div>
                    @endif 
                            </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="Registration">
                            <form method="post" id="register_info">
                             @csrf
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror email_info" name="email" value="{{ old('email') }}" placeholder="Email"  autocomplete="email">
                                     <span class="text-danger" id="error_user"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                     <input id="password" type="password" class="form-control @error('password') is-invalid @enderror pwd" name="password"  autocomplete="new-password" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                     <input id="password_confirmation" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password" placeholder="Confirm Password">
                                </div>
                            </div>
                            <div class="row">                           
                                <div class="col-sm-10">
                                   <input type="submit" name="submit" id="submit" class="btn btn-light btn-radius btn-brd grd1" value="Submit">
                                    <button type="button" class="btn btn-light btn-radius btn-brd grd1 closem">
                                        Cancel</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>

    <!-- LOADER -->
    <div id="preloader">
        <div class="loading">
            <div class="finger finger-1">
                <div class="finger-item">
                <span></span><i></i>
                </div>
            </div>
            <div class="finger finger-2">
                <div class="finger-item">
                <span></span><i></i>
                </div>
            </div>
            <div class="finger finger-3">
                <div class="finger-item">
                  <span></span><i></i>
                </div>
            </div>
            <div class="finger finger-4">
                <div class="finger-item">
                <span></span><i></i>
                </div>
            </div>
            <div class="last-finger">
                <div class="last-finger-item"><i></i></div>
            </div>
        </div>
    </div>
    <!-- END LOADER -->

    <header class="header header_style_01">
        <nav class="megamenu navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="{{ asset('public/frontend/images/logos/logo-hosting.png')}}" alt="image"></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a class="active" href="index.html">Home</a></li>
                        <li><a href="features.html">Features </a></li>
                        <li><a href="domain.html">Domain</a></li>
                        <li><a href="hosting.html">Hosting</a></li>
                        <li><a href="pricing.html">Pricing</a></li>
                        <li><a href="testimonials.html">Testimonials</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                    @guest
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="btn-light btn-radius btn-brd log" href="#" data-toggle="modal" data-target="#login"><i class="flaticon-padlock"></i> Customer Login</a></li>
                    </ul>
                     @else
                       <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Hello, {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                    </ul>
             @endguest  
                </div>
            </div>
        </nav>
    </header>
    
    <div id="bootstrap-touch-slider" class="carousel bs-slider fade  control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="false" >
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#bootstrap-touch-slider" data-slide-to="0" class="active"></li>
            <li data-target="#bootstrap-touch-slider" data-slide-to="1"></li>
            <li data-target="#bootstrap-touch-slider" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <div id="home" class="first-section" style="background-image:url('public/frontend/uploads/slider-01.jpg');">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 text-center">
                                <div class="big-tagline">
                                    <img src="{{ asset('public/frontend/images/logos/logo-hosting.png')}}" alt="image">
                                    <h2 data-animation="animated zoomInRight">Best <strong>Shared Hosting</strong> Company</h2>
                                    <p class="lead" data-animation="animated fadeInLeft">With Landigoo responsive landing page template, you can promote your all hosting, domain and email services. </p>
                                     <a data-scroll href="#pricing" class="btn btn-light btn-radius btn-brd effect-1 slide-btn" data-animation="animated fadeInLeft">View Plans</a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a data-scroll href="#overviews" class="btn btn-light btn-radius btn-brd effect-1 slide-btn" data-animation="animated fadeInRight">All Features</a>
                                </div>
                            </div>
                        </div><!-- end row -->            
                    </div><!-- end container -->
                </div><!-- end section -->
            </div>
            <div class="item">
                <div id="home" class="first-section" style="background-image:url('public/frontend/uploads/slider-02.jpg');">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 text-center">
                                <div class="big-tagline">
                                    <img src="{{ asset('public/frontend/images/logos/logo-hosting.png')}}" alt="image">
                                    <h2 data-animation="animated zoomInRight">Find the right <strong>Hosting</strong></h2>
                                    <p class="lead" data-animation="animated fadeInLeft">With Landigoo responsive landing page template, you can promote your all hosting, domain and email services. </p>
                                     <a data-scroll href="#pricing" class="btn btn-light btn-radius btn-brd effect-1 slide-btn" data-animation="animated fadeInLeft">View Plans</a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a data-scroll href="#overviews" class="btn btn-light btn-radius btn-brd effect-1 slide-btn" data-animation="animated fadeInRight">All Features</a>
                                </div>
                            </div>
                        </div><!-- end row -->            
                    </div><!-- end container -->
                </div><!-- end section -->
            </div>
            <div class="item">
                <div id="home" class="first-section" style="background-image:url('public/frontend/uploads/slider-03.jpg');">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 text-center">
                                <div class="big-tagline">
                                    <img src="{{ asset('public/frontend/images/logos/logo-hosting.png')}}" alt="image">
                                    <h2 data-animation="animated zoomInRight">Best <strong>VPS Servers</strong> Company</h2>
                                    <p class="lead" data-animation="animated fadeInLeft">1 IP included with each server (more on request to justification)
                                        Your Choice of any OS (CentOS, Windows, Debian, Fedora)
                                        FREE Reboots</p>
                                     <a data-scroll href="#pricing" class="btn btn-light btn-radius btn-brd effect-1 slide-btn" data-animation="animated fadeInLeft">View Plans</a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a data-scroll href="#overviews" class="btn btn-light btn-radius btn-brd effect-1 slide-btn" data-animation="animated fadeInRight">All Features</a>
                                </div>
                            </div>
                        </div><!-- end row -->            
                    </div><!-- end container -->
                </div><!-- end section -->
            </div>
            <!-- Left Control -->
            <a class="left carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="prev">
                <span class="fa fa-angle-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>

            <!-- Right Control -->
            <a class="right carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="next">
                <span class="fa fa-angle-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    
    <div id="overviews" class="section wb">
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 col-md-offset-2">
                    <h3>About</h3>
                    <p class="lead">Lorem Ipsum dolroin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem!</p>
                </div>
            </div><!-- end title -->
        
            <div class="row">
                <div class="col-md-6">
                    <div class="message-box">
                        <h4>2017 BEST WEB HOSTING COMPANY</h4>
                        <h2>Awards Winner Support Center</h2>
                        <p class="lead">Quisque eget nisl id nulla sagittis auctor quis id. Aliquam quis vehicula enim, non aliquam risus. Sed a tellus quis mi rhoncus dignissim.</p>

                        <p> Integer rutrum ligula eu dignissim laoreet. Pellentesque venenatis nibh sed tellus faucibus bibendum. Sed fermentum est vitae rhoncus molestie. Cum sociis natoque penatibus et magnis montes, nascetur ridiculus mus. Sed vitae rutrum neque. </p>

                        <a href="#services" data-scroll class="btn btn-light btn-radius btn-brd grd1 effect-1">Learn More</a>
                    </div><!-- end messagebox -->
                </div><!-- end col -->
                
                <div class="col-md-6">
                    <div class="post-media wow fadeIn">
                        <img src="{{ asset('public/frontend/uploads/about_02.jpg')}}" alt="" class="img-responsive img-rounded">
                        <a href="http://www.youtube.com/watch?v=nrJtHemSPW4" data-rel="prettyPhoto[gal]" class="playbutton"><i class="flaticon-play-button"></i></a>
                    </div><!-- end media -->
                </div><!-- end col -->
            </div><!-- end row -->


           
        </div><!-- end container -->
    </div><!-- end section -->

    <div id="domain" class="parallax section noover" data-stellar-background-ratio="0.7"
     style="background-image:url('public/frontend/uploads/parallax_11.jpg');">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-5 col-sm-12">
                    <div class="customwidget text-left">
                        <h1>Find Your Domain</h1>
                        <p>With our awesome domain name search form, you can search any domain names with tons of extensions.</p>
                        <ul class="list-inline">
                            <li><i class="fa fa-check"></i> 20k Domains Sold in 2017</li>
                            <li><i class="fa fa-check"></i> 4k Website Created</li>
                        </ul>
                        <!-- end list -->
                        <a href="#hosting" data-scroll class="btn btn-light grd1 effect-1 btn-radius btn-brd">Hosting Packages</a>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-md-7">
                    <form class="checkdomain form-inline">
                        <div class="checkdomain-wrapper">
                            <div class="form-group">
                                <label class="sr-only" for="domainnamehere">Domain name</label>
                                <input type="text" class="form-control" id="domainnamehere" placeholder="Enter domain name here..">
                                <button type="submit" class="btn btn-primary grd1"><i class="fa fa-search"></i></button>
                            </div>
                            <hr>
                            <div class="clearfix"></div>
                            <div class="checkbox checkbox-warning">
                                <input id="domaincom" type="checkbox" class="styled" checked>
                                <label for="domaincom">.com</label>
                            </div>
                            <div class="checkbox checkbox-warning">
                                <input id="domainnet" type="checkbox" class="styled" checked>
                                <label for="domainnet">.net</label>
                            </div>
                            <div class="checkbox checkbox-warning">
                                <input id="domainorg" type="checkbox" class="styled">
                                <label for="domainorg">.org</label>
                            </div>
                            <div class="checkbox checkbox-warning">
                                <input id="domaintv" type="checkbox" class="styled">
                                <label for="domaintv">.tv</label>
                            </div>
                            <div class="checkbox checkbox-warning">
                                <input id="domaininfo" type="checkbox" class="styled">
                                <label for="domaininfo">.info</label>
                            </div>
                        </div><!-- end checkdomain-wrapper -->
                    </form>
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

   
  

    <div id="support" class="section wb">
        <div class="container">
            <div class="section-title text-center">
                <h3>Need Help? Sure we are Online!</h3>
                <p class="lead">Let us give you more details about the special offer website you want us. Please fill out the form below. <br>We have million of website owners who happy to work with us!</p>
            </div><!-- end title -->

            <div class="row">
                <div class="col-md-12">
                    <div class="contact_form">
                        <div id="message"></div>
                        <form id="contactform" class="row" action="contact.php" name="contactform" method="post">
                            <fieldset class="row-fluid">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Your Email">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Your Phone">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label class="sr-only">Select Service</label>
                                    <select name="select_service" id="select_service" class="selectpicker form-control" data-style="btn-white">
                                        <option value="12">Select Package</option>
                                        <option value="Web Design">Web Hosting</option>
                                        <option value="Web Development">Shared Hosting</option>
                                        <option value="Graphic Design">Reseller Hosting</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <label class="sr-only">Select Country</label>
                                    <select name="select_price" id="select_price" class="selectpicker form-control" data-style="btn-white">
                                        <option value="India">India</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Holland">Holland</option>
                                        <option value="Germany">Germany</option>
                                    </select>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <textarea class="form-control" name="comments" id="comments" rows="6" placeholder="Give us more details.."></textarea>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                    <button type="submit" value="SEND" id="submit" class="btn btn-light btn-radius btn-brd grd1 btn-block">Get a Quote</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

    <div class="parallax section db parallax-off" style="background-image:url('public/frontend/uploads/parallax_02.jpg');">
        <div class="container">
            <div class="row logos">
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <a href="#"><img src="{{ asset('public/frontend/uploads/logo_01.png')}}" alt="" class="img-repsonsive"></a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <a href="#"><img src="{{ asset('public/frontend/uploads/logo_02.png')}}" alt="" class="img-repsonsive"></a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <a href="#"><img src="{{ asset('public/frontend/uploads/logo_03.png')}}" alt="" class="img-repsonsive"></a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <a href="#"><img src="{{ asset('public/frontend/uploads/logo_04.png')}}" alt="" class="img-repsonsive"></a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <a href="#"><img src="{{ asset('public/frontend/uploads/logo_05.png')}}" alt="" class="img-repsonsive"></a>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                    <a href="#"><img src="{{ asset('public/frontend/uploads/logo_06.png')}}" alt="" class="img-repsonsive"></a>
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

    <section class="section nopad cac text-center">
        <a href="#"><h3>Interesting our awesome web design services? Just drop an email to us and get quote for free!</h3></a>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <img src="{{ asset('public/frontend/images/logos/logo-hosting-light.png')}}" alt="">
                            <small>Web Hosting Template</small>
                        </div>
                        <p> Integer rutrum ligula eu dignissim laoreet. Pellentesque venenatis nibh sed tellus faucibus bibendum. Sed fermentum est vitae rhoncus molestie. Cum sociis natoque penatibus et magnis dis montes.</p>
                        <p>Sed fermentum est vitae rhoncus molestie. Cum sociis natoque penatibus et magnis dis montes.</p>
                    </div><!-- end clearfix -->
                </div><!-- end col -->

                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Information Link</h3>
                        </div>
                        <ul class="footer-links">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Pricing</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Faq</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->
                
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Contact Details</h3>
                        </div>

                        <ul class="footer-links">
                            <li><a href="mailto:#">info@yoursite.com</a></li>
                            <li><a href="#">www.yoursite.com</a></li>
                            <li>PO Box 16122 Collins Street West Victoria 8007 Australia</li>
                            <li>+61 3 8376 6284</li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->

                <div class="col-md-2 col-sm-2 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Social</h3>
                        </div>
                        <ul class="footer-links">
                            <li><a href="#"><i class="fa fa-facebook"></i> 22.543 Likes</a></li>
                            <li><a href="#"><i class="fa fa-github"></i> 128 Projects</a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i> 12.860 Followers</a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i> 3312 Shots</a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i>3331 Pins</a></li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </footer><!-- end footer -->

    <div class="copyrights">
        <div class="container">
            <div class="footer-distributed">
                <div class="footer-left">                   
                    <p class="footer-company-name">All Rights Reserved. &copy; 2018 <a href="#">HostCloud</a> Design By : <a href="https://html.design/">html design</a></p>
                </div>

                <div class="footer-right">
                    <form method="get" action="#">
                        <input placeholder="Subscribe our newsletter.." name="search">
                        <i class="fa fa-envelope-o"></i>
                    </form>
                </div>
            </div>
        </div><!-- end container -->
    </div><!-- end copyrights -->

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="{{ asset('public/frontend/js/all.js')}}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{ asset('public/frontend/js/custom.js')}}"></script>
    <script src="{{ asset('public/js/jquery_notification_v.1.js')}}"></script>

</body>
</html>

