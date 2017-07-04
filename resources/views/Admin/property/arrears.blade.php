@extends("layouts.table_s")
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
                            <span class="label label-danger"><a href="#" style="color:#FFF;">　　欠费管理　　</a></span>
                            <span class="label label-success pull-right">
                      <a href="{{ url('admin/property/add_arrears') }}" style="color:#FFF;">　　添　加　　</a>
                       </span>
                        </header>
                        <div class="panel-body">
                            <form class="form-inline" role="form">
                                <div class="form-group">
                                    <label class="" for="exampleInputEmail2">选择日期：</label>
                                    <input type="email" class="form-control" id="LAY_demorange_s" placeholder="开始日"> -
                                    <input type="email" class="form-control" id="LAY_demorange_e" placeholder="截止日">　　　
                                </div>
                                <div class="form-group">
                                    <label class="" for="exampleInputEmail2">状　　态：</label>
                                    <input type="email" class="form-control" id="exampleInputEmail2" placeholder="">　　　
                                </div>
                                <div class="form-group">
                                    <label class="" for="exampleInputEmail2">身份证号：</label>
                                    <input type="email" class="form-control" id="exampleInputEmail2" placeholder="请输入身份证号码">　
                                </div>
                                <button type="submit" class="btn btn-info">　确认　</button>
                            </form><br>
                            <table class="table table-bordered text-center">
                                <tr>
                                    <td>序　　号</td>
                                    <td>学生编号</td>
                                    <td>姓　　名</td>
                                    <td>性　　别</td>
                                    <td>身份证号</td>
                                    <td>专业名称</td>
                                    <td>专业类型</td>
                                    <td>学　　制</td>
                                    <td>学费标准</td>
                                    <td>欠缴期限</td>
                                    <td>欠缴金额</td>
                                    <td>缴　　费</td>
                                    <td>操　　作</td>
                                </tr>
                                @foreach($arrearsMsgs as $arrearsMsg)
                                <tr>
                                    <td>{{ $arrearsMsg->id }}</td>
                                    <td>{{ $arrearsMsg->student_num }}</td>
                                    <td>{{ $arrearsMsg->Name }}</td>
                                    <td>{{ $arrearsMsg->Sex }}</td>
                                    <td>{{ $arrearsMsg->CardNo }}</td>
                                    <td>{{ $arrearsMsg->major_name }}</td>
                                    <td>{{ $arrearsMsg->major_type }}</td>
                                    <td>{{ $arrearsMsg->major_date }}</td>
                                    <td>{{ $arrearsMsg->tuition_standard }}</td>
                                    <td>{{ $arrearsMsg->payment_term }}</td>
                                    <td>{{ $arrearsMsg->amount_arrears }}</td>
                                    <td>{{ $arrearsMsg->pay }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-xs" href="{{ url('admin/property/edit_arrears',['id' => $arrearsMsg->id]) }}"><i class="fa fa-pencil" style="font-size:18px;"></i></a>
                                        <a class="btn btn-danger btn-xs" href="javascript:void(0);" onclick="del('{{ url('admin/property/delete_arrears') }}',{{ $arrearsMsg->id }},'{{ csrf_token() }}')"><i class="fa  fa-trash-o" style="font-size:18px;"></i></a>
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