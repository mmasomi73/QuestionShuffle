<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <div class="main-menu-header">
                <img class="img-menu-user img-radius" src="{{!empty(auth()->user()->avatar)? url('/images').'/'.auth()->user()->avatar:url('/').'/assets/images/avatar-4.jpg'}}"
                     alt="{{auth()->user()->name}}">
                <div class="user-details">
                    <p id="more-details">
                        <i class="feather icon-chevron-down m-r-10"></i>
                        {{auth()->user()->name}}
                    </p>
                </div>
            </div>
            <div class="main-menu-content">
                <ul>
                    <li class="more-details">
                        <a href="#">
                            <i class="feather icon-user"></i>پروفایل
                        </a>
                        <a href="{{route('admin.logout')}}">
                            <i class="feather icon-log-out"></i>خروج
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="pcoded-navigation-label">لایه ها</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="active">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">داشبورد</span>
                </a>
            </li>
        </ul>
        <div class="pcoded-navigation-label">سوالات </div>
        <ul class="pcoded-item pcoded-left-item">
            <li class=" ">
                <a href="{{route('admin.question.index')}}" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="feather icon-clipboard"></i>
                                    </span>
                    <span class="pcoded-mtext">مدیریت سوالات</span>
                </a>
            </li>
            <li class=" ">
                <a href="{{route('admin.export.index')}}" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="feather icon-download-cloud"></i>
                                    </span>
                    <span class="pcoded-mtext">خروجی</span>
                </a>
            </li>
            <li class=" ">
                <a href="{{route('admin.import.index')}}" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="feather icon-upload-cloud"></i>
                                    </span>
                    <span class="pcoded-mtext">ورودی</span>
                </a>
            </li>
        </ul>
        <div class="pcoded-navigation-label">مدیریت</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="{{route('admin.grade.index')}}" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="feather icon-pie-chart"></i>
                                    </span>
                    <span class="pcoded-mtext">پایه ها</span>
                </a>
            </li>
            <li class="">
                <a href="{{route('admin.book.index')}}" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="feather icon-map"></i>
                                    </span>
                    <span class="pcoded-mtext">کتب</span>
                </a>
            </li>
            <li class="">
                <a href="{{route('admin.session.index')}}" class="waves-effect waves-dark">
                                    <span class="pcoded-micon">
                                        <i class="feather icon-unlock"></i>
                                    </span>
                    <span class="pcoded-mtext">فصول</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
