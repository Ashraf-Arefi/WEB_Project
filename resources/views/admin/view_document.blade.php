@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="container-fluid">
            <div class="content">
                <div class="col-lg-3 pull-left" style="border:1px solid lightgray;">
                    <button class="btn btn-primary" id="btn_show">{{ __('آپلود ضمیمه') }}</button>

                        <form id="myform" action="{{ route('admin.upload.document',[$documents->first()->user_id]) }}" method="post" enctype="multipart/form-data" style="display:none;">
                            {{ csrf_field() }}
                            <label for="img">{{ __('انتخاب عکس ') }}<span class="fa fa-upload"></span></label>
                            <input type="file" name="img" id="img">
                            <button type="submit" name="upload_docs" class="btn btn-primary pull-left">
                                {{ __('آپلود') }}
                            </button>
                        </form>

                </div>
                <div class="row">
                    @if (isset($documents)? $counter = 1:  '' && count($documents) > 0)
                        @foreach($documents as $document)
                            <div class="col-lg-8" class="t">
                                <div class="caption">
                                    <span class="pull-right">{{ __('ضمیمه شماره') }} {{ $counter++ }}</span>
                                    <a  class="btn btn-danger pull-left del_doc" href="{{ route('admin.delete.document', [$document->document_name]) }}" style="margin-bottom:5px;">حذف ضمیمه</a>
                                </div>
                                <img id="docs_img" class="img img-responsive img-thumbnail" src="{{ asset('/img/document/'.$document->document_name) }}" alt="">
                            </div>
                            <div class="col-lg-12"><br><br><br></div>
                        @endforeach
                    @endif
                </div>
            </div>
            <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('#btn_show').click(function () {
                    $('#myform').css('display', 'block');
                    $(this).css('display', 'none');
                });
                $('#myform').change(function(){
                    $('label').html('{{ __("انتخاب شد") }}');
                });
            });

            // });

        </script>      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        <!-- ********************************************************************************* -->
        <!-- /.content -->
    </div>

</div>
    <!-- /.content-wrapper -->
@endsection