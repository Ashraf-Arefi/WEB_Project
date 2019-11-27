@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->




        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>{{ __('آپلود دوسیه های مجرم') }}</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}">{{ __('خانه') }}</a></li>
                <li class="active">{{ __('آپلود دوسیه ها') }}</li>
            </ol>
        </section>

        <!-- start the form the add the mojrem info-->
        <div class="container">
            <div class="row main-content">
                <div class="col-lg-10">
                    @if (session('success'))
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <br>
                            <label for="test" id="uploads" class="btn btn-primary">{{ __('آپلود اسناد') }} <i class="fa fa-cloud-upload" id="p_text"></i></label>
                            <input type="file" id="test" onchange="do_change();" multiple="true" name="documents[]">
                            <a href="{{ route('admin.mojrem.list') }}" class="btn btn-danger pull-left">{{ __('دوسیه ندارد') }}</a>
                            <p class="help-block">
                            <ul>
                                <li>{{ __('پسوند اسناد را ') }}<span style="color:red;">jpg</span> {{ __('وارد کنید') }}</li>
                                <li>{{ __('حجم هر سند باید کمتر از') }} <span style="color:red;">5 MB </span>{{ __(' باشد') }}</li>
                                <li>{{ __('اگر مجرم دوسیه دارد بالای گزینه آپلود کلیک کنید') }}</li>
                                <li>{{ __('در صورتی که چندین دوسیه دارد دوسیه هارا همزمان انتخاب کنید') }}</li>
                                <li>{{ __('درصورت عمدم وجود دوسیه میتوانید گزینه دوسیه ندارد را انتخاب کنید.') }}</li>
                            </ul>
                            </p>
                        </div>
                        <input type="hidden" name="id" value="10">

                        <br><br>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary btn-block">{{ __('ثبت اطلاعات') }}</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <script>
            function do_change() {
                document.getElementById('uploads').innerHTML = '{{ __("اسناد انتخاب شد") }}';
            }
        </script>
        <!--------------------------
          | Your Page Content Here |
          -------------------------->
        <!-- ********************************************************************************* -->
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection