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
                            <span class="label label-danger"><a href="{{ url('admin/school/add') }}" style="color:#FFF;">　　退还学费　　</a></span>
                            <span class="tools pull-right">
                       <a href="javascript:;" class="fa fa-chevron-down"></a>
                       <a href="javascript:;" class="fa fa-times"></a>
                       </span>
                        </header>
                        <center>
                            <div class="panel-body">
                                @include('layouts.notice')
                                <form class="form-inline" role="form"  style="text-align: left !important;margin-left:21%;" action="" method="post">

                                   {{ csrf_field() }}
                                    <div class="form-group">
                                        <label class="" for="exampleInputEmail2">身份证号：</label>
                                        <input type="text" class="form-control" name="CardNo" id="exampleInputEmail2" placeholder="请输入身份证号码">
                                    </div>
                                    <button type="submit" class="btn btn-info">获取数据</button>
                                </form><br>
                                <form action="{{ url('admin/property/refund_stu_msg') }}" method="post">
                                    {{ csrf_field() }}
                                    <table class="table table-bordered text-center" style="width:60%;">
                                        <tr>
                                            <td colspan="6" style="font-weight: bold">缴费信息</td>
                                        </tr>
                                        <tr>
                                            <td class="form_line_height">学生编号</td>
                                            <td> <input class="form-control" type="text" name=""  value="{{ isset($charge_msg) ? $charge_msg->student_num : ''}}"></td>
                                            <td class="form_line_height">姓　　名</td>
                                            <td> <input class="form-control in_bgw" type="text" name="" value="{{ isset($charge_msg) ? $charge_msg->Name : ''}}"></td>
                                            <td class="form_line_height">性　　别</td>
                                            <td> <input class="form-control in_bgw" type="text" name="" value="{{ isset($charge_msg) ? $charge_msg->Sex : ''}}"></td>
                                        </tr>
                                        <tr>
                                            <td class="form_line_height">证件类型</td>
                                            <td> <input class="form-control" type="text" name=""  value="身份证"></td>
                                            <td class="form_line_height">证件号码</td>
                                            <td> <input class="form-control in_bgw" type="text" name="CardNo" value="{{ isset($charge_msg) ? $charge_msg->CardNo : ''}}"></td>
                                            <td class="form_line_height">出生日期</td>
                                            <td> <input class="form-control in_bgw" type="text" name="" value="{{ isset($charge_msg) ? date('Y-m-d' ,$charge_msg->Born) : ''}}"></td>
                                        </tr>
                                        <tr>
                                            <td class="form_line_height">专业名称</td>
                                            <td> <input class="form-control" type="text" name=""  value="{{ isset($charge_msg) ? $charge_msg->major_name : ''}}"></td>
                                            <td class="form_line_height">专业类型</td>
                                            <td> <input class="form-control in_bgw" type="text" name="" value="{{ isset($charge_msg) ? $charge_msg->major_type : ''}}"></td>
                                            <td class="form_line_height">学　　制</td>
                                            <td> <input class="form-control in_bgw" type="text" name="" value="{{ isset($charge_msg) ? $charge_msg->major_date : ''}}"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="6"></td>
                                        </tr>
                                        <tr>
                                            <td class="form_line_height">学费标准</td>
                                            <td style="width:25%">
                                                <input class="form-control in_bgw" type="text" name="" value="{{ isset($charge_msg) ? $charge_msg->tuition_standard : ''}}">
                                            </td>
                                            <td class="form_line_height">缴费期限</td>
                                            <td>
                                                <input class="form-control in_bgw" type="text" name="" value="{{ isset($charge_msg) ? $charge_msg->payment_period : ''}}">
                                            </td>
                                            <td class="form_line_height">参与活动</td>
                                            <td>
                                                <input class="form-control in_bgw" type="text" name="" value="{{ isset($charge_msg) ? $charge_msg->part_activities : ''}}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="form_line_height">助学减免</td>
                                            <td>
                                                <input class="form-control in_bgw" type="text" name="" value="{{ isset($charge_msg) ? $charge_msg->student_relief : ''}}">
                                            </td>
                                            <td class="form_line_height">收据编号</td>
                                            <td> <input class="form-control in_bgw" type="text" value="{{ isset($charge_msg) ? $charge_msg->receipt_number : ''}}"></td>
                                            <td class="form_line_height">发票编号</td>
                                            <td> <input class="form-control in_bgw" type="text" value="{{ isset($charge_msg) ? $charge_msg->invoice_number : ''}}"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="6"></td>
                                        </tr>
                                        <tr>
                                            <td class="form_line_height">刷　　卡</td>
                                            <td> <input class="form-control" type="text" name=""  value="{{ isset($charge_msg) ? $charge_msg->pay_card : ''}}"></td>
                                            <td class="form_line_height">现　　金</td>
                                            <td> <input class="form-control in_bgw" type="text" name="" value="{{ isset($charge_msg) ? $charge_msg->cash : ''}}"></td>
                                            <td class="form_line_height">转　　账</td>
                                            <td> <input class="form-control in_bgw" type="text" name="" value="{{ isset($charge_msg) ? $charge_msg->transfer_accounts : ''}}"></td>
                                        </tr>
                                        <tr>
                                            <td class="form_line_height">贷　　款</td>
                                            <td> <input class="form-control" type="text" name=""  value="{{ isset($charge_msg) ? $charge_msg->loan : ''}}"></td>
                                            <td class="form_line_height">其　　他</td>
                                            <td> <input class="form-control in_bgw" type="text" value="{{ isset($charge_msg) ? $charge_msg->other : ''}}"></td>
                                            <td class="form_line_height">合　　计</td>
                                            <td> <input class="form-control in_bgw" type="text" value="{{ isset($charge_msg) ? $charge_msg->total : ''}}"></td>
                                        </tr>
                                        <tr>
                                            <td class="form_line_height">开 票 人</td>
                                            <td>
                                                <input class="form-control in_bgw" type="text" value="{{ isset($charge_msg) ? $charge_msg->drawer : ''}}">
                                            </td>
                                            <td class="form_line_height">收 款 人</td>
                                            <td>
                                                <input class="form-control in_bgw" type="text" value="{{ isset($charge_msg) ? $charge_msg->payee : ''}}">
                                            </td>
                                            <td class="form_line_height">收款单位</td>
                                            <td>
                                                <input class="form-control in_bgw" type="text" value="{{ isset($charge_msg) ? $charge_msg->payee_company : ''}}">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="6" style="font-weight: bold;">退费信息</td>
                                        </tr>
                                        <tr>
                                            <td>退费原因</td>
                                            <td colspan="5"><input class="form-control in_bgw" type="text" name="refund_reasons"></td>
                                        </tr>
                                        <tr>
                                            <td class="form_line_height">申请编号</td>
                                            <td><input class="form-control in_bgw" type="text" name="app_number"></td>
                                            <td class="form_line_height">扣款金额</td>
                                            <td><input class="form-control in_bgw" type="text" name="amount"></td>
                                            <td class="form_line_height">退款金额</td>
                                            <td><input class="form-control in_bgw" type="text" name="refund_amount"></td>
                                        </tr>
                                        <tr>
                                            <td class="form_line_height">退款方式</td>
                                            <td><input class="form-control in_bgw" type="text" name="refund_method"></td>
                                            <td class="form_line_height">退款单号</td>
                                            <td><input class="form-control in_bgw" type="text" name="refund_num"></td>
                                            <td class="form_line_height">退款日期</td>
                                            <td><input class="form-control in_bgw" type="text" name="refund_date" value="{{ date('Y-m-d', time()) }}"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="6"><button class="btn btn-info">　　提交　　</button>　　 <a href="{{ url('admin/property/shouju') }}" class="btn btn-info">　　预览　　</a></td>
                                        </tr>
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


@stop