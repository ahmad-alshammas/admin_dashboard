<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('user_side/img/favicon.png') }}">
    <title>Azzam Academy</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
    @include('user_side.inc.bootstrap')
    <style>

        /* تحسينات عامة */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }

        .course-container {
            display: flex;
            gap: 20px;
            margin-top: 35px;
        }

        .lessons-list {
            width: 30%;
            max-height: 80vh;
            overflow-y: auto;
            border-right: 1px solid #ddd;
            padding-right: 10px;
        }

        .video-player {
            width: 70%;
        }

        .lesson-item {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .lesson-item:hover {
            background-color: #f1f1f1;
            transform: translateX(5px);
        }

        .lesson-item h6 {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 1rem;
            color: #333;
        }

        .lesson-item p {
            color: #6c757d;
            font-size: 0.85rem;
            margin: 0;
        }

        .video-player video {
            width: 100%;
            height: 400px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .video-player h4 {
            margin-bottom: 15px;
            color: #0056b3;
            font-weight: 600;
        }

        .card-header button {
            font-size: 1.1rem;
            color: #0056b3;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            background: none;
            border: none;
            width: 100%;
            text-align: left;
            padding: 10px;
        }

        .card-header button:hover {
            text-decoration: underline;
        }

        .card {
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #ddd;
            border-radius: 8px 8px 0 0;
        }

        .card-body {
            padding: 10px;
        }

        h1 {
            color: #333;
            font-size: 2rem;
            margin-top: 20px;
            font-weight: 700;
        }

        .text-muted {
            font-size: 1rem;
            margin-top: 10px;
            color: #6c757d;
        }

        .mt-4, .my-4 {
            margin-top: 6.5rem !important;
        }

        /* تحسينات للشاشات الصغيرة */
        @media (max-width: 768px) {
            .course-container {
                flex-direction: column;
            }

            .lessons-list, .video-player {
                width: 100%;
                margin-bottom: 20px;
            }

            h1 {
                font-size: 1.5rem;
                margin-top: 40px;
            }

            .lesson-item h6 {
                font-size: 1rem;
            }

            .lesson-item p {
                font-size: 0.8rem;
            }

            .video-player video {
                height: 250px;
            }
        }

        @media (max-width: 576px) {
            h1 {
                font-size: 1.2rem;
                margin-top: 50px;
            }

            .lesson-item h6 {
                font-size: 0.9rem;
            }

            .lesson-item p {
                font-size: 0.75rem;
            }

            .video-player video {
                height: 200px;
            }
        }
    </style>
</head>

<body>
    <header class="main_menu">
        @include('user_Side.inc.header')
    </header>

    <div class="container">
        <h1 class="mt-4">Course: <span style="color: #0056b3;">{{ $course->title }}</span></h1>
        <p class="text-muted">{{ $course->description }}</p>
        <div class="course-container">
            <!-- قائمة الدروس -->
            <div class="lessons-list">
                <h4>Lessons</h4>
                <div id="accordion">
                    @foreach ($course->sections as $index => $section)
                        <div class="card">
                            <div class="card-header" id="heading{{ $index }}">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="false" aria-controls="collapse{{ $index }}">
                                        <i class="bi bi-chevron-right"></i> {{ $section->title }}
                                    </button>
                                </h5>
                            </div>

                            <div id="collapse{{ $index }}" class="collapse" aria-labelledby="heading{{ $index }}" data-bs-parent="#accordion">
                                <div class="card-body">
                                    @foreach ($section->lessons as $lesson)
                                        <div class="lesson-item" onclick="playVideo('{{ asset('storage/' . $lesson->content_url) }}')">
                                            <h6><i class="bi bi-play-circle"></i> {{ $lesson->title }}</h6>
                                
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- مشغل الفيديو -->
            <div class="video-player">
                <h4>Lesson Video</h4>
                <video id="lessonVideo" controls>
                    <source src="" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>

    @include('user_side.inc.footer')

    <script>
        // دالة لتحميل الفيديو
        function playVideo(videoSrc) {
            const videoElement = document.getElementById('lessonVideo');
            videoElement.src = videoSrc;
            videoElement.play();
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
        @include('user_side.inc.jquery')
   
    
</body>

</html>