<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin - Dashboard Bantuan Sosial</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="{{ asset('assets-admin/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets-admin/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets-admin/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets-admin/css/style.css') }}" rel="stylesheet">

</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">

        <!-- Spinner Start -->
        @include('layouts.admin.spinner')
        <!-- Spinner End -->

        <!-- Sidebar Start -->
        @include('layouts.admin.sidebar')
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('layouts.admin.navbar')
            <!-- Navbar End -->

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Single Line Chart</h6>
                            <canvas id="line-chart"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Multiple Line Chart</h6>
                            <canvas id="salse-revenue"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Single Bar Chart</h6>
                            <canvas id="bar-chart"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Multiple Bar Chart</h6>
                            <canvas id="worldwide-sales"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Pie Chart</h6>
                            <canvas id="pie-chart"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Doughnut Chart</h6>
                            <canvas id="doughnut-chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Chart.js -->
            <script>
                document.addEventListener('DOMContentLoaded', function() {

                    const dataChart = document.getElementById('line-chart').getContext('2d');
                    const comparisonChart = document.getElementById('bar-chart').getContext('2d');

                    const penerima = {
                        {
                            $penerima ?? 0
                        }
                    };
                    const pendaftar = {
                        {
                            $pendaftar ?? 0
                        }
                    };
                    const program = {
                        {
                            $program ?? 0
                        }
                    };

                    // PIE CHART
                    new Chart(dataChart, {
                        type: 'pie',
                        data: {
                            labels: ['Penerima', 'Pendaftar', 'Program'],
                            datasets: [{
                                data: [penerima, pendaftar, program],
                                backgroundColor: ['#ff4d4d', '#4da6ff', '#7dd56f']
                            }]
                        },
                        options: {
                            plugins: {
                                legend: {
                                    labels: {
                                        color: '#fff'
                                    }
                                }
                            }
                        }
                    });

                    // BAR CHART
                    new Chart(comparisonChart, {
                        type: 'bar',
                        data: {
                            labels: ['Penerima', 'Pendaftar', 'Program'],
                            datasets: [{
                                label: 'Jumlah Data',
                                data: [penerima, pendaftar, program],
                                backgroundColor: ['#ff4d4d', '#4da6ff', '#7dd56f']
                            }]
                        },
                        options: {
                            scales: {
                                x: {
                                    ticks: {
                                        color: '#fff'
                                    }
                                },
                                y: {
                                    ticks: {
                                        color: '#fff',
                                        stepSize: 1
                                    }
                                }
                            },
                            plugins: {
                                legend: {
                                    labels: {
                                        color: '#fff'
                                    }
                                }
                            }
                        }
                    });

                });
            </script>






            <!-- Main Content -->



            <div class="container-fluid pt-4 px-4">
                @yield('content')
            </div>
            <!-- End Main Content -->

            <!-- Footer Start -->
            @include('layouts.admin.footer')
            <!-- Footer End -->

            <!-- Floating WA -->
            @include('layouts.admin.floatingwa')
            <!-- End Floating WA -->

        </div>
        <!-- Content End -->

        <!-- Back to Top -->
        @include('layouts.admin.btt')

        <!-- JavaScript Libraries -->
        @include('layouts.admin.js')

        <!-- Template Javascript -->
        @include('layouts.admin.templatejs')
</body>

</html>