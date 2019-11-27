@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <section class="content-header">
            <h1>{{ __('تغییر دسترسی مدیر') }}</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}">{{ __('خانه') }}</a></li>
                <li><a href="{{ route('admin.list') }}">{{ __('لیست مدیران') }}</a></li>
                <li class="active">{{ __('تغییر دسترسی') }}</li>
            </ol>
        </section>

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <form action="" method="post">
                                {{ csrf_field() }}

                                <thead>
                                <tr>
                                    <th>{{ __('نام') }}</th>
                                    <th>{{ __('تخلص') }}</th>
                                    <th>{{ __('ارتقا درجه') }}</th>
                                    <th>{{ __('اجازه حذف مجرم') }}</th>
                                    <th>{{ __('اجازه ویرایش اطلاعات مجرم') }}</th>
                                    <th>{{ __('اجازه اضافه کردن مدیر جدید') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($privilage as $pri)
                                    <tr>
                                        <td>{{ $pri->first_name }}</td>
                                        <td>{{ $pri->last_name }}</td>

                                        <td>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="level" id="level" value="1"
                                                           @if(isset($pri))

                                                           @if($pri->level == 1)
                                                           checked
                                                           @endif
                                                           @endif />
                                                    {{ __('درجه اول') }}
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="level" id="level2" value="2"
                                                           @if(isset($pri))

                                                           @if($pri->level == 2)
                                                           checked
                                                            @endif
                                                            @endif
                                                    >
                                                    {{ __('درجه دوم') }}
                                                </label>
                                            </div>
                                        </td>

                                        <td align="center">

                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="delete_p" id="level" value="1"
                                                           @if(isset($pri))

                                                           @if($pri->delete_person == 1)
                                                           checked
                                                            @endif
                                                            @endif
                                                    >
                                                    {{ __('دارد') }}
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="delete_p" id="level2" value="0"
                                                       @if(isset($pri))

                                                       @if($pri->delete_person == 0)
                                                       checked
                                                        @endif
                                                        @endif
                                                    >
                                                    {{ __('ندارد') }}
                                                </label>
                                            </div>
                                        </td>

                                        <td align="center">

                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="write_p" id="level" value="1"
                                                       @if(isset($pri))

                                                       @if($pri->write_person == 1)
                                                       checked
                                                        @endif
                                                        @endif
                                                    >
                                                    {{ __('دارد') }}
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="write_p" id="level2" value="0"
                                                       @if(isset($pri))

                                                       @if($pri->write_person == 0)
                                                       checked
                                                        @endif
                                                        @endif
                                                    >
                                                    {{ __('ندارد') }}
                                                </label>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="add_p" id="level" value="1"
                                                       @if(isset($pri))

                                                       @if($pri->add_admin == 1)
                                                       checked
                                                        @endif
                                                        @endif
                                                    >
                                                    {{ __('دارد') }}
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="add_p" id="level2" value="0"
                                                       @if(isset($pri))

                                                       @if($pri->add_admin == 0)
                                                       checked
                                                        @endif
                                                        @endif
                                                    >
                                                    {{ __('ندارد') }}
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                        </table>
                        <div class="row container-fluid pull-left" style="margin-top:5px;">
                            <button class="btn btn-primary" type="submit" name="submit">{{ __('ذخیره تنظیمات') }}</button>
                        </div>
                    </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        <!-- ********************************************************************************* -->

    </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@stop