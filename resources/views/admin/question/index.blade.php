@extends('admin.layouts.app')
@section('title') صفحه مدیریت سوالات @endsection

@section('breadcrumb')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h4 class="m-b-10">صفحه مدیریت سوالات</h4>
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
                                <div class="row">
                                    {{-- Grade --}}
                                    <div class="col-lg-4">
                                        <div class="form-group {{ $errors->has('grade_id') ? 'form-danger' : 'form-primary' }}">
                                            <select name="grade_id" id="grade_id" class="form-control isf">
                                                @foreach($grades as $grade)
                                                    <option @if(old('grade_id') == $grade->id) selected @endif value="{{$grade->id}}">{{$grade->name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="form-bar"></span>
                                            @if ($errors->has('grade_id'))
                                                <span class="input-error">{{ $errors->first('grade_id') }}</span>
                                            @endif
                                            <label for="grade_id" class="float-label"> پایه</label>
                                        </div>
                                    </div>
                                    {{-- Book --}}
                                    <div class="col-lg-4">
                                        <div class="form-group {{ $errors->has('book_id') ? 'form-danger' : 'form-primary' }}">
                                            <select name="book_id" id="book_id" class="form-control isf">
                                                @foreach($grades as $grade)
                                                    <optgroup class="grade-book" label="{{$grade->name}}" data-id="{{$grade->id}}">
                                                    @foreach($grade->books as $book)
                                                        <option @if(old('book_id') == $book->id) selected @endif value="{{$book->id}}">{{$book->name}}</option>
                                                    @endforeach
                                                    </optgroup>
                                                @endforeach
                                            </select>
                                            <span class="form-bar"></span>
                                            @if ($errors->has('book_id'))
                                                <span class="input-error">{{ $errors->first('book_id') }}</span>
                                            @endif
                                            <label for="book_id" class="float-label"> کتاب یا منبع</label>
                                        </div>
                                    </div>
                                    {{-- Session --}}
                                    <div class="col-lg-4">
                                        <div class="form-group {{ $errors->has('session_id') ? 'form-danger' : 'form-primary' }}">
                                            <select name="session_id" id="session_id" class="form-control isf">
                                                <option value="">هیچ کدام</option>
                                                @foreach($grades as $grade)
                                                    @foreach($grade->books as $book)
                                                    <optgroup class="book-session" label="{{$book->name}}" data-id="{{$book->id}}">
                                                        @foreach($book->sessions as $session)
                                                            <option @if(old('session_id') == $session->id) selected @endif value="{{$session->id}}">{{$session->name}}</option>
                                                        @endforeach
                                                    </optgroup>
                                                    @endforeach
                                                @endforeach
                                            </select>
                                            <span class="form-bar"></span>
                                            @if ($errors->has('session_id'))
                                                <span class="input-error">{{ $errors->first('session_id') }}</span>
                                            @endif
                                            <label for="session_id" class="float-label"> فصل</label>
                                        </div>
                                    </div>
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
                    <!-- List -->
                    <div class="card rtl text-right isf">
                        <div class="card-header">
                            <h5>سوالات</h5>
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
                                        <th class="text-center">درجه</th>
                                        <th class="text-center">کتاب</th>
                                        <th class="text-center">عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @forelse($questions as $question)
                                        <tr class="fnt-10p">
                                            <th scope="row">{{++$i}}</th>
                                            <td>
                                                <div class="row fnt-10p">
                                                    <div class="col-lg-12 truncate">
                                                        {{--<div class="" style="max-width: 14rem;">--}}
                                                        {{$question->question}}
                                                        {{--</div>--}}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                {{$question->getRate()}}
                                            </td>
                                            <td class="text-center">
                                                {{$question->book->name}}
                                                @if(!empty($question->session))
                                                <br>
                                                <span class="fnt-10p text-center">{{$question->session->name}}</span>
                                                @endif
                                            </td>
                                            <td  class="text-center">
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