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
                            <span class="label label-primary">　　学籍管理　　</span>　
                            <span class="label label-danger"><a href="{{ url('admin/school/add') }}" style="color:#FFF;">　　学历管理　　</a></span>
                            <span class="tools pull-right">
                       <a href="javascript:;" class="fa fa-chevron-down"></a>
                       <a href="javascript:;" class="fa fa-times"></a>
                       </span>
                        </header>
                        <div class="panel-body">
                            <form class="form-inline" role="form" method="post" action="">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="" for="exampleInputEmail2">选择日期：</label>
                                    <input type="text" name="date_begin" class="form-control" id="LAY_demorange_s" placeholder="开始日"> -
                                    <input type="text" name="date_stop" class="form-control" id="LAY_demorange_e" placeholder="截止日">　　　
                                </div>
                                <div class="form-group">
                                    <label class="" for="exampleInputEmail2">身份证号：</label>
                                    <input type="text" name="CardNo" class="form-control" id="exampleInputEmail2" placeholder="请输入身份证号码">　　　
                                </div>
                                <div class="form-group">
                                    <label class="" for="exampleInputEmail2">推荐人：</label>
                                    <input type="text" name="receive_people" class="form-control" id="exampleInputEmail2" placeholder="">　
                                </div>
                                <button type="submit" class="btn btn-info">　搜索数据　</button>
                                <a href="{{ url('admin/school/add_education') }}" class="btn btn-info pull-right">注册学历</a>
                            </form><br>
                            <table class="table table-bordered text-center">
                                <tr>
                                    <th class="text-center">序　　号</th>
                                    <th class="text-center">姓　　名</th>
                                    <th class="text-center">性　　别</th>
                                    <th class="text-center">民　　族</th>
                                    <th class="text-center">出生日期</th>
                                    <th class="text-center">身份证号</th>
                                    <th class="text-center">院系名称</th>
                                    <th class="text-center">专业名称</th>
                                    <th class="text-center">学　　历</th>
                                    <th class="text-center">报名日期</th>
                                    <th class="text-center">注册日期</th>
                                    <th class="text-center">学籍状态</th>
                                    <th class="text-center">学生来源</th>
                                    <th class="text-center">推 荐 人</th>
                                    <th class="text-center">操　　作</th>
                                </tr>
                                @foreach($student_edus as $student_edu)
                                <tr>
                                    <td>{{ $student_edu->id }}</td>
                                    <td>{{ $student_edu->Name }}</td>
                                    <td>{{ $student_edu->Sex }}</td>
                                    <td>{{ $student_edu->Nation }}</td>
                                    <td>{{ date('Y-m-d',$student_edu->Born) }}</td>
                                    <td>{{ $student_edu->CardNo }}</td>
                                    <td>{{ $student_edu->school_name }}</td>
                                    <td>{{ $student_edu->major_name }}</td>
                                    <td>{{ $student_edu->major }}</td>
                                    <td>{{ date('Y-m-d',$student_edu->examination_date) }}</td>
                                    <td>{{ date('Y-m-d',$student_edu->register_date) }}</td>
                                    <td>{{ $student_edu->school_status }}</td>
                                    <td>{{ $student_edu->referee }}</td>
                                    <td>{{ $student_edu->receive_people }}</td>
                                    <td>
                                        <a class="btn btn-success btn-xs" href="{{ url('admin/school/edu_show',['id' => $student_edu->id]) }}"><i class="fa  fa-plus-circle" style="font-size:18px;"></i></a>
                                        <a class="btn btn-primary btn-xs" href="{{ url('admin/school/edu_edit',['id' => $student_edu->id]) }}"><i class="fa fa-pencil" style="font-size:18px;"></i></a>
                                        <a class="btn btn-danger btn-xs" href="javascript:void(0);" onclick="del('{{ url('admin/school/edu_delete') }}',{{ $student_edu->id }},'{{ csrf_token() }}')"><i class="fa  fa-trash-o" style="font-size:18px;"></i></a>
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