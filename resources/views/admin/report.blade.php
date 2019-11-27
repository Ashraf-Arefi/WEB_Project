@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Content Wrapper. Contains page content -->

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>{{ __('صفحه گذارشات عمومی') }}</h1>
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
                            <div class="general_report">
                                <form action="{{ route('admin.report.general') }}" method="get" autocomplete="off">
                                    {{ csrf_field() }}
                                <input type="text" id="t1" style="float:right; margin-left:10px;" name="start_date" value="{{ isset($start_date)? $start_date: '' }}" placeholder="روز/ ماه/ سال" cols="13" required>

                                <input type="text" id="t2" style="float:right; margin-left:10px;" name="end_date" value="{{ isset($end_date)? $end_date: '' }}" placeholder="روز/ ماه/ سال" required>
                                <input type="submit" class="btn btn-primary" name="take_report_generaly" value="{{ __('گرفتن گزارش') }}">

                                <span class="alert alert-default">
                                    {{ __('تاریخ را به شکل   1398/10/27   وارد کنید') }}
                                </span>
                                </form>
                                <!-- making the date validate -->
                                <script src="{{ asset('/js/jquery.min.js') }}"></script>

                                <script src="{{ asset('/js/kamadatepicker.js') }}"></script>


                                <script>
                                    //kamaDatepicker('test-date-id');
                                    kamaDatepicker('t1', { buttonsColor: "blue", forceFarsiDigits: true,markToday:true,gotoToday:true});
                                    kamaDatepicker('t2', { buttonsColor: "blue", forceFarsiDigits: true,markToday:true,gotoToday:true});
                                </script>

                                <script>
                                    $(document).ready(function(){
                                        $('#general_start_date').change(function(){
                                            //alert(2);
                                            if(!check_date('general_start_date')) {
                                                alert('تاریخ را اشتباه وارد نموده اید!');
                                                $(this).val('');
                                            }
                                        });

                                        $('#general_end_date').change(function(){
                                            if(!check_date('general_end_date')) {
                                                alert('تاریخ را اشتباه وارد نموده اید!');
                                                $(this).val('');
                                            }
                                        });


                                        function check_date(id) {
                                            let start_date = $('#'+id).val();
                                            let arr = start_date.split('/');
                                            if(arr.length == 3) {
                                                if(arr[0].length != 4 || arr[1].length >2 || arr[2].length >2) {
                                                    return false;
                                                }else {
                                                    return true;
                                                }
                                            }else {
                                                return false;
                                            }
                                        }
                                    });
                                </script>
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
