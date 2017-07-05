@extends('layouts.head')
@section('contents')

    <section id="main-content">
        <section class="wrapper site-min-height">
            <!-- BEGIN ROW  -->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <span class="label label-primary"><a href="{{ url('admin/property/income') }}" style="color:#FFF;">　　收入统计　　</a></span>　
                            <span class="label label-danger"><a href="{{ url('admin/property/add_income') }}" style="color:#FFF;">　　收入凭证　　</a></span>
                            <span class="tools pull-right">
                       <a href="javascript:;" class="fa fa-chevron-down"></a>
                       <a href="javascript:;" class="fa fa-times"></a>
                       </span>
                        </header>
                        <div class="panel-body">
                            @include('layouts.notice')
                            <center>
                            <form class="form-inline" role="form" action="" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    付款单位：<input type="text" class="form-control" size="54" name="payment_unit">　
                                </div>
                                <div class="form-group">
                                    &nbsp;经 手 人：<input type="text" class="form-control" size="54" name="handle_person">
                                </div>
                                <br><br>
                                <div class="form-group">
                                    票据编号：<input type="text" class="form-control" size="54" name="bill_number">　
                                </div>
                                <div class="form-group">
                                    发票编号：<input type="text" class="form-control" size="54" name="invoice_number">
                                </div><br><br>
                                <div class="form-group">
                                    收款日期：<input type="text" class="form-control" size="54" name="collection_date" value="{{ date('Y-m-d',time()) }}">　
                                </div>
                                <div class="form-group">
                                    收款方式：<input type="text" class="form-control" size="54" name="payment_method">
                                </div> <br><br>
                                <div class="form-group">
                                    备　　注：<input type="text" class="form-control" size="126px;" name="remarks">
                                </div>
                                <br><br>
                                <table class="table table-bordered text-center" style="width:1000px;">
                                    <tr>
                                        <td rowspan="2">摘要</td>
                                        <td rowspan="2" style="width:10%;">数量</td>
                                        <td rowspan="2" style="width:10%;">单位</td>
                                        <td rowspan="2" style="width:15%;">单价</td>
                                        <td colspan="10" style="padding: 0px;width:5%;">金额</td>
                                    </tr>
                                    <tr style="font-size:10px;">
                                        <td style="padding: 0px; vertical-align: middle;">千</td>
                                        <td style="padding: 0px; vertical-align: middle;">百</td>
                                        <td style="padding: 0px; vertical-align: middle;">十</td>
                                        <td style="padding: 0px; vertical-align: middle;">万</td>
                                        <td style="padding: 0px; vertical-align: middle;">千</td>
                                        <td style="padding: 0px; vertical-align: middle;">百</td>
                                        <td style="padding: 0px; vertical-align: middle;">十</td>
                                        <td style="padding: 0px; vertical-align: middle;">元</td>
                                        <td style="padding: 0px; vertical-align: middle;">角</td>
                                        <td style="padding: 0px; vertical-align: middle;">分</td>
                                    </tr>
                                    <tr class="a_money">
                                        <td rowspan="2" style="padding:0;"><input type="text" name="abstract[]" style="width:100%;height:40px;border:none;text-align: center;"></td>
                                        <td rowspan="2" style="padding:0;"><input type="text" name="number[]" value="1" class="number" style="width:100%;height:40px;border:none;text-align: center;"></td>
                                        <td rowspan="2" style="padding:0;"><input type="text" name="unit[]" style="width:100%;height:40px;border:none;text-align: center;"></td>
                                        <td rowspan="2" style="padding:0;"><input onblur="cc(this.value,this)" type="text" name="unit_price1" style="width:100%;height:40px;border:none;text-align: center;" value="0"></td>
                                        {{--<td rowspan="2" style="padding:0;"><input type="text" name="unit_price[]" style="width:100%;height:40px;border:none;text-align: center;"></td>--}}
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="qianwan1" style="width:10px;height:30px;border:none;"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="baiwan1" style="width:10px;height:30px;border:none;"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="shiwan1" style="width:10px;height:30px;border:none;"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="wan1" style="width:10px;height:30px;border:none;"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="qian1" style="width:10px;height:30px;border:none;"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="bai1" style="width:10px;height:30px;border:none;"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="shi1" style="width:10px;height:30px;border:none;"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="yuan1" style="width:10px;height:30px;border:none;"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="jiao1" style="width:10px;height:30px;border:none;"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="fen1" style="width:10px;height:30px;border:none;"></td>
                                    </tr>
                                    <tr style="height:40px;"></tr>
                                    <tr >
                                        <td rowspan="2" style="padding:0;"><input type="text" name="abstract[]" style="width:100%;height:40px;border:none;text-align: center;"></td>
                                        <td rowspan="2" style="padding:0;"><input type="text" value="1"  name="number[]" style="width:100%;height:40px;border:none;text-align: center;"></td>
                                        <td rowspan="2" style="padding:0;"><input type="text" name="unit[]" style="width:100%;height:40px;border:none;text-align: center;"></td>
                                        <td rowspan="2" style="padding:0;"><input type="text" onblur="cc(this.value,this)" name="unit_price2" style="width:100%;height:40px;border:none;text-align: center;" value="0"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="qianwan4" style="width:10px;height:30px;border:none;"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="baiwan4" style="width:10px;height:30px;border:none;"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="shiwan4" style="width:10px;height:30px;border:none;"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="wan4" style="width:10px;height:30px;border:none;"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="qian4" style="width:10px;height:30px;border:none;"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="bai4" style="width:10px;height:30px;border:none;"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="shi4" style="width:10px;height:30px;border:none;"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="yuan4" style="width:10px;height:30px;border:none;"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="jiao4" style="width:10px;height:30px;border:none;"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="fen4" style="width:10px;height:30px;border:none;"></td>
                                    </tr>
                                    <tr style="height:40px;"></tr>
                                    <tr >
                                        <td rowspan="2" style="padding:0;"><input type="text" name="abstract[]" style="width:100%;height:40px;border:none;text-align: center;"></td>
                                        <td rowspan="2" style="padding:0;"><input type="text" value="1" name="number[]" style="width:100%;height:40px;border:none;text-align: center;"></td>
                                        <td rowspan="2" style="padding:0;"><input type="text" name="unit[]" style="width:100%;height:40px;border:none;text-align: center;"></td>
                                        <td rowspan="2" style="padding:0;"><input type="text" onblur="cc(this.value,this)" name="unit_price3" style="width:100%;height:40px;border:none;text-align: center;" value="0"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="qianwan2" style="width:10px;height:30px;border:none;"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="baiwan2" style="width:10px;height:30px;border:none;"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="shiwan2" style="width:10px;height:30px;border:none;"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="wan2" style="width:10px;height:30px;border:none;"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="qian2" style="width:10px;height:30px;border:none;"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="bai2" style="width:10px;height:30px;border:none;"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="shi2" style="width:10px;height:30px;border:none;"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="yuan2" style="width:10px;height:30px;border:none;"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="jiao2" style="width:10px;height:30px;border:none;"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="fen2" style="width:10px;height:30px;border:none;"></td>
                                    </tr>
                                    <tr style="height:40px;"></tr>
                                    <tr >
                                        <td rowspan="2" style="padding:0;"><input type="text" name="abstract[]" style="width:100%;height:40px;border:none;text-align: center;"></td>
                                        <td rowspan="2" style="padding:0;"><input type="text" value="1" name="number[]" style="width:100%;height:40px;border:none;text-align: center;"></td>
                                        <td rowspan="2" style="padding:0;"><input type="text" name="unit[]" style="width:100%;height:40px;border:none;text-align: center;"></td>
                                        <td rowspan="2" style="padding:0;"><input type="text" onblur="cc(this.value,this)" name="unit_price4" style="width:100%;height:40px;border:none;text-align: center;" value="0"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="qianwan3" style="width:10px;height:30px;border:none;"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="baiwan3" style="width:10px;height:30px;border:none;"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="shiwan3" style="width:10px;height:30px;border:none;"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="wan3" style="width:10px;height:30px;border:none;"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="qian3" style="width:10px;height:30px;border:none;"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="bai3" style="width:10px;height:30px;border:none;"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="shi3" style="width:10px;height:30px;border:none;"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="yuan3" style="width:10px;height:30px;border:none;"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="jiao3" style="width:10px;height:30px;border:none;"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="fen3" style="width:10px;height:30px;border:none;"></td>
                                    </tr>
                                    <tr style="height:40px;"></tr>
                                    <tr >
                                        <td rowspan="2" colspan="4" style="text-align: left;padding:0px">　合计（大写）人民币：<input type="text" name="total" style="width:80%;height:40px;border:none;"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="qianwan_total" style="width:10px;height:30px;border:none;"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="baiwan_total" style="width:10px;height:30px;border:none;"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="shiwan_total"  style="width:10px;height:30px;border:none;"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="wan_total" style="width:10px;height:30px;border:none;"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="qian_total" style="width:10px;height:30px;border:none;"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="bai_total" style="width:10px;height:30px;border:none;"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="shi_total" style="width:10px;height:30px;border:none;"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="yuan_total" style="width:10px;height:30px;border:none;"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="jiao_total" style="width:10px;height:30px;border:none;"></td>
                                        <td rowspan="2" style="padding:5px;"><input type="text" name="fen_total" style="width:10px;height:30px;border:none;"></td>
                                    </tr>
                                    <tr style="height:40px;"></tr>
                                </table>
                                <br>
                                <div class="form-group" style="margin-left:20px;">
                                    开票人：<select class="form-control" name="drawer">
                                        <option value="郑秀儿">郑秀儿</option>
                                        <option value="江忠泉">江忠泉</option>
                                    </select>
                                </div>
                                <div class="form-group" style="padding:0 80px;">
                                    收款人：<select class="form-control" name="payee">
                                        <option value="郑秀儿">郑秀儿</option>
                                        <option value="江忠泉">江忠泉</option>
                                    </select>　
                                </div>
                                <div class="form-group">
                                    收款单位：<select class="form-control" name="collecting_unit">
                                        <option value="财务部">财务部</option>
                                        <option value="出纳部">出纳部</option>
                                    </select>　
                                </div>
                                <div class="form-group" style="padding-left:110px;">
                                    收款日期：<input type="text" class="form-control" name="collecting_date" value="{{ date('Y-m-d',time())}}">
                                </div>
                                <div class="col-md-12"> &nbsp;</div>
                                <div class="form-group col-md-12">
                                    <button class="btn btn-info">　　提交　　</button>
                                </div>
                            </form>
                            </center>
                        </div>
                    </section>
                </div>
            </div>
            <!-- END ROW  -->
        </section>
    </section>

    <script>
        function cc(s,a){
            if(/[^0-9\.]/.test(s)) return "请输入整数";
            var number =  parseInt($(a).parents('tr').children('td').children('input').eq(1).val());
            $.post('{{ url('admin/property/money_format') }}', { '_token': '{{ csrf_token() }}', 'money':s, 'number' : number}, function(s){
                var bb = JSON.parse(s);
//                $(a).val("￥" + bb.one);
                $(a).val(bb.one);
                if (bb.two !== undefined) {
                    var money = bb.two;
                } else {
                    var money = bb.one;
                }
                $(a).parents('tr').children('td').children('input').eq(13).val(money[money.length-1]);
                $(a).parents('tr').children('td').children('input').eq(12).val(money[money.length-2]);
                $(a).parents('tr').children('td').children('input').eq(11).val(money[money.length-4]);
                $(a).parents('tr').children('td').children('input').eq(10).val(money[money.length-5]);
                $(a).parents('tr').children('td').children('input').eq(9).val(money[money.length-6]);
                $(a).parents('tr').children('td').children('input').eq(8).val(money[money.length-8]);
                $(a).parents('tr').children('td').children('input').eq(7).val(money[money.length-9]);
                $(a).parents('tr').children('td').children('input').eq(6).val(money[money.length-10]);
                $(a).parents('tr').children('td').children('input').eq(5).val(money[money.length-12]);
                $(a).parents('tr').children('td').children('input').eq(4).val(money[money.length-13]);

                var tol1 = parseFloat($('input[name=unit_price1]').val().replace(/,/g, ''));
                var tol2 = parseFloat($('input[name=unit_price2]').val().replace(/,/g, ''));
                var tol3 = parseFloat($('input[name=unit_price3]').val().replace(/,/g, ''));
                var tol4 = parseFloat($('input[name=unit_price4]').val().replace(/,/g, ''));
                var number1 = parseFloat($('input[name=unit_price1]').parents('tr').children('td').children('input').eq(1).val());
                var number2 = parseFloat($('input[name=unit_price2]').parents('tr').children('td').children('input').eq(1).val());
                var number3 = parseFloat($('input[name=unit_price3]').parents('tr').children('td').children('input').eq(1).val());
                var number4 = parseFloat($('input[name=unit_price4]').parents('tr').children('td').children('input').eq(1).val());
                var tol = (tol1*number1 + tol2*number2 + tol3*number3 + tol4*number4).toString();

                $('input[name=qianwan_total]').val(tol[tol.length-8]);
                $('input[name=baiwan_total]').val(tol[tol.length-7]);
                $('input[name=shiwan_total]').val(tol[tol.length-6]);
                $('input[name=wan_total]').val(tol[tol.length-5]);
                $('input[name=qian_total]').val(tol[tol.length-4]);
                $('input[name=bai_total]').val(tol[tol.length-3]);
                $('input[name=shi_total]').val(tol[tol.length-2]);
                $('input[name=yuan_total]').val(tol[tol.length-1]);
                $('input[name=jiao_total]').val(0);
                $('input[name=fen_total]').val(0);
                money_tol = convertCurrency(tol);
                $('input[name=total]').val(money_tol);
            });

        }

        function convertCurrency(money) {
            //汉字的数字
            var cnNums = new Array('零', '壹', '贰', '叁', '肆', '伍', '陆', '柒', '捌', '玖');
            //基本单位
            var cnIntRadice = new Array('', '拾', '佰', '仟');
            //对应整数部分扩展单位
            var cnIntUnits = new Array('', '万', '亿', '兆');
            //对应小数部分单位
            var cnDecUnits = new Array('角', '分', '毫', '厘');
            //整数金额时后面跟的字符
            var cnInteger = '整';
            //整型完以后的单位
            var cnIntLast = '元';
            //最大处理的数字
            var maxNum = 999999999999999.9999;
            //金额整数部分
            var integerNum;
            //金额小数部分
            var decimalNum;
            //输出的中文金额字符串
            var chineseStr = '';
            //分离金额后用的数组，预定义
            var parts;
            if (money == '') { return ''; }
            money = parseFloat(money);
            if (money >= maxNum) {
                //超出最大处理数字
                return '';
            }
            if (money == 0) {
                chineseStr = cnNums[0] + cnIntLast + cnInteger;
                return chineseStr;
            }
            //转换为字符串
            money = money.toString();
            if (money.indexOf('.') == -1) {
                integerNum = money;
                decimalNum = '';
            } else {
                parts = money.split('.');
                integerNum = parts[0];
                decimalNum = parts[1].substr(0, 4);
            }
            //获取整型部分转换
            if (parseInt(integerNum, 10) > 0) {
                var zeroCount = 0;
                var IntLen = integerNum.length;
                for (var i = 0; i < IntLen; i++) {
                    var n = integerNum.substr(i, 1);
                    var p = IntLen - i - 1;
                    var q = p / 4;
                    var m = p % 4;
                    if (n == '0') {
                        zeroCount++;
                    } else {
                        if (zeroCount > 0) {
                            chineseStr += cnNums[0];
                        }
                        //归零
                        zeroCount = 0;
                        chineseStr += cnNums[parseInt(n)] + cnIntRadice[m];
                    }
                    if (m == 0 && zeroCount < 4) {
                        chineseStr += cnIntUnits[q];
                    }
                }
                chineseStr += cnIntLast;
            }
            //小数部分
            if (decimalNum != '') {
                var decLen = decimalNum.length;
                for (var i = 0; i < decLen; i++) {
                    var n = decimalNum.substr(i, 1);
                    if (n != '0') {
                        chineseStr += cnNums[Number(n)] + cnDecUnits[i];
                    }
                }
            }
            if (chineseStr == '') {
                chineseStr += cnNums[0] + cnIntLast + cnInteger;
            } else if (decimalNum == '') {
                chineseStr += cnInteger;
            }
            return chineseStr;
        }
    </script>








@endsection