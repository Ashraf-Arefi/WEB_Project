@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Content Wrapper. Contains page content -->
        <div>
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>{{ __('در مورد ما') }}</h1>
                <h4>{{ __('معرفی سازنده') }} </h4>
                <ol class="breadcrumb">
                    <li><a href="{{ route('home') }}"> {{ __('خانه') }}</a></li>
                </ol>
            </section>

            <div class="content">
                <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4">
                        <img src="{{ asset('img/about_us/me (2).JPG') }}" class="img-thumbnail img-responsive img-circle" alt="Cinque Terre">
                        <div align="center" style="margin-left:50px;">
                            <h3>سید اشرف عارفی</h3>
                            <h5>{{ __('برنامه نویس و توسعه دهنده وب') }}</h5>
                            <p>
                                {{ __('دانشجوی سال چهارم رشته کمپیوتر ساینس، و متخصص توسعه نرم افزار های تحت وب، عضو شرکت نرم افزاری') }} TUTIA                    </p>
                        </div>
                    </div>

                    <div class="col-lg-4"></div>

                    <br><br>
                    <br><br>
                    <br>
                    <div class="row container-fluid ">
                        <br>
                        <div class="col-lg-4"></div>

                        <div class="col-lg-4"></div>
                    </div>
                </div>
            </div>

        </div>
        <!--------------------------
          | Your Page Content Here |
          -------------------------->
        <!-- ********************************************************************************* --
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection