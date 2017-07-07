@extends('layouts.table_s')
@section('contents')


    <section id="main-content">
        <section class="wrapper site-min-height">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <span class="label label-primary"><a href="{{ url('admin/money/index') }}" style="color:#FFF;">　　学费设置　　</a></span>　
                            <span class="label label-danger"><a href="{{ url('admin/money/add') }}" style="color:#FFF;">　　添加学费　　</a></span>
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
                                                <th class="text-center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 300px;">专业名称</th>
                                                <th class="text-center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 300px;">专业类型</th>
                                                <th class="text-center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 300px;">学制</th>
                                                <th class="text-center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 300px;">学年</th>
                                                <th class="sorting text-center" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 300px;">学费</th>
                                                <th class="text-center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 300px;">技能费</th>
                                                <th class="text-center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 300px;">学籍费</th>
                                                <th class="text-center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 300px;">军训费</th>
                                                <th class="text-center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 300px;">被褥费</th>
                                                <th class="text-center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 300px;">置装费</th>
                                                <th class="text-center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 300px;">教材费</th>
                                                <th class="text-center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 300px;">保险费</th>
                                                <th class="text-center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 300px;">证书费</th>
                                                <th class="text-center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 300px;">合计</th>
                                                <th class="text-center sorting_desc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="descending" style="width: 300px;">操　　作</th>
                                            </tr>
                                            </thead>
                                            <tbody role="alert" aria-live="polite" aria-relevant="all">
                                            @foreach($moneys as $money)
                                                <tr class="gradeX odd">
                                                    <td>{{ $money->id }}</td>
                                                    <td>{{ $money->major_name }}</td>
                                                    <td>{{ $money->major_type }}</td>
                                                    <td>{{ $money->major_date }}</td>
                                                    <td>{{ $money->payment_period }}</td>
                                                    <td>{{ $money->tuition_standard }}</td>
                                                    <td>{{ $money->skill_money }}</td>
                                                    <td>{{ $money->school_money }}</td>
                                                    <td>{{ $money->military_money }}</td>
                                                    <td>{{ $money->bedding_money }}</td>
                                                    <td>{{ $money->clothing_money }}</td>
                                                    <td>{{ $money->book_money }}</td>
                                                    <td>{{ $money->safe_money }}</td>
                                                    <td>{{ $money->certtifate_money }}</td>
                                                    <td>{{ $money->zatotal_money }}</td>
                                                    <td>
                                                        <a class="btn btn-primary btn-xs" href="{{ url('admin/permission/edit',['id' => $money->id]) }}"><i class="fa fa-pencil" style="font-size:18px;"></i></a>
                                                        <a class="btn btn-danger btn-xs" href="javascript:void(0);" onclick="del('{{ url('admin/school/delete') }}',{{ $money->id }},'{{ csrf_token() }}')"><i class="fa  fa-trash-o" style="font-size:18px;"></i></a>
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