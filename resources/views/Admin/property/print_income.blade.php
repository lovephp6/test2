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


        <section class="wrapper site-min-height">
            <!-- BEGIN ROW  -->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <div class="panel-body" id="div1">
                            @include('layouts.notice')
                            <center>
                                <form class="form-inline" role="form" action="" method="post" id="div1">
                                    {{ csrf_field() }}
                                    <table class="table table-bordered text-center" style="width:1000px;">
                                        <tr>
                                            <td>
                                                付款单位：
                                            </td>
                                            <td>
                                                <input type="text" style="border:none;text-align: center;" size="44" name="payment_unit" value="{{ $income->payment_unit }}">　
                                            </td>
                                            <td>
                                                经 手 人：
                                            </td>
                                            <td>
                                                <input type="text" style="border:none;text-align: center;" size="44" name="handle_person" value="{{ $income->handle_person }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>  票据编号：</td>
                                            <td>
                                                <input type="text" style="border:none;text-align: center;" size="44" name="bill_number" value="{{ $income->bill_number }}">　
                                            </td>
                                            <td>发票编号：</td>
                                            <td>
                                                <input type="text" style="border:none;text-align: center;" size="44" name="invoice_number" value="{{ $income->invoice_number }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>收款日期：</td>
                                            <td>
                                                <input type="text" style="border:none;text-align: center;" size="44" name="collection_date" value="{{ date('Y-m-d',$income->collection_date) }}">　
                                            </td>
                                            <td>收款方式：</td>
                                            <td>
                                                <input type="text" style="border:none;text-align: center;" size="44" name="payment_method" value="{{ $income->payment_method }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>备　　注：</td>
                                            <td colspan="3">

                                                <input type="text" style="border:none" size="110" name="remarks" value="{{ $income->remarks }}">
                                            </td>
                                        </tr>

                                    </table>
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
                                            <td rowspan="2" style="padding:0;"><input type="text" class="dudu" name="abstract[]" style="width:100%;height:40px;border:none;text-align: center;" value="{{ $income->abstract[0] }}"></td>
                                            <td rowspan="2" style="padding:0;"><input type="text" name="number[]" class="number" style="width:100%;height:40px;border:none;text-align: center;" value="{{ $income->number[0] }}"></td>
                                            <td rowspan="2" style="padding:0;"><input type="text" name="unit[]" style="width:100%;height:40px;border:none;text-align: center;" value="{{ $income->unit[0] }}"></td>
                                            <td rowspan="2" style="padding:0;"><input class="price" type="text" name="unit_price1" style="width:100%;height:40px;border:none;text-align: center;" value="{{ $income->unit_price[0] == 0 ? '' : $income->unit_price[0] }}"></td>
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
                                            <td rowspan="2" style="padding:0;"><input type="text" class="dudu" name="abstract[]" style="width:100%;height:40px;border:none;text-align: center;" value="{{ $income->abstract[1] }}"></td>
                                            <td rowspan="2" style="padding:0;"><input type="text" name="number[]" style="width:100%;height:40px;border:none;text-align: center;" value="{{ $income->number[1] }}"></td>
                                            <td rowspan="2" style="padding:0;"><input type="text" name="unit[]" style="width:100%;height:40px;border:none;text-align: center;"  value="{{ $income->unit[1] }}"></td>
                                            <td rowspan="2" style="padding:0;"><input type="text" class="price" name="unit_price2" style="width:100%;height:40px;border:none;text-align: center;" value="{{ $income->unit_price[1] == 0 ? '' : $income->unit_price[1] }}"></td>
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
                                            <td rowspan="2" style="padding:0;"><input type="text" class="dudu" name="abstract[]" style="width:100%;height:40px;border:none;text-align: center;" value="{{ $income->abstract[2] }}"></td>
                                            <td rowspan="2" style="padding:0;"><input type="text" value="{{ $income->number[2] }}" name="number[]" style="width:100%;height:40px;border:none;text-align: center;"></td>
                                            <td rowspan="2" style="padding:0;"><input type="text" name="unit[]" style="width:100%;height:40px;border:none;text-align: center;" value="{{ $income->unit[2] }}"></td>
                                            <td rowspan="2" style="padding:0;"><input type="text" class="price" name="unit_price3" style="width:100%;height:40px;border:none;text-align: center;" value="{{ $income->unit_price[2] == 0 ? '' : $income->unit_price[2] }}"></td>
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
                                            <td rowspan="2" style="padding:0;"><input type="text" class="dudu" name="abstract[]" style="width:100%;height:40px;border:none;text-align: center;" value="{{ $income->abstract[3] }}"></td>
                                            <td rowspan="2" style="padding:0;"><input type="text" value="{{ $income->number[3] }}" name="number[]" style="width:100%;height:40px;border:none;text-align: center;"></td>
                                            <td rowspan="2" style="padding:0;"><input type="text" name="unit[]" style="width:100%;height:40px;border:none;text-align: center;" value="{{ $income->unit[3] }}"></td>
                                            <td rowspan="2" style="padding:0;"><input type="text" class="price" name="unit_price4" style="width:100%;height:40px;border:none;text-align: center;" value="{{ $income->unit_price[3] == 0 ? '' : $income->unit_price[3] }}"></td>
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
                                            <td rowspan="2" colspan="4" style="text-align: left;padding:0px">　合计（大写）人民币：<input type="text" name="total" style="width:80%;height:40px;border:none;" value=""></td>
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
                                    <input type="hidden" value="{{ $income->total_num }}" id="total_num">
                                    {{--<div class="form-group" style="margin-left:20px;">--}}
                                    <table class="table table-bordered text-center" style="width:1000px;">
                                        <tr>
                                            <td style="line-height:30px;">
                                                开票人：
                                            </td>
                                            <td>
                                                <select class="form-control" name="drawer">
                                                    <option value="郑秀儿" @if($income->drawer == '郑秀儿') selected @endif >郑秀儿</option>
                                                    <option value="江忠泉" @if($income->drawer == '江忠泉') selected @endif >江忠泉</option>
                                                </select>
                                            </td>
                                            <td style="line-height:30px;"> 收款单位：</td>
                                            <td>
                                                <select class="form-control" name="collecting_unit">
                                                    <option value="财务部" @if($income->collecting_unit == '财务部') selected @endif >财务部</option>
                                                    <option value="出纳部" @if($income->collecting_unit == '出纳部') selected @endif >出纳部</option>
                                                </select>
                                            </td>
                                            <td style="line-height:30px;">收款日期：</td>
                                            <td>
                                                <input type="text" class="form-control" name="collecting_date" value="{{ date('Y-m-d',$income->collecting_date )}}">
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                                <a href="javascrīpt:void(0);" onclick="window.print();" target="_blank" class="btn btn-info noprint">　打印本页　</a>
                            </center>
                        </div>
                    </section>
                </div>
            </div>
            <!-- END ROW  -->
        </section>




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

<script>

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
<script>

    $('.price').each(function(){
        var price = $(this).val();
        var tol1 = (price.replace(/,/g, '').replace(/\./g,''));
        var number = ($(this).parents('tr').children('td').children('input').eq(1).val());
        var tol = tol1 * number;
        var total = tol.toString();
        $(this).parents('tr').children('td').children('input').eq(13).val(total[total.length-1]);
        $(this).parents('tr').children('td').children('input').eq(12).val(total[total.length-2]);
        $(this).parents('tr').children('td').children('input').eq(11).val(total[total.length-3]);
        $(this).parents('tr').children('td').children('input').eq(10).val(total[total.length-4]);
        $(this).parents('tr').children('td').children('input').eq(9).val(total[total.length-5]);
        $(this).parents('tr').children('td').children('input').eq(8).val(total[total.length-6]);
        $(this).parents('tr').children('td').children('input').eq(7).val(total[total.length-7]);
        $(this).parents('tr').children('td').children('input').eq(6).val(total[total.length-8]);
        $(this).parents('tr').children('td').children('input').eq(5).val(total[total.length-9]);
        $(this).parents('tr').children('td').children('input').eq(4).val(total[total.length-10]);
    });
    var total_num = $('#total_num').val();
    $('input[name=qianwan_total]').val(total_num[total_num.length-8]);
    $('input[name=baiwan_total]').val(total_num[total_num.length-7]);
    $('input[name=shiwan_total]').val(total_num[total_num.length-6]);
    $('input[name=wan_total]').val(total_num[total_num.length-5]);
    $('input[name=qian_total]').val(total_num[total_num.length-4]);
    $('input[name=bai_total]').val(total_num[total_num.length-3]);
    $('input[name=shi_total]').val(total_num[total_num.length-2]);
    $('input[name=yuan_total]').val(total_num[total_num.length-1]);
    $('input[name=jiao_total]').val(0);
    $('input[name=fen_total]').val(0);
    var money_tol = convertCurrency(total_num);
    $('input[name=total]').val(money_tol);

    $('.dudu').each(function(){
        var num = $(this).val();
        if (num == '') {
            $(this).parent('td').next('td').children('input').val('');
            $(this).parent('td').next('td').next('td').next('td').next('td').next('td').next('td').next('td').next('td').next('td').next('td').next('td').next('td').next('td').children('input').val('');
        }
    });

    function printme()
    {
        document.body.innerHTML = document.getElementById('div1').innerHTML;
        window.print();
    }
</script>


<!-- END JS -->
<!-- END JS -->
</body>
</html>


