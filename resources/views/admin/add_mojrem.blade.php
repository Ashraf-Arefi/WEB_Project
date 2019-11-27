@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Content Wrapper. Contains page content -->
        <div class="">
            <script src="{{ asset('/js/kamadatepicker.js') }}"></script>

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>{{ __('اضافه کردن مجرم جدید') }}</h1>
                <ol class="breadcrumb">
                    <li><a href="{{ route('home') }}">{{ __('خانه') }}</a></li>
                    <li class="active">{{ __('مجرم جدید') }}</li>
                </ol>
            </section>

            <!-- start the form the add the mojrem info-->
            <div class="container">
                <div class="row main-content">
                    <div class="col-lg-10">
                        <!-- personal information  -->
                        <form action="" method="post" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            <fieldset>
                                <legend>{{ __('مشخصات شخصی') }}</legend>
                                <div class="row">
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <!-- firstname input -->
                                            <div class="col-lg-6">
                                                <div class="form-group full required">
                                                    <div class="frm-input {{ $errors->has('first_name')? 'has-error': '' }}">
                                                        <label for="">{{ __('نام') }}</label>

                                                        <input type="text" class="form-control required" name="first_name" placeholder="{{ __('نام مجرم') }}" value="{{ old('first_name') }}">
                                                        {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- father name input -->

                                            <div class="col-lg-6">
                                                <div class="form-group full required">
                                                    <div class="frm-input {{ $errors->has('father_name')? 'has-error': '' }}">
                                                        <label for="">{{ __('نام پدر') }}</label>
                                                        <input type="text" class="form-control required" name="father_name" placeholder="{{ __('نام پدر مجرم') }}" value="{{ old('father_name') }}">
                                                        {!! $errors->first('father_name', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- grand father name -->
                                            <div class="col-lg-6">
                                                <div class="form-group full required">
                                                    <div class="frm-input {{ $errors->has('father_name')? 'has-error': '' }}">
                                                        <label for="">{{ __(' نام پدر کلان') }}</label>
                                                        <input type="text" class="form-control required" name="grand_father_name" placeholder="{{ __('نام پدر کلان مجرم') }}" value="{{ old('grand_father_name') }}">
                                                        {!! $errors->first('grand_father_name', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ssn number input -->
                                            <div class="col-lg-6">
                                                <div class="form-group full required">
                                                    <div class="frm-input {{ $errors->has('ssn')? 'has-error': '' }}">
                                                        <label for="">{{ __(' نمبر تذکره مجرم') }}</label>
                                                        <input type="text" class="form-control required" name="ssn" placeholder="{{ __(' نمبر تذکره مجرم') }}" value="{{ old('ssn') }}">
                                                        {!! $errors->first('ssn', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--end of row inner  t the col-lg-6-->
                                    </div><!--end of col-lg-10 -->
                                    <script src="{{ asset('/js/jquery.min.js') }}"></script>
                                    <script>
                                        $(document).ready(function(){
                                            function show(input) {
                                                if(input.files && input.files[0]) {
                                                    var reader = new FileReader();
                                                    reader.onload  = function(e) {
                                                        $('#priv').html("<img src='"+e.target.result+"' width='140' style='margin-bottom:100px;'>");
                                                    }
                                                    reader.readAsDataURL(input.files[0]);

                                                }
                                            }
                                            $('#file').change(function(){
                                                show(this);
                                                $('#p_text').hide();
                                            });
                                        });

                                    </script>
                                    <!-- mojrem photo input -->
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label class="custom-file-upload">
                                                <input type="file" id="file" onchange="run_show();" name="mojrem_photo"/>
                                                <span id="priv"></span>
                                                <i class="fa fa-cloud-upload" id="p_text">{{ __('انتخاب عکس') }}<br>( {{ __('حداکثر') }} 5MB)</i>

                                            </label>
                                        </div>

                                    </div>
                                </div>
                            </fieldset>

                            <!-- Information about event -->
                            <fieldset class="event">
                                <legend>{{ __('مشخصات مربوطه واقعه') }}</legend>
                                <div class="row">
                                    <!-- event type input  -->
                                    <div class="col-lg-6">
                                        <div class="form-group full required">
                                            <div class="frm-input {{ $errors->has('event_type')? 'has-error': '' }}">
                                                <label for="">{{ __(' نوع حادثه') }}</label>
                                                <input type="text" class="form-control required" name="event_type" placeholder="{{ __(' نوع حادثه') }}" value="{{ old('event_type') }}">
                                                {!! $errors->first('event_type', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- event place inout -->
                                    <div class="col-lg-6">
                                        <div class="form-group full required">
                                            <div class="frm-input {{ $errors->has('place')? 'has-error': '' }}">
                                                <label for="">{{ __(' محل حادثه') }}</label>
                                                <input type="text" class="form-control required" name="place" placeholder="{{ __(' محل حادثه') }}" value="{{ old('place') }}">
                                                {!! $errors->first('place', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- event date input  -->
                                    <div class="col-lg-6">
                                        <div class="form-group full required">
                                            <div class="frm-input {{ $errors->has('date')? 'has-error': '' }}">
                                                <label for="">{{ __(' تاریخ واقعه') }}</label>
                                                <input type="text" class="form-control required" name="date" placeholder="{{ __(' تاریخ واقعه') }}" value="{{ old('date') }}">
                                                {!! $errors->first('date', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        //kamaDatepicker('test-date-id');
                                        kamaDatepicker('test-date-id', { buttonsColor: "blue", forceFarsiDigits: true,markToday:true,gotoToday:true,twodigit:false});
                                    </script>
                                    <!-- vakil input   -->
                                    <div class="col-lg-6">
                                        <div class="form-group full required">
                                            <div class="frm-input {{ $errors->has('wakil')? 'has-error': '' }}">
                                                <label for="">{{ __('وکیل گذر') }}</label>
                                                <input type="text" class="form-control required" name="wakil" placeholder="{{ __(' وکیل گذر') }}" value="{{ old('wakil') }}">
                                                {!! $errors->first('wakil', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <!-- end of  information about event  -->
                            <!-- information aboout main place -->
                            <fieldset class="event">
                                <legend>{{ __('مشخصات محل سکونت') }}</legend>
                                <caption>{{ __('سکونت اصلی') }}</caption>
                                <div class="row">
                                    <!-- village input  -->
                                    <div class="col-lg-4">
                                        <div class="form-group full required">
                                            <div class="frm-input {{ $errors->has('p_village')? 'has-error': '' }}">
                                                <label for=""> {{ __('قریه') }}</label>
                                                <input type="text" class="form-control required" name="p_village" placeholder="{{ __('قریه') }}" value="{{ old('p_village') }}">
                                                {!! $errors->first('p_village', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group full required">
                                            <div class="frm-input {{ $errors->has('p_district')? 'has-error': '' }}">
                                                <label for=""> {{ __('والسوالی') }}</label>
                                                <input type="text" class="form-control required" name="p_district" placeholder="{{ __('والسوالی') }}" value="{{ old('p_district') }}">
                                                {!! $errors->first('p_district', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </div>
                                    </div>

                                    <!-- province input -->
                                    <div class="col-lg-4">
                                        <div class="form-group full required">
                                            <div class="frm-input {{ $errors->has('p_province')? 'has-error': '' }}">
                                                <label for=""> {{ __('ولایت') }}</label>
                                                <input type="text" class="form-control required" name="p_province" placeholder="{{ __('ولایت') }}" value="{{ old('p_province') }}">
                                                {!! $errors->first('p_province', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <!-- end of main place  -->

                            <!-- start the previous place -->
                            <fieldset class="event">
                                <caption>{{ __('سکونت فعلی') }}</caption>
                                <div class="row">
                                    <!-- kozar input -->
                                    <div class="col-lg-4">
                                        <div class="form-group full required">
                                            <div class="frm-input {{ $errors->has('t_gozar')? 'has-error': '' }}">
                                                <label for="">{{ __(' گذر') }}</label>
                                                <input type="text" class="form-control required" name="t_gozar" placeholder="{{ __(' گذر') }}" value="{{ old('t_gozar') }}">
                                                {!! $errors->first('t_gozar', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- area input -->
                                    <div class="col-lg-4">
                                        <div class="form-group full required">
                                            <div class="frm-input {{ $errors->has('t_nahiya')? 'has-error': '' }}">
                                                <label for="">{{ __(' ناحیه') }}</label>
                                                <input type="text" class="form-control required" name="t_nahiya" placeholder="{{ __(' ناحیه') }}" value="{{ old('t_nahiya') }}">
                                                {!! $errors->first('t_nahiya', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- province input  -->
                                    <div class="col-lg-4">
                                        <div class="form-group full required">
                                            <div class="frm-input {{ $errors->has('t_province')? 'has-error': '' }}">
                                                <label for="">{{ __(' ولایت') }}</label>
                                                <input type="text" class="form-control required" name="t_province" placeholder="{{ __(' ولایت') }}" value="{{ old('t_province') }}">
                                                {!! $errors->first('t_province', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <!-- end of  Previous place section   -->
                            <fieldset class="event">
                                <legend>{{ __('شریک وظیفوی کارمند مربوطه') }}</legend>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group full required">
                                            <div class="frm-input {{ $errors->has('related_employee_name')? 'has-error': '' }}">
                                                <label for="">{{ __(' نام کارمند') }}</label>
                                                <input type="text" class="form-control required" name="related_employee_name" placeholder="{{ __(' نام کارمند') }}" value="{{ old('related_employee_name') }}">
                                                {!! $errors->first('related_employee_name', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="form-group full required">
                                            <div class="frm-input {{ $errors->has('related_employee_number')? 'has-error': '' }}">
                                                <label for="">{{ __('شماره تماس') }}</label>
                                                <input type="text" class="form-control required" name="related_employee_number" placeholder="{{ __('شماره تماس') }}" value="{{ old('related_employee_number') }}">
                                                {!! $errors->first('related_employee_number', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <!-- end of previous place section  -->
                            <!-- start the result section  -->
                            <fieldset class="event">
                                <legend>{{ __('نتیجه واقعه') }}</legend>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group full required">
                                            <div class="frm-input {{ $errors->has('result')? 'has-error': '' }}">
                                                <label for="">{{ __('نتیجه') }}</label>
                                                <input type="text" class="form-control required" name="result" placeholder="{{ __('نتیجه') }}" value="{{ old('result') }}">
                                                {!! $errors->first('result', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group full required">
                                            <div class="frm-input {{ $errors->has('reason')? 'has-error': '' }}">
                                                <label for="">{{ __('به اساس') }}</label>
                                                <input type="text" class="form-control required" name="reason" placeholder="{{ __('به اساس') }}" value="{{ old('reason') }}">
                                                {!! $errors->first('reason', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <!-- end of result section  -->
                            <!-- file uploder -->
                            <br>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block" name="submit">{{ __('ثبت اطلاعات') }}</button>
                            </div>
                    </div><!--end of col-lg-12 -->
                    </form>
                </div><!--end of row-->
            </div><!--end of container-->
        </div><!--end of content-->
        <script>
            $(document).ready(function(){

                $('#test').change(function(){
                    //  show(this);
                    $('.help-block').text({{ __('اسناد انتخاب شدند!') }});
                });
            });

        </script>      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        <!-- ********************************************************************************* -->
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection