@extends("layouts.head")
@section("contents")


    <section id="main-content">
        <section class="wrapper site-min-height">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">

                        <header class="panel-heading ">
                            <span class="label label-primary">　　财务管理　　</span>　
                            <span class="label label-danger"><a href="{{ url('admin/school/add') }}" style="color:#FFF;">　　日 记 账　　</a></span>
                            <span class="tools pull-right">
                       <a href="javascript:;" class="fa fa-chevron-down"></a>
                       <a href="javascript:;" class="fa fa-times"></a>
                       </span>
                        </header>
                        <div class="panel-body">
                            <form class="form-inline " role="form" action="" method="post">
                                <div class="form-group">
                                    {{ csrf_field() }}
                                    <label class="" for="exampleInputEmail2">选择日期：</label>
                                    <input type="text" class="form-control" id="LAY_demorange_s" name="date1" value="{{ old('date1') }}" placeholder="开始日"> -
                                    <input type="text" class="form-control" id="LAY_demorange_e" name="date2" value="{{ old('date2') }}" placeholder="截止日">　　　
                                </div>
                                <button type="submit" class="btn btn-info">　确认　</button>
                                <a href="javascrīpt:void(0);" onclick="printme();" target="_blank" class="btn btn-info pull-right">打印本页</a>
                            </form><br>
                            <table class="table table-bordered text-center">
                                <tr>
                                    <td>记账日期</td>
                                    <td>凭证编号</td>
                                    <td>摘　　要</td>
                                    <td>借　　方</td>
                                    <td>贷　　方</td>
                                    <td>余　　额</td>
                                    <td>查　　看</td>
                                </tr>
                                @foreach($diaryMsgs as $diaryMsg)
                                <tr>
                                    <td>{{ date('Y-m-d H:i:s', $diaryMsg->created_at) }}</td>
                                    <td>{{ $diaryMsg->bill_number }}</td>
                                    <td>{{ json_decode($diaryMsg->abstract)[0] . ' ' . json_decode($diaryMsg->abstract)[1]. ' '.json_decode($diaryMsg->abstract)[2].' '.json_decode($diaryMsg->abstract)[3] }}</td>
                                    <td>{{ $diaryMsg->status == 1 ? $diaryMsg->total_money : '-'}}</td>
                                    <td>{{ $diaryMsg->status == 2 ? $diaryMsg->total_money : '-' }}</td>
                                    <td>{{ $diaryMsg->total_num }}</td>
                                    <td class=""> <a class="btn btn-success btn-xs" href="{{ url('admin/property/show_income',['id' => $diaryMsg->id]) }}"><i class="fa  fa-plus-circle" style="font-size:18px;"></i></a></td>
                                </tr>
                                @endforeach
                            </table>
                            <div style="display: none;" id="div1">
                            <table class="table table-bordered text-center">
                                <tr>
                                    <td>记账日期</td>
                                    <td>凭证编号</td>
                                    <td>摘　　要</td>
                                    <td>借　　方</td>
                                    <td>贷　　方</td>
                                    <td>余　　额</td>
                                </tr>
                                @foreach($diaryMsgs as $diaryMsg)
                                    <tr>
                                        <td>{{ date('Y-m-d H:i:s', $diaryMsg->created_at) }}</td>
                                        <td>{{ $diaryMsg->bill_number }}</td>
                                        <td>{{ json_decode($diaryMsg->abstract)[0] . ' ' . json_decode($diaryMsg->abstract)[1]. ' '.json_decode($diaryMsg->abstract)[2].' '.json_decode($diaryMsg->abstract)[3] }}</td>
                                        <td>{{ $diaryMsg->status == 1 ? $diaryMsg->total_money : '-'}}</td>
                                        <td>{{ $diaryMsg->status == 2 ? $diaryMsg->total_money : '-' }}</td>
                                        <td>{{ $diaryMsg->total_num }}</td>
                                    </tr>
                                @endforeach
                            </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- END ROW  -->
        </section>
    </section>

<script>
    function printme()
    {
        document.body.innerHTML=document.getElementById('div1').innerHTML;
        window.print();
    }
</script>
@stop