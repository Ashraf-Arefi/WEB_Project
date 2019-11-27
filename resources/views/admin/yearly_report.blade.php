@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>{{ __('صفحه گذارشات سالانه') }}</h1>
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
                            <div class="yearly_report">
                                <form action="{{ route('admin.report.yearly') }}" method="get">
                                    <input type="text" name="year" value="{{ isset($getyear) ? $getyear: '' }}"  placeholder="{{ __('سال را وارد کنید') }}">
                                    <input type="submit" class="btn btn-primary" name="take_report_yearly" value="{{ __('گرفتن گزارش') }}">
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
        <div class="row">
            <div class="col-12 text-center">
                @if (isset($mojrems))
                    {{ $mojrems->links() }}
                @endif
            </div>
        </div>
        <!--------------------------
          | Your Page Content Here |
          -------------------------->
        <!-- ********************************************************************************* -->
    </div>
        <!-- /.content -->
    <!-- /.content-wrapper -->

@endsection
