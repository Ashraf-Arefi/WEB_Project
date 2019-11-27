@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>لیست مدیران دیتابیس</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}">{{ __('خانه') }}</a></li>

                <li class="active">{{ __('لیست مدیران') }}</li>
            </ol>
        </section>

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if (session('success'))
                            <div class="alert alert-success text-center">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('permissionError'))
                            <div class="alert alert-warning text-center">
                                {{ session('permissionError') }}
                            </div>
                        @endif
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>{{ __('نام') }}</th>
                                <th>{{ __('تخلص') }}</th>
                                <th>{{ __('کلمه کاربری مدیر') }}</th>
                                <th>{{ __('درجه مدیر') }}</th>
                                <th>{{ __('اجازه دسترسی') }}</th>
                                <th>{{ __('حذف مدیر') }}</th>                  <!-- <th>تصویر</th> -->
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($admin as $admin)
                                <tr class="@if (Auth::user() == $admin) bg-green-gradient

                                @endif">
                                    <td>{{ $admin->first_name }}</td>
                                    <td>{{ $admin->last_name }}</td>
                                    <td>{{ $admin->username }}</td>
                                    <td>@if ($admin->level == 1)
                                        {{ __('درجه اول') }}
                                        @else
                                        {{ __('درجه دوم') }}
                                        @endif
                                    </td>
                                    <td align="center"><a href="{{ route('admin.edit',[$admin->id]) }}"><img src="{{ asset('/img/icons/permission.png') }}" width="25"></a></td>
                                    <td align="center"><a href="{{ route('admin.delete',[$admin->id]) }}"><img src="{{ asset('/img/icons/trash.png') }}" width="25"></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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