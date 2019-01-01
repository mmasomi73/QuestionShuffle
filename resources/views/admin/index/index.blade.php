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
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <!-- [ page content ] start -->
                    <div class="row">
                        <!-- site Analytics card start -->
                        <div class="col-lg-12 col-md-12">
                            <div class="row isf">
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-block">
                                            <div class="row align-items-center">
                                                <div class="col-8">
                                                    <h4 class="text-c-yellow text-right">{{$options}}</h4>
                                                    <h6 class="text-muted m-b-0 text-right"> گزینه </h6>
                                                </div>
                                                <div class="col-4 text-right">
                                                    <i class="feather icon-bar-chart-2 f-28"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer bg-c-yellow">
                                            <div class="row align-items-center">
                                                <div class="col-9">
                                                    <p class="text-white text-right  m-b-0">% تعداد کل گزینه ها</p>
                                                </div>
                                                <div class="col-3 text-right">
                                                    <i class="feather icon-trending-up text-white f-16"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-block">
                                            <div class="row align-items-center text-right">
                                                <div class="col-8">
                                                    <h4 class="text-c-green">{{$answers}}</h4>
                                                    <h6 class="text-muted m-b-0">جواب</h6>
                                                </div>
                                                <div class="col-4 text-right">
                                                    <i class="feather icon-file-text f-28"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer bg-c-green">
                                            <div class="row align-items-center text-right">
                                                <div class="col-9">
                                                    <p class="text-white  text-right m-b-0">% تعداد کل جوابها</p>
                                                </div>
                                                <div class="col-3 text-right">
                                                    <i class="feather icon-trending-up text-white f-16"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-block">
                                            <div class="row align-items-center text-right">
                                                <div class="col-8">
                                                    <h4 class="text-c-red">{{$questions}}</h4>
                                                    <h6 class="text-muted m-b-0">سوال</h6>
                                                </div>
                                                <div class="col-4 text-right">
                                                    <i class="feather icon-calendar f-28"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer bg-c-red">
                                            <div class="row align-items-center text-right">
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
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-block">
                                            <div class="row align-items-center text-right">
                                                <div class="col-8">
                                                    <h4 class="text-c-blue">{{$sessions}}</h4>
                                                    <h6 class="text-muted m-b-0">فصل</h6>
                                                </div>
                                                <div class="col-4 text-right">
                                                    <i class="feather icon-thumbs-down f-28"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer bg-c-blue">
                                            <div class="row align-items-center text-right">
                                                <div class="col-9">
                                                    <p class="text-white text-right m-b-0">% تعداد کل فصول</p>
                                                </div>
                                                <div class="col-3 text-right">
                                                    <i class="feather icon-trending-down text-white f-16"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row isf">
                                <div class="col-sm-6">
                                    <div class="card social-card bg-twitter">
                                        <div class="card-block">
                                            <div class="row align-items-center text-right">
                                                <div class="col-auto">
                                                    <i class="feather icon-airplay f-34 text-twitter social-icon"></i>
                                                </div>
                                                <div class="col">
                                                    <h6 class="m-b-0">پایه</h6>
                                                    <p>{{$grades}} پایه</p>
                                                    <p class="m-b-0">تعداد پایه یا کلاس های ثبت شده</p>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#!" class="download-icon"><i class="feather icon-arrow-down"></i></a>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card social-card bg-twitter">
                                        <div class="card-block">
                                            <div class="row align-items-center text-right">
                                                <div class="col-auto">
                                                    <i class="feather icon-aperture f-34 text-twitter social-icon"></i>
                                                </div>
                                                <div class="col">
                                                    <h6 class="m-b-0">کتاب</h6>
                                                    <p>{{$books}} منبع</p>
                                                    <p class="m-b-0">تعداد کتب یا منابع ثبت شده</p>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#!" class="download-icon"><i class="feather icon-arrow-down"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- site Analytics card end -->
                    </div>
                    <!-- [ page content ] end -->
                </div>
            </div>
        </div>
    </div>

@endsection