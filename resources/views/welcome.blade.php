@extends('navigation.master')

@section('content')
    <!-- MAIN SLIDER -->
    <section class="main-slider" data-loop="true" data-autoplay="true" data-interval="7000">
        <div class="inner">
            <div class="slide" style="background-image: url('{{ asset('user/img/home/slider1.jpg') }}');">

                <div class="container text-center">
                    <div class="slide-inner1">
                        <span class="h3 from-bottom">A Complete Solution</span><br>
                        <span class="h1 from-bottom">Lawyer </span><br>
                        <span class="h4 from-bottom">This is a Professional HTML Template for Attorney & Lawyer. Modern,
                            function and easy to customize. Place your logo, change color and you are ready to
                            go.</span><br>
                        <a target="_blank" href="#" class="btn btn-border waves-effect waves-light scale-up">View
                            Details</a>
                    </div>
                </div>
            </div><!-- .slide -->

            <div class="slide" style="background-image: url('{{ asset('user/img/home/slider2.jpg') }}');">
                <div class="container">
                    <div class="slide-inner2 common-inner">
                        <span class="h3 from-left">Legal Solution</span><br>
                        <span class="h2 from-right delay-1">Lawyer</span><br>
                        <span class="h4 from-bottom delay-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                            do
                            eiusmod tempor incididunt ut labore aliqua. veniam.</span><br>
                    </div>
                </div>
            </div><!-- .slide -->

            <div class="slide" style="background-image: url('{{ asset('user/img/home/slider3.jpg') }}');">
                <div class="container">
                    <div class="common-inner slide-inner3">
                        <span class="h3 scale-up">A Certified</span><br>
                        <span class="h2 scale-up delay-1">Family Lawyer</span><br>
                        <span class="h4 scale-up delay-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                            eiusmod tempor incididunt ut labore aliqua. veniam.</span><br>
                    </div>
                </div>
            </div><!-- .slide -->
        </div><!-- .inner -->
    </section><!-- .hero-slider -->


    <!-- BANNER BOTTOM -->
    <section class="banner-bottom">
        <div class="container">
            <div class="banner-bottom-inner">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="media colContent">
                            <span class="media-left">
                                <i class="icon-avatar-male"></i>
                            </span>
                            <div class="media-body">
                                <h3 class="media-heading">top Solicitors</h3>
                                <p>Lorem ipsum dolor sit amet, consec tetur adipisicing elit, </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="media colContent">
                            <span class="media-left">
                                <i class="icon-lawyer-hammer"></i>
                            </span>
                            <div class="media-body">
                                <h3 class="media-heading">95% Successfull</h3>
                                <p>Incididunt ut labore et dolore magna aliqua ut enim ad minim veniam.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="media colContent">
                            <span class="media-left">
                                <i class="icon-star-badge"></i>
                            </span>
                            <div class="media-body">
                                <h3 class="media-heading color-1">top law firm</h3>
                                <p>Consectetur adipisicing elit, sed do eius mod tempor incididunt.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ABOUT SECTION -->
    <section class="commonSection clearfix whiteSection padding-top about-section">
        <div class="container">

            <div class="sectionTitle text-center">
                <h2>Welcome to CamBizs Solicistor</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="lawInfo">
                        <span>wellcome</span>
                        <h2>CamBizs Solicitor</h2>
                        <p class="highlight">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots
                            in a piece of classical Latin.</p>
                        <p>More obscure Latin words, consectetur, from a Lorem Ipsum passage, </p>
                        <ul class="list-unstyled">
                            <li><i class="fa fa-check" aria-hidden="true"></i> Vestibulum iaculis quam ac libero</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i>Risus fringilla, aliquet lacus vel suscipit
                                lorem.</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Amet risus fringilla,aliquet lacus vel.</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Etiam suscipit velit et tellus bibendum.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="info-img">
                        <img src="{{ asset('user/img/home/info-img.jpg') }}" alt="image">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="progress-wrapper">
                        <h3>We are making progress</h3>
                        @foreach ($practiceAreas->take(5) as $data)
                            <div class="progress-title">{{ ucwords($data->name) }}</div>
                            <div class="progress-bar-inner">
                                <div class="progress-bar-container title-up small color">
                                    <div class="progress-bar wow fadeInLeft" data-wow-delay="100ms" data-percent="75"
                                        data-delay="0" data-type="%">
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

        </div>
    </section>


    <!-- PRACTICE SECTION -->
    <section class="commonSection clearfix whiteSection gallery-section">
        <div class="container">

            <div class="sectionTitle text-center">
                <h2>our practice areas</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
                </p>
            </div>

            <div class="row">
                @foreach ($practiceAreas->shuffle()->take(9) as $data)
                    <div class="col-sm-4">
                        <article class="gallery-img text-center">
                            <figure>
                                <img src="{{ asset('user/img/home/g-img1.jpg') }}" alt="Image" class="img-responsive">
                                <div class="overlay">
                                    <div class="overlayInfo">
                                        <i class="icon-avatar-family"></i>
                                        <h4><a href="practice-detailV1.html">{{ ucwords($data->name) }}</a></h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                            incididunt ut labore.</p>
                                        <a href="{{ route('practice.detail', $data->name) }}" class="btn btn-border">learn
                                            more</a>
                                    </div>
                                </div>
                            </figure>
                        </article>
                    </div>
                @endforeach

            </div>

            <div class="bottom-button text-center">
                <a href="{{ route('practice') }}" class="btn btn-secondary">View all</a>
            </div>

        </div>
    </section>


    <!--PROCESS SECTION -->
    <section class="clearfix whiteSection process-section">
        <div class="container">
            <div class="process-content border-top">

                <div class="sectionTitle text-center">
                    <h2>how it works?</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                        et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        aliquip.</p>
                </div>

                <div class="row">
                    <div class="col-sm-4 text-center">
                        <div class="box">
                            <div class="box-inner border-all">
                                <i class="icon-note" aria-hidden="true"></i>
                                <h4>Request Quote</h4>
                                <p>Send us your request</p>
                                <a href="#" class="btn btn-secondary">Send request</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 text-center">
                        <div class="box">
                            <div class="box-inner border-all">
                                <i class="icon-magnifiying-glass" aria-hidden="true"></i>
                                <h4>Investigation</h4>
                                <p>We will investigate about your case</p>
                                <a href="#" class="btn btn-secondary">Read more</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 text-center">
                        <div class="box">
                            <div class="box-inner border-all">
                                <i class="icon-handcuffs" aria-hidden="true"></i>
                                <h4>Case Fight</h4>
                                <p>We will fight your case in cort</p>
                                <a href="#" class="btn btn-secondary">See results</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- TEAM SECTION -->
    <section class="commonSection clearfix whiteSection teamSection">
        <div class="container">

            <div class="sectionTitle text-center">
                <h2>our Solicitors</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
                </p>
            </div>
            <div class="row">
                <div class="col-sm-3 col-xs-12">
                    <div class="teamContent text-center">
                        <div class="teamImage">
                            <img src="{{ asset('user/img/home/team4.jpg') }}" alt="img">
                            <div class="overlay">
                                <a href="attorney-profile.html"></a>
                            </div>
                        </div>
                        <div class="teamInfo">
                            <h3><a href="attorney-profile.html">Mark Brown</a></h3>
                            <p>Lawyer &amp; ceo</p>
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

                <div class="col-sm-3 col-xs-12">
                    <div class="teamContent text-center">
                        <div class="teamImage">
                            <img src="{{ asset('user/img/home/team1.jpg') }}" alt="img">
                            <div class="overlay">
                                <a href="attorney-profile.html"></a>
                            </div>
                        </div>
                        <div class="teamInfo">
                            <h3><a href="attorney-profile.html">Amanda Stone</a></h3>
                            <p>Lawyer &amp; ceo</p>
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

                <div class="col-sm-3 col-xs-12">
                    <div class="teamContent text-center">
                        <div class="teamImage">
                            <img src="{{ asset('user/img/home/team2.jpg') }}" alt="img">
                            <div class="overlay">
                                <a href="attorney-profile.html"></a>
                            </div>
                        </div>
                        <div class="teamInfo">
                            <h3><a href="attorney-profile.html">Mark Brown</a></h3>
                            <p>Lawyer &amp; ceo</p>
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

                <div class="col-sm-3 col-xs-12">
                    <div class="teamContent text-center">
                        <div class="teamImage">
                            <img src="{{ asset('user/img/home/team3.jpg') }}" alt="img">
                            <div class="overlay">
                                <a href="attorney-profile.html"></a>
                            </div>
                        </div>
                        <div class="teamInfo">
                            <h3><a href="attorney-profile.html">Amanda Stone</a></h3>
                            <p>Lawyer &amp; ceo</p>
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

        </div>
    </section>
@endsection
