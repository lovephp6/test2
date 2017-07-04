@extends('layouts.head')
@section('contents')

    <section id="main-content">
        <section class="wrapper site-min-height">
            <!-- BEGIN ROW  -->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <span class="label label-primary">　　学籍档案　　</span>　
                            <span class="label label-danger"><a href="{{ url('admin/school/add') }}" style="color:#FFF;">　　证书管理　　</a></span>　
                            <span class="label label-danger"><a href="{{ url('admin/school/add') }}" style="color:#FFF;">　　修改证书　　</a></span>
                            <span class="tools pull-right">
                       <a href="javascript:;" class="fa fa-chevron-down"></a>
                       <a href="javascript:;" class="fa fa-times"></a>
                       </span>
                        </header>
                        <div class="panel-body">
                            <div class="col-md-3">

                                {{--<form class="form-inline" role="form" action="" method="post">--}}
                                    {{--{{ csrf_field() }}--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label class="" for="exampleInputEmail2">身份证号：</label>--}}
                                        {{--<input name="CardNo" class="form-control" id="exampleInputEmail2" placeholder="请输入身份证号" value="">--}}
                                    {{--</div>--}}
                                    {{--<button type="submit" class="btn btn-info">获取数据</button>--}}
                                {{--</form> <br>--}}
                                <form class="form-inline" role="form" action="" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label class="" for="exampleInputEmail2">学生编号：</label>
                                        <input  class="form-control" name="student_num" id="exampleInputEmail2" placeholder="" value="{{ isset($studentMsg->student_num) ? $studentMsg->student_num : '' }}">
                                    </div>
                                    <br><br>
                                    <div class="form-group">
                                        <label class="" for="exampleInputEmail2">姓　　名：</label>
                                        <input  class="form-control" name="Name" id="exampleInputEmail2" placeholder="" value="{{ isset($studentMsg->Name) ? $studentMsg->Name : '' }}">
                                    </div> <br><br>
                                    <div class="form-group">
                                        <label class="" for="exampleInputEmail2">性　　别：</label>
                                        <input  class="form-control" name="Sex" id="exampleInputEmail2" placeholder="" value="{{ isset($studentMsg->Sex) ? $studentMsg->Sex : '' }}">
                                    </div> <br><br>
                                    <div class="form-group">
                                        <label class="" for="exampleInputEmail2">证件类型：</label>
                                        <input  class="form-control" id="exampleInputEmail2" value="身份证">
                                    </div> <br><br>
                                    <div class="form-group">
                                        <label class="" for="exampleInputEmail2">证件号码：</label>
                                        <input  class="form-control" name="CardNo" id="exampleInputEmail2" placeholder="" value="{{ isset($studentMsg->CardNo) ? $studentMsg->CardNo : '' }}">
                                    </div> <br><br>
                                    <div class="form-group">
                                        <label class="" for="exampleInputEmail2">出生日期：</label>
                                        <input  class="form-control" name="Born" id="exampleInputEmail2" placeholder="" value="{{ isset($studentMsg->Born) ? date('Y-m-d',$studentMsg->Born) : '' }}">
                                    </div> <br><br>
                                    <div class="form-group">
                                        <label class="" for="exampleInputEmail2">学院名称：</label>
                                        <input  class="form-control" name="school_name" id="exampleInputEmail2" placeholder="" value="{{ isset($studentMsg->school_name) ? $studentMsg->school_name : '' }}">
                                    </div> <br><br>
                                    <div class="form-group">
                                        <label class="" for="exampleInputEmail2">专业名称：</label>
                                        <input  class="form-control" name="major_name" id="exampleInputEmail2" placeholder="" value="{{ isset($studentMsg->major_name) ? $studentMsg->major_name : '' }}">
                                    </div> <br><br>
                                    <div class="form-group">
                                        <label class="" for="exampleInputEmail2">专业类型：</label>
                                        <input  class="form-control" name="major_type" id="exampleInputEmail2" placeholder="" value="{{ isset($studentMsg->major_type) ? $studentMsg->major_type : '' }}">
                                    </div> <br><br>
                                    <div class="form-group">
                                        <label class="" for="exampleInputEmail2">学　　制：</label>
                                        <input  class="form-control" name="major_date" id="exampleInputEmail2" placeholder="" value="{{ isset($studentMsg->major_date) ? $studentMsg->major_date : '' }}">
                                    </div> <br><br>
                                    <div class="form-group">
                                        <label class="" for="exampleInputEmail2">入学时间：</label>
                                        <input  class="form-control" name="come_time" id="exampleInputEmail2" placeholder="" value="{{ isset($studentMsg->come_time) ? date('Y-m-d',$studentMsg->come_time) : '' }}">
                                    </div> <br><br><br>
                                    <div class="form-group">
                                        <label class="" for="exampleInputEmail2">证书编号：</label>
                                        <input  class="form-control" id="exampleInputEmail2" name="certificate_number" value="{{ isset($studentMsg->certificate_number) ? $studentMsg->certificate_number : '' }}">
                                    </div> <br><br>
                                    <div class="form-group">
                                        <label class="" for="exampleInputEmail2">文化程度：</label>
                                        <select class="form-control" id="exampleInputEmail2" name="degree_education" style="width:196px;" value="{{ isset($studentMsg->degree_education) ? $studentMsg->degree_education : '' }}">
                                            <option @if($studentMsg->degree_education == '大专') selected @endif value="大专">大专</option>
                                            <option @if($studentMsg->degree_education == '中专') selected @endif value="中专">中专</option>
                                            <option @if($studentMsg->degree_education == '高中') selected @endif value="高中">高中</option>
                                        </select>
                                    </div> <br><br>
                                    <div class="form-group">
                                        <label class="" for="exampleInputEmail2">专业等级：</label>
                                        <select class="form-control" id="exampleInputEmail2" name="professional_level"  style="width:196px;" value="{{ isset($studentMsg->professional_level) ? $studentMsg->professional_level : '' }}">
                                            <option @if($studentMsg->professional_level == '高级') selected @endif value="高级">高级</option>
                                            <option @if($studentMsg->professional_level == '中级') selected @endif value="中级">中级</option>
                                            <option @if($studentMsg->professional_level == '初级') selected @endif value="初级">初级</option>
                                        </select>
                                    </div> <br><br>
                                    <div class="form-group">
                                        <label class="" for="exampleInputEmail2">考评审核：</label>
                                        <input  class="form-control" id="exampleInputEmail2" name="evaluation_audit" placeholder="" value="{{ isset($studentMsg->evaluation_audit) ? $studentMsg->evaluation_audit : '' }}">
                                    </div> <br><br>
                                    <div class="form-group">
                                        <label class="" for="exampleInputEmail2">发证日期：</label>
                                        <input  class="form-control" id="exampleInputEmail2" name="issue_date" placeholder="" value="{{ isset($studentMsg->issue_date) ? date('Y-m-d',$studentMsg->issue_date) : '' }}">
                                    </div> <br><br>
                                    <button class="btn btn-info" style="width:200px;">修改</button>
                                </form>
                            </div>
                            <div class="col-md-3">
                                <img src="{{ asset( isset($studentMsg->photo) ? $studentMsg->photo : './admin/img/phtots_moren.jpg') }}" name="photo" alt="" style="width: 130px;margin-top: 30px;">
                                <br><br><br><br><br>
                                @include('layouts.notice')
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- END ROW  -->
        </section>
    </section>
    <!-- END SECTION -->

@stop