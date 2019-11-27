<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>سربرگ</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-theme.css') }}">
    <!-- Bootstrap rtl -->
    <link rel="stylesheet" href="{{ asset('/css/rtl.css') }}">
    <!-- persian Date Picker -->
    <link rel="stylesheet" href="{{ asset('/css/persian-datepicker-0.4.5.min') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="{{ asset('/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('/css/_all-skins.min.css') }}">
    <!-- Morris chart -->
    <!-- <link rel="stylesheet" href="assets/bower_components/morris.js/morris.css"> -->
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('/css/jquery-jvectormap.css') }}">
    <!-- Daterange picker -->
    <!-- <link rel="stylesheet" href="assets/bower_components/bootstrap-daterangepicker/daterangepicker.css"> -->
    <!-- bootstrap datepicker -->
    <!-- <link rel="stylesheet" href="assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"> -->
    <!-- bootstrap wysihtml5 - text editor -->
    <!-- <link rel="stylesheet" href="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"> -->
    <link type="text/css" rel="stylesheet" href="{{ asset('/css/kamadatepicker.css') }}"/>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="http://localhost/criminal/assets/https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/css/AdminLTE.css') }}">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">{{ __('پنل') }}</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>{{ __('صفحه مدیریت') }}</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            @if (isset($mojrems_show) && url()->current() == route('admin.show.mojrem', [$mojrems_show->id]) )
                <script>
                    function print_me() {
                        window.print();
                    }
                </script>
                <a href="#" onclick="print_me();" class="btn hidden-xs" style="margin:6px 100px;padding:9px 50px;background-color:#d61577;border-color:#ad0b5d;font-weight:bold;color:#FFF">چاپ نتیجه</a>
            @endif

            @if (isset($mojrems_show)  && url()->current() == route('admin.show.mojrem',[$mojrems_show->id]) && count($mojrem_documents))
                <a href="{{ route('admin.view.document', [$mojrems_show->id]) }}" class="btn hidden-xs" style="margin:6px 100px;padding:9px 50px;background-color:#d61577;border-color:#ad0b5d;font-weight:bold;color:#FFF">دیدن اسناد</a>
            @endif
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->

                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ asset('/img/admin_photos/'.Auth::user()->image_name) }}"
                                 class="user-image" alt="User Image">
                            <span class="hidden-xs">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{ asset('/img/admin_photos/'.Auth::user()->image_name) }}"
                                     class="img-circle" alt="User Image">

                                <p>
                                    {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                                    <small>@if (Auth::user()->level = 1)
                                            مدیریت کل دیتابیس
                                        @else
                                               مدیریت
                                        @endif
                                    </small>
                                </p>
                            </li>
                            <!-- Menu Body -->

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{ route('admin.profile') }}" class="btn btn-default btn-flat">{{ __('پروفایل') }}</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ route('logout') }}" class="btn btn-default btn-flat">{{ __('خروج') }}</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{ __('زبان') }}
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('lang', 'fa') }}">پشتو</a></li>
                            <li><a href="{{ route('lang', 'pa') }} }}">دری</a></li>
                            {{----}}
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    {{--<form class="" action="{{ route('lang') }}" method="post">--}}
                        {{--{{ csrf_field() }}--}}
                        {{--Locale:--}}
                        {{--<select class="" name="locale" onchange="this.form.submit()">--}}
                            {{--<option value="fa" >دری</option>--}}
                            {{--<option value="pa" >پشتو</option>--}}
                        {{--</select>--}}
                    {{--</form>--}}
                </ul>
            </div>
        </nav>
    </header>


    <!-- right side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel" >
                <div class="pull-right image">
                    <img src="{{ asset('/img/admin_photos/'.Auth::user()->image_name) }}" class="img-circle"
                         alt="User Image">
                </div>
                <div class="pull-right info">
                    <p>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }} </p>
                    <!-- Status -->
                    <a href="{{ route('admin.profile') }}"><i class="fa fa-circle text-success "></i>
                        {{ __('آنلاین') }}</a>
                </div>
            </div>


            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">{{ __('عنوان') }}</li>
                <!-- Optionally, you can add icons to the links -->

                <li class="{{ Request::path((route('home')))? 'active': ''   }}"><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i>
                        <span>{{ __('داشبورد') }}</span></a>
                </li>

                <li class="treeview">
                    <a href="#"><i class="fa fa-user "></i> <span>{{ __('مجرمین') }}</span>
                        <span class="pull-left-container">
                            <i class="fa fa-angle-left pull-left"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class=""><a href="{{ route('admin.mojrem.add') }}"><i class="fa fa-plus"></i>
                                <span>{{ __('اضافه کردن مجرم') }}</span></a></li>
                        <li class=""><a href="{{ route('admin.mojrem.list') }}"><i class="fa fa-list"></i><span>{{ __('لیست مجرمین') }}</span></a>
                        </li>
                    </ul>
                </li>


                <li class="treeview">
                    <a href="#"><i class="fa fa-user "></i> <span>{{ __('مدیران') }}</span>
                        <span class="pull-left-container">
                            <i class="fa fa-angle-left pull-left"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class=""><a href="{{ route('admin.add') }}"><i class="fa fa-plus"></i>
                                <span>{{ __('اضافه کردن مدیر') }}</span></a></li>
                        <li class=""><a href="{{ route('admin.list') }}"><i class="fa fa-list"></i>
                                <span>{{ __('لیست مدیران') }}</span></a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-print "></i> <span>{{ __('گزارشات') }}</span>
                        <span class="pull-left-container">
                            <i class="fa fa-angle-left pull-left"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class=""><a href="{{ route('admin.report') }}"><i class="fa fa-bar-chart"></i>
                                <span>{{ __('گزارشات عمومی') }}</span></a></li>
                        <li class=""><a href="{{ route('admin.yearly') }}"><i class="fa fa-bar-chart"></i>
                                <span>{{ __('گزارشات سالانه') }}</span></a>
                        </li>
                        <li class=""><a href="{{ route('admin.monthly') }}"><i class="fa fa-bar-chart"></i>
                                <span>{{ __('گزارشات ماهانه') }}</span></a>
                        </li>
                    </ul>
                </li>

                <li class=""><a href="{{ route('admin.setting') }}"><i class="fa fa-gears"></i>
                        <span>{{ __('تنظیمات') }}</span></a></li>
                <li class="@if (url()->current() == route('admin.about'))
                    active
                @endif" id="about"><a href="{{ route('admin.about') }}"><i class="fa fa-phone"></i> <span>{{ __('درباره ما') }}</span></a>
                </li>
                <li class=""><a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i> <span>{{ __('خروج از سیستم') }}</span></a>
                </li>
            </ul>
            <!-- /.sidebar-menu -->

        </section>
        <!-- /.sidebar -->
    </aside>  <!-- Content Wrapper. Contains page content -->


@yield('content')

<!-- Main Footer -->
    <footer class="main-footer text-left">
        <strong>Copyright &copy; 2019- 2019 <a href="http://www.facebook.com/sayed ashraf arefi">Sayed Ashraf Arefi</a></strong>
    </footer>
</div>

<!-- jQuery 3 -->
<script src="{{ asset('/js/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
<!-- iCheck -->
<!-- <script src="http://localhost/criminal/assets/js/icheck.min.js"></script> -->
<!-- ×××××××××××××××××××××××××××××××××××××× -->
<!-- jQuery 3 -->
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('/js/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>

<script src="{{ asset('/js/adminlte.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('/js/dashboard.js') }}"></script>
<script>
function ajaxLoad(filename, content) {
    content = typeof content !== 'undefined' ? content : 'content';
    $('.content-loader').show();
    $.ajax({
        type: "GET",
        url: filename,
        contentType: false,
        success: function (data) {
            $("#" + content).html(data);
            $('.content-loader').hide();
        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
    });
}
</script>
</body>
</html>
