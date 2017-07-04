@extends('layouts.head')

@section('contents')
    <style>
        .bgw {
            line-height: 40px !important;
        }
        .in_bgw {
            color:#888 !important;
        }
        .con_color{
            color:#FFF !important;
        }
        .stepy-titles li.current-step div{
            background:#FF6C60;
        }

        .shade {
            position: absolute;
            display: none;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.55);
        }

        .shade div {
            width: 300px;
            height: 200px;
            line-height: 200px;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -100px;
            margin-left: -150px;
            background: white;
            border-radius: 5px;
            text-align: center;
        }

        .a-upload {
            padding: 4px 10px;
            height: 60px;

            line-height: 50px;
            position: relative;
            cursor: pointer;
            color: #888;
            background: #fafafa;
            border: 1px solid #ddd;
            border-radius: 4px;
            overflow: hidden;
            display: inline-block;
            *display: inline;
            *zoom: 1
        }

        .a-upload input {
            position: absolute;
            font-size: 100px;
            right: 0;
            top: 0;
            opacity: 0;
            filter: alpha(opacity=0);
            cursor: pointer
        }

        .a-upload:hover {
            color: #444;
            background: #eee;
            border-color: #ccc;
            text-decoration: none
        }
        .img_div{min-height: 100px; min-width: 100px;}
        .isImg{width: 120px; height: 120px; position: relative; float: left; margin-left: 10px;}
        .removeBtn{position: absolute; top: 0; right: 0; z-index: 11; border: 0px; border-radius: 50px; background: red; width: 22px; height: 22px; color: white;}
        .shadeImg{position: absolute;
            display: none;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 15;
            text-align: center;
            background: rgba(0, 0, 0, 0.55);}
        .showImg{width: 400px; height: 500px; margin-top: 140px;}

    </style>
    <section id="main-content">
        <section class="wrapper site-min-height">
            <!-- BEGIN ROW  -->
            <section class="panel">
                <header class="panel-heading">
               <span class="label btn-info" style="width:100px;height:35px;line-height:40px;">
                    　　人事管理　　
                    </span>　
                    <span class="label btn-info" style="width:100px;height:35px;">
                    　　职工档案　　
                    </span>
                    <div class="pull-right">
                        <tr>
                            <td align="right"></td>
                            <td><font id="errorMsg"></font></td>
                        </tr>
                        <tr class="con_color">
                            <td>&nbsp;</td>

                        </tr>
                    </div>
                </header><div class="panel" >
                    <section class="panel col-md-12">
                        <header class="panel-heading tab-bg-dark-navy-blue" style="background: #41cac0;font-weight: bold">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a data-toggle="tab" href="#xsxk">　员工档案　</a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#xszs">　入职信息　</a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#pxzs">　工资信息　</a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#jyzs">　保险信息　</a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#scfj">　账户信息　</a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#lzxx">　离职信息　</a>
                                </li>
                            </ul>
                        </header>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div id="xsxk" class="tab-pane active">
                                    <div class="panel-body">
                                        <object type="application/cert-reader"  id="plugin" width=0 height=0> </object>
                                        @include('layouts.notice')
                                        <form id="default" class="form-horizontal" action="" method="post">
                                            {{--<fieldset title="基本信息" class="step" id="default-step-0" style="display: block;">--}}
                                            {{--<legend></legend>--}}

                                            <table class="display table table-bordered" style="width:1000px;">
                                                <tbody>
                                                {{ csrf_field() }}
                                                <tr class="text-center">
                                                    <td colspan="7" style="font-weight: bold;">基本信息</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">员工编号</td>
                                                    <td colspan="6"><input type="text" class="form-control " name="staff_num" value="{{ $staffMsg->staff_num }}"></td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">姓　　名</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="staff_name" value="{{ $staffMsg->staff_name }}"></td>
                                                    <td class="bgw">性　　别</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="staff_sex" value="{{ $staffMsg->staff_sex }}"></td>
                                                    <td class="bgw">民　　族</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="staff_nation" value="{{ $staffMsg->staff_nation }}"></td>
                                                    <td class="bgw" rowspan="4">
                                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                                            <input type="hidden" name="photo" id="filename" value="">
                                                            <div class="fileupload-new thumbnail">
                                                                <!-- <img src="" alt="" id="photoes">-->
                                                                <img src="{{ asset($staffMsg->photo) }}" alt="" id="photoes" style="width:120px;height:150px;">
                                                            </div>
                                                            <div class="fileupload-preview fileupload-exists thumbnail" id="files" style="line-height: 10px;">
                                                            </div>
                                                            <div>
                                                                    <span class="btn btn-white btn-file">
                                                                      <span class="fileupload-new">
                                                                        <i class="fa fa-paper-clip">
                                                                        </i>
                                                                        上传照片
                                                                      </span>
                                                                      <span class="fileupload-exists">
                                                                        <i class="fa fa-undo">
                                                                        </i>
                                                                        换一张
                                                                      </span>
                                                                      <input type="file" class="default">
                                                                    </span>
                                                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">
                                                                    <i class="fa fa-trash">
                                                                    </i>
                                                                    删除
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">出生日期</td>
                                                    <td class="bgw">
                                                        <input name="staff_born" class="form-control in_bgw" type="text"  value="{{ date('Y-m-d', $staffMsg->staff_born) }}">
                                                    </td>
                                                    <td class="bgw">籍　　贯</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="staff_origin" value="{{ $staffMsg->staff_origin }}"></td>
                                                    <td class="bgw">婚姻状况</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="staff_marriage" value="{{ $staffMsg->staff_marriage }}"></td>
                                                    {{--<td class="bgw">身份证号</td>--}}
                                                    {{--<td class="bgw" colspan="3">--}}
                                                    {{--<input class="form-control in_bgw" type="text" name="CardNo">--}}
                                                    {{--</td>--}}
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">政治面貌</td>
                                                    <td class="bgw">
                                                        <input name="staff_political" class="form-control in_bgw" type="text" value="{{ $staffMsg->staff_political }}">
                                                    </td>
                                                    <td class="bgw">身　　高</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="staff_height" value="{{ $staffMsg->staff_height }}"></td>
                                                    <td class="bgw">体　　重</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="staff_weight" value="{{ $staffMsg->staff_weight }}"></td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">手机号码</td>
                                                    <td class="bgw">
                                                        <input name="staff_phone" class="form-control in_bgw" type="text" value="{{ $staffMsg->staff_phone }}">
                                                    </td>
                                                    <td class="bgw">电子邮箱</td>
                                                    <td class="bgw" colspan="3"><input type="text" class="form-control in_bgw" name="staff_email" value="{{ $staffMsg->staff_email }}"></td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">证件类型</td>
                                                    <td class="bgw" colspan="2">
                                                        <input name="staff_certType" class="form-control in_bgw" type="text" value="{{ $staffMsg->staff_certType }}">
                                                    </td>
                                                    <td class="bgw">证件号码</td>
                                                    <td class="bgw" colspan="4"><input type="text" class="form-control in_bgw" name="staff_card" value="{{ $staffMsg->staff_card }}"></td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">毕业院校</td>
                                                    <td class="bgw" colspan="2">
                                                        <input name="staff_school" class="form-control in_bgw" type="text" value="{{ $staffMsg->staff_school }}">
                                                    </td>
                                                    <td class="bgw">专　　业</td>
                                                    <td class="bgw" colspan="4"><input type="text" class="form-control in_bgw" name="staff_major" value="{{ $staffMsg->staff_major }}"></td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">毕业日期</td>
                                                    <td class="bgw" colspan="2">
                                                        <input name="staff_graduationDate" class="form-control in_bgw" type="text" value="{{ $staffMsg->staff_graduationDate }}">
                                                    </td>
                                                    <td class="bgw">学　　历</td>
                                                    <td class="bgw" colspan="4"><input type="text" class="form-control in_bgw" name="staff_edu" value="{{ $staffMsg->staff_edu }}"></td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">户口性质</td>
                                                    <td class="bgw" colspan="2">
                                                        <input name="staff_regResidence" class="form-control in_bgw" type="text" value="{{ $staffMsg->staff_regResidence }}">
                                                    </td>
                                                    <td class="bgw">管辖机关</td>
                                                    <td class="bgw" colspan="4"><input type="text" class="form-control in_bgw" name="staff_domination" value="{{ $staffMsg->staff_domination }}"></td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">户籍地址</td>
                                                    <td class="bgw" colspan="6"><input name="staff_address" type="text" class="form-control in_bgw" value="{{ $staffMsg->staff_address }}"></td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">证件期限</td>
                                                    <td class="bgw" colspan="6"><input name="staff_qixian" type="text" class="form-control in_bgw" value="{{ $staffMsg->staff_qixian }}"></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <table class="display table table-bordered" style="width:1000px;">
                                                <tr class="text-center">
                                                    <td colspan="4" style="font-weight: bold;">家庭成员</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">姓　　名</td>
                                                    <td class="bgw">关　　系</td>
                                                    <td class="bgw">工作单位</td>
                                                    <td class="bgw">联系电话</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td><input name="staff_parents_name[]" type="text" class="form-control in_bgw" value="{{ $staffMsg->staff_parents_name[0] }}"></td>
                                                    <td><input name="staff_parents_relationship[]" type="text" class="form-control in_bgw" value="{{ $staffMsg->staff_parents_relationship[0] }}"></td>
                                                    <td><input name="staff_parents_company[]" type="text" class="form-control in_bgw" value="{{ $staffMsg->staff_parents_company[0] }}"></td>
                                                    <td><input name="staff_parents_phone[]" type="text" class="form-control in_bgw" value="{{ $staffMsg->staff_parents_phone[0] }}"></td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td><input name="staff_parents_name[]" type="text" class="form-control in_bgw" value="{{ $staffMsg->staff_parents_name[1] }}"></td>
                                                    <td><input name="staff_parents_relationship[]" type="text" class="form-control in_bgw" value="{{ $staffMsg->staff_parents_relationship[1] }}"></td>
                                                    <td><input name="staff_parents_company[]" type="text" class="form-control in_bgw" value="{{ $staffMsg->staff_parents_company[1] }}"></td>
                                                    <td><input name="staff_parents_phone[]" type="text" class="form-control in_bgw" value="{{ $staffMsg->staff_parents_phone[1] }}"></td>
                                                </tr>
                                            </table>
                                            <table class="display table table-bordered" style="width:1000px;">
                                                <tr class="text-center">
                                                    <td colspan="3" style="font-weight: bold;">教育经历</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">起止日期</td>
                                                    <td class="bgw">院校名称</td>
                                                    <td class="bgw">专　　业</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td><input name="staff_startDate_school[]" type="text" class="form-control in_bgw" value="{{ $staffMsg->staff_startDate_school[0] }}"></td>
                                                    <td><input name="staff_school_name[]" type="text" class="form-control in_bgw" value="{{ $staffMsg->staff_school_name[0] }}"></td>
                                                    <td><input name="staff_major_school[]" type="text" class="form-control in_bgw" value="{{ $staffMsg->staff_major_school[0] }}"></td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td><input name="staff_startDate_school[]" type="text" class="form-control in_bgw" value="{{ $staffMsg->staff_startDate_school[1] }}"></td>
                                                    <td><input name="staff_school_name[]" type="text" class="form-control in_bgw" value="{{ $staffMsg->staff_school_name[1] }}"></td>
                                                    <td><input name="staff_major_school[]" type="text" class="form-control in_bgw" value="{{ $staffMsg->staff_major_school[1] }}"></td>
                                                </tr>
                                            </table>
                                            <table class="display table table-bordered" style="width:1000px;">
                                                <tr class="text-center">
                                                    <td colspan="3" style="font-weight: bold;">工作经历</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">起止日期</td>
                                                    <td class="bgw">单位名称</td>
                                                    <td class="bgw">职　　务</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td><input name="staff_startDate_work[]" type="text" class="form-control in_bgw" value="{{ $staffMsg->staff_startDate_work[0] }}"></td>
                                                    <td><input name="staff_unitName[]" type="text" class="form-control in_bgw" value="{{ $staffMsg->staff_unitName[0] }}"></td>
                                                    <td><input name="staff_post[]" type="text" class="form-control in_bgw" value="{{ $staffMsg->staff_post[0] }}"></td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td><input name="staff_startDate_work[]" type="text" class="form-control in_bgw" value="{{ $staffMsg->staff_startDate_work[1] }}"></td>
                                                    <td><input name="staff_unitName[]" type="text" class="form-control in_bgw" value="{{ $staffMsg->staff_unitName[1] }}"></td>
                                                    <td><input name="staff_post[]" type="text" class="form-control in_bgw" value="{{ $staffMsg->staff_post[1] }}"></td>
                                                </tr>
                                            </table>
                                            <br>
                                        </form>
                                    </div>
                                </div>
                                <div id="xszs" class="tab-pane"><div class="panel-body">
                                        @include('layouts.notice')
                                        <form class="form-horizontal" role="form" action="{{ url('admin/personnel/add_entry') }}" method="post">
                                            {{ csrf_field() }}
                                            <table class="display table table-bordered" style="width:1000px;">
                                                <tr class="text-center">
                                                    <td colspan="6" style="font-weight: bold;">入职信息</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">部　　门</td>
                                                    <td class="bgw">
                                                        <input name="staff_department" class="form-control in_bgw" type="text" value="{{ $staffMsg->staff_department }}">
                                                    </td>
                                                    <td class="bgw">职　　务</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="staff_postNew" value="{{ $staffMsg->staff_postNew }}"></td>
                                                    <td class="bgw">聘用形式</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="staff_employ" value="{{ $staffMsg->staff_employ }}"></td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">入职日期</td>
                                                    <td class="bgw">
                                                        <input name="staff_entryDate" class="form-control in_bgw" type="text" value="{{ $staffMsg->staff_entryDate }}">
                                                    </td>
                                                    <td class="bgw">合同日期</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="staff_contractDate" value="{{ $staffMsg->staff_contractDate }}"></td>
                                                    <td class="bgw">合同期限</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="staff_contractPeriod" value="{{ $staffMsg->staff_contractPeriod }}"></td>
                                                </tr>
                                            </table>
                                            <br>

                                        </form>
                                    </div></div>
                                <div id="pxzs" class="tab-pane"><div class="panel-body">
                                        @include('layouts.notice')
                                        <form class="form-horizontal" role="form" action="{{ url('admin/personnel/add_wages') }}" method="post">
                                            {{ csrf_field() }}
                                            <table class="display table table-bordered" style="width:1000px;">
                                                <tr class="text-center">
                                                    <td colspan="6" style="font-weight: bold;">工资信息</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">员工编号</td>
                                                    <td colspan="6"><input type="text" class="form-control " name="staff_num" value="{{ $staffMsg->staff_num }}"></td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">试用工资</td>
                                                    <td class="bgw">
                                                        <input name="staff_probation" class="form-control in_bgw" type="text" value="{{ $staffMsg->staff_probation }}">
                                                    </td>
                                                    <td class="bgw">转正工资</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="staff_full" value="{{ $staffMsg->staff_full }}"></td>
                                                    <td class="bgw">工龄工资</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="staff_seniority" value="{{ $staffMsg->staff_seniority }}"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="6"></td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td colspan="6">补助项目</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">餐食补助</td>
                                                    <td class="bgw">
                                                        <input name="staff_meal" class="form-control in_bgw" type="text">
                                                    </td>
                                                    <td class="bgw">交通补助</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="staff_traffic" value="{{ $staffMsg->staff_traffic }}"></td>
                                                    <td class="bgw">通信补助</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="staff_communication" value="{{ $staffMsg->staff_communication }}"></td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">出差补助</td>
                                                    <td class="bgw">
                                                        <input name="staff_travel" class="form-control in_bgw" type="text" value="{{ $staffMsg->staff_travel }}">
                                                    </td>
                                                    <td class="bgw">加班补助</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="staff_overtime" value="{{ $staffMsg->staff_overtime }}"></td>
                                                    <td class="bgw">绩效奖金</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="staff_achievements" value="{{ $staffMsg->staff_achievements }}"></td>
                                                </tr>
                                            </table>
                                            <br>

                                        </form>
                                    </div></div>
                                <div id="jyzs" class="tab-pane"><div class="panel-body">
                                        @include('layouts.notice')
                                        <form class="form-horizontal" role="form" method="post" action="{{ url('admin/personnel/add_safe') }}">
                                            {{ csrf_field() }}
                                            <table class="display table table-bordered" style="width:1000px;">
                                                <tr class="text-center">
                                                    <td colspan="6" style="font-weight: bold;">保险信息</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">保险状态</td>
                                                    <td class="bgw">
                                                        <input name="staff_insurance" class="form-control in_bgw" type="text" value="{{ $staffMsg->staff_insurance }}">
                                                    </td>
                                                    <td class="bgw">社　　保</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="staff_social" value="{{ $staffMsg->staff_social }}"></td>
                                                    <td class="bgw">公 积 金</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="staff_fund" value="{{ $staffMsg->staff_fund }}"></td>
                                                </tr>
                                            </table>
                                            <br>

                                        </form>
                                    </div></div>
                                <div id="scfj" class="tab-pane">
                                    <div class="panel-body">
                                        <form class="form-horizontal" role="form" action="{{ url('admin/personnel/add_account') }}" method="post">
                                            {{ csrf_field() }}
                                            <table class="display table table-bordered" style="width:1000px;">
                                                <tr class="text-center">
                                                    <td colspan="6" style="font-weight: bold;">账户信息</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">开 户 行</td>
                                                    <td class="bgw">
                                                        <input name="staff_bank" class="form-control in_bgw" type="text" value="{{ $staffMsg->staff_bank }}">
                                                    </td>
                                                    <td class="bgw">户　　名</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="staff_bankName" value="{{ $staffMsg->staff_bankName }}"></td>
                                                    <td class="bgw">账　　号</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="staff_bankNumber" value="{{ $staffMsg->staff_bankNumber }}"></td>
                                                </tr>
                                            </table>
                                            <br>

                                        </form>
                                    </div>
                                </div>
                                <div id="lzxx" class="tab-pane">
                                    <div class="panel-body">
                                        <form class="form-horizontal" role="form" action="{{ url('admin/personnel/add_quit') }}" method="post">
                                            {{ csrf_field() }}
                                            <table class="display table table-bordered" style="width:1000px;">
                                                <tr class="text-center">
                                                    <td colspan="6" style="font-weight: bold;">离职信息</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">离职日期</td>
                                                    <td class="bgw">
                                                        <input name="staff_leaveDate" class="form-control in_bgw" type="text" value="{{ $staffMsg->staff_leaveDate }}">
                                                    </td>
                                                    <td class="bgw">离职类型</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="staff_leaveType" value="{{ $staffMsg->staff_leaveType }}"></td>
                                                    <td class="bgw">离职原因</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="staff_leaveReason" value="{{ $staffMsg->staff_leaveReason }}"></td>
                                                </tr>
                                            </table>
                                            <br>

                                        </form>
                                    </div>
                                </div>
                                <div id="contact" class="tab-pane">Contact</div>
                            </div>
                        </div>
                    </section>
                </div>

            </section>
        </section>

    </section>
    </section>
    <!-- END SECTION -->




@stop