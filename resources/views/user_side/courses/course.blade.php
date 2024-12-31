<!-- في صفحة الكورسات -->
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Etrain</title>
    <link rel="icon" href="img/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Bootstrap CSS -->
    @extends('user_side.inc.bootstrap')
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <!--::header part start::-->
    <header class="main_menu single_page_menu">
        @include('user_side.inc.header')
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
    <!-- breadcrumb end-->

    <!--::course part start::-->
    <section class="special_cource padding_top">
        <div class="container">
            <div class="row justify-content-center my-4">
                <div class="col-md-12 text-center">
                    <h5>Select Category</h5>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="categoryFilter" id="allCategories" value="all" checked onclick="filterByCategory('all')">
                        <label class="form-check-label" for="allCategories">All</label>
                    </div>
                    @foreach($categories as $category)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="categoryFilter" id="category-{{ $category->id }}" value="{{ strtolower($category->name) }}" onclick="filterByCategory('{{ strtolower($category->name) }}')">
                        <label class="form-check-label" for="category-{{ $category->id }}">{{ $category->name }}</label>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-6">
                    <input type="text" id="searchInput" class="form-control" placeholder="Search for courses..." onkeyup="filterCourses()">
                </div>
            </div>

            <div class="row" id="coursesContainer">
                <p id="noResultsMessage" style="display: none; text-align: center; color: red; font-size: xx-large;">No courses found.</p>
                @foreach($courses as $course)
                <div class="col-sm-6 col-lg-4 course-card" data-title="{{ strtolower($course->title) }}" data-category="{{ strtolower($course->category->name ?? 'no category') }}">
                    <div class="single_special_cource">
                        <img src="{{ asset($course->image ?? 'default-image.png') }}" class="special_img" alt="{{ $course->title }}">
                        <div class="special_cource_text">
                            <a href="javascript:void(0);" class="btn_4 category-btn" onclick="filterByCategory('{{ strtolower($course->category->name ?? 'no category') }}')">
                                {{ $course->category->name ?? 'No Category' }}
                            </a>
                            <h4>${{ $course->price }}</h4>
                            <a href="{{ route('course_detail', $course->id) }}">
                                <h3>{{ $course->title }}</h3>
                            </a>
                            <div class="author_info">
                                <div class="author_info_text">
                                    <p>Conduct by:</p>
                                    <h5 class="d-inline"><a href="#">{{ $course->instructor->name ?? 'Unknown' }}</a></h5>
                                </div>
                            </div>

                            <!-- أيقونة القلب لإضافة الكورس إلى المفضلة -->
                            <!-- أيقونة القلب لإضافة الكورس إلى المفضلة -->
                        <div class="favorite-icon">
                            @if(auth()->check())
                                <i class="fas fa-heart @if($course->isFavoritedBy(auth()->user())) text-danger @endif" 
                                onclick="addToFavorites({{ $course->id }})" 
                                id="heart-icon-{{ $course->id }}"></i>
                            @else
                                <i class="fas fa-heart" onclick="alert('Please log in first.')"></i>
                            @endif
                        </div>


                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--::course part end-->

    @include('user_side.inc.footer')
    <!-- footer part end-->

    @extends('user_side.inc.jquery')

    <script>
        function filterByCategory(category) {
            const courses = document.querySelectorAll('.course-card');
            let hasResults = false;

            // تحديث اختيار الـ Radio Button
            const radioButton = document.querySelector(`input[name="categoryFilter"][value="${category}"]`);
            if (radioButton) {
                radioButton.checked = true;
            }

            courses.forEach(course => {
                const courseCategory = course.getAttribute('data-category');
                if (category === 'all' || courseCategory === category) {
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

        function addToFavorites(courseId) {
    fetch(`/favorites/${courseId}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ course_id: courseId })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // تغيير لون الأيقونة إلى الأحمر عند النجاح
            var heartIcon = document.getElementById('heart-icon-' + courseId);
            heartIcon.classList.add('text-danger'); // تغيير اللون
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}



    </script>
</body>
</html>
