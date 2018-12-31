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
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-block">
                                            <div class="row align-items-center">
                                                <div class="col-8">
                                                    <h4 class="text-c-yellow text-right">108</h4>
                                                    <h6 class="text-muted m-b-0 text-right">نفر</h6>
                                                </div>
                                                <div class="col-4 text-right">
                                                    <i class="feather icon-bar-chart-2 f-28"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer bg-c-yellow">
                                            <div class="row align-items-center">
                                                <div class="col-9">
                                                    <p class="text-white text-right  m-b-0">% تعداد دانش آموزان</p>
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
                                            <div class="row align-items-center">
                                                <div class="col-8">
                                                    <h4 class="text-c-green">290+</h4>
                                                    <h6 class="text-muted m-b-0">Page Views</h6>
                                                </div>
                                                <div class="col-4 text-right">
                                                    <i class="feather icon-file-text f-28"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer bg-c-green">
                                            <div class="row align-items-center">
                                                <div class="col-9">
                                                    <p class="text-white  text-right m-b-0">% change</p>
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
                                            <div class="row align-items-center">
                                                <div class="col-8">
                                                    <h4 class="text-c-red">145</h4>
                                                    <h6 class="text-muted m-b-0">Task</h6>
                                                </div>
                                                <div class="col-4 text-right">
                                                    <i class="feather icon-calendar f-28"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer bg-c-red">
                                            <div class="row align-items-center">
                                                <div class="col-9">
                                                    <p class="text-white text-right m-b-0">% change</p>
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
                                            <div class="row align-items-center">
                                                <div class="col-8">
                                                    <h4 class="text-c-blue">500</h4>
                                                    <h6 class="text-muted m-b-0">Downloads</h6>
                                                </div>
                                                <div class="col-4 text-right">
                                                    <i class="feather icon-thumbs-down f-28"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer bg-c-blue">
                                            <div class="row align-items-center">
                                                <div class="col-9">
                                                    <p class="text-white text-right m-b-0">% change</p>
                                                </div>
                                                <div class="col-3 text-right">
                                                    <i class="feather icon-trending-down text-white f-16"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="card social-card bg-twitter">
                                        <div class="card-block">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <i class="feather icon-twitter f-34 text-twitter social-icon"></i>
                                                </div>
                                                <div class="col">
                                                    <h6 class="m-b-0">Twitter</h6>
                                                    <p>231.2w downloads</p>
                                                    <p class="m-b-0">Lorem Ipsum is simply dummy text of the printing</p>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#!" class="download-icon"><i class="feather icon-arrow-down"></i></a>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card social-card bg-twitter">
                                        <div class="card-block">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <i class="feather icon-twitter f-34 text-twitter social-icon"></i>
                                                </div>
                                                <div class="col">
                                                    <h6 class="m-b-0">Twitter</h6>
                                                    <p>231.2w downloads</p>
                                                    <p class="m-b-0">Lorem Ipsum is simply dummy text of the printing</p>
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