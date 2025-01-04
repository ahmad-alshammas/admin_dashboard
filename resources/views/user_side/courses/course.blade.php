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

        /* تعديلات جديدة لوضع أيقونة القلب على اليمين */
        .single_special_cource {
            position: relative; /* لجعل الأيقونة تتبع هذا العنصر */
        }

        .favorite-icon {
            position: absolute;
            top: 10px; /* المسافة من الأعلى */
            right: 10px; /* المسافة من اليمين */
            cursor: pointer;
            font-size: 24px; /* حجم الأيقونة */
            z-index: 1; /* للتأكد من ظهور الأيقونة فوق الصورة */
        }

        .favorite-icon .fas {
            color: #ccc; /* لون القلب الافتراضي */
        }

        .favorite-icon .fas.text-danger {
            color: #ff0000; /* لون القلب عند التفضيل */
        }
    </style>
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

            <div class="row justify-content-center">
                <div class="col-md-6">
                    <input type="text" id="searchInput" class="form-control" placeholder="Search for courses..." onkeyup="filterCourses()">
                </div>
            </div>

            <div class="row mt-3" id="coursesContainer">
                <p id="noResultsMessage" style="display: none; text-align: center; color: red; font-size: xx-large;">No courses found.</p>
                @foreach($courses as $course)
                <div class="col-sm-6 col-lg-4 course-card" data-title="{{ strtolower($course->title) }}" data-category="{{ strtolower($course->category->name ?? 'no category') }}">
                    <div class="single_special_cource">
                        <!-- أيقونة القلب على يمين الكورس -->
                        <div class="favorite-icon">
                            @if(auth()->check())
                                <i class="fas fa-heart @if($course->isFavoritedBy(auth()->user())) text-danger @endif" 
                                onclick="toggleFavorite({{ $course->id }}, @json($course->isFavoritedBy(auth()->user())))" 
                                id="heart-icon-{{ $course->id }}"></i>
                            @else
                                <i class="fas fa-heart" onclick="redirectToLogin()"></i>
                            @endif
                        </div>

                        <img src="{{ asset($course->image ?? 'default-image.png') }}" class="special_img" alt="{{ $course->title }}">
                        <div class="special_cource_text">
                            <a href="javascript:void(0);" class="btn_4" onclick="filterByCategory('{{ strtolower($course->category->name ?? 'no category') }}')">
                                {{ $course->category->name ?? 'No Category' }}
                            </a>
                            <h4>${{ $course->price }}</h4>
                            <a href="{{ route('course_detail', $course->id) }}">
                                <h3>{{ $course->title }}</h3>
                            </a>
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

        function redirectToLogin() {
            // توجيه المستخدم إلى صفحة تسجيل الدخول
            window.location.href = "{{ route('login') }}";
        }

        function toggleFavorite(courseId, isFavorited) {
            // إذا لم يكن المستخدم مسجل الدخول، يتم توجيهه إلى صفحة تسجيل الدخول
            if (!@json(auth()->check())) {
                redirectToLogin();
                return;
            }

            // تحديد إذا كان الكورس مضافًا بالفعل
            const method = isFavorited ? 'DELETE' : 'POST'; // إذا كان مضافًا، نستخدم DELETE لإزالته
            const url = isFavorited ? `/remove-from-favorites/${courseId}` : `/favorites/${courseId}`; // تغيير الرابط بناءً على الحالة

            // استدعاء الـ API بناءً على العملية المطلوبة
            fetch(url, {
                method: method,
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ course_id: courseId })
            })
            .then(response => response.json())
            .then(data => {
                const heartIcon = document.getElementById('heart-icon-' + courseId);

                if (data.success) {
                    // تغيير لون الأيقونة بناءً على العملية (إضافة أو إزالة)
                    if (isFavorited) {
                        heartIcon.classList.remove('text-danger'); // إزالة اللون الأحمر إذا تم الإزالة
                        Swal.fire({
                            icon: 'success',
                            title: 'Course removed from favorites.',
                            showConfirmButton: true,
                            timer: 2500
                        });
                    } else {
                        heartIcon.classList.add('text-danger'); // إضافة اللون الأحمر إذا تم الإضافة
                        Swal.fire({
                            icon: 'success',
                            title: 'Course added to favorites.',
                            showConfirmButton: true,
                            timer: 2500
                        });
                    }
                } else {
                    // التعامل مع الحالة في حال فشل العملية
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: isFavorited ? 'Failed to remove the course from favorites.' : 'Failed to add the course to favorites.',
                        showConfirmButton: true
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error); // طباعة الخطأ في الـ console للمساعدة في الفحص
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'An unexpected error occurred.',
                    showConfirmButton: true
                });
            });
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>