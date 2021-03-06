@extends('layouts.table_s')
@section('contents')


    <section id="main-content">
        <section class="wrapper site-min-height">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <span class="label label-primary">　　学籍档案　　</span>　
                            <span class="label label-danger"><a href="{{ url('admin/school/management') }}" style="color:#FFF;">　　添加证书　　</a></span>
                            <span class="tools pull-right">
                           <a href="javascript:;" class="fa fa-chevron-down"></a>
                           <a href="javascript:;" class="fa fa-times"></a>
                           </span>
                        </header>
                        <div class="panel-body">
                            <div class="adv-table">
                                <div id="example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                    <div class="row-fluid">

                                        <table class="display table table-bordered table-striped dataTable text-center" id="example" aria-describedby="example_info">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting text-center" role="columnheader" tabindex="0" aria-controls="example" style="width: 160px;">序　　号</th>
                                                <th class="text-center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 160px;">证书编号</th>
                                                <th class="sorting text-center" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 160px;">姓　　名</th>
                                                <th class="text-center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 160px;">性　　别</th>
                                                <th class="text-center sorting_desc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="descending" style="width: 190px;">身份证号</th>
                                                <th class="text-center sorting_desc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="descending" style="width: 160px;">出生日期</th>
                                                <th class="text-center sorting_desc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="descending" style="width: 190px;">文化程度</th>
                                                <th class="text-center sorting_desc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="descending" style="width: 190px;">学院名称</th>
                                                <th class="text-center sorting_desc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="descending" style="width: 190px;">专业名称</th>
                                                <th class="text-center sorting_desc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="descending" style="width: 190px;">专业类型</th>
                                                <th class="text-center sorting_desc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="descending" style="width: 160px;">学　　制</th>
                                                <th class="text-center sorting_desc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="descending" style="width: 190px;">专业等级</th>
                                                <th class="text-center sorting_desc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="descending" style="width: 190px;">考评审核</th>
                                                <th class="text-center sorting_desc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="descending" style="width: 190px;">发证日期</th>
                                                <th class="text-center sorting_desc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="descending" style="width: 260px;">操　　作</th>
                                            </tr>
                                            </thead>
                                            <tbody role="alert" aria-live="polite" aria-relevant="all">
                                            @foreach($studentsMsgs as $studentsMsg)
                                                <tr class="gradeX odd">
                                                    <td>{{ $studentsMsg->id }}</td>
                                                    <td>{{ $studentsMsg->student_num }}</td>
                                                    <td>{{ $studentsMsg->Name }}</td>
                                                    <td>{{ $studentsMsg->Sex }}</td>
                                                    <td>{{ $studentsMsg->CardNo }}</td>
                                                    <td>{{ $studentsMsg->edu }}</td>
                                                    <td>{{ $studentsMsg->phone_num }}</td>
                                                    <td>{{ $studentsMsg->school_name }}</td>
                                                    <td>{{ $studentsMsg->major_name }}</td>
                                                    <td>{{ $studentsMsg->major_type }}</td>
                                                    <td>{{ $studentsMsg->major_date }}</td>
                                                    <td>{{ $studentsMsg->professional_level }}</td>
                                                    <td>{{ $studentsMsg->evaluation_audit }}</td>
                                                    <td>{{ date('Y-m-d',$studentsMsg->issue_date) }}</td>
                                                    <td>
                                                        <a class="btn btn-success btn-xs" href="{{ url('admin/school/certificate_show') }}"><i class="fa  fa-plus-circle" style="font-size:18px;"></i></a>
                                                        <a class="btn btn-primary btn-xs" href="{{ url('admin/school/certificate_edit', ['id' => $studentsMsg->id]) }}"><i class="fa fa-pencil" style="font-size:18px;"></i></a>
                                                        <a class="btn btn-danger btn-xs" href="javascript:void(0);" onclick="del('{{ url('admin/school/certificate_delete') }}',{{  $studentsMsg->id }},'{{ csrf_token() }}')"><i class="fa  fa-trash-o" style="font-size:18px;"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>
                </div>
            </div>


        </section>
    </section>
    <!-- END SECTION -->



@stop