@extends('admin.layout')

@section('title') Admin Dashboard @endsection
<style>
    .charts {
        max-width: 500px; /* عرض الرسم البياني */
        max-height: 500px; /* ارتفاع الرسم البياني */
        width: 90%; /* عرض نسبي لضمان التكيف */
        height: auto; /* ارتفاع نسبي لضمان التكيف */
        display: flex;
        gap: 50px;
    }

    .charts_chile {
        display: flex;
        flex-direction: column;
        gap: 50px;
    }
</style>

@section('content')
    
    <div class="charts">
        <div>
            <canvas id="usersChart"></canvas>

        </div>

        <div class="charts_chile">
            <canvas id="coursesChart" width="600" height="200"></canvas>
            <canvas id="enrollmentsChart" width="600" height="200"></canvas>
        </div>

    
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // رسم بياني لعدد المستخدمين
        const usersCtx = document.getElementById('usersChart').getContext('2d');
        const usersChart = new Chart(usersCtx, {
            type: 'doughnut',
            data: {
                labels: ['Total Users'],
                datasets: [{
                    label: 'Users Count',
                    data: [{{ $usersCount }}],
                    backgroundColor: ['rgba(54, 162, 235, 0.5)'],
                    borderColor: ['rgba(54, 162, 235, 1)'],
                    borderWidth: 1
                }]
            }
        });

        // رسم بياني لعدد الكورسات حسب التصنيف
        const coursesCtx = document.getElementById('coursesChart').getContext('2d');
        const coursesChart = new Chart(coursesCtx, {
            type: 'bar',
            data: {
                labels: @json($coursesByCategory->keys()), // أسماء التصنيفات
                datasets: [{
                    label: 'Courses by Category',
                    data: @json($coursesByCategory->values()), // عدد الكورسات
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });

        // رسم بياني لعدد المسجلين في الكورسات
        const enrollmentsCtx = document.getElementById('enrollmentsChart').getContext('2d');
        const enrollmentsChart = new Chart(enrollmentsCtx, {
            type: 'line',
            data: {
                labels: @json($enrollmentsByCourse->keys()), // أسماء الكورسات
                datasets: [{
                    label: 'Enrollments by Course',
                    data: @json($enrollmentsByCourse->values()), // عدد المسجلين
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1,
                    tension: 0.4
                }]
            },
            options: {
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>
@endsection
