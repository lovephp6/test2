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
                    　　学籍管理　　
                    </span>　
                    <span class="label btn-info" style="width:100px;height:35px;line-height:40px;">
                    　　学历管理　　
                    </span>　
                    <span class="label btn-info" style="width:100px;height:35px;">
                    　　学历展示　　
                    </span>
                </header>
                <div class="panel" >
                    <section class="panel col-md-12">

                        <div class="panel-body">
                            <div class="tab-content">
                                <div id="xsxk" class="tab-pane active">
                                    <div class="panel-body">
                                        <object type="application/cert-reader"  id="plugin" width=0 height=0> </object>
                                        <form id="default" class="form-horizontal" action="" method="post">

                                            <table class="display table table-bordered" style="width:1000px;">
                                                <tbody>
                                                {{ csrf_field() }}
                                                <tr class="text-center">
                                                    <td colspan="7" style="font-weight: bold;">身份信息</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">姓　　名</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="Name" value="{{ $student_edu->Name }}"></td>
                                                    <td class="bgw">性　　别</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="Sex" value="{{ $student_edu->Sex }}"></td>
                                                    <td class="bgw">民　　族</td>
                                                    <td class="bgw"><input type="text" class="form-control in_bgw" name="Nation" value="{{ $student_edu->Nation }}"></td>
                                                    <td class="bgw" rowspan="4">
                                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                                            <input type="hidden" name="photo" id="filename" value="{{ $student_edu->photo }}">
                                                            <div class="fileupload-new thumbnail">
                                                                <img src="{{ asset(isset($student_edu->photo) ? $student_edu->photo : 'admin/img/phtots_moren.jpg') }}" alt="" id="photoes" style="width:120px;height:150px;">
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
                                                        <input name="Born" class="form-control in_bgw" type="text" value="{{ date('Y-m-d',$student_edu->Born) }}">
                                                    </td>
                                                    <td class="bgw">身份证号</td>
                                                    <td class="bgw" colspan="3">
                                                        <input class="form-control in_bgw" type="text" name="CardNo" value="{{ $student_edu->CardNo }}">
                                                    </td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">户籍地址</td>
                                                    <td class="bgw" colspan="5"><input name="Address" type="text" class="form-control in_bgw" value="{{ $student_edu->Address }}"></td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">户籍所辖</td>
                                                    <td class="bgw">
                                                        <input name="Police" class="form-control in_bgw" type="text" value="{{ $student_edu->Police }}">
                                                    </td>
                                                    <td class="bgw">证件期限</td>
                                                    <td class="bgw" colspan="3">
                                                        <input class="form-control in_bgw" type="text" name="qixian" value="{{ $student_edu->qixian }}">
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>

                                            <table class="display table table-bordered" style="width:1000px;">
                                                <tr class="text-center">
                                                    <td colspan="6" style="font-weight: bold;">基本信息</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw" style="width: 14%;">手机号码</td>
                                                    <td><input name="phone" type="text" class="form-control in_bgw" value="{{ $student_edu->phone }}"></td>
                                                    <td class="bgw" style="width: 14%;">电子邮箱</td>
                                                    <td colspan="3"><input name="email" type="text" class="form-control in_bgw" value="{{ $student_edu->email }}"></td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">家庭地址</td>
                                                    <td colspan="5"><input name="home_address" type="text" class="form-control in_bgw" value="{{ $student_edu->home_address}}"></td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw" style="width: 14%;">学生来源</td>
                                                    <td><input name="student_source" type="text" class="form-control in_bgw" value="{{ $student_edu->student_source}}"></td>
                                                    <td class="bgw" style="width: 14%;">推 荐 人</td>
                                                    <td><input name="referee" type="text" class="form-control in_bgw" value="{{ $student_edu->referee }}"></td>
                                                    <td class="bgw" style="width: 14%;">联系电话</td>
                                                    <td><input name="referee_phone" type="text" class="form-control in_bgw" value="{{ $student_edu->referee_phone }}"></td>
                                                </tr>
                                            </table>
                                            <table class="display table table-bordered" style="width:1000px;">
                                                <tr class="text-center">
                                                    <td colspan="6" style="font-weight: bold;">报考信息</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw" style="width: 14%;">院校名称</td>
                                                    <td><input name="school_name" type="text" class="form-control in_bgw" value="{{ $student_edu->school_name }}"></td>
                                                    <td class="bgw" style="width: 14%;">专业名称</td>
                                                    <td><input name="major_name" type="text" class="form-control in_bgw" value="{{ $student_edu->major_name }}"></td>
                                                    <td class="bgw" style="width: 14%;">学历层次</td>
                                                    <td><input name="major" type="text" class="form-control in_bgw" value="{{ $student_edu->major }}"></td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw">报考日期</td>
                                                    <td><input name="examination_date" type="text" class="form-control in_bgw" value="{{ $student_edu->examination_date }}"></td>
                                                    <td class="bgw">注册日期</td>
                                                    <td><input name="register_date" type="text" class="form-control in_bgw" value="{{ $student_edu->register_date }}"></td>
                                                    <td class="bgw">学籍状态</td>
                                                    <td><input name="school_status" type="text" class="form-control in_bgw" value="{{ $student_edu->school_status }}"></td>
                                                </tr>
                                            </table>
                                            <table class="display table table-bordered" style="width:1000px;">
                                                <tr class="text-center">
                                                    <td colspan="6" style="font-weight: bold;">证书信息</td>
                                                </tr>
                                                <tr class="text-center">
                                                    <td class="bgw" style="width: 14%;">证书编号</td>
                                                    <td><input name="student_num" type="text" class="form-control in_bgw" value="{{ $student_edu->student_num }}"></td>
                                                    <td class="bgw" style="width: 14%;">领取日期</td>
                                                    <td><input name="receive_date" type="text" class="form-control in_bgw" value="{{ $student_edu->receive_date }}"></td>
                                                    <td class="bgw" style="width: 14%;">领 取 人</td>
                                                    <td><input name="receive_people" type="text" class="form-control in_bgw" value="{{ $student_edu->receive_people }}"></td>
                                                </tr>
                                            </table><br>
                                            {{--<center>--}}
                                                {{--<button class="btn btn-info" style="width:200px;">提交</button>--}}
                                            {{--</center>--}}
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

            </section>
        </section>

    </section>

    <!-- END SECTION -->




@stop