@extends('admin.layouts.app')
@section('title') صفحه ویرایش فصل @endsection

@section('breadcrumb')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h4 class="m-b-10">صفحه ویرایش فصل</h4>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.index')}}"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.session.index')}}">مدیریت فصول </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0);">ویرایش فصل</a>
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
                    <!-- Widget -->
                    <div class="row">
                        @php

                            $question = 0;
                            $question += count($session->questions);

                        @endphp
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-block">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <h4 class="text-c-red">{{$question}}</h4>
                                            <h6 class="text-muted m-b-0">سوال</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <i class="feather icon-calendar f-28"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-c-red">
                                    <div class="row align-items-center">
                                        <div class="col-9">
                                            <p class="text-white text-right m-b-0">% تعداد کل سوالات</p>
                                        </div>
                                        <div class="col-3 text-right">
                                            <i class="feather icon-trending-down text-white f-16"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Update -->
                    <div class="card rtl text-right st-card">
                        <div class="card-header">
                            <span class="header-icon"><i class="feather icon-edit full-card"></i></span>
                            <h5>ویرایش فصل</h5>
                            <span class="header-action"><i class="feather icon-chevron-down"></i></span>
                        </div>
                        <div class="card-block table-border-style">
                            <form action="{{route('admin.session.update', $session->id)}}" method="post" class="form-material">
                                @csrf
                                <div class="row">
                                    {{-- Name --}}
                                    <div class="col-lg-5">
                                        <div class="form-group {{ $errors->has('name') ? 'form-danger' : 'form-primary' }}">
                                            <input type="text" class="form-control rtl text-right isf" name="name" id="name" value="{{old('name',$session->name)}}">
                                            <span class="form-bar"></span>
                                            @if ($errors->has('name'))
                                                <span class="input-error">{{ $errors->first('name') }}</span>
                                            @endif
                                            <label for="name" class="float-label">عنوان فصل</label>
                                        </div>
                                    </div>
                                    {{-- Slug --}}
                                    <div class="col-lg-4">
                                        <div class="form-group {{ $errors->has('book_id') ? 'form-danger' : 'form-primary' }}">
                                            <select name="book_id" id="book_id" class="form-control isf">
                                                @foreach($books as $book)
                                                    <option @if(old('book_id',$session->book_id) == $book->id) selected @endif value="{{$book->id}}">{{$book->name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="form-bar"></span>
                                            @if ($errors->has('grade_id'))
                                                <span class="input-error">{{ $errors->first('book_id') }}</span>
                                            @endif
                                            <label for="book_id" class="float-label"> کتاب</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <button type="submit" class="btn btn-info waves-effect waves-light w-100">ویرایش</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Store Session -->
                    <div class="card rtl text-right st-card">
                        <div class="card-header">
                            <span class="header-icon"><i class="feather icon-save full-card"></i></span>
                            <h5>افزودن سوال</h5>
                            <span class="header-action"><i class="feather icon-chevron-down"></i></span>
                        </div>
                        <div class="card-block table-border-style">
                            <form action="{{route('admin.question.store')}}" method="post" class="form-material">
                                @csrf
                                <div class="row">
                                    <input type="hidden" name="grade_id" value="{{$session->book->grade_id}}">
                                    <input type="hidden" name="book_id" value="{{$session->book_id}}">
                                    <input type="hidden" name="session_id" value="{{$session->id}}">
                                    {{-- Question --}}
                                    <div class="col-lg-12">
                                        <div class="form-group {{ $errors->has('question') ? 'form-danger' : 'form-primary' }}">
                                            <textarea name="question" id="question" class="form-control rtl text-right isf" cols="30" rows="10"></textarea>
                                            <span class="form-bar"></span>
                                            @if ($errors->has('question'))
                                                <span class="input-error">{{ $errors->first('question') }}</span>
                                            @endif
                                            <label for="question" class="float-label">سوال</label>
                                        </div>
                                    </div>
                                    {{-- Option A --}}
                                    <div class="col-lg-1 text-center" style="line-height: 40px;">
                                        الف)
                                    </div>
                                    <div class="col-lg-11">
                                        <div class="form-group {{ $errors->has('option_a') ? 'form-danger' : 'form-primary' }}">
                                            <input type="text" class="form-control rtl text-right isf" name="option_a" id="option_a">
                                            <span class="form-bar"></span>
                                            @if ($errors->has('option_a'))
                                                <span class="input-error">{{ $errors->first('option_a') }}</span>
                                            @endif
                                            <label for="option_a" class="float-label">گزینه الف)</label>
                                        </div>
                                    </div>
                                    {{-- Option B --}}
                                    <div class="col-lg-1 text-center" style="line-height: 40px;">
                                        ب)
                                    </div>
                                    <div class="col-lg-11">
                                        <div class="form-group {{ $errors->has('option_b') ? 'form-danger' : 'form-primary' }}">
                                            <input type="text" class="form-control rtl text-right isf" name="option_b" id="option_b">
                                            <span class="form-bar"></span>
                                            @if ($errors->has('option_b'))
                                                <span class="input-error">{{ $errors->first('option_b') }}</span>
                                            @endif
                                            <label for="option_b" class="float-label">گزینه ب)</label>
                                        </div>
                                    </div>
                                    {{-- Option C --}}
                                    <div class="col-lg-1 text-center" style="line-height: 40px;">
                                        ج)
                                    </div>
                                    <div class="col-lg-11">
                                        <div class="form-group {{ $errors->has('option_c') ? 'form-danger' : 'form-primary' }}">
                                            <input type="text" class="form-control rtl text-right isf" name="option_c" id="option_c">
                                            <span class="form-bar"></span>
                                            @if ($errors->has('option_c'))
                                                <span class="input-error">{{ $errors->first('option_c') }}</span>
                                            @endif
                                            <label for="option_c" class="float-label">گزینه ج)</label>
                                        </div>
                                    </div>
                                    {{-- Option D --}}
                                    <div class="col-lg-1 text-center" style="line-height: 40px;">
                                        د)
                                    </div>
                                    <div class="col-lg-11">
                                        <div class="form-group {{ $errors->has('option_d') ? 'form-danger' : 'form-primary' }}">
                                            <input type="text" class="form-control rtl text-right isf" name="option_d" id="option_d">
                                            <span class="form-bar"></span>
                                            @if ($errors->has('option_d'))
                                                <span class="input-error">{{ $errors->first('option_d') }}</span>
                                            @endif
                                            <label for="option_d" class="float-label">گزینه د)</label>
                                        </div>
                                    </div>
                                    {{-- Rate --}}
                                    <div class="col-lg-4">
                                        <div class="form-group {{ $errors->has('rate') ? 'form-danger' : 'form-primary' }}">
                                            <select name="rate" id="rate" class="form-control isf">
                                                <option value="0">خیلی آسان</option>
                                                <option value="1">آسان</option>
                                                <option value="2">متوسط</option>
                                                <option value="3">دشوار</option>
                                                <option value="4">خیلی دشوار</option>
                                            </select>
                                            <span class="form-bar"></span>
                                            @if ($errors->has('rate'))
                                                <span class="input-error">{{ $errors->first('rate') }}</span>
                                            @endif
                                            <label for="rate" class="float-label"> درجه سختی</label>
                                        </div>
                                    </div>
                                    {{-- Answer Option --}}
                                    <div class="col-lg-4">
                                        <div class="form-group {{ $errors->has('a_option') ? 'form-danger' : 'form-primary' }}">
                                            <select name="a_option" id="a_option" class="form-control isf">
                                                <option value="">پاسخ صحیح</option>
                                                <option value="a">الف</option>
                                                <option value="b">ب</option>
                                                <option value="c">ج</option>
                                                <option value="d">د</option>
                                            </select>
                                            <span class="form-bar"></span>
                                            @if ($errors->has('a_option'))
                                                <span class="input-error">{{ $errors->first('a_option') }}</span>
                                            @endif
                                            <label for="a_option" class="float-label">گزینه صحیح</label>
                                        </div>
                                    </div>
                                    {{-- Answer --}}
                                    <div class="col-lg-12">
                                        <div class="form-group {{ $errors->has('answer') ? 'form-danger' : 'form-primary' }}">
                                            <textarea name="answer" id="answer" class="form-control rtl text-right isf" cols="30" rows="10"></textarea>
                                            <span class="form-bar"></span>
                                            @if ($errors->has('answer'))
                                                <span class="input-error">{{ $errors->first('answer') }}</span>
                                            @endif
                                            <label for="answer" class="float-label">پاسخ تفضیلی</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-8"></div>
                                    <div class="col-lg-4">
                                        <button type="submit" class="btn btn-info waves-effect waves-light w-100 mt-1">ثبــــت</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Questions -->
                    <div class="card rtl text-right isf st-card">
                        <div class="card-header">
                            <span class="header-icon"><i class="feather icon-list full-card"></i></span>
                            <h5>سوالات فصل</h5>
                            <span class="header-action"><i class="feather icon-chevron-down"></i></span>
                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <table class="table rtl text-right">
                                    <thead>
                                    <tr class="rtl text-right">
                                        <th>#</th>
                                        <th>سوال</th>
                                        <th>جواب</th>
                                        <th>عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @forelse($session->questions as $question)
                                        <tr class="fnt-10p">
                                            <th scope="row">{{++$i}}</th>
                                            <td>
                                                <div class="row fnt-10p rtl" style="width: 350px;">
                                                    <div class="col-lg-12 truncate">{{$question->question}}</div>
                                                    @foreach($question->options as $option)
                                                    <div class="col-lg-6 truncate">{{getOption($option->option).$option->text}}</div>
                                                    @endforeach
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row rtl">
                                                    @foreach($question->answers as $answer)
                                                        <div class="col-lg-12 truncate">{{getOption($answer->option).$answer->answer}}</div>
                                                    @endforeach
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{route('admin.question.edit', $question->id)}}" class="btn btn-inverse btn-sm waves-effect waves-light w-100">مشاهده</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <th colspan="5" class="text-center">هیچ منبعی یافت نشد!</th>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- [ page content ] end -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @include('admin.partials.notify')
@endsection