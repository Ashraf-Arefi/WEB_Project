@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->




        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">{{ __('تنظیمات سیستم') }}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body text-center">


                        <div class="row">
                            <div class="col-lg-4">
                                <ul>
                                    <li>{{ __('تنظیمات در این نسخه خالی می باشد.') }} </li>
                                    <li>{{ __('نسخه ی ۱.۰.۲ تنظیمات ایجاد خواهد شد') }}</li>
                                </ul>

                                <!-- <a href="http://localhost/criminal/setting/remove_my_account"><span class="fa fa-remove fa-lg"></span>&nbsp;&nbsp;</a> -->
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        <!-- ********************************************************************************* -->
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection