<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Favorites</title>
    @extends('user_side.inc.bootstrap')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        .category-btn {
            margin: 5px;
            transition: all 0.3s ease;
        }

        .category-btn:hover {
            background-color: #0056b3;
            color: white;
        }

        .category-btn.active {
            background-color: #0056b3;
            color: white;
        }

        .category-btn.active:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header class="main_menu single_page_menu">
        @include('user_side.inc.header')
    </header>

    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>Your Favorite Courses</h2>
                            <p>Home<span>/</span>Favorites</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="special_cource padding_top">
        <div class="container">
            @if($favoriteCourses->isEmpty())
                <p style="text-align: center; color: red;">No favorite courses found.</p>
            @else
                <!-- Filters -->
                <div class="row justify-content-center my-4">
                    <div class="col-md-12 text-center">
                        <h5 class="mb-4">Select Category</h5>
                        <div class="d-flex flex-wrap justify-content-center gap-2">
                            <button class="btn btn-outline-primary category-btn active" data-category="all" onclick="filterByCategory('all')">All</button>
                            @foreach($categories as $category)
                                <button class="btn btn-outline-primary category-btn" data-category="{{ strtolower($category->name) }}" onclick="filterByCategory('{{ strtolower($category->name) }}')">
                                    {{ $category->name }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Search -->
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <input type="text" id="searchInput" class="form-control" placeholder="Search for courses..." onkeyup="filterCourses()">
                    </div>
                </div>

                <!-- Favorite Courses -->
                <div class="row mt-3" id="coursesContainer">
                    <p id="noResultsMessage" style="display: none; text-align: center; color: red; font-size: xx-large;">No courses found.</p>
                    @foreach($favoriteCourses as $course)
                        <div class="col-sm-6 col-lg-4 course-card" data-course-id="{{ $course->id }}" data-title="{{ strtolower($course->title) }}" data-category="{{ strtolower($course->category->name ?? 'no category') }}">
                            <div class="single_special_cource">
                                <img src="{{ asset($course->image ?? 'default-image.png') }}" class="special_img" alt="{{ $course->title }}">
                                <div class="special_cource_text">
                                    <a href="javascript:void(0);" class="btn_4" onclick="filterByCategory('{{ strtolower($course->category->name ?? 'no category') }}')">
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
                                    <div class="favorite-icon">
                                        <i class="fas fa-heart text-danger" onclick="removeFromFavorites({{ $course->id }})" id="heart-icon-{{ $course->id }}"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    @include('user_side.inc.footer')

    <script>
        function filterByCategory(category) {
            const courses = document.querySelectorAll('.course-card');
            let hasResults = false;

            // تحديث حالة الأزرار
            const categoryButtons = document.querySelectorAll('.category-btn');
            categoryButtons.forEach(button => {
                if (button.getAttribute('data-category') === category) {
                    button.classList.add('active');
                } else {
                    button.classList.remove('active');
                }
            });

            // تصفية الكورسات بناءً على الفئة
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

        function removeFromFavorites(courseId) {
            fetch('/remove-from-favorites', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({ course_id: courseId }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.message === 'Course removed from favorites') {
                    Swal.fire({
                        title: 'Removed!',
                        text: 'The course has been removed from your favorites.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        // إخفاء الكورس المحذوف من صفحة المفضلة
                        const courseCard = document.querySelector(`.course-card[data-course-id="${courseId}"]`);
                        if (courseCard) courseCard.remove();

                        // التحقق إذا كانت القائمة فارغة
                        const coursesContainer = document.getElementById('coursesContainer');
                        if (!coursesContainer.querySelector('.course-card')) {
                            document.getElementById('noResultsMessage').style.display = 'block';
                        }
                    });
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Failed to remove the course from favorites.',
                        icon: 'error',
                        confirmButtonText: 'Try Again'
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    title: 'Error!',
                    text: 'An unexpected error occurred.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            });
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>