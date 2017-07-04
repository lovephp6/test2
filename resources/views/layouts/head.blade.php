<!DOCTYPE html>
<html lang="en">
<head>
    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Olive Enterprise">
    <!-- END META -->
    <!-- END SHORTCUT ICON -->
    <title>北京首航蓝天学院数字信息平台</title>
    <!-- BEGIN STYLESHEET -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" media="screen" />
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet"><!-- BOOTSTRAP CSS -->
    <link href="{{ asset('admin/css/bootstrap-reset.css') }}" rel="stylesheet"><!-- BOOTSTRAP CSS -->
    <link href="{{ asset('admin/assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet"><!-- FONT AWESOME ICON STYLESHEET -->
    <link href="{{ asset('admin/assets/advanced-datatable/media/css/demo_page.css') }}" rel="stylesheet"><!-- ADVANCED DATATABLE CSS -->
    <link href="{{ asset('admin/assets/advanced-datatable/media/css/demo_table.css') }}" rel="stylesheet"><!-- ADVANCED DATATABLE CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/data-tables/DT_bootstrap.css') }}"><!-- DATATABLE CSS -->
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet"><!-- THEME BASIC CSS -->
    <link href="{{ asset('admin/css/style-responsive.css') }}" rel="stylesheet"><!-- THEME BASIC RESPONSIVE  CSS -->
    <!--[if lt IE 9]>
    <script src="{{ asset('admin/js/html5shiv.js') }}"></script>
    <script src="{{ asset('admin/js/respond.min.js') }}"></script>
    <![endif]-->
    <!-- END STYLESHEET -->

    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/bootstrap-fileupload/bootstrap-fileupload.css') }}"><!-- BOOTSTRAP FILEUPLOAD PLUGIN CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css') }}"><!-- BOOTSTRAP WYSIHTML5 PLUGIN CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/bootstrap-datepicker/css/datepicker.css') }}"><!-- BOOTSTRAP DATEPICKER PLUGIN CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/bootstrap-timepicker/compiled/timepicker.css') }}"><!-- BOOTSTRAP TIMEPICKER PLUGIN CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/bootstrap-colorpicker/css/colorpicker.css') }}"><!-- BOOTSTRAP COLORPICKER PLUGIN CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/bootstrap-daterangepicker/daterangepicker-bs3.css') }}"><!-- DATERANGE PLUGIN CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/bootstrap-datetimepicker/css/datetimepicker.css') }}"><!-- DATETIMEPICKER PLUGIN CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/jquery-multi-select/css/multi-select.css') }}"><!-- JQUERY MULTI SELECT PLUGIN CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/layui/css/layui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('upload/css/webuploader.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('upload/css/style.css') }}">
    <script language="javascript" src="{{ asset('admin/assets/advanced-datatable/media/js/jquery.js') }}"></script><!-- BASIC JQUERY JS  -->
</head>
<style media=print type="text/css">
    .noprint{visibility:hidden}
</style>
<body>
<!-- BEGIN SECTION -->
<section id="container" class="">
    <!-- BEGIN HEADER -->
    <header class="header white-bg">
        <!-- SIDEBAR TOGGLE BUTTON -->
        <div class="sidebar-toggle-box" style="margin-top:10px;">
            <img src="{{ asset('admin/img/logo11.png') }}" alt="" style="width:40px;">
            {{--<div  data-placement="right" class="fa fa-bars tooltips">--}}
            {{--</div>--}}
        </div>
        <!-- SIDEBAR TOGGLE BUTTON  END-->
        <a href="" class="logo" style="color: #FFF;">北京首航蓝天学院数字信息平台</a>
        <!-- START HEADER  NAV -->

        {{--<nav class="nav notify-row" id="top_menu">--}}

            {{--<ul class="nav top-menu">--}}
                {{--<!-- START NOTIFY TASK BAR -->--}}

                {{--<li class="dropdown">--}}
                    {{--<a data-toggle="dropdown" class="dropdown-toggle" href="#">--}}
                        {{--<i class="fa fa-tasks">--}}
                        {{--</i>--}}
                        {{--<span class="badge bg-success">--}}
                  {{--6--}}
                {{--</span>--}}
                    {{--</a>--}}

                    {{--<ul class="dropdown-menu extended tasks-bar">--}}
                        {{--<li class="notify-arrow notify-arrow-blue">--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<p class="blue">--}}
                                {{--You have 6 pending tasks--}}
                            {{--</p>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="#">--}}
                                {{--<div class="task-info">--}}
                                    {{--<div class="desc">--}}
                                        {{--Dashboard v1.3--}}
                                    {{--</div>--}}
                                    {{--<div class="percent">--}}
                                        {{--40%--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="progress progress-striped">--}}
                                    {{--<div class="progress-bar progress-bar-success set-40" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" >--}}
                        {{--<span class="sr-only">--}}
                          {{--40% Complete (success)--}}
                        {{--</span>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="#">--}}
                                {{--<div class="task-info">--}}
                                    {{--<div class="desc">--}}
                                        {{--Database Update--}}
                                    {{--</div>--}}
                                    {{--<div class="percent">--}}
                                        {{--60%--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="progress progress-striped">--}}
                                    {{--<div class="progress-bar progress-bar-warning set-60" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" >--}}
                        {{--<span class="sr-only">--}}
                          {{--60% Complete (warning)--}}
                        {{--</span>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="#">--}}
                                {{--<div class="task-info">--}}
                                    {{--<div class="desc">--}}
                                        {{--Iphone Development--}}
                                    {{--</div>--}}
                                    {{--<div class="percent">--}}
                                        {{--87%--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="progress progress-striped">--}}
                                    {{--<div class="progress-bar progress-bar-info set-87" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" >--}}
                        {{--<span class="sr-only">--}}
                          {{--87% Complete--}}
                        {{--</span>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="#">--}}
                                {{--<div class="task-info">--}}
                                    {{--<div class="desc">--}}
                                        {{--Mobile App--}}
                                    {{--</div>--}}
                                    {{--<div class="percent">--}}
                                        {{--33%--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="progress progress-striped">--}}
                                    {{--<div class="progress-bar progress-bar-danger set-33" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" >--}}
                        {{--<span class="sr-only">--}}
                          {{--33% Complete (danger)--}}
                        {{--</span>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="#">--}}
                                {{--<div class="task-info">--}}
                                    {{--<div class="desc">--}}
                                        {{--Dashboard v1.3--}}
                                    {{--</div>--}}
                                    {{--<div class="percent">--}}
                                        {{--45%--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="progress progress-striped active">--}}
                                    {{--<div class="progress-bar set-45" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" >--}}
                        {{--<span class="sr-only">--}}
                          {{--45% Complete--}}
                        {{--</span>--}}
                                    {{--</div>--}}

                                {{--</div>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="external">--}}
                            {{--<a href="#">--}}
                                {{--See All Tasks--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}

                {{--</li>--}}
                {{--<!-- END NOTIFY TASK BAR -->--}}

                {{--<!-- START NOTIFY INBOX BAR -->--}}

                {{--<li id="header_inbox_bar" class="dropdown">--}}
                    {{--<a data-toggle="dropdown" class="dropdown-toggle" href="#">--}}
                        {{--<i class="fa fa-envelope-o">--}}
                        {{--</i>--}}
                        {{--<span class="badge bg-important">--}}
                  {{--5--}}
                {{--</span>--}}
                    {{--</a>--}}
                    {{--<ul class="dropdown-menu extended inbox">--}}
                        {{--<li class="notify-arrow notify-arrow-blue">--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<p class="blue">--}}
                                {{--You have 5 new messages--}}
                            {{--</p>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="#">--}}
                    {{--<span class="photo">--}}
                      {{--<img alt="avatar" src="./img/avatar-mini.jpg">--}}
                    {{--</span>--}}
                                {{--<span class="subject">--}}
                      {{--<span class="from">--}}
                        {{--Chintan Pandya--}}
                      {{--</span>--}}
                      {{--<span class="time">--}}
                        {{--Just now--}}
                      {{--</span>--}}
                    {{--</span>--}}
                                {{--<span class="message">--}}
                      {{--Hello, this is an example msg.--}}
                    {{--</span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="#">--}}
                    {{--<span class="photo">--}}
                      {{--<img alt="avatar" src="./img/avatar-mini2.jpg">--}}
                    {{--</span>--}}
                                {{--<span class="subject">--}}
                      {{--<span class="from">--}}
                        {{--Parth Jani--}}
                      {{--</span>--}}
                      {{--<span class="time">--}}
                        {{--10 mins--}}
                      {{--</span>--}}
                    {{--</span>--}}
                                {{--<span class="message">--}}
                      {{--Hi, Bro how are you ?--}}
                    {{--</span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="#">--}}
                    {{--<span class="photo">--}}
                      {{--<img alt="avatar" src="./img/avatar-mini3.jpg">--}}
                    {{--</span>--}}
                                {{--<span class="subject">--}}
                      {{--<span class="from">--}}
                        {{--Jay Bardolia--}}
                      {{--</span>--}}
                      {{--<span class="time">--}}
                        {{--3 hrs--}}
                      {{--</span>--}}
                    {{--</span>--}}
                                {{--<span class="message">--}}
                      {{--This is awesome dashboard.--}}
                    {{--</span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="#">--}}
                    {{--<span class="photo">--}}
                      {{--<img alt="avatar" src="./img/avatar-mini4.jpg">--}}
                    {{--</span>--}}
                                {{--<span class="subject">--}}
                      {{--<span class="from">--}}
                        {{--Pruthvi Bardolia--}}
                      {{--</span>--}}
                      {{--<span class="time">--}}
                        {{--Just now--}}
                      {{--</span>--}}
                    {{--</span>--}}
                                {{--<span class="message">--}}
                      {{--Hello, this is metrolab--}}
                    {{--</span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="#">--}}
                                {{--See all messages--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<!-- END NOTIFY INBOX BAR -->--}}

                {{--<!-- START NOTIFY NOTIFICATION BAR -->--}}

                {{--<li id="header_notification_bar" class="dropdown">--}}
                    {{--<a data-toggle="dropdown" class="dropdown-toggle" href="#">--}}
                        {{--<i class="fa fa-bell-o">--}}
                        {{--</i>--}}
                        {{--<span class="badge bg-warning">--}}
                  {{--7--}}
                {{--</span>--}}
                    {{--</a>--}}
                    {{--<ul class="dropdown-menu extended notification">--}}
                        {{--<li class="notify-arrow notify-arrow-blue">--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<p class="blue">--}}
                                {{--You have 7 new notifications--}}
                            {{--</p>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="#">--}}
                    {{--<span class="label label-danger">--}}
                      {{--<i class="fa fa-bolt">--}}
                      {{--</i>--}}
                    {{--</span>--}}
                                {{--Server #3 overloaded.--}}
                                {{--<span class="small italic">--}}
                      {{--34 mins--}}
                    {{--</span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="#">--}}
                    {{--<span class="label label-warning">--}}
                      {{--<i class="fa fa-bell">--}}
                      {{--</i>--}}
                    {{--</span>--}}
                                {{--Server #10 not respoding.--}}
                                {{--<span class="small italic">--}}
                      {{--1 Hours--}}
                    {{--</span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="#">--}}
                    {{--<span class="label label-danger">--}}
                      {{--<i class="fa fa-bolt">--}}
                      {{--</i>--}}
                    {{--</span>--}}
                                {{--Database overloaded 24%.--}}
                                {{--<span class="small italic">--}}
                      {{--4 hrs--}}
                    {{--</span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="#">--}}
                    {{--<span class="label label-success">--}}
                      {{--<i class="fa fa-plus">--}}
                      {{--</i>--}}
                    {{--</span>--}}
                                {{--New user registered.--}}
                                {{--<span class="small italic">--}}
                      {{--Just now--}}
                    {{--</span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="#">--}}
                    {{--<span class="label label-primary">--}}
                      {{--<i class="fa fa-bullhorn">--}}
                      {{--</i>--}}
                    {{--</span>--}}
                                {{--Application error.--}}
                                {{--<span class="small italic">--}}
                      {{--10 mins--}}
                    {{--</span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="#">--}}
                                {{--See all notifications--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<!-- END NOTIFY NOTIFICATION BAR -->--}}

            {{--</ul>--}}


        {{--</nav>--}}

        <!-- END HEADER NAV -->


        <!-- START USER LOGIN DROPDOWN  -->
        <div class="top-nav noprint">
            <ul class="nav pull-right top-menu">
                <li>
                    <input type="text" class="form-control search" placeholder="搜索">
                </li>
                    <li class="dropdown text-center" style="margin-top: 5px;width:110px;">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img alt="" src="{{ asset('admin/img/logophoto.jpg') }}" style="width:21px;">
                        <span class="username" style="color: #888;">{{ Auth::user()->name }}</span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <li class="log-arrow-up"></li>
                        <li><a href="#"><i class=" fa fa-cog"></i>修改密码</a></li>
                        {{--<li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>--}}
                        {{--<li><a href="#"><i class="fa fa-bell-o"></i> Notification</a></li>--}}
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="fa fa-key"></i>注销
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- END USER LOGIN DROPDOWN  -->
    </header>
    <!-- END HEADER -->

    <!-- BEGIN SIDEBAR -->
    <aside>
        <div id="sidebar" class="nav-collapse noprint">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a href="#">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sub-menu dcjq-parent-li">
                    <a href="boxed_page.html" class="dcjq-parent">
                        <i class="fa  fa-twitter-square" style="font-size: 20px;"></i>
                        <span>学籍管理</span>
                        <span class="label label-inverse span-sidebar"></span>
                        <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: block; overflow: hidden;">
                        <li>
                            <a href="{{ url('admin/school/index') }}">
                                学籍档案
                            </a>
                            <ul class="sub" style="display: none; overflow: hidden;">
                                <li>
                                    <a href="{{ url('admin/school/index') }}">
                                        查看学籍
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/school/add') }}">
                                        注册学籍
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/school/students_img') }}">
                                        上传附件
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ url('admin/school/index') }}">
                                证卡管理
                            </a>
                            <ul class="sub" style="display: none; overflow: hidden;">
                                <li>
                                    <a href="{{ url('admin/school/students_card') }}">
                                        学 生 卡
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/school/students_zheng') }}">
                                        学 生 证
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ url('admin/school/education') }}">
                                学历管理
                            </a>
                        </li>
                        <li class="sub-menu dcjq-parent-li">
                            <a href="{{ url('admin/school/certificate') }}" class="dcjq-parent">
                                证书管理
                               </a>
                            <ul class="sub" style="display: none; overflow: hidden;">
                                <li>
                                    <a href="{{ url('admin/school/certificate') }}">
                                        证书详情
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        培训证书
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        结业证书
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        学业证书
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        毕业证书
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="sub-menu dcjq-parent-li">
                    <a href="boxed_page.html" class="dcjq-parent">
                        <i class="fa  fa-twitter-square" style="font-size: 20px;"></i>
                        <span> 财务管理</span>
                        <span class="label label-inverse span-sidebar"></span>
                        <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: block; overflow: hidden;">
                        <li>
                            <a href="{{ url('admin/property/tuition_fee') }}">
                                收费管理
                            </a>
                            <ul class="sub" style="display: none; overflow: hidden;">
                                <li>
                                    <a href="{{ url('admin/property/tuition_fee') }}">
                                        收取学费
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/property/total_money') }}">
                                        收费统计
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ url('admin/school/index') }}">
                                退费管理
                            </a>
                            <ul class="sub" style="display: none; overflow: hidden;">
                                <li>
                                    <a href="{{ url('admin/property/refund') }}">
                                        退还学费
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/property/refund_details') }}">
                                        退费管理
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ url('admin/property/arrears') }}">
                                欠费管理
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/school/index') }}">
                                收入管理
                            </a>
                            <ul class="sub" style="display: none; overflow: hidden;">
                                <li>
                                    <a href="{{ url('admin/property/add_income') }}">
                                        收入凭证
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/property/income') }}">
                                        收入统计
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ url('admin/school/index') }}">
                                支出管理
                            </a>
                            <ul class="sub" style="display: none; overflow: hidden;">
                                <li>
                                    <a href="{{ url('admin/property/add_expenditure') }}">
                                        支出凭证
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/property/expenditure') }}">
                                        支出统计
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sub-menu dcjq-parent-li">
                            <a href="{{ url('admin/property/diary') }}">日记账</a>
                        </li>
                    </ul>
                </li>

                <li class="sub-menu dcjq-parent-li">
                    <a href="boxed_page.html" class="dcjq-parent">
                        <i class="fa  fa-twitter-square" style="font-size: 20px;"></i>
                        <span>教务管理</span>
                        <span class="label label-inverse span-sidebar"></span>
                        <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: block; overflow: hidden;">
                        <li>
                            <a href="{{ url('admin/school/index') }}">
                                学籍档案
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/school/index') }}">
                                学分管理
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/school/index') }}">
                                学生考核
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/school/index') }}">
                                班级变更
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/school/index') }}">
                                专业变更
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sub-menu dcjq-parent-li">
                    <a href="boxed_page.html" class="dcjq-parent">
                        <i class="fa  fa-twitter-square" style="font-size: 20px;"></i>
                        <span>招生管理</span>
                        <span class="label label-inverse span-sidebar"></span>
                        <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: none; overflow: hidden;">
                        <li>
                            <a href="javascript:;">
                                招办管理
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                老师管理
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                招生统计
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                招生奖励
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sub-menu dcjq-parent-li">
                    <a href="boxed_page.html" class="dcjq-parent">
                        <i class="fa  fa-twitter-square" style="font-size: 20px;"></i>
                        <span>就业管理</span>
                        <span class="label label-inverse span-sidebar"></span>
                        <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: block; overflow: hidden;">
                        <li><a href="#">学籍档案</a></li>
                        <li><a href="#">合作单位</a>
                            <ul class="sub" style="display: none; overflow: hidden;">
                                <li><a href="#">实习单位</a></li>
                                <li><a href="#">就业单位</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="sub-menu dcjq-parent-li">
                    <a href="boxed_page.html" class="dcjq-parent">
                        <i class="fa  fa-twitter-square" style="font-size: 20px;"></i>
                        <span>公寓管理</span>
                        <span class="label label-inverse span-sidebar"></span>
                        <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: block; overflow: hidden;">
                        <li>
                            <a href="{{ url('admin/school/index') }}">
                                公寓分配
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/school/index') }}">
                                房间变更
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/school/index') }}">
                                房间管理
                            </a>
                        </li>
                        <li><a href="#">床位管理</a></li>
                        <li><a href="#">学生考核</a></li>
                    </ul>
                </li>
                <li class="sub-menu dcjq-parent-li">
                    <a href="boxed_page.html" class="dcjq-parent">
                        <i class="fa  fa-twitter-square" style="font-size: 20px;"></i>
                        <span>人事管理</span>
                        <span class="label label-inverse span-sidebar"></span>
                        <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: block; overflow: hidden;">
                        <li><a href="#">职工档案</a>
                            <ul class="sub" style="display: none; overflow: hidden;">
                                <li><a href="{{ url('admin/personnel/staff') }}">入职管理</a></li>
                                <li><a href="{{ url('admin/personnel/add_staff') }}">员工入职</a></li>
                            </ul>
                        </li>
                        <li><a href="#">考勤管理</a>
                            <ul class="sub" style="display: none; overflow: hidden;">
                                <li><a href="#">请假管理</a></li>
                                <li><a href="#">销假管理</a></li>
                                <li><a href="#">休假管理</a></li>
                                <li><a href="#">考勤统计</a></li>
                            </ul>
                        </li>
                        <li><a href="#">工资管理</a>
                            <ul class="sub" style="display:none; overflow:hidden;">
                                <li><a href="{{ url('admin/personnel/attendance') }}">出勤录入</a></li>
                                <li><a href="{{ url('admin/personnel/payroll') }}">工 资 表</a></li>
                            </ul>
                        </li>
                        <li><a href="#">奖惩管理</a></li>
                        <li><a href="#">保险管理</a></li>
                        <li><a href="#">劳动合同</a></li>
                        <li><a href="#">考评管理</a></li>
                    </ul>
                </li>
                <li class="sub-menu dcjq-parent-li">
                    <a href="boxed_page.html" class="dcjq-parent">
                        <i class="fa  fa-twitter-square" style="font-size: 20px;"></i>
                        <span>资产管理</span>
                        <span class="label label-inverse span-sidebar"></span>
                        <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: none;overflow: hidden;">
                        <li><a href="#">固定资产</a>
                            <ul class="sub" style="display: none;overflow: hidden;">
                                <li><a href="#">采购管理</a></li>
                                <li><a href="#">领用管理</a></li>
                                <li><a href="#">库存管理</a></li>
                                <li><a href="#">资产台账</a></li>
                            </ul>
                        </li>
                        <li><a href="#">办公用品</a>
                            <ul class="sub" style="display: none;overflow: hidden;">
                                <li><a href="#">采购管理</a></li>
                                <li><a href="#">领用管理</a></li>
                                <li><a href="#">库存管理</a></li>
                                <li><a href="#">资产台账</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="sub-menu dcjq-parent-li">
                    <a href="boxed_page.html" class="dcjq-parent">
                        <i class="fa  fa-twitter-square" style="font-size: 20px;"></i>
                        <span>合作院校</span>
                        <span class="label label-inverse span-sidebar"></span>
                        <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: block; overflow: hidden;">
                        <li class="active"><a href="{{ url('admin/school/index') }}">联合办学</a></li>
                        <li><a href="{{ url('/') }}">合作招生</a></li>
                    </ul>
                </li>

                <li class="sub-menu dcjq-parent-li">
                    <a href="boxed_page.html" class="dcjq-parent">
                        <i class="fa  fa-twitter-square" style="font-size: 20px;"></i>
                        <span>合同管理</span>
                        <span class="label label-inverse span-sidebar"></span>
                        <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: block; overflow: hidden;">
                        <li>
                            <a href="{{ url('admin/school/index') }}">
                                就业协议
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/school/index') }}">
                                联合办学
                            </a>
                        </li>
                        <li><a href="#">代理招生</a></li>
                        <li><a href="#">就业合作</a></li>
                        <li><a href="#">其他合同</a></li>
                    </ul>
                </li>
                <li class="sub-menu dcjq-parent-li">
                    <a href="boxed_page.html" class="dcjq-parent">
                        <i class="fa  fa-twitter-square" style="font-size: 20px;"></i>
                        <span>系统设置</span>
                        <span class="label label-inverse span-sidebar"></span>
                        <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: block; overflow: hidden;">
                        <li class=""><a href="{{ url('admin/school/index') }}">用户设置</a></li>
                        <li class=""><a href="{{ url('admin/school/index') }}">部门设置</a></li>
                        <li class=""><a href="{{ url('admin/school/index') }}">权限设置</a></li>
                        <li class=""><a href="{{ url('admin/school/index') }}">院系设置</a></li>
                        <li class=""><a href="{{ url('admin/school/index') }}">专业设置</a></li>
                        <li class=""><a href="{{ url('admin/school/index') }}">学制设置</a></li>
                        <li class=""><a href="{{ url('admin/school/index') }}">班级设置</a></li>
                        <li class=""><a href="{{ url('admin/school/index') }}">学费设置</a></li>
                        <li class=""><a href="{{ url('admin/school/index') }}">修改密码</a></li>
                        <li class=""><a href="{{ url('admin/school/index') }}">操作日志</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </aside>
    <!-- END SIDEBAR -->


    @yield('contents')


    <!-- BEGIN FOOTER -->
    {{--<footer class="site-footer">--}}
        {{--<div class="text-center">--}}
            {{--2013 &copy; Olive Admin by <a href="" target="_blank">Olive Enterprise</a>.--}}
            {{--<a href="#" class="go-top">--}}
                {{--<i class="fa fa-angle-up"></i>--}}
            {{--</a>--}}
        {{--</div>--}}
    {{--</footer>--}}
    <!-- END FOOTER  -->
</section>

<footer class="site-footer">
    <div class="text-center">
        2013 © Olive Admin by
        <a href="" target="_blank">
            Olive Enterprise
        </a>
        <a href="#" class="go-top">
            <i class="fa fa-angle-up">
            </i>
        </a>
    </div>
</footer>
<!-- BEGIN JS -->
<!-- new -->
{{--<script src="{{ asset('admin/js/jquery.js') }}" ></script>--}}


<script src="{{ asset('admin/js/bootstrap.min.js') }}" ></script><!-- BOOTSTRAP JS  -->
<script src="{{ asset('admin/js/jquery.dcjqaccordion.2.7.js') }}"></script><!-- ACCORDING JS -->
<script src="{{ asset('admin/js/jquery.scrollTo.min.js') }}" ></script><!-- SCROLLTO JS  -->
<script src="{{ asset('admin/js/jquery.nicescroll.js') }}" > </script><!-- NICESCROLL JS  -->
<script language="javascript" src="{{ asset('admin/assets/advanced-datatable/media/js/jquery.dataTables.js') }}"></script><!-- BASIC COMMON JS  -->
<script src="{{ asset('admin/assets/data-tables/DT_bootstrap.js') }}"></script><!-- DATATABLE BOOTSTRAP JS  -->
<script src="{{ asset('admin/js/respond.min.js') }}" ></script><!-- RESPOND JS  -->
<script src="{{ asset('admin/js/common-scripts.js') }}" ></script><!-- BASIC COMMON JS  -->
<script src="{{ asset('admin/js/jquery.stepy.js') }}" ></script><!-- JQUERY STEPY WIZARD JS  -->
<script src="{{ asset('admin/js/jquery.validate.min.js') }}"></script><!-- VALIDATE JS  -->

<script src="{{ asset('admin/assets/fuelux/js/spinner.min.js') }}"></script><!-- FUELUX JS  -->
<script src="{{ asset('admin/assets/bootstrap-fileupload/bootstrap-fileupload.js') }}"></script><!-- BOOTSTRAP FILEUPLOAD JS  -->
<script src="{{ asset('admin/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js') }}"></script><!-- BOOTSTRAP wysihtml5 JS  -->
<script src="{{ asset('admin/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js') }}"></script><!-- BOOTSTRAP wysihtml5 JS  -->
<script src="{{ asset('admin/assets/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script><!-- BOOTSTRAP DATEPICKER JS  -->
<script src="{{ asset('admin/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js') }}"></script><!-- BOOTSTRAP DATETIMEPICKER JS  -->
<script src="{{ asset('admin/assets/bootstrap-daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('admin/assets/bootstrap-daterangepicker/daterangepicker.js') }}"></script><!-- BOOTSTRAP DATERANGEPICKER JS  -->
<script src="{{ asset('admin/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"> </script><!-- BOOTSTRAP COLORPICKER JS  -->
<script src="{{ asset('admin/assets/bootstrap-timepicker/js/bootstrap-timepicker.js') }}"></script><!-- BOOTSTRAP TIMEPICKER JS  -->
<script src="{{ asset('admin/assets/jquery-multi-select/js/jquery.multi-select.js') }}"></script><!-- BOOTSTRAP MULTISELECT JS  -->
<script src="{{ asset('admin/assets/jquery-multi-select/js/jquery.quicksearch.js') }}"></script><!-- BOOTSTRAP MULTISELECT JS  -->
<script src="{{ asset('admin/js/advanced-form-components.js') }}" ></script><!-- ADVANCE FORM COMPONENTS PAGE JS  -->
<script src="{{ asset('admin/assets/ckeditor/ckeditor.js') }}"></script><!-- CKEDITOR JS  -->
{{--<script type="text/javascript" src="{{ asset('admin/js/laydate.js') }}"></script>--}}
<script type="text/javascript" src="{{ asset('admin/layui/layui.js') }}"></script>
<!-- 图片上传 -->
<script type="text/javascript" src="{{ asset('upload/js/webuploader.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('upload/js/upload.js') }}"></script>



<script >
    <!-- DATATABLE JS  -->
    $(document).ready(function() {
        $('#example').dataTable( {
            "aaSorting": [[ 4, "desc" ]]
        } );
    } );
</script>
<!-- 日期 -->
<script>
    layui.use('laydate', function(){
        var laydate = layui.laydate;

        var start = {
            min: '1971-06-16 23:59:59'
            ,max: '2099-06-16 23:59:59'
            ,istoday: false
            ,choose: function(datas){
                end.min = datas; //开始日选好后，重置结束日的最小日期
                end.start = datas //将结束日的初始值设定为开始日
            }
        };

        var end = {
            min: laydate.now()
            ,max: '2099-06-16 23:59:59'
            ,istoday: false
            ,choose: function(datas){
                start.max = datas; //结束日选好后，重置开始日的最大日期
            }
        };

        document.getElementById('LAY_demorange_s').onclick = function(){
            start.elem = this;
            laydate(start);
        }
        document.getElementById('LAY_demorange_e').onclick = function(){
            end.elem = this
            laydate(end);
        }

    });
</script>

<!-- 修改头像 -->
<script>

$('#tijiao').click(function(){
    var filename = $('#files').children('img').attr('src');
   if(filename !== undefined) {
       $('input[name=photo]').val(filename);
   }
});
</script>



<!-- END JS -->
<!-- END JS -->
</body>
</html>


