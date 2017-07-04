@extends('layouts.head')
@section('contents')

    <section id="main-content">
        <section class="wrapper site-min-height">
            <!-- BEGIN ROW  -->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <span class="label label-primary">　　财务管理　　</span>　
                            <span class="label label-danger"><a href="{{ url('admin/school/add') }}" style="color:#FFF;">　　收据预览　　</a></span>
                            <span class="tools pull-right">
                       <a href="javascript:;" class="fa fa-chevron-down"></a>
                       <a href="javascript:;" class="fa fa-times"></a>
                       </span>
                        </header>
                        <div class="panel-body">
                            <center>
                            <table class="table table-bordered" style="width:1000px;font-size:16px;">
                                <caption class="h2" style="">北 京 首 航 蓝 天 学 院 专 用 收 据</caption>
                                <caption style="text-align: left !important;">&nbsp;&nbsp;学生编号：<span style="color:red;">SHLT000001</span><span style="margin-left: 105px;"> 姓名： </span><span style="color:red;"> 高士萱 </span><span style="margin-left: 105px;"> 身份证号：</span><span style="color:red;">220181199002060038</span><span style="margin-left:105px;"> 票据编号：</span><span style="color:red;font-size:16px;">1000031</span></caption>
                                <tr>
                                    <td rowspan="6" style="width:10px;vertical-align:middle;">应收款项</td>
                                    <td class="text-center">项目名称</td>
                                    <td class="text-center">金额</td>
                                    <td rowspan="6" style="width:10px;vertical-align:middle;">代收款项</td>
                                    <td class="text-center">项目名称</td>
                                    <td class="text-center">金额</td>
                                    <td  class="text-center" style="width:150px;">收款方式</td>
                                </tr>
                                <tr>

                                    <td rowspan="5" colspan="2"></td>

                                    <td rowspan="5" colspan="2"></td>
                                    <td>刷卡：39800.00</td>
                                </tr>
                                <tr>

                                    <td>现金：-</td>
                                </tr>
                                <tr>

                                    <td>转账：-</td>
                                </tr>
                                <tr>


                                    <td>贷款：-</td>
                                </tr>
                                <tr>


                                    <td>其他：-</td>
                                </tr>
                                <tr>
                                    <td colspan="6">合计（大写）人民币：叁万玖仟捌佰元整</td>
                                    <td>合计：39800.00</td>
                                </tr>
                            </table>
                                <p>&nbsp;</p>
                                <p style="font-size:16px;text-align: left !important;margin-left:20%;">开票人：<span style="color:red;">郑秀儿</span> <span style="margin-left:150px;">收款人：</span><span style="color:red;">郑秀儿</span> <span style="margin-left:145px;">收款单位：</span><span style="color:red;">财务部</span> <span style="margin-left:145px;">收款日期：</span><span style="color:red;">2017年6月8日</span></p>
                                <p style="font-size:16px;text-align: left !important;margin-left:20%;">注：本 收 据 为 机 打 票 据，需 加 盖 本 学 院 收 款 专 用 章 方 为 有 效，以 上 款 项 已 经 收 取 概 不 退 换！确 认 签 字：               </p>
                            </center>
                        </div>
                    </section>
                </div>
            </div>
            <!-- END ROW  -->
        </section>
    </section>

@endsection