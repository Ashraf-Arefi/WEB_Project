@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>{{ __(' صفحه گذارشات ماهانه') }}</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}">{{ __(' خانه') }}</a></li>
                <li class="active">{{ __('راپور') }}</li>
            </ol>
        </section>
        <!-- report section -->
        <div class="report">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div id="" class="">
                        <div class="panel-body">
                            <div class="monthly_report dropdown">
                                <form action="{{ route('admin.report.monthly') }}" method="get">
                                    <select name="month" class="btn btn-primary dropdown-toggle btn-sm" required>
                                        <option value="0" >{{ __('ماه مورد نظرتان را انتخاب کنید') }} </option>
                                        <option value="1" @if (isset($jmonth) && $jmonth==1 ) selected @endif>{{ __('حمل') }}</option>
                                        <option value="2" @if (isset($jmonth) && $jmonth==2 ) selected @endif>{{ __('ثور') }}</option>
                                        <option value="3" @if (isset($jmonth) && $jmonth==3 ) selected @endif>{{ __('جوزا') }}</option>
                                        <option value="4" @if (isset($jmonth) && $jmonth==4 ) selected @endif>{{ __('سرطان') }}</option>
                                        <option value="5" @if (isset($jmonth) && $jmonth==5 ) selected @endif>{{ __('اسد') }}</option>
                                        <option value="6" @if (isset($jmonth) && $jmonth==6 ) selected @endif>{{ __('سنبله') }}</option>
                                        <option value="7" @if (isset($jmonth) && $jmonth==7 ) selected @endif>{{ __('میزان') }}</option>
                                        <option value="8" @if (isset($jmonth) && $jmonth==8 ) selected @endif>{{ __('عقرب') }}</option>
                                        <option value="9" @if (isset($jmonth) && $jmonth==9 ) selected @endif>{{ __('قوس') }}</option>
                                        <option value="10" @if (isset($jmonth) && $jmonth==10 ) selected @endif>{{ __('جدی') }}</option>
                                        <option value="11" @if (isset($jmonth) && $jmonth==11 ) selected @endif>{{ __('دلو') }}</option>
                                        <option value="12" @if (isset($jmonth) && $jmonth==12 ) selected @endif>{{ __('حوت') }}</option>
                                    </select>
                                    <input type="submit" class="btn btn-primary" name="take_report_monthly" value="{{ __('گرفتن گزارش') }}">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- list of all mojres  -->
        </div>
        <!-- /.content-wrapper -->
        <div class="mojre_list table-responsive">
            <table class="table  table-bordered" style="background-color:#fff">
                <thead class="thead-light">
                <tr>
                    <th>{{ __('شماره') }}</th>
                    <th>{{ __('نمبر تذکره') }}</th>
                    <th>{{ __('نام') }}</th>
                    <th>{{ __('نام پدر') }}</th>
                    <th>{{ __('نام پدرکلان') }}</th>
                    <th>{{ __('عکس') }}</th>
                </tr>
                </thead>
                <tbody>
                    @if (isset($mojrems)? $counter=1: '')
                        @foreach ($mojrems as $mojrem)
                            <tr>
                                <td>{{ $counter++ }}</td>
                                <td>{{ $mojrem->ssn }}</td>
                                <td>{{ $mojrem->first_name }}</td>
                                <td>{{ $mojrem->father_name }}</td>
                                <td>{{ $mojrem->grand_father_name }}</td>
                                <td class="m_photo">
                                    <a href="{{ asset('/img/person_photos/'.$mojrem->person_image_name) }}" target="_blank">
                                        <img src="{{ asset('/img/person_photos/'.$mojrem->person_image_name) }}" alt="">
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>

            </table>
        </div>
        <!--------------------------
          | Your Page Content Here |
          -------------------------->
        <!-- ********************************************************************************* -->
    </div>
        <!-- /.content -->
    <!-- /.content-wrapper -->
@endsection
