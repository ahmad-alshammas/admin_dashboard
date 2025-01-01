<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Azzam Academy</title>
    <link rel="icon" href="{{asset('user_side/img/favicon.png')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- bootstrap -->
    @include('user_side.inc.bootstrap')

</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
    @include('user_side.inc.header')
    </header>
    <!-- Header part end-->

    

    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-xl-6">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h5>My name is ahmad Azzam</h5>
                            <h1>Master Web Development with Ease</h1>
                            <p>Explore high-quality, free web development courses on Azzam Academy and build your digital future with confidence.</p>
                            <a href="{{'/courses'}}" class="btn_1">Get Started </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->

    <!-- feature_part start-->
    <div class="container text-center">  
        <h2>Why Choose Azzam Academy?</h2>
        <p>Set have great you male grass yielding an yielding first their you're
            have called the abundantly fruit were man </p>
        
    </div>
    <section class="feature_part">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="fa-solid fa-code"></i></span>
                            <h4>Comprehensive Courses</h4>
                            <p>Learn both Front-End and Back-End development.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><i class="fa-solid fa-hand-holding-dollar"></i></span>
                            <h4>100% Free</h4>
                            <p> All courses are completely free</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part single_feature_part_2">
                            <span class="single_service_icon style_icon"><i class="fa-solid fa-play"></i></span>
                            <h4>High-Quality</h4>
                            <p>Professionally crafted for the best learning experience.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part single_feature_part_2">
                            <span class="single_service_icon style_icon"><i class="fa-solid fa-chalkboard-user"></i></span>
                            <h4>Valuable and Practical Lessons</h4>
                            <p>Our courses focus on practical skills to prepare you confidently for the job market.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- upcoming_event part start-->

    <!-- learning part start-->
    <section class="learning_part">
        <div class="container">
            <div class="row align-items-sm-center align-items-lg-stretch">
                
                <div class="col-md-5 col-lg-5">
                    <div class="learning_member_text">
                        <h5>About us</h5>
                        <h2>Empowering Learners, Building Futures</h2>
                        <p>At Azzam Academy, we are dedicated to providing high-quality web development education for everyone. Our platform offers free, comprehensive courses in both front-end and back-end development, designed to help you acquire practical skills that are essential in the tech industry. Whether you're starting your web development journey or advancing your expertise, we are here to guide you every step of the way.

                        </p>
                        
                        <a href="#" class="btn_1">Read More</a>
                    </div>

                    <div class="col-md-7 col-lg-7">
                        <div class="learning_img">
                            <img src="{{ asset('user_side/img/learning_img.svg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="special_cource padding_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="section_tittle text-center">
                        <p>popular courses</p>
                        <h2>Special Courses</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-4">
                    <div class="single_special_cource">
                        <img src="img/special_cource_1.png" class="special_img" alt="">
                        <div class="special_cource_text">
                            <a href="course-details.html" class="btn_4">Web Development</a>
                            <h4>$130.00</h4>
                            <a href="course-details.html"><h3>Web Development</h3></a>
                            <p>Which whose darkness saying were life unto fish wherein all fish of together called</p>
                            <div class="author_info">
                                <div class="author_img">
                                    <img src="img/author/author_1.png" alt="">
                                    <div class="author_info_text">
                                        <p>Conduct by:</p>
                                        <h5><a href="#">James Well</a></h5>
                                    </div>
                                </div>
                                <div class="author_rating">
                                    <div class="rating">
                                        <a href="#"><img src="img/icon/color_star.svg" alt=""></a>
                                        <a href="#"><img src="img/icon/color_star.svg" alt=""></a>
                                        <a href="#"><img src="img/icon/color_star.svg" alt=""></a>
                                        <a href="#"><img src="img/icon/color_star.svg" alt=""></a>
                                        <a href="#"><img src="img/icon/star.svg" alt=""></a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="single_special_cource">
                        <img src="img/special_cource_2.png" class="special_img" alt="">
                        <div class="special_cource_text">
                            <a href="course-details.html" class="btn_4">design</a>
                            <h4>$160.00</h4>
                            <a href="course-details.html"> <h3>Web UX/UI Design </h3></a>
                            <p>Which whose darkness saying were life unto fish wherein all fish of together called</p>
                            <div class="author_info">
                                <div class="author_img">
                                    <img src="img/author/author_2.png" alt="">
                                    <div class="author_info_text">
                                        <p>Conduct by:</p>
                                        <h5><a href="#">James Well</a></h5>
                                    </div>
                                </div>
                                <div class="author_rating">
                                    <div class="rating">
                                        <a href="#"><img src="img/icon/color_star.svg" alt=""></a>
                                        <a href="#"><img src="img/icon/color_star.svg" alt=""></a>
                                        <a href="#"><img src="img/icon/color_star.svg" alt=""></a>
                                        <a href="#"><img src="img/icon/color_star.svg" alt=""></a>
                                        <a href="#"><img src="img/icon/star.svg" alt=""></a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="single_special_cource">
                        <img src="img/special_cource_3.png" class="special_img" alt="">
                        <div class="special_cource_text">
                            <a href="course-details.html" class="btn_4">Wordpress</a>
                            <h4>$140.00</h4>
                            <a href="course-details.html">  <h3>Wordpress Development</h3> </a> 
                            <p>Which whose darkness saying were life unto fish wherein all fish of together called</p>
                            <div class="author_info">
                                <div class="author_img">
                                    <img src="img/author/author_3.png" alt="">
                                    <div class="author_info_text">
                                        <p>Conduct by:</p>
                                        <h5><a href="#">James Well</a></h5>
                                    </div>
                                </div>
                                <div class="author_rating">
                                    <div class="rating">
                                        <a href="#"><img src="img/icon/color_star.svg" alt=""></a>
                                        <a href="#"><img src="img/icon/color_star.svg" alt=""></a>
                                        <a href="#"><img src="img/icon/color_star.svg" alt=""></a>
                                        <a href="#"><img src="img/icon/color_star.svg" alt=""></a>
                                        <a href="#"><img src="img/icon/star.svg" alt=""></a>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::blog_part end::-->

    <!-- learning part start-->
    <section class="advance_feature learning_part">
        <div class="container">
            <div class="row align-items-sm-center align-items-xl-stretch">
                <div class="col-md-6 col-lg-6">
                    <div class="learning_member_text">
                        <h5>Advance feature</h5>
                        <h2>Our Advance Educator
                            Learning System</h2>
                        <p>Fifth saying upon divide divide rule for deep their female all hath brind mid Days
                            and beast greater grass signs abundantly have greater also use over face earth
                            days years under brought moveth she star</p>
                        <div class="row">
                            <div class="col-sm-6 col-md-12 col-lg-6">
                                <div class="learning_member_text_iner">
                                    <span class="ti-pencil-alt"></span>
                                    <h4>Learn Anywhere</h4>
                                    <p>There earth face earth behold she star so made void two given and also our</p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-12 col-lg-6">
                                <div class="learning_member_text_iner">
                                    <span class="ti-stamp"></span>
                                    <h4>Expert Teacher</h4>
                                    <p>There earth face earth behold she star so made void two given and also our</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="learning_img">
                        <img src="img/advance_feature_img.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- learning part end-->

    <!-- footer part start-->
        @include('user_side.inc.footer');
    <!-- footer part end-->

    <!-- jquery plugins here-->
    @extends('user_Side.inc.jquery')
</body>

</html>