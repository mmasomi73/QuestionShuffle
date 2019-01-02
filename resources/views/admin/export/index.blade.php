@extends('admin.layouts.app')
@section('title') صفحه مدیریت خروجی ها @endsection

@section('css')
    <link rel="stylesheet" href="{{url('/')}}/assets/vendor/select2/select2.min.css" type="text/css">
@endsection

@section('breadcrumb')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h4 class="m-b-10">صفحه مدیریت خروجی ها</h4>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.index')}}"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0);">مدیریت خروجی ها</a>
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
                            <span class="header-icon"><i class="feather icon-download-cloud full-card"></i></span>
                            <h5>خروجی گرفتن از اطلاعات</h5>
                            <span class="header-action"><i class="feather icon-chevron-down"></i></span>
                        </div>
                        <div class="card-block table-border-style">
                            <form action="{{route('admin.export.index')}}" method="get" class="form-material">
                                <div class="row">
                                    {{--Questions--}}
                                    <div class="col-lg-12">
                                        <div class="card bg-c-love order-card">
                                            <div class="card-block">
                                                @php
                                                    $avg = 0;
                                                    $sum = 0;
                                                    $cnt = 0;
                                                    foreach ($questions as $question) {
                                                        $sum += $question->rate;
                                                    }
                                                    $cnt = count($questions);
                                                    $avg = $sum / $cnt;
                                                @endphp
                                                <h6>تعداد سوالات با شرایط مد نظر</h6>
                                                <h2>{{$cnt}}</h2>
                                                <p class="m-b-0">
                                                    {{$avg}} <i class="feather icon-arrow-down m-l-10 m-r-10"></i>
                                                </p>
                                                <i class="card-icon feather icon-radio"></i>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Grade --}}
                                    <div class="col-lg-3">
                                        <div class="form-group {{ $errors->has('grade_id') ? 'form-danger' : 'form-primary' }}">
                                            <label for="grade_id" class="select-label"> پایه</label>
                                            <select name="grade_id[]" id="grade_id" class="form-control isf"
                                                    multiple="multiple">
                                                @foreach($grades as $grade)
                                                    <option @if(old('grade_id') == $grade->id || in_array($grade->id,is_array($request->get('grade_id')) ? $request->get('grade_id'):[] )) selected
                                                            @endif value="{{$grade->id}}">{{$grade->name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="form-bar"></span>
                                            @if ($errors->has('grade_id'))
                                                <span class="input-error">{{ $errors->first('grade_id') }}</span>
                                            @endif

                                        </div>
                                    </div>
                                    {{-- Book --}}
                                    <div class="col-lg-3">
                                        <div class="form-group {{ $errors->has('book_id') ? 'form-danger' : 'form-primary' }}">
                                            <label for="book_id" class="select-label"> کتاب یا منبع</label>
                                            <select name="book_id[]" id="book_id" class="form-control isf"
                                                    multiple="multiple">
                                                @foreach($grades as $grade)
                                                    <optgroup class="grade-book" label="{{$grade->name}}"
                                                              data-id="{{$grade->id}}">
                                                        @foreach($grade->books as $book)
                                                            <option @if(old('book_id') == $book->id || in_array($book->id,is_array($request->get('book_id')) ? $request->get('book_id'):[] )) selected
                                                                    @endif value="{{$book->id}}">{{$book->name}}</option>
                                                        @endforeach
                                                    </optgroup>
                                                @endforeach
                                            </select>
                                            <span class="form-bar"></span>
                                            @if ($errors->has('book_id'))
                                                <span class="input-error">{{ $errors->first('book_id') }}</span>
                                            @endif

                                        </div>
                                    </div>
                                    {{-- Session --}}
                                    <div class="col-lg-3">
                                        <div class="form-group {{ $errors->has('session_id') ? 'form-danger' : 'form-primary' }}">
                                            <label for="session_id" class="select-label"> فصل</label>
                                            <select name="session_id[]" id="session_id" class="form-control isf"
                                                    multiple="multiple">
                                                <option value="">هیچ کدام</option>
                                                @foreach($grades as $grade)
                                                    @foreach($grade->books as $book)
                                                        <optgroup class="book-session" label="{{$book->name}}"
                                                                  data-id="{{$book->id}}">
                                                            @foreach($book->sessions as $session)
                                                                <option @if(old('session_id') == $session->id || in_array($session->id,is_array($request->get('session_id')) ? $request->get('session_id'):[] )) selected
                                                                        @endif value="{{$session->id}}">{{$session->name}}</option>
                                                            @endforeach
                                                        </optgroup>
                                                    @endforeach
                                                @endforeach
                                            </select>
                                            <span class="form-bar"></span>
                                            @if ($errors->has('session_id'))
                                                <span class="input-error">{{ $errors->first('session_id') }}</span>
                                            @endif

                                        </div>
                                    </div>
                                    {{-- Rate --}}
                                    <div class="col-lg-3">
                                        <div class="form-group {{ $errors->has('rate') ? 'form-danger' : 'form-primary' }}">
                                            <label for="rate" class="select-label"> درجه سختی</label>
                                            <select name="rate[]" id="rate" class="form-control isf"
                                                    multiple="multiple">
                                                <option @if(old('rate') == '0' || in_array('0',is_array($request->get('rate'))?$request->get('rate') : [])) selected
                                                        @endif value="0">خیلی آسان
                                                </option>
                                                <option @if(old('rate') == '1' || in_array('1',is_array($request->get('rate'))?$request->get('rate') : [])) selected
                                                        @endif value="1">آسان
                                                </option>
                                                <option @if(old('rate') == '2' || in_array('2',is_array($request->get('rate'))?$request->get('rate') : [])) selected
                                                        @endif value="2">متوسط
                                                </option>
                                                <option @if(old('rate') == '3' || in_array('3',is_array($request->get('rate'))?$request->get('rate') : [])) selected
                                                        @endif value="3">دشوار
                                                </option>
                                                <option @if(old('rate') == '4' || in_array('4',is_array($request->get('rate'))?$request->get('rate') : [])) selected
                                                        @endif value="4">خیلی دشوار
                                                </option>
                                            </select>
                                            <span class="form-bar"></span>
                                            @if ($errors->has('rate'))
                                                <span class="input-error">{{ $errors->first('rate') }}</span>
                                            @endif

                                        </div>
                                    </div>
                                    {{-- Format --}}
                                    <div class="col-lg-3">
                                        <div class="form-group {{ $errors->has('format') ? 'form-danger' : 'form-primary' }}">

                                            <select name="format" id="format" class="form-control">
                                                <option value=""></option>
                                                <option @if(old('format',$request->get('format')) == 'excel') selected
                                                        @endif value="excel">اکسل
                                                </option>
                                                <option @if(old('format',$request->get('format')) == 'word') selected
                                                        @endif value="word">ورد
                                                </option>
                                            </select>
                                            <span class="form-bar"></span>
                                            @if ($errors->has('format'))
                                                <span class="input-error">{{ $errors->first('format') }}</span>
                                            @endif
                                            <label for="format" class="float-label"> فرمت خروجی</label>
                                        </div>
                                    </div>
                                    {{-- Number --}}
                                    <div class="col-lg-3">
                                        <div class="form-group {{ $errors->has('number') ? 'form-danger' : 'form-primary' }}">
                                            <input type="text" class="form-control ltr text-left isf" name="number"
                                                   id="number" value="{{old('number',$request->get('number'))}}">
                                            <span class="form-bar"></span>
                                            @if ($errors->has('number'))
                                                <span class="input-error">{{ $errors->first('number') }}</span>
                                            @endif
                                            <label for="number" class="float-label">تعداد سوالات</label>
                                        </div>
                                    </div>
                                    {{-- Quantity --}}
                                    <div class="col-lg-3">
                                        <div class="form-group {{ $errors->has('quantity') ? 'form-danger' : 'form-primary' }}">
                                            <input type="text" class="form-control ltr text-left isf" name="quantity"
                                                   id="quantity" value="{{old('quantity',$request->get('quantity'))}}">
                                            <span class="form-bar"></span>
                                            @if ($errors->has('quantity'))
                                                <span class="input-error">{{ $errors->first('quantity') }}</span>
                                            @endif
                                            <label for="quantity" class="float-label">تعداد سری خروجی</label>
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
        });
    </script>
@endsection