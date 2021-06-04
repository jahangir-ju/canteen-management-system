<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
        <title>
        Canteen Admin
        </title>
        <link href="{{asset('backend/node_modules/mdi/css/materialdesignicons.min.css')}}" rel="stylesheet">
        <link href="{{asset('backend/node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css')}}" rel="stylesheet">
        <link href="{{asset('backend/node_modules/rickshaw/rickshaw.min.css')}}" rel="stylesheet"/>
        <link href="{{asset('backend/css/chartist.min.css')}}" rel="stylesheet"/>
        <link href="{{asset('backend/css/style.css')}}" rel="stylesheet">
    </link>
</link>
</link>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</meta>
</meta>
</head>
<body class="sidebar-dark">
<div class="settings-panel">
<ul class="nav nav-tabs" id="setting-panel" role="tablist">
    <li class="nav-item">
        <a aria-controls="layouts-section" aria-expanded="true" class="nav-link active" data-toggle="tab" href="#layouts-section" id="layouts-tab" role="tab">
            <i class="mdi mdi-settings">
            </i>
        </a>
    </li>
    <li class="nav-item">
        <a aria-controls="chats-section" class="nav-link" data-toggle="tab" href="#chats-section" id="chats-tab" role="tab">
            <i class="mdi mdi-account">
            </i>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#" id="close-button">
            <i class="mdi mdi-window-close">
            </i>
        </a>
    </li>
</ul>
<div class="tab-content" id="setting-content">
    <div aria-labelledby="layouts-tab" class="tab-pane fade show active" id="layouts-section" role="tabpanel">
        <div class="color-tiles">
            <div class="tiles primary" id="primary-theme">
            </div>
            <div class="tiles success" id="success-theme">
            </div>
            <div class="tiles warning" id="warning-theme">
            </div>
            <div class="tiles danger" id="danger-theme">
            </div>
            <div class="tiles pink" id="pink-theme">
            </div>
            <div class="tiles info" id="info-theme">
            </div>
            <div class="tiles dark" id="dark-theme">
            </div>
            <div class="tiles light" id="light-theme">
            </div>
        </div>
        <div class="dropdown">
            <button aria-expanded="false" aria-haspopup="true" class="btn btn-secondary dropdown-toggle btn-block mb-4" data-toggle="dropdown" id="sidebar-color" type="button">
            Sidebar Mode
            </button>
            <div aria-labelledby="sidebar-color" class="dropdown-menu">
                <a class="dropdown-item" href="#" id="side-theme-light">
                    Light
                </a>
                <a class="dropdown-item" href="#" id="side-theme-dark">
                    Dark
                </a>
            </div>
        </div>
        <div class="dropdown d-none d-md-block">
            <button aria-expanded="false" aria-haspopup="true" class="btn btn-secondary dropdown-toggle btn-block" data-toggle="dropdown" id="Layouts-type" type="button">
            Layouts
            </button>
            <div aria-labelledby="Layouts-type" class="dropdown-menu">
                <a class="dropdown-item" href="#" id="boxed-layout-view">
                    Boxed
                </a>
                <a class="dropdown-item" href="#" id="compact-layout-view">
                    Compact menu
                </a>
                <a class="dropdown-item" href="#" id="icon-only-layout-view">
                    Icon Menu
                </a>
                <a class="dropdown-item" href="#" id="rtl-layout-view">
                    RTL
                </a>
                <a class="dropdown-item" href="#" id="hidden-menu-1-layout-view">
                    Hidden Menu 1
                </a>
                <a class="dropdown-item" href="#" id="hidden-menu-2-layout-view">
                    Hidden Menu 2
                </a>
            </div>
        </div>
    </div>
</div>
</div>
<!-- partial -->
<div class="container-scroller">
<!-- partial:partials/_navbar.html -->
<nav class="navbar navbar-light col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper">
        <a class="navbar-brand brand-logo" href="#">
            Canteen Admin
        </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler navbar-toggler align-self-center mr-2" data-toggle="minimize" type="button">
        <span class="navbar-toggler-icon">
        </span>
        </button>
        <form class="form-inline mt-2 ml-3 mt-md-0 d-none d-sm-block">
            <div class="input-group solid">
                <span class="input-group-addon">
                    <i class="mdi mdi-magnify">
                    </i>
                </span>
                <input class="form-control" type="text">
                </input>
            </div>
        </form>
        <ul class="navbar-nav ml-lg-auto">
            <li class="nav-item dropdown">
                <a class="btn btn-secondary" href="{{ route('admin-logout') }}">
                    Logout
                </a>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" data-toggle="offcanvas" type="button">
        <span class="navbar-toggler-icon">
        </span>
        </button>
    </div>
</nav>
<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <div class="row row-offcanvas row-offcanvas-right">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            @if(session('id'))
            <div class="user-info">
                <div class="profile">
                    <img alt="" src="http://via.placeholder.com/47x47">
                    </img>
                </div>
                <div class="details">
                    <p class="user-name">
                        
                        {{session('name')}}
                    </p>
                    <p class="designation">
                        Developer
                    </p>
                </div>
            </div>
            @endif()
            <ul class="nav">
                <!--main pages start-->
                <li class="nav-item nav-category">
                    <span class="nav-link">
                        Main
                    </span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin-dashboard') }}">
                        <i class="mdi mdi-gauge menu-icon">
                        </i>
                        <span class="menu-title">
                            Dashboard
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a aria-controls="layoutsSubmenu" aria-expanded="false" class="nav-link" data-toggle="collapse" href="#layoutsSubmenu">
                        <i class="mdi mdi-arrow-expand-all menu-icon">
                        </i>
                        <span class="menu-title">
                            Food Manage
                        </span>
                        <i class="mdi mdi-chevron-down menu-arrow">
                        </i>
                    </a>
                    <div class="collapse" id="layoutsSubmenu">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('Add.food')}}">
                                    New Food Add
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('manage.food')}}">
                                    Manage Food
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('food.order')}}">
                                    Order Food
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a aria-controls="layoutsSubmenu" aria-expanded="false" class="nav-link" data-toggle="collapse" href="#layoutsSubmenu1">
                        <i class="mdi mdi-arrow-expand-all menu-icon">
                        </i>
                        <span class="menu-title">
                            Student Manage
                        </span>
                        <i class="mdi mdi-chevron-down menu-arrow">
                        </i>
                    </a>
                    <div class="collapse" id="layoutsSubmenu1">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('student_information')}}">
                                    Student Information
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('student.add')}}">
                                    Add Student
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('show.admin')}}">
                        <i class="mdi mdi-file-document-box menu-icon">
                        </i>
                        <span class="menu-title">
                            Admin
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('show.message')}}">
                        <i class="mdi mdi-file-document-box menu-icon">
                        </i>
                        <span class="menu-title">
                            Message
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('sellreport.index')}}">
                        <i class="mdi mdi-file-document-box menu-icon">
                        </i>
                        <span class="menu-title">
                            Sell Report
                        </span>
                    </a>
                </li>
                <!--main pages end-->
            </ul>
        </nav>
        <!-- partial -->
        <div class="content-wrapper">
            @yield('admin_content')
        </div>
        <footer class="footer">
            <div class="container-fluid clearfix">
                <span class="float-right">
                    <a href="#">
                        World University of Bangladesh Canteen
                    </a>
                    © 2020
                </span>
            </div>
        </footer>
    </div>
</div>
</div>
<script src="{{asset('backend/node_modules/jquery/dist/jquery.min.js')}}">
</script>
<script src="{{asset('backend/node_modules/popper.js/dist/umd/popper.min.js')}}">
</script>
<script src="{{asset('backend/node_modules/bootstrap/dist/js/bootstrap.min.js')}}">
</script>
<script src="{{asset('backend/node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js')}}">
</script>
<script src="{{asset('backend/node_modules/flot/jquery.flot.js')}}">
</script>
<script src="{{asset('backend/node_modules/flot/jquery.flot.resize.js')}}">
</script>
<script src="{{asset('backend/node_modules/flot/jquery.flot.categories.js')}}">
</script>
<script src="{{asset('backend/node_modules/flot/jquery.flot.pie.js')}}">
</script>
<script src="{{asset('backend/node_modules/rickshaw/vendor/d3.v3.js')}}">
</script>
<script src="{{asset('backend/node_modules/rickshaw/rickshaw.min.js')}}">
</script>
<script src="{{asset('backend/bower_components/chartist/dist/chartist.min.js')}}">
</script>
<script src="{{asset('backend/node_modules/chartist-plugin-legend/chartist-plugin-legend.js')}}">
</script>
<script src="{{asset('backend/node_modules/chart.js/dist/Chart.min.js')}}">
</script>
<script src="{{asset('backend/node_modules/jquery-sparkline/jquery.sparkline.min.js')}}">
</script>
<script src="{{asset('backend/js/off-canvas.js')}}">
</script>
<script src="{{asset('backend/js/hoverable-collapse.js')}}">
</script>
<script src="{{asset('backend/js/misc.js')}}">
</script>
<script src="{{asset('backend/js/settings.js')}}">
</script>
<script src="{{asset('backend/js/dashboard_1.js')}}">
</script>
</body>
</html>