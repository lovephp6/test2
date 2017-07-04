@extends('layouts.table_s')
@section('contents')


    <section id="main-content">
        <section class="wrapper site-min-height">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <span class="label label-primary">　　人事管理　　</span>　
                            <span class="label label-danger"><a href="{{ url('admin/school/add') }}" style="color:#FFF;">　　工资管理　　</a></span>
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
                                                <th class="sorting text-center" role="columnheader" tabindex="0" aria-controls="example" style="width: 160px;">序号</th>
                                                <th class="text-center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 160px;">工号</th>
                                                <th class="sorting text-center" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 160px;">姓名</th>
                                                <th class="text-center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 160px;">部门</th>
                                                <th class="text-center sorting_desc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="descending" style="width: 170px;">职务</th>
                                                <th class="text-center sorting_desc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="descending" style="width: 180px;">基本工资</th>
                                                <th class="text-center sorting_desc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="descending" style="width: 180px;">考勤天数</th>
                                                <th class="text-center sorting_desc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="descending" style="width: 180px;">出勤天数</th>
                                                <th class="text-center sorting_desc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="descending" style="width: 180px;">缺勤天数</th>
                                                <th class="text-center sorting_desc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="descending" style="width: 180px;">本月工资</th>
                                                <th class="text-center sorting_desc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="descending" style="width: 160px;">餐补</th>
                                                <th class="text-center sorting_desc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="descending" style="width: 190px;">交通补助</th>
                                                <th class="text-center sorting_desc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="descending" style="width: 190px;">通信补助</th>
                                                <th class="text-center sorting_desc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="descending" style="width: 190px;">出差补助</th>
                                                <th class="text-center sorting_desc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="descending" style="width: 190px;">应发工资</th>
                                                <th class="text-center sorting_desc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="descending" style="width: 140px;">五险</th>
                                                <th class="text-center sorting_desc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="descending" style="width: 140px;">个税</th>
                                                <th class="text-center sorting_desc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="descending" style="width: 190px;">实发工资</th>
                                                <th class="text-center sorting_desc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="descending" style="width: 190px;">月份</th>
                                                {{--<th class="text-center sorting_desc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="descending" style="width: 210px;">操　　作</th>--}}
                                            </tr>
                                            </thead>
                                            <tbody role="alert" aria-live="polite" aria-relevant="all">
                                            @foreach($wages as $wage)
                                                <tr class="gradeX odd">
                                                    <td>{{ $wage->id }}</td>
                                                    <td>{{ $wage->staff_num }}</td>
                                                    <td>{{ $wage->name }}</td>
                                                    <td>{{ $wage->staff_department }}</td>
                                                    <td>{{ $wage->staff_postNew }}</td>
                                                    <td>{{ $wage->staff_full }}</td>
                                                    <td>{{ $wage->kao_days }}</td>
                                                    <td>{{ $wage->chu_days }}</td>
                                                    <td>{{ $wage->kao_days - $wage->chu_days}}</td>
                                                    <td>{{ ceil($wage->staff_full / $wage->kao_days * $wage->chu_days) }}</td>
                                                    <td>{{ $wage->staff_meal }}</td>
                                                    <td>{{ $wage->staff_traffic }}</td>
                                                    <td>{{ $wage->staff_communication }}</td>
                                                    <td>{{ $wage->staff_travel }}</td>
                                                    <td>{{ ceil($wage->staff_full / $wage->kao_days * $wage->chu_days + $wage->staff_meal + $wage->staff_traffic + $wage->staff_communication + $wage->staff_travel) }}</td>
                                                    <td>{{ $wage->staff_social + $wage->staff_fund }}</td>
                                                    <td>{{ ceil(($wage->staff_full / $wage->kao_days * $wage->chu_days + $wage->staff_meal + $wage->staff_traffic + $wage->staff_communication + $wage->staff_travel)*0.1) }}</td>
                                                    <td style="color:red;">{{ ceil(($wage->staff_full / $wage->kao_days * $wage->chu_days + $wage->staff_meal + $wage->staff_traffic + $wage->staff_communication + $wage->staff_travel)*0.9 - ($wage->staff_social + $wage->staff_fund)) }}</td>
                                                    <td>{{ date('Y-m', $wage->wages_month) }}</td>
                                                    {{--<td>--}}
                                                        {{--<a class="btn btn-success btn-xs" href="{{ url('admin/personnel/show_payroll',['id' => $wage->id]) }}"><i class="fa  fa-plus-circle" style="font-size:18px;"></i></a>--}}
                                                        {{--<a class="btn btn-primary btn-xs" href="{{ url('admin/personnel/edit_payroll',['id' => $wage->id]) }}"><i class="fa fa-pencil" style="font-size:18px;"></i></a>--}}
                                                        {{--<a class="btn btn-danger btn-xs" href="javascript:void(0);" onclick="del('{{ url('admin/personnel/delete_payroll') }}',{{ $wage->id }},'{{ csrf_token() }}')"><i class="fa  fa-trash-o" style="font-size:18px;"></i></a>--}}
                                                    {{--</td>--}}
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