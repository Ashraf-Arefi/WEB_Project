@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- ********************************************************************************* -->
        <!-- Main content -->
        <section class="content container-fluid">
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{ count($mojrem) }}</h3>

                            <p>{{ __('نفوس دیتابیس') }}</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-shopping-bag"></i>
                        </div>
                        <a href="{{ route('admin.mojrem.list') }}" class="small-box-footer">{{ __('اطلاعات بیشتر') }} <i class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{ count($mojrem) }}<sup style="font-size: 20px"></sup></h3>

                            <p>{{ __('نفوس مرد') }}</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-bar-chart"></i>
                        </div>
                        <a href="{{ route('admin.mojrem.list') }}" class="small-box-footer">{{ __('اطلاعات بیشتر') }} <i class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>0</h3>

                            <p>{{ __('نفوس زن') }}</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-user-plus"></i>
                        </div>
                        <a href="{{ route('admin.mojrem.list') }}" class="small-box-footer">{{ __('اطلاعات بیشتر') }} <i class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{ count($admin) }}</h3>

                            <p>{{ __('تعداد مدیران') }}</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-pie-chart"></i>
                        </div>
                        <a href="{{ route('admin.list') }}" class="small-box-footer">{{ __('اطلاعات بیشتر') }} <i class="fa fa-arrow-circle-left"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="box box-success">
                        <div class="box-header">
                            <i class="fa fa-info-circle"></i>
                            <h3 class="box-title">{{ __('به دیتابیس ثبت مجرمین خوش آمدید!') }}</h3>
                            <!-- tools box -->
                            <div class="pull-left box-tools">
                                <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <!-- /. tools -->
                        </div>
                        <div class="box-body">
                            <h5>{{ __('با استفاده از این دیتابیس شما قادر به ثبت اطلاعات افراد خواهید بود.') }}</h5>
                            <h5>{{ __('نسخه ی 1.0.0  می باشد.') }}</h5>
                            <br><h5><b>{{ __('ویژگی های دیتابیس:') }}</b></h5>
                            <h5>{{ __('۱- تمامی اطلاعات مجرمین قابل ثبت می باشد.') }}</h5>
                            <h5>{{ __('۲- قادر به تعیین دو نوع مدیر(مدیر درجه اول و مدیر درجه دوم) خواهید بود.') }}</h5>
                            <h5>{{ __('۳- شامل تنظیمات برای صلاحیت های هر مدیر درجه دو می باشد.') }}</h5>
                            <h5>{{ __('۴- تنظیمات سیستم موجود می باشد.') }}</h5>
                            <h5>{{ __('۵- برای اطلاعات بیشتر به') }} <a href="{{ route('admin.about') }}">{{ __('این') }}</a>{{ __(' صفحه سر بزنید') }}</h5>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="box box-info">
                        <div class="box-header">
                            <i class="fa fa-info-circle"></i>
                            <h3 class="box-title">{{ __('پنل دسترسی سریع') }}</h3>
                            <!-- tools box -->
                            <div class="pull-left box-tools">
                                <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <!-- /. tools -->
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-lg-6 pull-right">
                                    <a href="{{ route('admin.mojrem.add') }}" class="btn bg-aqua btn-lg">{{ __('اضافه کردن یک مجرم') }}</a>
                                </div>
                                <div class="col-lg-6 pull-left">
                                    <a href="{{ route('admin.add') }}" class="btn bg-aqua btn-lg">{{ __('اضافه کردن یک مدیر') }}</a>
                                </div>
                            </div>
                            <div class="row">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--------------------------
    | Your Page Content Here |
    -------------------------->
            <!-- ********************************************************************************* -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection