<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CamBizs</title>

  <!-- PLUGINS CSS STYLE -->
  <link href="{{ asset('user/plugins/jquery-ui/jquery-ui.css') }}" rel="stylesheet">
  <link href="{{ asset('user/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="#" rel="stylesheet" id="bootstrap-rtl">
  <link href="{{ asset('user/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('user/plugins/trust-icons/style.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('user/plugins/rs-plugin/css/settings.css') }}" media="screen">
  <link rel="stylesheet" type="text/css" href="{{ asset('user/plugins/selectbox/select_option1.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('user/plugins/owl-carousel/owl.carousel.css') }}" media="screen">
  <link rel="stylesheet" type="text/css" href="{{ asset('user/plugins/isotope/jquery.fancybox.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('user/plugins/isotope/isotope.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('user/plugins/animate.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('user/plugins/wave/waves.min.css') }}">


  <!-- GOOGLE FONT -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville" rel="stylesheet">

  <!-- CUSTOM CSS -->
  <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">
  <link href="#" rel="stylesheet" id="rtl_css">
  <link href="{{ asset('user/css/default.css') }}" rel="stylesheet" id="option_color">

  <!-- FAVICON -->
  <link href="{{ asset('user/img/cambiz.jpg') }}" rel="shortcut icon">
{{-- 
  <style>
    /* Paste this css to your style sheet file or under head tag */
    /* This only works with JavaScript,
    if it's not present, don't show loader */
    .no-js #loader { display: none;  }
    .js #loader { display: block; position: absolute; left: 100px; top: 0; }
    .se-pre-con {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url(plugins/simple-pre-loader/images/loader-64x/Preloader_1.gif) center no-repeat #fff;
    }
    </style> --}}
  
  </head>
  
  <body class="body-wrapper">
    <div class="se-pre-con"></div>
    <div class="main-wrapper">

    @include('navigation.nav-top')

    @yield('content')


  <footer>
    <div class="footerBottom clearfix">
      <div class="container">
        <div class="footerBottom-inner">
          <div class="row">

            <div class="col-sm-6 col-xs-12">
              <div class="media">
                <a class="media-left" href="#">
                  <img src="{{ asset('user/img/cambiz.jpg') }}" alt="Image" class="img-responsive">
                </a>
                <div class="media-body">
                  <p>Nullam eget iaculis odio. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nam at tortor congue, elementum libero a, tincidunt urna.</p>
                  <p>Vivamus sodales sit amet nulla rhoncus pulvinar. Mauris faucibus justo tortor, cursus efficitur magna porta ac. Vivamus semper rutrum enim eget fringilla. </p>
                  <a target="_blank" href="#"></a>
                </div>
              </div>
            </div>
            <div class="col-sm-3 col-xs-12">
              <div class="footerTitle">
                <h4>New York office</h4>
              </div>
              <div class="footerInfo">
                <address>
                  <p>23 East 2nd Street, 1st Floor,<br>
                  New York, NY</p>
                  <span>154 564 2245</span>
                  <span>256 3541</span>
                  <a href="#">hello@example.com</a>
                </address>
              </div>
            </div>
            <div class="col-sm-3 col-xs-12">
              <div class="footerTitle">
                <h4>London office</h4>
              </div>
              <div class="footerInfo">
                <address>
                  <p>23 East 2nd Street, 1st Floor,<br>
                  New York, NY</p>
                  <span>154 564 2245</span>
                  <span>256 3541</span>
                  <a href="#">hello@example.com</a>
                </address>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyRight clearfix">
        <div class="row">
          <div class="col-sm-7 col-xs-12">
            <div class="copyRightText">
              <p>© 2024 Copyright </p>
            </div>
          </div>
          <div class="col-sm-5 col-xs-12">
            <ul class="list-inline">
              <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>

    </div>

    <div class="scrolling">
      <a href="#pageTop" class="backToTop" id="backToTop"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
    </div>

    <!-- CREATE ACCOUNT MODAL -->
  
    <script type="text/javascript" src="{{ asset('user/ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js') }}"></script>
    <script src="{{ asset('user/plugins/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('user/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('user/plugins/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('user/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('user/plugins/selectbox/jquery.selectbox-0.1.3.min.js') }}"></script>
    <script src="{{ asset('user/plugins/owl-carousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('user/plugins/appear/waypoints.min.js') }}"></script>
    <script src="{{ asset('user/plugins/appear/wow.min.js') }}"></script>
    <script src="{{ asset('user/plugins/counter-up/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('user/plugins/isotope/isotope.min.js') }}"></script>
    <script src="{{ asset('user/plugins/isotope/jquery.fancybox.pack.js') }}"></script>
    <script src="{{ asset('user/plugins/isotope/isotope-triger.js') }}"></script>
    <script src="{{ asset('user/plugins/countdown/jquery.syotimer.js') }}"></script>
    <script src="{{ asset('user/plugins/velocity/velocity.min.js') }}"></script>
    <script src="{{ asset('user/plugins/smoothscroll/SmoothScroll.min.js') }}"></script>
    <script src="{{ asset('user/plugins/google-custom-map/google-map.js') }}"></script>
    <script src="{{ asset('user/js/custom.js') }}"></script>
    <script>
    	// Wait for window load
    	// $(window).load(function() {
    	// 	// Animate loader off screen
    	// 	$(".se-pre-con").fadeOut("slow");;
    	// });
    </script>

  {{-- <link href="{{ asset('user/options/optionswitch.css') }}" rel="stylesheet">
<script src="{{ asset('user/options/optionswitcher.js') }}"></script> --}}

</body>


</html>
