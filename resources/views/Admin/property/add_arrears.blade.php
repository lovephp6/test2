@extends("layouts.head")
@section("contents")
    <style>
        .form_line_height{
            line-height: 40px !important;
        }
    </style>
    <section id="main-content">
        <section class="wrapper site-min-height">
            <!-- BEGIN ROW  -->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <span class="label label-primary">　　财务管理　　</span>　
                            <span class="label label-danger"><a href="{{ url('admin/school/add') }}" style="color:#FFF;">　　欠费管理　　</a></span>
                            <span class="tools pull-right">
                       <a href="javascript:;" class="fa fa-chevron-down"></a>
                       <a href="javascript:;" class="fa fa-times"></a>
                       </span>
                        </header>
                        <center>
                            <div class="panel-body">
                                @include('layouts.notice')
                                <form class="form-inline" role="form" method="post" action="" style="text-align: left !important;margin-left:21%;">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label class="" for="exampleInputEmail2">身份证号：</label>
                                        <input type="text" class="form-control" name="CardNo" id="exampleInputEmail2" placeholder="请输入身份证号码">
                                    </div>
                                    <button type="submit" class="btn btn-info">获取数据</button>
                                </form><br>
                                <form action="{{ url('admin/property/insert_arrears') }}" method="post">
                                    {{ csrf_field() }}
                                    <table class="table table-bordered text-center" style="width:60%;">
                                        <tr>
                                            <td class="form_line_height">学生编号</td>
                                            <td> <input class="form-control" type="text" name="student_num"  value="{{ isset($studentMsg) ? $studentMsg->student_num : '' }}"></td>
                                            <td class="form_line_height">姓　　名</td>
                                            <td> <input class="form-control in_bgw" type="text" name=""  value="{{ isset($studentMsg) ? $studentMsg->Name : '' }}"></td>
                                            <td class="form_line_height">性　　别</td>
                                            <td> <input class="form-control in_bgw" type="text" name=""  value="{{ isset($studentMsg) ? $studentMsg->Sex : '' }}"></td>
                                        </tr>
                                        <tr>
                                            <td class="form_line_height">证件类型</td>
                                            <td> <input class="form-control" type="text" name=""  value="身份证"></td>
                                            <td class="form_line_height">证件号码</td>
                                            <td> <input class="form-control in_bgw" type="text" name="CardNo"  value="{{ isset($studentMsg) ? $studentMsg->CardNo : '' }}"></td>
                                            <td class="form_line_height">学费标准</td>
                                            <td> <input class="form-control in_bgw" type="text" name=""  value="{{ isset($studentMsg) ? $studentMsg->tuition_standard : '' }}"></td>
                                        </tr>
                                        <tr>
                                            <td class="form_line_height">专业名称</td>
                                            <td> <input class="form-control" type="text" name="" value="{{ isset($studentMsg) ? $studentMsg->major_name : '' }}"></td>
                                            <td class="form_line_height">专业类型</td>
                                            <td> <input class="form-control in_bgw" type="text" name=""  value="{{ isset($studentMsg) ? $studentMsg->major_type : '' }}"></td>
                                            <td class="form_line_height">学　　制</td>
                                            <td> <input class="form-control in_bgw" type="text" name=""  value="{{ isset($studentMsg) ? $studentMsg->major_date : '' }}"></td>
                                        </tr>
                                        <tr ><td colspan="6"></td></tr>
                                        <tr>
                                            <td class="form_line_height">欠缴期限</td>
                                            <td>
                                                <input class="form-control in_bgw" type="text" name="payment_term"  value="">
                                            </td>
                                            <td class="form_line_height">欠缴金额</td>
                                            <td>
                                                <input class="form-control in_bgw" type="text" name="amount_arrears"  value="">
                                            </td>
                                            <td class="form_line_height">缴　　费</td>
                                            <td>
                                                <input class="form-control in_bgw" type="text" name="pay"  value="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="6"><button class="btn btn-info">　　提交　　</button>　　
                                    </table>
                                </form>
                            </div>
                        </center>
                    </section>
                </div>
            </div>
            <!-- END ROW  -->
        </section>
    </section>
    <script>
        function jisuan(){
            var num1 = $('#money1').val() || 0;
            var num2 = $('#money2').val() || 0;
            var num3 = $('#money3').val() || 0;
            var num4 = $('#money4').val() || 0;
            var num5 = $('#money5').val() || 0;
            var result = parseFloat(num1)+parseFloat(num2)+parseFloat(num3)+parseFloat(num4)+parseFloat(num5);
            $('#money').val(result);
        }
    </script>

@stop