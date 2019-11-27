@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Content Wrapper. Contains page content -->
        <div class="">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    {{ __('لیست مجرمین') }}
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> {{ __('خانه') }}</a></li>
                    <li class="active">{{ __('لیست مجرمین') }}</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="container table-responsive">
                    <h1></h1>
                    <div class="serch_mojrem">
                        <form action="{{ route('admin.search.mojrem') }}" method="get">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <select name="type" id="" class="form-control col-lg-2">
                                    <option value="ssn" @if (isset($type) && $type == 'ssn')
                                    selected
                                            @endif>{{ __('نمبر تذکره') }}</option>
                                    <option value="first_name" @if (isset($type) && $type === 'first_name')
                                    selected
                                            @endif>{{ __('نام') }}</option>
                                    <option value="father_name" @if (isset($type) && $type === 'father_name')
                                        selected
                                    @endif>{{ __('نام پدر') }}</option>
                                    <option value="place" @if (isset($type) && $type === 'place')
                                    selected
                                    @endif>{{ __('مکان جرم') }}</option>
                                </select>
                                <input type="text" class="form-control col-lg-2" name="keyword" placeholder="{{ __('ورودی') }}" value="">
                                <input type="submit" class="btn btn-primary" name="search" value="{{ __('جستجو') }}" class="list_mojrem_btn_serach">
                                <span><span> {{ __('مجموعه') }} {{ count($mojrems) }} {{ __('نفر') }}</span></span>
                            </div>
                            <div class="form-group"></div>
                        </form>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="table table-striped table-bordered">
                        <thead class="thead-light">
                        <tr>
                            <!-- <th>شماره</th> -->
                            <th>{{ __('نمبر تذکره') }}</th>
                            <th>{{ __('نام') }}</th>
                            <th>{{ __('نام پدر') }}</th>
                            <th>{{ __('نام پدر کلان') }}</th>
                            <th>{{ __('ویرایش') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($mojrems as $mojrem)
                            <tr>
                                <td>{{ $mojrem->ssn }}</td>
                                <td>{{ $mojrem->first_name }}</td>
                                <td>{{ $mojrem->father_name }}</td>
                                <td>{{ $mojrem->grand_father_name }}</td>
                                <td class="">
                                    <a href="{{ route('admin.show.mojrem', [$mojrem->id]) }}" class="btn btn-primary">{{ __('نمایش') }}</a>
                                    <a href="{{ route('admin.delete.mojrem', [$mojrem->id]) }}" class="btn btn-danger">{{ __('حذف') }}</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="row">
                        <div class="col-12 text-center">
                            {{ $mojrems->links() }}
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!--------------------------
         | Your Page Content Here |
         -------------------------->
        <!-- ********************************************************************************* -->
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection