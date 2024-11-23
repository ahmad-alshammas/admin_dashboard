<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

            <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.min.js"></script>
    <!-- Custom styles for this template-->

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

<!-- DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    {{-- chart  --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

   
    <link href="{{asset('admin/css/sb-admin-2.min.css')}}" rel="stylesheet">



</head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('admin.inc.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
<!--start of Topbar----------------------------------------------------------------------------------------->

                @include('admin.inc.navbar')
          
<!--End of Topbar------------------------------------------------------------------------------------------->

                <!-- Begin Page Content -->
                @yield('content')
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer ------------------------------------------------------------------------>

                @include('admin.inc.footer')

            <!-- End of Footer ----------------------------------------------------------------->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    {{-- <script src="js/sb-admin-2.min.js"></script> --}}
    <script src="{{asset('admin/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script> 
    

    <!-- Page level custom scripts -->

    <script src="{{asset('admin/js/demo/chart-area-demo.js')}}"></script> 
    <script src="{{asset('admin/js/demo/chart-pie-demo.js')}}"></script> 

    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    
@if(session('successUpdate'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'updated Succsufully',
            text: '{{ session('successUpdate') }}',
            showConfirmButton: false,
            timer: 3000
        });
        
    </script>

@elseif (session('successAdd'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Add Succsufully',
            text: '{{ session('successAdd') }}',
            showConfirmButton: false,
            timer: 3000
        });

        
    </script>

@elseif (session('successDelete'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'delete Succsufully',
            text: '{{ session('successDelete') }}',
            showConfirmButton: false,
            timer: 3000
        });

        
    </script>
@endif


<!-- تفعيل DataTable عبر JavaScript -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
</body>

</html>