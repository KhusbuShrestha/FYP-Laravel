<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ghardhailo</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../css/admin.css">

    <!-- Datatable css -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">

    <!-- export buttons css -->

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">


        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->


            <!-- Sidebar -->
            <div class="sidebar">
                <div class="sidebar" style="height: 100%">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            {{-- <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> --}}
                        </div>
                        <div class="info">
                            <a href="#" class="d-block">Admin</a>
                        </div>
                    </div>
                    


                    <!-- SidebarSearch Form -->
                    <div class="form-inline">
                        <div class="input-group" data-widget="sidebar-search">
                            <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                                aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-sidebar">
                                    <i class="fas fa-search fa-fw"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                            {{-- <li class="nav-item">
                                <a href="/category" class="nav-link">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>
                                        Dashboard

                                    </p>
                                </a>
                            </li> --}}

                            <li class="nav-item">
                                <a href="/category" class="nav-link">
                                    <i class=" nav-icon fas fa-align-justify"></i>
                                    <p>
                                        Category

                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="/vendor" class="nav-link">
                                    {{-- <i class="nav-icon fas fa-layer-group"></i> --}}
                                    <i class=" nav-icon fas fa-user"></i>

                                    <p>
                                        Vendor
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/product" class="nav-link">
                                    {{-- <i class="nav-icon fas fa-layer-group"></i> --}}
                                    <i class=" nav-icon fas fa-box-open"></i>
                                    <p>
                                        Product
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/about" class="nav-link">
                                    {{-- <i class="nav-icon fas fa-layer-group"></i> --}}
                                    <i class=" nav-icon fas fa-address-card"></i>
                                    <p>
                                        About US
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/contact" class="nav-link">
                                    {{-- <i class="nav-icon fas fa-layer-group"></i> --}}
                                    <i class=" nav-icon fas fa-address-book"></i>
                                    <p>
                                        Contact US
                                    </p>
                                </a>
                            </li>
                           {{--  <li class="nav-item">
                                <a href="/shipping" class="nav-link">
                                    {{-- <i class="nav-icon fas fa-layer-group"></i> --}}
                                    {{-- <i class=" nav-icon fas fa-truck"></i>
                                    <p>
                                        Shipping Policy
                                    </p>
                                </a> --}}
                            {{-- </li> --}} 
                            <li class="nav-item">
                                <a href="/team" class="nav-link">
                                    {{-- <i class="nav-icon fas fa-layer-group"></i> --}}
                                    <i class=" nav-icon fas fa-users"></i>
                                    <p>
                                        Our Team
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/allOrders" class="nav-link">
                                    {{-- <i class="nav-icon fas fa-layer-group"></i> --}}
                                    <i class=" nav-icon fas fa-users"></i>
                                    <p>
                                        All Orders
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            
                                                     document.getElementById('logout-form').submit();">
                                    <i class=" nav-icon fas fa-sign-out-alt"></i>


                                    {{ __('Logout') }}

                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </li>


                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            {{-- <h1 class="m-0">Starter Page</h1> --}}
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                {{-- <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
                                {{-- <li class="breadcrumb-item active">Starter Page</li> --}}
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <!-- menu(navbar) -->
            <!-- main-content -->
            @yield('content')

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    {{-- CK EDITOR --}}
    <script src="/ckeditor/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            ClassicEditor
                .create(document.querySelector('#description'))
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });

        });
    </script>


    <!-- jQuery -->
    <script src="/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/dist/js/adminlte.min.js"></script>

    <!-- datable js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>

    <!-- export buttons javascript -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>

    <!-- manual script,  to call datatable in required forms -->
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
            });
        });
    </script>

</body>

</html>
