<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Create your medical prescription online.">
    <meta name="keywords" content="medical prescription, consultation, medical records, digital medical prescription, online medical prescription">
    <meta name="author" content="Cybernetics">
    <link rel="icon" href="{{ asset('/frontend/assets/img/favicon1.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('/frontend/assets/img/favicon1.png') }}" type="image/x-icon">
    <title>Shudhi WMS</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/backend/assets/css/fontawesome.css') }}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/backend/assets/css/icofont.css') }}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/backend/assets/css/themify.css') }}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/backend/assets/css/flag-icon.css') }}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/backend/assets/css/feather-icon.css') }}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/backend/assets/css/todo.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/backend/assets/css/select2.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/backend/assets/css/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/backend/assets/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/backend/assets/css/chartist.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/backend/assets/css/date-picker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/backend/assets/css/timepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/backend/assets/css/owlcarousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/backend/assets/css/prism.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/backend/assets/css/vector-map.css') }}">
    <!-- Plugins css Ends-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/backend/assets/css/vendors/drawer/bootstrap-drawer.css') }}">
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/backend/assets/css/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/backend/assets/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('/backend/assets/css/color-1.css') }}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/backend/assets/css/responsive.css') }}">
</head>

<body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
        <div class="theme-loader">
            <div class="loader-p"></div>
        </div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start       -->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        <div class="page-main-header">
            <div class="main-header-right row m-0">
                <div class="main-header-left">
                    <div class="logo-wrapper"><a href="{{ route('admin.dashboard') }}"><img class="img-fluid" src="{{ asset('/frontend/assets/img/logo-mpp-dark.png') }}" alt=""></a></div>
                    <div class="dark-logo-wrapper"><a href="{{ route('admin.dashboard') }}"><img class="img-fluid" src="{{ asset('/frontend/assets/img/logo-mpp-dark.png') }}" alt=""></a></div>
                    <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center" id="sidebar-toggle"></i></div>
                </div>
                <div class="nav-right col pull-right right-menu p-0">
                    <ul class="nav-menus">
                        <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
                        <li class="onhover-dropdown">
                            <div class="notification-box"><i data-feather="bell"></i><span class="dot-animated"></span></div>
                        </li>
                        <li>
                            <div class="mode"><i class="fa fa-moon-o"></i></div>
                        </li>
                        <li class="onhover-dropdown p-0">
                            <button class="btn btn-primary-light" type="button"><a href="{{ route('logout') }}"><i data-feather="log-out"></i>Log out</a></button>
                        </li>
                    </ul>
                </div>
                <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
            </div>
        </div>
        <!-- Page Header Ends                              -->
        <!-- Page Body Start-->
        <div class="page-body-wrapper sidebar-icon">
            <!-- Page Sidebar Start-->
            @include("admin.nav")
            <!-- Page Sidebar Ends-->
            @yield("content")
            <!-- footer start-->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 footer-copyright">
                            <p class="mb-0">Copyright {{ date('Y') }} © Shudhi WMS. All rights reserved.</p>
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- latest jquery-->
    <script src="{{ asset('/backend/assets/js/jquery-3.5.1.min.js') }}"></script>
    <!-- feather icon js-->
    <script src="{{ asset('/backend/assets/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/js/icons/feather-icon/feather-icon.js') }}"></script>
    <!-- Sidebar jquery-->
    <script src="{{ asset('/backend/assets/js/sidebar-menu.js') }}"></script>
    <script src="{{ asset('/backend/assets/js/config.js') }}"></script>
    <!-- Bootstrap js-->
    <script src="{{ asset('/backend/assets/js/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/js/bootstrap/bootstrap.min.js') }}"></script>
    <!-- Plugins JS start-->
    <script src="{{ asset('/backend/assets/js/bootstrap_bundle.js') }}"></script>
    <script src="{{ asset('/backend/assets/js/tooltip-init.js') }}"></script>

    <script src="{{ asset('/backend/assets/js/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/js/counter/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/js/counter/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/js/counter/counter-custom.js') }}"></script>
    <script src="{{ asset('/backend/assets/js/custom-card/custom-card.js') }}"></script>
    <script src="{{ asset('/backend/assets/js/datepicker/date-picker/datepicker.js') }}"></script>
    <script src="{{ asset('/backend/assets/js/datepicker/date-picker/datepicker.en.js') }}"></script>
    <script src="{{ asset('/backend/assets/js/datepicker/date-picker/datepicker.custom.js') }}"></script>
    <script src="{{ asset('/backend/assets/js/time-picker/jquery-clockpicker.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/js/time-picker/highlight.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/js/time-picker/clockpicker.js') }}"></script>
    <script src="{{ asset('/backend/assets/js/drawer/bootstrap-drawer.js') }}"></script>
    <script src="{{ asset('/backend/assets/js/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/js/select2/select2-custom.js') }}"></script>
    <script src="{{ asset('/backend/assets/js/todo/todo.js') }}"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{ asset('/backend/assets/js/script.js') }}"></script>
    <script src="{{ asset('/backend/assets/js/mpp.js') }}"></script>
    <script>
        var colorurl = "{{ asset('/backend/assets') }}";
    </script>
    <!--<script src="{{ asset('/backend/assets/js/theme-customizer/customizer.js') }}"></script>-->
    <!-- login js-->
    <!-- Plugin used-->
    <script src="{{ asset('/backend/assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/js/datatable/buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/js/datatable/buttons/jszip.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/js/datatable/buttons/pdfmake.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/js/datatable/buttons/vfs_fonts.js') }}"></script>
    <script src="{{ asset('/backend/assets/js/datatable/buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/js/datatable/buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('/backend/assets/js/datatable/datatables/datatable.custom.js') }}"></script>

    @include("message")
</body>

</html>