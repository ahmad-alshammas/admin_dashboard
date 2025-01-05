<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{asset('user_side/img/favicon.png')}}">
    <title>Azzam Academy</title>
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    @extends('user_side.inc.bootstrap')
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu single_page_menu">
        @include('user_Side.inc.header')
    </header>
    <!-- Header part end-->

    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>About Us</h2>
                            <p>Home<span>/</span>About Us</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <div class="container text-center mt-5">  
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

                    
                </div>
                <div class="col-md-7 col-lg-7">
                    <div class="learning_img">
                        <img src="{{ asset('user_side/img/learning_img.svg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>




    <!-- footer part start-->
        @extends('user_side.inc.footer')
    <!-- footer part end-->

    <!-- jquery plugins here-->
    @extends('user_side.inc.jquery')
</body>

</html>