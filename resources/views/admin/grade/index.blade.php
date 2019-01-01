@extends('admin.layouts.app')
@section('title') صفحه اصلی @endsection

@section('breadcrumb')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h4 class="m-b-10">صفحه اصلی</h4>
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
                    <!-- Store -->
                    <div class="card rtl text-right">
                        <div class="card-header">
                            <h5>افزودن پایه تحصیلی</h5>
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
                            <form action="{{route('admin.grade.store')}}" method="post" class="form-material">
                                @csrf
                                <div class="row">
                                    {{-- Name --}}
                                    <div class="col-lg-6">
                                        <div class="form-group {{ $errors->has('name') ? 'form-danger' : 'form-primary' }}">
                                            <input type="text" class="form-control rtl text-right isf" name="name" id="name">
                                            <span class="form-bar"></span>
                                            @if ($errors->has('name'))
                                                <span class="input-error">{{ $errors->first('name') }}</span>
                                            @endif
                                            <label for="name" class="float-label">نام پایه</label>
                                        </div>
                                    </div>
                                    {{-- Slug --}}
                                    <div class="col-lg-3">
                                        <div class="form-group {{ $errors->has('slug') ? 'form-danger' : 'form-primary' }}">
                                            <input type="text" class="form-control ltr text-left isf" name="slug" id="slug">
                                            <span class="form-bar"></span>
                                            @if ($errors->has('slug'))
                                                <span class="input-error">{{ $errors->first('slug') }}</span>
                                            @endif
                                            <label for="slug" class="float-label">شماره پایه</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <button type="submit" class="btn btn-info waves-effect waves-light w-100">ثبــــت</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- List -->
                    <div class="card rtl text-right isf">
                        <div class="card-header">
                            <h5>پایه‌های تحصیلی</h5>
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
                                        <th>نام</th>
                                        <th>تعداد کتب</th>
                                        <th>تعداد فصول</th>
                                        <th>تعداد سوالات</th>
                                        <th>عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @forelse($grades as $grade)
                                        @php
                                            $session = 0;
                                            $question = 0;
                                            foreach ($grade->books as $book) {
                                                $session += $book->sessions->count();
                                                foreach ($book->sessions as $s) {
                                                    $question += count($s->questions);
                                                }
                                            }
                                        @endphp
                                    <tr>
                                        <th scope="row">{{++$i}}</th>
                                        <td>{{$grade->name}}</td>
                                        <td>{{count($grade->books)}}</td>
                                        <td>{{$session}}</td>
                                        <td>{{$question}}</td>
                                        <td>
                                            <a href="{{route('admin.grade.edit', $grade->id)}}" class="btn btn-inverse btn-sm waves-effect waves-light w-100">مشاهده</a>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <th colspan="6" class="text-center">هیچ پایه‌ای یافت نشد!</th>
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