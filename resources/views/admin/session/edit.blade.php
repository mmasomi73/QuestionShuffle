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
                            <a href="#!"><i class="feather icon-home"></i></a>
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
                    <div class="card rtl text-right">
                        <div class="card-header">
                            <h5>ویرایش فصل</h5>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i>
                                    </li>
                                    <li><i class="feather icon-maximize full-card"></i></li>
                                    <li><i class="feather icon-minus minimize-card"></i></li>
                                    <li><i class="feather icon-refresh-cw reload-card"></i></li>
                                    <li><i class="feather icon-trash close-card"></i></li>
                                    <li><i class="feather icon-chevron-left open-card-option"></i></li>
                                </ul>
                            </div>
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
                    <div class="card rtl text-right">
                        <div class="card-header">
                            <h5>افزودن سوال</h5>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i>
                                    </li>
                                    <li><i class="feather icon-maximize full-card"></i></li>
                                    <li><i class="feather icon-minus minimize-card"></i></li>
                                    <li><i class="feather icon-refresh-cw reload-card"></i></li>
                                    <li><i class="feather icon-trash close-card"></i></li>
                                    <li><i class="feather icon-chevron-left open-card-option"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-block table-border-style">
                            <form action="{{route('admin.question.store')}}" method="post" class="form-material">
                                @csrf
                                <input type="hidden" name="book_id" value="{{$session->book_id}}">
                                <input type="hidden" name="session_id" value="{{$session->id}}">
                                <div class="row">
                                    {{-- Name --}}


                                    <div class="col-lg-3">
                                        <button type="submit" class="btn btn-info waves-effect waves-light w-100">ثبــــت</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Books -->
                    <div class="card rtl text-right isf">
                        <div class="card-header">
                            <h5>سوالات فصل</h5>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i>
                                    </li>
                                    <li><i class="feather icon-maximize full-card"></i></li>
                                    <li><i class="feather icon-minus minimize-card"></i></li>
                                    <li><i class="feather icon-refresh-cw reload-card"></i></li>
                                    <li><i class="feather icon-trash close-card"></i></li>
                                    <li><i class="feather icon-chevron-left open-card-option"></i></li>
                                </ul>
                            </div>
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
                                                <div class="row fnt-10p">
                                                    <div class="col-lg-12">{{$question->question}}</div>
                                                    @foreach($question->options as $option)
                                                    <div class="col-lg-6">{{$option->option.'('.$option->text}}</div>
                                                    @endforeach
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    @foreach($question->answers as $answer)
                                                        <div class="col-lg-12">{{$answer->option.'('.$answer->answer}}</div>
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