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
                            <span class="label label-primary"><a href="{{ url('admin/property/total_money') }}" style="color:#FFF;">　　收费统计　　</a></span>　
                            <span class="label label-danger"><a href="{{ url('admin/property/tuition_fee') }}" style="color:#FFF;">　　收取学费　　</a></span>
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
                            <form action="{{ url('admin/property/add_tuition_fee') }}" method="post">
                                {{ csrf_field() }}
                            <table class="table table-bordered text-center" style="width:60%;">
                                <tr>
                                    <td colspan="6">基本信息</td>
                                </tr>
                                <tr>
                                    <td class="form_line_height">学生编号</td>
                                    <td> <input class="form-control" type="text" name="student_num"  value="{{ isset($studentMsg) ? $studentMsg->student_num : '' }}"></td>
                                    <td class="form_line_height">姓　　名</td>
                                    <td> <input class="form-control in_bgw" type="text" name=""  value="{{ isset($studentMsg) ? $studentMsg->Name : '' }}"></td>
                                    <td class="form_line_height">性　　别</td>
                                    <td> <input class="form-control in_bgw" type="text" name=""  value="{{ isset($studentMsg) ? $studentMsg->Sex : '' }}"></td>
                                </tr>
                                <tr>
                                    <td class="form_line_height">出生日期</td>
                                    <td> <input class="form-control in_bgw" type="text" name=""  value="{{ isset($studentMsg) ? date('Y-m-d',$studentMsg->Born) : '' }}"></td>
                                    <td class="form_line_height">证件号码</td>
                                    <td> <input class="form-control in_bgw" type="text" name="CardNo"  value="{{ isset($studentMsg) ? $studentMsg->CardNo : '' }}"></td>
                                    <td class="form_line_height">手机号码</td>
                                    <td> <input class="form-control" type="text" name=""  value="{{ isset($studentMsg) ? $studentMsg->phone_num : '' }}"></td>
                                </tr>
                                <tr>
                                    <td class="form_line_height">专业名称</td>
                                    <td> <input class="form-control" type="text" name="" value="{{ isset($studentMsg) ? $studentMsg->major_name : '' }}"></td>
                                    <td class="form_line_height">专业类型</td>
                                    <td> <input class="form-control in_bgw" type="text" name=""  value="{{ isset($studentMsg) ? $studentMsg->major_type : '' }}"></td>
                                    <td class="form_line_height">学　　制</td>
                                    <td> <input class="form-control in_bgw" type="text" name=""  value="{{ isset($studentMsg) ? $studentMsg->major_date : '' }}"></td>
                                </tr>
                                <tr ><td colspan="6">学费信息</td></tr>
                                <tr >
                                    <td class="form_line_height">缴费期限</td>
                                    <td colspan="5">
                                        <select class="form-control" name="payment_period">
                                            <option>一年</option>
                                            <option>三年</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="form_line_height">学　　费</td>
                                    <td> <input class="form-control in_bgw" type="text" name="tuition_standard" value="2222"></td>
                                    <td class="form_line_height">住宿标准</td>
                                    <td>
                                        <select class="form-control" name="home_standard">
                                            <option>39800</option>
                                            <option>39800</option>
                                        </select>
                                    </td>
                                    <td class="form_line_height">住 宿 费</td>
                                    <td><input class="form-control in_bgw" type="text" name="home_expense"></td>
                                </tr>
                                <tr>
                                    <td class="form_line_height">技 能 费</td>
                                    <td> <input class="form-control in_bgw" type="text" name="skill_money"></td>
                                    <td class="form_line_height">学 籍 费</td>
                                    <td><input class="form-control in_bgw" type="text" name="school_money"></td>
                                    <td class="form_line_height">军 训 费</td>
                                    <td><input class="form-control in_bgw" type="text" name="military_money"></td>
                                </tr>
                                <tr>
                                    <td class="form_line_height">被 服 费</td>
                                    <td> <input class="form-control in_bgw" type="text" name="bedding_money"></td>
                                    <td class="form_line_height">置 装 费</td>
                                    <td><input class="form-control in_bgw" type="text" name="clothing_money"></td>
                                    <td class="form_line_height">教 材 费</td>
                                        <td><input class="form-control in_bgw" type="text" name="book_money"></td>
                                </tr>
                                <tr>
                                    <td class="form_line_height">保 险 费</td>
                                    <td> <input class="form-control in_bgw" type="text" name="safe_money"></td>
                                    <td class="form_line_height">证 书 费</td>
                                    <td><input class="form-control in_bgw" type="text" name="certtifate_money"></td>
                                    <td class="form_line_height">合　　计</td>
                                    <td><input class="form-control in_bgw" type="text" name="zatotal_money"></td>
                                </tr>
                                <tr ><td colspan="6">活动信息</td></tr>
                                <tr>
                                    <td class="form_line_height">优惠活动</td>
                                    <td>
                                        <select class="form-control" name="part_activities">
                                            <option>1</option>
                                            <option>2</option>
                                        </select>
                                    </td>
                                    <td class="form_line_height">助学减免</td>
                                    <td> <select class="form-control" name="student_relief">
                                            <option>1</option>
                                            <option>2</option>
                                        </select>
                                    </td>
                                    <td class="form_line_height">减免凭证</td>
                                    <td> <input class="form-control in_bgw" type="text" name="invoice_number"></td>
                                </tr>
                                <tr ><td colspan="6">缴费信息</td></tr>
                                <tr>
                                    <td class="form_line_height">票据编号</td>
                                    <td> <input class="form-control" type="text" name="pay_card" id="money1" onblur="jisuan()" value="0"></td>
                                    <td class="form_line_height">应缴金额</td>
                                    <td> <input class="form-control in_bgw" type="text" id="money2" onblur="jisuan()" name="actual_money" value="0"></td>
                                    <td class="form_line_height">缴费日期</td>
                                    <td> <input class="form-control in_bgw" type="text" id="money3" onblur="jisuan()" name="transfer_accounts" value="0"></td>
                                </tr>
                                <tr>
                                    <td class="form_line_height">刷卡缴费</td>
                                    <td> <input class="form-control" type="text" name="pay_card" id="money1" onblur="jisuan()" value="0"></td>
                                    <td class="form_line_height">现金缴费</td>
                                    <td> <input class="form-control in_bgw" type="text" id="money2" onblur="jisuan()" name="cash" value="0"></td>
                                    <td class="form_line_height">转账缴费</td>
                                    <td> <input class="form-control in_bgw" type="text" id="money3" onblur="jisuan()" name="transfer_accounts" value="0"></td>
                                </tr>
                                <tr>
                                    <td class="form_line_height">贷款缴费</td>
                                    <td> <input class="form-control" type="text" name="loan" id="money4" onblur="jisuan()" value="0"></td>
                                    <td class="form_line_height">其他缴费</td>
                                    <td> <input class="form-control in_bgw" type="text" id="money5" onblur="jisuan()" name="other" value="0"></td>
                                    <td class="form_line_height">合　　计</td>
                                    <td> <input class="form-control in_bgw" type="text" id="money" onblur="jisuan()" name="total" value="0"></td>
                                </tr>
                                <tr ><td colspan="6">收款信息</td></tr>
                                <tr>
                                    <td class="form_line_height">开 票 人</td>
                                    <td>
                                        <select class="form-control" name="drawer">
                                            <option>郑秀儿</option>
                                            <option>江忠泉</option>
                                        </select>
                                    </td>
                                    <td class="form_line_height">收 款 人</td>
                                    <td>
                                        <select class="form-control" name="payee">
                                            <option>郑秀儿</option>
                                            <option>江忠泉</option>
                                        </select>
                                    </td>
                                    <td class="form_line_height">收款单位</td>
                                    <td>
                                        <select class="form-control" name="payee_company">
                                            <option>北京首航蓝天学院</option>
                                            <option>2</option>
                                        </select>
                                    </td>
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
//        var aa = $('input[name=tuition_standard]').val();
//        alert(aa);
//        $('input[name=zatotal_money]').val();
    </script>

@stop