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
                            <span class="label label-primary"><a href="{{ url('admin/property/expenditure') }}">　　支出统计　　</a></span>　
                            <span class="label label-danger"><a href="{{ url('admin/property/add_expenditure') }}" style="color:#FFF;">　　支出凭证　　</a></span>
                            <span class="tools pull-right">
                       <a href="javascript:;" class="fa fa-chevron-down"></a>
                       <a href="javascript:;" class="fa fa-times"></a>
                       </span>
                        </header>
                        <div class="panel-body">
                            <form class="form-inline" role="form">
                                <div class="form-group">
                                    <label class="" for="exampleInputEmail2">选择日期：</label>
                                    <input type="text" class="form-control" id="LAY_demorange_s" placeholder="开始日"> -
                                    <input type="text" class="form-control" id="LAY_demorange_e" placeholder="截止日">　　　
                                </div>
                                <div class="form-group">
                                    <label class="" for="exampleInputEmail2">付款单位：</label>
                                    <input type="text" class="form-control" id="exampleInputEmail2" placeholder="">　　　
                                </div>
                                <div class="form-group">
                                    <label class="" for="exampleInputEmail2">经 手 人：</label>
                                    <input type="text" class="form-control" id="exampleInputEmail2" placeholder="">　
                                </div>
                                <button type="submit" class="btn btn-info">　确认　</button>
                            </form><br>
                            <table class="table table-bordered text-center">
                                <tr>
                                    <td>序　　号</td>
                                    <td>凭证编号</td>
                                    <td>付款单位</td>
                                    <td>经 手 人</td>
                                    <td>摘　　要</td>
                                    <td>支出金额</td>
                                    <td>付款日期</td>
                                    <td>付款方式</td>
                                    <td>查　　看</td>
                                </tr>
                                @foreach($finances as $finance)
                                    <tr>
                                        <td>{{ $finance->id }}</td>
                                        <td>{{ $finance->bill_number }}</td>
                                        <td>{{ $finance->payment_unit }}</td>
                                        <td>{{ $finance->handle_person }}</td>
                                        <td>{{ json_decode($finance->abstract)[0].' '.json_decode($finance->abstract)[1].' '.json_decode($finance->abstract)[2].' '.json_decode($finance->abstract)[3] }}</td>
                                        <td>{{ $finance->total }}</td>
                                        <td>{{ date('Y-m-d',$finance->collecting_date) }}</td>
                                        <td>{{ $finance->payment_method }}</td>
                                        <td>
                                            <a class="btn btn-success btn-xs" href="{{ url('admin/property/show_income',['id' => $finance->id]) }}"><i class="fa  fa-plus-circle" style="font-size:18px;"></i></a>
                                            <a class="btn btn-primary btn-xs" href="{{ url('admin/property/edit_expenditure',['id' => $finance->id]) }}"><i class="fa fa-pencil" style="font-size:18px;"></i></a>
                                            <a class="btn btn-danger btn-xs" href="javascript:void(0);" onclick="del('{{ url('admin/property/delete_income') }}',{{ $finance->id }},'{{ csrf_token() }}')"><i class="fa  fa-trash-o" style="font-size:18px;"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </section>
                </div>

            </div>
            <!-- END ROW  -->
        </section>
    </section>


@stop