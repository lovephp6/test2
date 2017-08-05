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
                                    <td> <input class="form-control" type="text" id="major_name" name="" value="{{ isset($studentMsg) ? $studentMsg->major_name : '' }}"></td>
                                    <td class="form_line_height">专业类型</td>
                                    <td> <input class="form-control in_bgw" type="text" id="major_type" name=""  value="{{ isset($studentMsg) ? $studentMsg->major_type : '' }}"></td>
                                    <td class="form_line_height">学　　制</td>
                                    <td> <input class="form-control in_bgw" type="text" id="major_date" name=""  value="{{ isset($studentMsg) ? $studentMsg->major_date : '' }}"></td>
                                </tr>
                                <tr ><td colspan="6">学费信息</td></tr>
                                <tr >
                                    <td class="form_line_height">缴费期限</td>
                                    <td colspan="5">
                                        <select class="form-control" name="payment_period" id="qixian" onchange="gettimes('{{ url('admin/money/getmoney') }}', '{{ csrf_token() }}')">
                                            <option value="">请选择学年</option>
                                            <option value="1">第一年</option>
                                            <option value="2">第二年</option>
                                            <option value="3">第三年</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="form_line_height">学　　费</td>
                                    <td> <input class="form-control in_bgw" type="text" name="tuition_standard" value=""></td>
                                    <td class="form_line_height">住宿标准</td>
                                    <td>
                                        <select class="form-control" name="home_standard" id="gethmoney" onchange="gethome('{{ url('admin/staymoney/gethomes') }}', '{{ csrf_token() }}')">
                                            <option>请选择住宿标准</option>
                                            @foreach($homeMsgs as $homeMsg)
                                            <option value="{{ $homeMsg->stay_standard }}">{{ $homeMsg->stay_standard }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="form_line_height">住 宿 费</td>
                                    <td><input class="form-control in_bgw" type="text" id="stmoney" name="home_expense"></td>
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
                                            <option value="">请选择</option>
                                            @foreach($avtives as $avtive)
                                            <option value="{{ $avtive->active_name }}">{{ $avtive->active_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="form_line_height">助学活动</td>
                                    <td> <select class="form-control" name="student_relief" id="gethelps" onchange="gethelp('{{ url('admin/helps/gethelps') }}', '{{ csrf_token() }}')">
                                            <option value="">请选择</option>
                                             @foreach($helps as $help)
                                                <option value="{{ $help->helps_name }}">{{ $help->helps_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="form_line_height">减免金额</td>
                                    <td> <input class="form-control in_bgw" type="text" name="invoice_number" id="facthelp" value="0"></td>
                                </tr>
                                <tr ><td colspan="6">缴费信息</td></tr>
                                <tr>
                                    <td class="form_line_height">票据编号</td>
                                    <td> <input class="form-control" type="text" name="pay_card" value="0"></td>
                                    <td class="form_line_height">应缴金额</td>
                                    <td> <input class="form-control in_bgw" type="text" id="factmoneys"  name="actual_money" value="0"></td>
                                    <td class="form_line_height">缴费日期</td>
                                    <td> <input class="form-control in_bgw" type="text"  name="transfer_accounts" value="{{ date('Y-m-d',time()) }}"></td>
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
                                    <td class="form_line_height">实缴金额</td>
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
                                    <td colspan="6"><button class="btn btn-info"  id="tijiao">　　提交　　</button>　　 <a href="{{ url('admin/property/shouju') }}" class="btn btn-info">　　预览　　</a></td>
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
            var yingmoney = $('#factmoneys').val();
            var jianqu =  parseFloat(yingmoney) - parseFloat(result);
            $('#money').val(result);
        }

        function gettimes(url, token) {
            var xuenian = $('#qixian option:selected').val();
            var xuezhi = $('#major_date').val();
            var zhuanye = $('#major_name').val();
            $.post(url, {'_token' : token, 'major_name' : zhuanye, 'major_date' : xuezhi, 'payment_period' : xuenian}, function(data){
                $('input[name=tuition_standard]').val(data[0].tuition_standard);
                $('input[name=skill_money]').val(data[0].skill_money);
                $('input[name=school_money]').val(data[0].school_money);
                $('input[name=military_money]').val(data[0].military_money);
                $('input[name=bedding_money]').val(data[0].bedding_money);
                $('input[name=clothing_money]').val(data[0].clothing_money);
                $('input[name=book_money]').val(data[0].book_money);
                $('input[name=safe_money]').val(data[0].safe_money);
                $('input[name=certtifate_money]').val(data[0].certtifate_money);
                $('input[name=zatotal_money]').val(data[0].zatotal_money);
            });
        }

        function gethome(url, token) {
            var bz = $('#gethmoney option:selected').val();
            $.post(url, {'_token' : token, 'bz' : bz}, function(data){
                $('#stmoney').val(data.stay_money);
                var a = $('input[name=zatotal_money]').val();
                var b = $('#stmoney').val();
                $('input[name=zatotal_money]').val(parseFloat(a)+parseFloat(b));
                $('#factmoneys').val($('input[name=zatotal_money]').val());
            });

        }

        function gethelp(url, token) {
            var bz = $('#gethelps option:selected').val();
            $.post(url, {'_token' : token, 'bz' : bz}, function(data){
                $('#facthelp').val(data.helps_money);
                var tolmoney = $('input[name=zatotal_money]').val();
                var amoney = $('#facthelp').val();
                $('#factmoneys').val(parseFloat(tolmoney) - parseFloat(amoney));
            });

        }


    </script>

@stop