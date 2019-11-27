@extends('layouts.admin')
@section('content')
    <div class="content-wrapper ">
        <!-- Content Header (Page header) -->
        <div class="container">
            <div class="single">
                <div class="row">
                    <!-- image section of mojrems_show -->
                    <div class="col-lg-8 ">
                        <div class="row">
                            <h3>{{ __('مشخصات شخصی') }}</h3>
                            <table class="table mojrems_show_info">
                                <thead>
                                <tr>
                                    <th>{{ __('نام') }}</th>
                                    <td>{{ $mojrems_show->first_name }}</td>
                                    <td>
                                        <div class="col-lg-4 single_photo">
                                            <a href="{{ asset('/img/person_photos/'.$mojrems_show->person_image_name) }}" target="_blank"> <img style="position:absolute;left:50px;" src="{{ asset('/img/person_photos/'.$mojrems_show->person_image_name) }}" alt="Person Photo" width='130' id="ph"></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>{{ __('پدر') }}</th>
                                    <td>{{ $mojrems_show->father_name }}</td>
                                    <!-- <th>مکان واقعه</th>
                                    <td>هرات</td> -->
                                </tr>
                                <tr>
                                    <th>{{ __('نام پدر کلان') }}</th>
                                    <td>{{ $mojrems_show->grand_father_name }}</td>
                                    <!-- <th>تاریخ واقعه</th>
                                    <td>1397</td> -->
                                </tr>
                                <tr>
                                    <th>{{ __('نمبر تذکره') }}</th>
                                    <td>{{ $mojrems_show->ssn }}</td>
                                    <!-- <th>وکیل گذر مربوطه ناحیه</th>
                                    <td>افضلی</td> -->
                                </tr>
                                </thead>
                            </table>
                            <h3>{{ __('سکونت اصلی و فعلی') }}</h3>
                            <table class="table mojrems_show_info">
                                <tr>
                                    <th>{{ __('قریه') }}</th>
                                    <td>{{ $mojrems_show->p_village }}</td>
                                    <th>{{ __('گذر') }}</th>
                                    <td>{{ $mojrems_show->t_gozar }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('والسوالی') }}</th>
                                    <td>{{ $mojrems_show->p_district }}</td>
                                    <th>{{ __('ناحیه') }}</th>
                                    <td>{{ $mojrems_show->t_nahiya }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('ولایت') }}</th>
                                    <td>{{ $mojrems_show->p_province }}</td>
                                    <th>{{ __('ولایت') }}</th>
                                    <td>{{ $mojrems_show->t_province }}</td>
                                </tr>
                            </table>
                            <h3>{{ __('شریک و وظیفوی کارمند مربوطه') }}</h3>
                            <table class="table mojrems_show_info">
                                <tr>
                                    <th>{{ __('نام کارمند') }}</th>
                                    <td>{{ $mojrems_show->related_employee_name }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('تخلص کارمند') }}</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>{{ __('شماره تماس') }}</th>
                                    <td>{{ $mojrems_show->related_employee_number }}</td>
                                </tr>
                            </table>
                            <h3>{{ __('نتیجه واقعه') }}</h3>
                            <table class="table mojrems_show_info">
                                <tr>
                                    <th>{{ __('نتیجه واقعه') }}</th>
                                    <td>{{ $mojrems_show->result }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('به اساس') }}</th>
                                    <td>{{ $mojrems_show->reason }}</td>
                                </tr>
                            </table>
                        </div><!--end of row-->
                    </div> <!--end of mojrems_show info-->
                </div><!--end of row-->

            </div> <!--end of div.single-->
        </div><!--end of container-->      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        <!-- ********************************************************************************* -->

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection