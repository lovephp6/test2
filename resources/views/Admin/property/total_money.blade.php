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
                            <span class="label label-danger"><a href="{{ url('admin/school/add') }}" style="color:#FFF;">　　收费统计　　</a></span>
                            <span class="tools pull-right">
                       <a href="javascript:;" class="fa fa-chevron-down"></a>
                       <a href="javascript:;" class="fa fa-times"></a>
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
                                    <td>缴费期限</td>
                                    <td>参与活动</td>
                                    <td>助学减免</td>
                                    <td>合　　计</td>
                                    <td>收款日期</td>
                                    <td>状　　态</td>
                                    <td>操　　作</td>
                                </tr>
                                @foreach($studentTuition as $studentTuition)
                                <tr>
                                    <td>{{ $studentTuition->id }}</td>
                                    <td>{{ $studentTuition->student_num }}</td>
                                    <td>{{ $studentTuition->Name }}</td>
                                    <td>{{ $studentTuition->Sex }}</td>
                                    <td>{{ $studentTuition->CardNo }}</td>
                                    <td>{{ $studentTuition->major_name }}</td>
                                    <td>{{ $studentTuition->major_type }}</td>
                                    <td>{{ $studentTuition->major_date }}</td>
                                    <td>{{ $studentTuition->tuition_standard }}</td>
                                    <td>{{ $studentTuition->payment_period }}</td>
                                    <td>{{ $studentTuition->part_activities }}</td>
                                    <td>{{ $studentTuition->student_relief }}</td>
                                    <td>{{ $studentTuition->total }}</td>
                                    <td>{{ date('Y-m-d',$studentTuition->created_at) }}</td>
                                    <td>状　　态</td>
                                    <td>
                                        <a class="btn btn-success btn-xs" href="{{ url('admin/property/shouju',['id' => $studentTuition->id]) }}"><i class="fa  fa-plus-circle" style="font-size:18px;"></i></a>
                                        <a class="btn btn-primary btn-xs" href="{{ url('admin/property/edit_tuition_fee',['id' => $studentTuition->id]) }}"><i class="fa fa-pencil" style="font-size:18px;"></i></a>
                                        <a class="btn btn-danger btn-xs" href="javascript:void(0);" onclick="del('{{ url('admin/property/delete_tuition_fee') }}',{{ $studentTuition->id }},'{{ csrf_token() }}')"><i class="fa  fa-trash-o" style="font-size:18px;"></i></a>
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