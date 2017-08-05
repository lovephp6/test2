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
                            <a href="{{ url('admin/property/total_money') }}">
                                收费管理
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/property/refund_details') }}">
                                退费管理
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/property/arrears') }}">
                                欠费管理
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/property/income') }}">
                                收入管理
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/property/expenditure') }}">
                                支出管理
                            </a>
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
                            <a href="{{ url('admin/hotel/index') }}">
                                房间管理
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('admin/check/index') }}">
                                入住管理
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sub-menu dcjq-parent-li">
                    <a href="boxed_page.html" class="dcjq-parent">
                        <i class="fa  fa-twitter-square" style="font-size: 20px;"></i>
                        <span>人事管理</span>
                        <span class="label label-inverse span-sidebar"></span>
                        <span class="dcjq-icon"></span></a>
                    <ul class="sub" style="display: block; overflow: hidden;">
                        <li><a href="{{ url('admin/personnel/staff') }}">职工档案</a></li>
                        <li><a href="#">考勤管理</a>
                            <ul class="sub" style="display: none; overflow: hidden;">
                                <li><a href="#">请假管理</a></li>
                                <li><a href="#">销假管理</a></li>
                                <li><a href="#">休假管理</a></li>
                                <li><a href="#">考勤统计</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ url('admin/personnel/payroll') }}">工资管理</a></li>
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
                        <li class=""><a href="{{ url('admin/admin/index') }}">用户设置</a></li>
                        <li class=""><a href="{{ url('admin/school/index') }}">部门设置</a></li>
                        <li class=""><a href="{{ url('admin/role/index') }}">角色设置</a></li>
                        <li class=""><a href="{{ url('admin/permission/index') }}">权限设置</a></li>
                        <li class=""><a href="{{ url('admin/college/index') }}">院系设置</a></li>
                        <li class=""><a href="{{ url('admin/major/index') }}">专业设置</a></li>
                        <li class=""><a href="{{ url('admin/lschool/index') }}">学制设置</a></li>
                        <li class=""><a href="{{ url('admin/staymoney/index') }}">住宿设置</a></li>
                        <li class=""><a href="{{ url('admin/school/index') }}">班级设置</a></li>
                        <li class=""><a href="{{ url('admin/money/index') }}">学费设置</a></li>
                        <li class=""><a href="{{ url('admin/actives/index') }}">活动设置</a></li>
                        <li class=""><a href="{{ url('admin/helps/index') }}">助学设置</a></li>
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

<footer class="site-footer" style="top:500px;">
    <div class="text-center">
        <span>今天是公历：{{ date('Y', time()) }} 年 {{ date('m', time()) }} 月 {{ date('d', time()) }} 日</span>
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


