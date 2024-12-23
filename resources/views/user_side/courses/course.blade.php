<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Etrain</title>
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
                            <h2>Our Courses</h2>
                            <p>Home<span>/</span>Courses</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--::review_part start::-->
    <section class="special_cource padding_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <input type="text" id="searchInput" class="form-control" placeholder="Search for courses..." onkeyup="filterCourses()">
                </div>
                <div class="col-xl-5">
                    <div class="section_tittle text-center">
                        
                        <h2>Courses</h2>


                    </div>
                </div>
            </div>
            <div class="row" id="coursesContainer">
                <p id="noResultsMessage" style="display: none; text-align: center; color: red; font-size: xx-large;">No courses found.</p>

                @foreach($courses as $course)
                <div class="col-sm-6 col-lg-4 course-card" data-title="{{ strtolower($course->title) }}">
                    <div class="single_special_cource">
                        <img src="{{ asset($course->image ?? 'default-image.png') }}" class="special_img" alt="{{ $course->title }}">
                        <div class="special_cource_text">
                            <a href="#" class="btn_4">{{ $course->category->name ?? 'No Category' }}</a>
                            <h4>${{ $course->price }}</h4>
                            <a href="{{ route('course_detail', $course->id) }}">
                                <h3>{{ $course->title }}</h3>
                            </a>
                            <div class="author_info">
                                <div class="author_info_text">
                                    <p>Conduct by:</p>
                                    <h5 class="d-inline"><a href="#">{{ $course->instructor->name ?? 'Unknown' }}</a></h5>
                                    <a href="#" class="text-danger d-inline" id="like-{{ $course->id }}" onclick="addToFavorites({{ $course->id }})">
                                        <i class="fa-solid fa-heart fa-lg" id="heart-icon-{{ $course->id }}" style="color: gray; transition: color 0.3s;"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            
        </div>
    </section>
    <!--::blog_part end::-->

    <!--::review_part start::-->
    <section class="testimonial_part section_padding">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="section_tittle text-center">
                        <p>tesimonials</p>
                        <h2>Happy Students</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="textimonial_iner owl-carousel">
                        <div class="testimonial_slider">
                            <div class="row">
                                <div class="col-lg-8 col-xl-4 col-sm-8 align-self-center">
                                    <div class="testimonial_slider_text">
                                        <p>Behold place was a multiply creeping creature his domin to thiren open void
                                            hath herb divided divide creepeth living shall i call beginning
                                            third sea itself set</p>
                                        <h4>Michel Hashale</h4>
                                        <h5> Sr. Web designer</h5>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-2 col-sm-4">
                                    <div class="testimonial_slider_img">
                                        <img src="img/testimonial_img_1.png" alt="#">
                                    </div>
                                </div>
                                <div class="col-xl-4 d-none d-xl-block">
                                    <div class="testimonial_slider_text">
                                        <p>Behold place was a multiply creeping creature his domin to thiren open void
                                            hath herb divided divide creepeth living shall i call beginning
                                            third sea itself set</p>
                                        <h4>Michel Hashale</h4>
                                        <h5> Sr. Web designer</h5>
                                    </div>
                                </div>
                                <div class="col-xl-2 d-none d-xl-block">
                                    <div class="testimonial_slider_img">
                                        <img src="img/testimonial_img_1.png" alt="#">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial_slider">
                            <div class="row">
                                <div class="col-lg-8 col-xl-4 col-sm-8 align-self-center">
                                    <div class="testimonial_slider_text">
                                        <p>Behold place was a multiply creeping creature his domin to thiren open void
                                            hath herb divided divide creepeth living shall i call beginning
                                            third sea itself set</p>
                                        <h4>Michel Hashale</h4>
                                        <h5> Sr. Web designer</h5>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-2 col-sm-4">
                                    <div class="testimonial_slider_img">
                                        <img src="img/testimonial_img_1.png" alt="#">
                                    </div>
                                </div>
                                <div class="col-xl-4 d-none d-xl-block">
                                    <div class="testimonial_slider_text">
                                        <p>Behold place was a multiply creeping creature his domin to thiren open void
                                            hath herb divided divide creepeth living shall i call beginning
                                            third sea itself set</p>
                                        <h4>Michel Hashale</h4>
                                        <h5> Sr. Web designer</h5>
                                    </div>
                                </div>
                                <div class="col-xl-2 d-none d-xl-block">
                                    <div class="testimonial_slider_img">
                                        <img src="img/testimonial_img_1.png" alt="#">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial_slider">
                            <div class="row">
                                <div class="col-lg-8 col-xl-4 col-sm-8 align-self-center">
                                    <div class="testimonial_slider_text">
                                        <p>Behold place was a multiply creeping creature his domin to thiren open void
                                            hath herb divided divide creepeth living shall i call beginning
                                            third sea itself set</p>
                                        <h4>Michel Hashale</h4>
                                        <h5> Sr. Web designer</h5>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-2 col-sm-4">
                                    <div class="testimonial_slider_img">
                                        <img src="img/testimonial_img_1.png" alt="#">
                                    </div>
                                </div>
                                <div class="col-xl-4 d-none d-xl-block">
                                    <div class="testimonial_slider_text">
                                        <p>Behold place was a multiply creeping creature his domin to thiren open void
                                            hath herb divided divide creepeth living shall i call beginning
                                            third sea itself set</p>
                                        <h4>Michel Hashale</h4>
                                        <h5> Sr. Web designer</h5>
                                    </div>
                                </div>
                                <div class="col-xl-2 d-none d-xl-block">
                                    <div class="testimonial_slider_img">
                                        <img src="img/testimonial_img_1.png" alt="#">
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

    @include('user_side.inc.footer')
    <!-- footer part end-->

    <!-- jquery plugins here-->
    @extends('user_side.inc.jquery')

    <script>
        function filterCourses() {
    const searchInput = document.getElementById('searchInput').value.toLowerCase();
    const courses = document.querySelectorAll('.course-card');
    let hasResults = false;

    courses.forEach(course => {
        const title = course.getAttribute('data-title');
        if (title.includes(searchInput)) {
            course.style.display = 'block';
            hasResults = true;
        } else {
            course.style.display = 'none';
        }
    });

    // عرض أو إخفاء رسالة "لا توجد نتائج"
    const noResultsMessage = document.getElementById('noResultsMessage');
    noResultsMessage.style.display = hasResults ? 'none' : 'block';
}

    </script>
    

    <script>
        function addToFavorites(courseId) {
            // تغيير اللون إلى الأحمر
            var heartIcon = document.getElementById('heart-icon-' + courseId);
            heartIcon.style.color = 'red';
            
            // إرسال المستخدم إلى صفحة المفضلة
            window.location.href = "/favorites";  // تأكد من أن الرابط صحيح
        }
    </script>
</body>

</html>