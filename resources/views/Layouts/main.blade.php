<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Landing Page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/ub.png')}}">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/gijgo.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    @laravelPWA
</head>

<body>

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="header_wrap d-flex justify-content-between align-items-center">
                                <div class="header_left">
                                    <div class="logo">
                                        <a href="{{url('/')}}">
                                            <img src="{{asset('assets/img/logo.png')}}" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="header_right d-flex align-items-center">
                                    <div class="main-menu  d-none d-lg-block">
                                        <nav>
                                            <ul id="navigation">
                                                <li><a data-scroll-nav='1' href="#">Home</a></li>
                                                <li><a data-scroll-nav='2' href="#">Fakultas</a></li>
                                                <li><a data-scroll-nav='3' href="#">Fasilitas Ruangan</a></li>
                                                <li><a href="{{url('/login')}}">
                                                    <button type="button" class="btn btn-primary">
                                                        Masuk
                                                    </button>
                                                </a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    <!-- slider_area_start -->
    <div data-scroll-index='1' class="slider_area">
        <div class="slider_active owl-carousel">
            <!-- single_carouse -->
            <div class="single_slider  d-flex align-items-center slider_bg_1">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text ">
                                <h3>Boost up your skills <br>
                                    with a new way of <br>
                                    learning.</h3>
                                <a href="#" class="boxed-btn3">Get Start</a>
                                <a href="#" class="boxed-btn3">Take a tour</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ single_carouse -->
            <!-- single_carouse -->
            <div class="single_slider  d-flex align-items-center slider_bg_2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text ">
                                <h3>Boost up your skills <br>
                                    with a new way of <br>
                                    learning.</h3>
                                <a href="#" class="boxed-btn3">Get Start</a>
                                <a href="#" class="boxed-btn3">Take a tour</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ single_carouse -->
            <!-- single_carouse -->
            <div class="single_slider  d-flex align-items-center slider_bg_1">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text ">
                                <h3>Boost up your skills <br>
                                    with a new way of <br>
                                    learning.</h3>
                                <a href="#" class="boxed-btn3">Get Start</a>
                                <a href="#" class="boxed-btn3">Take a tour</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ single_carouse -->
        </div>
    </div>
    <!-- slider_area_end -->

    <!-- service_area_start  -->
    <div class="service_area gray_bg">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-lg-4 col-md-6">
                    <div class="single_service d-flex align-items-center ">
                        <div class="icon">
                            <i class="flaticon-school"></i>
                        </div>
                        <div class="service_info">
                            <h4>Scholarship</h4>
                            <p>Available</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_service d-flex align-items-center ">
                        <div class="icon">
                            <i class="flaticon-error"></i>
                        </div>
                        <div class="service_info">
                            <h4>Scholarship</h4>
                            <p>Available</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_service d-flex align-items-center ">
                        <div class="icon">
                            <i class="flaticon-book"></i>
                        </div>
                        <div class="service_info">
                            <h4>Scholarship</h4>
                            <p>Available</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ service_area_start  -->

    <!-- popular_program_area_start  -->
    <div data-scroll-nav='2' class="popular_program_area section__padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text-center">
                        <h3>Popular Program</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <nav class="custom_tabs text-center">
                        <div class="nav" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                            @foreach($fakultas->where('id',2) as $f)
                                {{ $f->nama_fakultas }}
                            @endforeach</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                            @foreach($fakultas->where('id',3) as $f)
                                {{ $f->nama_fakultas }}
                            @endforeach</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">
                            @foreach($fakultas->where('id',12) as $f)
                                {{ $f->nama_fakultas }}
                            @endforeach</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact2" role="tab" aria-controls="nav-contact" aria-selected="false">
                            @foreach($fakultas->where('id',14) as $f)
                                {{ $f->nama_fakultas }}
                            @endforeach</a>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row">
                        @foreach($jurusan->where('id_fakultas','2') as $j)
                        <div class="col-lg-4 col-md-6">
                            <div class="single__program">
                                <div class="program_thumb">
                                    <img src="{{asset('assets/img/program/1.png')}}" alt="">
                                </div>
                                <div class="program__content">
                                    <span>@foreach($fakultas->where('id',2) as $f)
                                        {{ $f->nama_fakultas }}
                                    @endforeach</span>
                                    <h4>{{$j->nama_jurusan}}</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut</p>
                                    <a href="#" class="boxed-btn5">Apply NOw</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="row">
                            @foreach($jurusan->where('id_fakultas','3') as $j)
                            <div class="col-lg-4 col-md-6">
                                <div class="single__program">
                                    <div class="program_thumb">
                                        <img src="{{asset('assets/img/program/3.png')}}" alt="">
                                    </div>
                                    <div class="program__content">
                                        <span>@foreach($fakultas->where('id',3) as $f)
                                            {{ $f->nama_fakultas }}
                                        @endforeach</span>
                                        <h4>{{$j->nama_jurusan}}</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut</p>
                                        <a href="#" class="boxed-btn5">Apply NOw</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="row">
                            @foreach($jurusan->where('id_fakultas','12') as $j)
                            <div class="col-lg-4 col-md-6">
                                <div class="single__program">
                                    <div class="program_thumb">
                                        <img src="{{asset('assets/img/program/2.png')}}" alt="">
                                    </div>
                                    <div class="program__content">
                                        <span>@foreach($fakultas->where('id',12) as $f)
                                            {{ $f->nama_fakultas }}
                                        @endforeach</span>
                                        <h4>{{$j->nama_jurusan}}</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut</p>
                                        <a href="#" class="boxed-btn5">Apply NOw</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                </div>
                <div class="tab-pane fade" id="nav-contact2" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="row">
                            @foreach($jurusan->where('id_fakultas','14') as $j)
                            <div class="col-lg-4 col-md-6">
                                <div class="single__program">
                                    <div class="program_thumb">
                                        <img src="{{asset('assets/img/program/3.png')}}" alt="">
                                    </div>
                                    <div class="program__content">
                                        <span>@foreach($fakultas->where('id',14) as $f)
                                            {{ $f->nama_fakultas }}
                                        @endforeach</span>
                                        <h4>{{$j->nama_jurusan}}</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut</p>
                                        <a href="#" class="boxed-btn5">Apply NOw</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="course_all_btn text-center">
                        <a href="Courses.html" class="boxed-btn4">View All course</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- popular_program_area_end -->

    <!-- latest_coures_area_start  -->
    <div data-scroll-nav='3' class="latest_coures_area">
        <div class="latest_coures_inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="coures_info">
                            <div class="section_title white_text">
                                <h3>Latest Courses</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod <br> tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim <br> veniam, quis nostrud exercitation.</p>
                            </div>
                            <div class="coures_wrap d-flex">
                                <div class="single_wrap">
                                    <div class="icon">
                                        <i class="flaticon-lab"></i>
                                    </div>
                                    <h4>Bachelor of <br>
                                        Graphic Design</h4>
                                        <p>Lorem ipsum dolor sit amet, sectetur adipiscing elit, sed do eiusmod tpor incididunt ut piscing vcs.</p>
                                        <a href="#" class="boxed-btn5">Apply NOw</a>
                                </div>
                                <div class="single_wrap">
                                    <div class="icon">
                                        <i class="flaticon-lab"></i>
                                    </div>
                                    <h4>Bachelor of <br>
                                        Graphic Design</h4>
                                        <p>Lorem ipsum dolor sit amet, sectetur adipiscing elit, sed do eiusmod tpor incididunt ut piscing vcs.</p>
                                        <a href="#" class="boxed-btn5">Apply NOw</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ latest_coures_area_end -->

    <!-- recent_event_area_strat  -->
    <div class="recent_event_area section__padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="section_title text-center mb-70">
                        <h3 class="mb-45">Recent Event</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="single_event d-flex align-items-center">
                        <div class="date text-center">
                            <span>02</span>
                            <p>Dec, 2020</p>
                        </div>
                        <div class="event_info">
                            <a href="event_details.html">
                                <h4>How to speake like a nativespeaker?</h4>
                             </a>
                            <p><span> <i class="flaticon-clock"></i> 10:30 pm</span> <span> <i class="flaticon-calendar"></i> 21Nov 2020 </span> <span> <i class="flaticon-placeholder"></i> AH Oditoriam</span> </p>
                        </div>
                    </div>
                    <div class="single_event d-flex align-items-center">
                        <div class="date text-center">
                            <span>03</span>
                            <p>Dec, 2020</p>
                        </div>
                        <div class="event_info">
                            <a href="event_details.html">
                                <h4>How to speake like a nativespeaker?</h4>
                             </a>
                            <p><span> <i class="flaticon-clock"></i> 10:30 pm</span> <span> <i class="flaticon-calendar"></i> 21Nov 2020 </span> <span> <i class="flaticon-placeholder"></i> AH Oditoriam</span> </p>
                        </div>
                    </div>
                    <div class="single_event d-flex align-items-center">
                        <div class="date text-center">
                            <span>10</span>
                            <p>Dec, 2020</p>
                        </div>
                        <div class="event_info">
                            <a href="event_details.html">
                                <h4>How to speake like a nativespeaker?</h4>
                             </a>
                            <p><span> <i class="flaticon-clock"></i> 10:30 pm</span> <span> <i class="flaticon-calendar"></i> 21Nov 2020 </span> <span> <i class="flaticon-placeholder"></i> AH Oditoriam</span> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- recent_event_area_end  -->

    <!-- latest_coures_area_start  -->
    <div class="admission_area">
        <div class="admission_inner">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-lg-7">
                        <div class="admission_form">
                            <h3>Apply for Admission</h3>
                            <form action="#">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="single_input">
                                            <input type="text" placeholder="First Name" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single_input">
                                            <input type="text" placeholder="Last Name" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single_input">
                                            <input type="text" placeholder="Phone Number" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single_input">
                                            <input type="text" placeholder="Email Address" >
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single_input">
                                            <textarea cols="30" placeholder="Write an Application" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="apply_btn">
                                            <button class="boxed-btn3" type="submit">Apply Now</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ latest_coures_area_end -->


    <!-- recent_news_area_start  -->
    <div class="recent_news_area section__padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="section_title text-center mb-70">
                        <h3 class="mb-45">Recent News</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="single__news">
                        <div class="thumb">
                            <a href="single-blog.html">
                                <img src="{{asset('assets/img/news/1.png')}}" alt="">
                            </a>
                            <span class="badge">Group Study</span>
                        </div>
                        <div class="news_info">
                            <a href="single-blog.html">
                                <h4>Those Other College Expenses You
                                    Aren’t Thinking About</h4>
                            </a>
                            <p class="d-flex align-items-center"> <span><i class="flaticon-calendar-1"></i> May 10, 2020</span> 
                            
                            <span> <i class="flaticon-comment"></i> 01 comments</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="single__news">
                        <div class="thumb">
                            <a href="single-blog.html">
                                <img src="{{asset('assets/img/news/2.png')}}" alt="">
                            </a>
                            <span class="badge bandge_2">Hall Life</span>
                        </div>
                        <div class="news_info">
                            <a href="single-blog.html">
                                <h4>Those Other College Expenses You
                                    Aren’t Thinking About</h4>
                            </a>
                            <p class="d-flex align-items-center"> <span><i class="flaticon-calendar-1"></i> May 10, 2020</span> 
                            
                            <span> <i class="flaticon-comment"></i> 01 comments</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- recent_news_area_end  -->

    <!-- footer start -->
    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="newsLetter_wrap">
                    <div class="row justify-content-between">
                        <div class="col-md-7">
                            <div class="footer_widget">
                                <h3 class="footer_title">
                                    Stay Updated
                                </h3>
                                <form action="#" class="newsletter_form">
                                    <input type="text" placeholder="Email Address">
                                    <button type="submit">Subscribe Now</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-5">
                            <div class="footer_widget">
                                <h3 class="footer_title">
                                    Stay Updated
                                </h3>
                                <div class="socail_links">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <i class="ti-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-google-plus"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                About Us
                            </h3>
                            <ul>
                                <li><a href="#">Online Learning</a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">Press Center</a></li>
                                <li><a href="#">Become an Instructor</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Campus
                            </h3>
                            <ul>
                                <li><a href="#">Our Plans</a></li>
                                <li><a href="#">Free Trial</a></li>
                                <li><a href="#">Academic Solutions</a></li>
                                <li><a href="#">Business Solutions</a></li>
                                <li><a href="#">Government Solutions</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Study
                            </h3>
                            <ul>
                                <li><a href="#">Admissions Policy</a></li>
                                <li><a href="#">Getting Started</a></li>
                                <li><a href="#">Visa Information</a></li>
                                <li><a href="#">Tuition Calculator</a></li>
                                <li><a href="#">Request Information</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Support
                            </h3>
                            <ul>
                                <li><a href="#">Support</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">System Requirements</a></li>
                                <li><a href="#">Register Activation Key</a></li>
                                <li><a href="#">Site feedback</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end  -->


    <!-- JS here -->
    <script src="{{asset('assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/js/ajax-form.js')}}"></script>
    <script src="{{asset('assets/js/waypoints.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/js/scrollIt.js')}}"></script>
    <script src="{{asset('assets/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('assets/js/wow.min.js')}}"></script>
    <script src="{{asset('assets/js/nice-select.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.slicknav.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins.js')}}"></script>
    <script src="{{asset('assets/js/gijgo.min.js')}}"></script>

    <!--contact js-->
    <script src="{{asset('assets/js/contact.js')}}"></script>
    <script src="{{asset('assets/js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.form.js')}}"></script>
    <script src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/js/mail-script.js')}}"></script>

    <script src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>