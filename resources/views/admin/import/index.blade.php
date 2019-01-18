@extends('admin.layouts.app')
@section('title') صفحه مدیریت ورودی ها @endsection

@section('css')
    <link rel="stylesheet" href="{{url('/')}}/assets/vendor/select2/select2.min.css" type="text/css">
    <style>
        .excel-file{
            display: inline-block;
            text-align: right;
            background: #fff;
            padding: 6px;
            width: 100%;
            height: 46px;
            margin-top: 4px;
            position: relative;
            border-radius: 5px;
            font-weight: 400;
            font-size: 12px;
            color: #000;
            border: 1px dashed #607D8B;
            overflow: hidden;
        }
        .excel-file > [type='file'] {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            z-index: 10;
            cursor: pointer;
        }
        .excel-file > .button {
            cursor: pointer;
            background: #e91e63;
            padding: 8px 16px;
            color: #fff;
            font-size: 12px;
            position: absolute;
            right: -20px;
            height: 80px;
            top: -20px;
            line-height: 65px;
            border-radius: 50%;
            width: 80px;
            text-align: left;
            font-weight: 500;
        }
        .excel-file:hover > .button {
            background: dodgerblue;
            color: white;
        }

        .excel-file > label {
            color: #000;
            white-space: nowrap;
            opacity: .6;
            margin-right: 65px;
            padding-top: 5px;
        }

        .excel-file.-chosen > label {
            opacity: 1;
        }
    </style>
@endsection

@section('breadcrumb')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h4 class="m-b-10">صفحه مدیریت ورودی ها</h4>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.index')}}"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0);">مدیریت ورودی ها</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="pcoded-inner-content rtl text-right">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <!-- [ page content ] start -->
                    <!-- Store -->
                    <div class="card rtl text-right st-card">
                        <div class="card-header">
                            <span class="header-icon"><i class="feather icon-upload-cloud full-card"></i></span>
                            <h5>ورودی گرفتن از اطلاعات</h5>
                            <span class="header-action"><i class="feather icon-chevron-down"></i></span>
                        </div>
                        <div class="card-block table-border-style">
                            <form action="{{route('admin.import.submit')}}" method="post" class="form-material"  enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-lg-9">
                                        <div class="form-group excel-file {{ $errors->has('file') ? 'form-danger' : 'form-primary' }}">
                                            <input type="file" name="file" id="file">
                                            <span class='button'>انتخاب</span>
                                            @if ($errors->has('file'))
                                                <span class="input-error">{{ $errors->first('file') }}</span>
                                            @endif
                                            <label for="file"  data-js-label>فایل ورودی خود را وارد نمایید...</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <button class="btn btn-inverse waves-effect waves-light mt-1 w-100"
                                                type="submit">
                                            ثبت
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- [ page content ] end -->
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script type="text/javascript" src="{{url('/')}}/assets/vendor/select2/select2.min.js"></script>
    @include('admin.partials.notify')
    <script>
        $(document).ready(function () {
            $('select.isf').select2({
                language: "fa",
                dir: "rtl"
            });
            //----------=
            var inputs = document.querySelectorAll('.excel-file');

            for (var i = 0, len = inputs.length; i < len; i++) {
                customInput(inputs[i])
            }

            function customInput (el) {
                const fileInput = el.querySelector('[type="file"]');
                const label = el.querySelector('[data-js-label]');

                fileInput.onchange =
                    fileInput.onmouseout = function () {
                        if (!fileInput.value) return;

                        var value = fileInput.value.replace(/^.*[\\\/]/, '');
                        el.className += ' -chosen';
                        label.innerText = value
                    }
            }
        });
    </script>
@endsection