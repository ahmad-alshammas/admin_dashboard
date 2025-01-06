@extends('admin.layout')

@section('title') Admin Dashboard @endsection

<style>
    .charts {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
        padding: 20px;
    }

    .chart-container {
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 20px;
        width: 45%;
        min-width: 300px;
        max-width: 500px;
    }

    canvas {
        width: 100% !important;
        height: auto !important;
    }
</style>

@section('content')
    <div class="charts">
        <!-- رسم بياني لعدد المستخدمين -->
        <div class="chart-container">
            <h3>Total Users</h3>
            <canvas id="usersChart"></canvas>
        </div>

        <!-- رسم بياني لعدد الكورسات حسب التصنيف -->
        <div class="chart-container">
            <h3>Courses by Category</h3>
            <canvas id="coursesChart"></canvas>
        </div>

        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // ألوان متدرجة
        const colors = {
            blue: ['#36A2EB', '#4BC0C0', '#00BFFF'],
            green: ['#4BC0C0', '#32CD32', '#00FA9A'],
            red: ['#FF6384', '#FF4500', '#FF1493'],
            purple: ['#9966FF', '#8A2BE2', '#9400D3']
        };

        // رسم بياني لعدد المستخدمين
        const usersCtx = document.getElementById('usersChart').getContext('2d');
        const usersChart = new Chart(usersCtx, {
            type: 'doughnut',
            data: {
                labels: ['Total Users'],
                datasets: [{
                    label: 'Users Count',
                    data: [{{ $usersCount }}],
                    backgroundColor: colors.blue,
                    borderColor: colors.blue.map(color => color.replace('0.5', '1')),
                    borderWidth: 2,
                    hoverOffset: 10
                }]
            },
            options: {
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            font: {
                                size: 14,
                                family: 'Arial'
                            }
                        }
                    },
                    title: {
                        display: true,
                        text: 'Total Users',
                        font: {
                            size: 18,
                            family: 'Arial'
                        }
                    }
                },
                animation: {
                    duration: 1500,
                    easing: 'easeInOutQuart'
                }
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
                    backgroundColor: colors.green,
                    borderColor: colors.green.map(color => color.replace('0.5', '1')),
                    borderWidth: 2,
                    borderRadius: 5,
                    hoverOffset: 10
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Courses by Category',
                        font: {
                            size: 18,
                            family: 'Arial'
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#e0e0e0'
                        },
                        ticks: {
                            font: {
                                size: 14,
                                family: 'Arial'
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                size: 14,
                                family: 'Arial'
                            }
                        }
                    }
                },
                animation: {
                    duration: 1500,
                    easing: 'easeInOutQuart'
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
                    backgroundColor: colors.red[0],
                    borderColor: colors.red[2],
                    borderWidth: 3,
                    pointRadius: 5,
                    pointBackgroundColor: colors.red[1],
                    pointHoverRadius: 8,
                    tension: 0.4
                }]
            },
            options: {
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            font: {
                                size: 14,
                                family: 'Arial'
                            }
                        }
                    },
                    title: {
                        display: true,
                        text: 'Enrollments by Course',
                        font: {
                            size: 18,
                            family: 'Arial'
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#e0e0e0'
                        },
                        ticks: {
                            font: {
                                size: 14,
                                family: 'Arial'
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                size: 14,
                                family: 'Arial'
                            }
                        }
                    }
                },
                animation: {
                    duration: 1500,
                    easing: 'easeInOutQuart'
                }
            }
        });
    </script>
@endsection