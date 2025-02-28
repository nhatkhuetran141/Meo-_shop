<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @yield('title')
    </title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('adminlte/dist/css/adminlte.min.css')}}">
    <!-- Summernote -->
    <link rel="stylesheet" href="{{url('adminlte/plugins/summernote/summernote-bs4.min.css')}}">

    {{-- sweet alert --}}
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>

    @yield('css')
</head>

<body class="hold-transition sidebar-mini">
    @include('sweetalert::alert')

    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown ">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <span class="d-none d-md-inline">{{Auth::guard('admin')->user()->name}}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <!-- Menu Footer-->
                        <li>
                            <a href="{{route('admin-logout')}}" class="btn btn-link">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="{{url('adminlte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Meow Admin</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-header">DASHBOARD</li>
                        <li class="nav-item">
                            <a href="{{route('admin-home')}}" class="nav-link" id="master-dashboard">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">POST</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" id="master-post">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    All posts
                                    <i class="fas fa-angle-left right"></i>
                                    <!-- <span class="badge badge-info right">6</span> -->
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link" id="all-posts">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Posts</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link" id="create-post">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create post</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-header">PRODUCT</li>
                        <li class="nav-item" id="category-menu">
                            <a href="#" class="nav-link" id="master-category">
                                <i class="nav-icon fas fa-stream"></i>

                                <p>
                                    Category
                                    <i class="fas fa-angle-left right"></i>
                                    <!-- <span class="badge badge-info right">6</span> -->
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('show-category')}}" class="nav-link" id="all-categories">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All categories</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('create-category')}}" class="nav-link" id="create-category">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create category</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item" id="product-menu">
                            <a href="#" class="nav-link" id="master-product">
                                <i class="nav-icon fas fa-shopping-cart"></i>
                                <p>
                                    Products
                                    <i class="fas fa-angle-left right"></i>
                                    <!-- <span class="badge badge-info right">6</span> -->
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('show-product')}}" class="nav-link" id="all-products">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All products</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('create-product')}}" class="nav-link" id="create-product">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create product</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-header">MEDIA</li>
                        <li class="nav-item">
                            <a href="{{route('show-media')}}" class="nav-link" id="master-media">
                                <i class="nav-icon far fa-image"></i>
                                <p>
                                    Gallery
                                </p>
                            </a>
                        </li>

                        <li class="nav-header">ORDER</li>
                        <li class="nav-item">
                            <a href="{{route('show-orders')}}" class="nav-link" id="master-order">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>
                                    Orders
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">CUSTOMER</li>
                        <li class="nav-item">
                            <a href="{{route('contact')}}" class="nav-link" id="master-contact">
                                <i class="nav-icon fas fa-address-book"></i>
                                <p>
                                    Contact
                                </p>
                            </a>
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
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            @yield('content_header')
                        </div>
                        <div class="col-sm-6">

                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{route('admin-home')}}">Dashboard</a></li>
                                @yield('breadcrumb')
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                @yield('content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="row">
                <div class="col-sm text-center text-secondary">
                    <a class="text-secondary">
                        © 2021
                    </a>
                    <a class="text-danger font-weight-bold">
                        Meow
                    </a>
                    <a class="font-weight-normal text-secondary">
                        All Right Reseres
                    </a>
                </div>
            </div>
        </footer>

    </div>
    <!-- ./wrapper -->

    <script src="{{url('adminlte/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{url('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{url('adminlte/dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{url('adminlte/dist/js/demo.js')}}"></script>
    <!-- Summernote -->
    <script src="{{url('adminlte/plugins/summernote/summernote-bs4.min.js')}}"></script>

    <!-- jQuery -->
    @yield('js')
</body>

</html>