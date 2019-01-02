@extends('admin.layouts.app')
@section('title') صفحه ویرایش کتاب @endsection

@section('breadcrumb')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h4 class="m-b-10">صفحه ویرایش کتاب و منبع</h4>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.index')}}"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.book.index')}}">مدیریت کتب </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0);">ویرایش کتاب</a>
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
                <div class="page-body isf">
                    <!-- [ page content ] start -->
                    <!-- Widget -->
                    <div class="row">
                        @php

                            $session = 0;
                            $question = 0;

                            $session += count($book->sessions);
                            foreach ($book->sessions as $s) {
                                $question += count($s->questions);
                            }

                        @endphp
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-block">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <h4 class="text-c-green">{{$session}}</h4>
                                            <h6 class="text-muted m-b-0">فصل</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <i class="feather icon-file-text f-28"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-c-green">
                                    <div class="row align-items-center">
                                        <div class="col-9">
                                            <p class="text-white  text-right m-b-0">% تعداد کل فصول منبع</p>
                                        </div>
                                        <div class="col-3 text-right">
                                            <i class="feather icon-trending-up text-white f-16"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
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
                            <h5>ویرایش کتاب یا منبع</h5>
                            <span class="header-action"><i class="feather icon-chevron-down"></i></span>
                        </div>
                        <div class="card-block table-border-style">
                            <form action="{{route('admin.book.update', $book->id)}}" method="post" class="form-material">
                                @csrf
                                <div class="row">
                                    {{-- Name --}}
                                    <div class="col-lg-5">
                                        <div class="form-group {{ $errors->has('name') ? 'form-danger' : 'form-primary' }}">
                                            <input type="text" class="form-control rtl text-right isf" name="name" id="name" value="{{old('name',$book->name)}}">
                                            <span class="form-bar"></span>
                                            @if ($errors->has('name'))
                                                <span class="input-error">{{ $errors->first('name') }}</span>
                                            @endif
                                            <label for="name" class="float-label">نام کتاب یا منبع</label>
                                        </div>
                                    </div>
                                    {{-- Slug --}}
                                    <div class="col-lg-4">
                                        <div class="form-group {{ $errors->has('grade_id') ? 'form-danger' : 'form-primary' }}">
                                            <select name="grade_id" id="grade_id" class="form-control isf">
                                                @foreach($grades as $grade)
                                                    <option @if(old('grade_id',$book->grade_id) == $grade->id) selected @endif value="{{$grade->id}}">{{$grade->name}}({{$grade->slug}})</option>
                                                @endforeach
                                            </select>
                                            <span class="form-bar"></span>
                                            @if ($errors->has('grade_id'))
                                                <span class="input-error">{{ $errors->first('grade_id') }}</span>
                                            @endif
                                            <label for="grade_id" class="float-label"> پایه</label>
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
                            <span class="header-icon"><i class="feather icon-file-plus full-card"></i></span>
                            <h5>افزودن فصول کتاب</h5>
                            <span class="header-action"><i class="feather icon-chevron-down"></i></span>
                        </div>
                        <div class="card-block table-border-style">
                            <form action="{{route('admin.session.store')}}" method="post" class="form-material">
                                @csrf
                                <input type="hidden" name="book_id" value="{{$book->id}}">
                                <div class="row">
                                    {{-- Name --}}
                                    <div class="col-lg-9">
                                        <div class="form-group {{ $errors->has('name') ? 'form-danger' : 'form-primary' }}">
                                            <input type="text" class="form-control rtl text-right isf" name="name" id="name">
                                            <span class="form-bar"></span>
                                            @if ($errors->has('name'))
                                                <span class="input-error">{{ $errors->first('name') }}</span>
                                            @endif
                                            <label for="name" class="float-label">عنوان فصل</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <button type="submit" class="btn btn-info waves-effect waves-light w-100">ثبــــت</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Books -->
                    <div class="card rtl text-right isf st-card">
                        <div class="card-header">
                            <span class="header-icon"><i class="feather icon-list full-card"></i></span>
                            <h5>فصول کتاب</h5>
                            <span class="header-action"><i class="feather icon-chevron-down"></i></span>
                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <table class="table rtl text-right">
                                    <thead>
                                    <tr class="rtl text-right">
                                        <th>#</th>
                                        <th>نام</th>
                                        <th>تعداد سوالات</th>
                                        <th>عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @forelse($book->sessions as $session)
                                        @php
                                            $question = 0;
                                            $question += count($session->questions);

                                        @endphp
                                        <tr>
                                            <th scope="row">{{++$i}}</th>
                                            <td>{{$session->name}}</td>
                                            <td>{{$question}}</td>
                                            <td>
                                                <a href="{{route('admin.session.edit', $session->id)}}" class="btn btn-inverse btn-sm waves-effect waves-light w-100">مشاهده</a>
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