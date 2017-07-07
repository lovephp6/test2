@extends('layouts.table_s')
@section('contents')


    <section id="main-content">
        <section class="wrapper site-min-height">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <span class="label label-primary"><a href="{{ url('admin/admin/index') }}" style="color:#FFF;">　　管理员列表　　</a></span>　
                            <span class="label label-danger"><a href="{{ url('/register') }}" style="color:#FFF;">　　添加管理员　　</a></span>
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
                                                <th class="text-center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 260px;">管理员名称</th>
                                                <th class="sorting text-center" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 460px;">真实姓名</th>
                                                <th class="text-center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 360px;">电话</th>
                                                <th class="text-center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 360px;">邮箱</th>
                                                <th class="text-center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 360px;">角色名</th>
                                                <th class="text-center sorting_desc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="descending" style="width: 200px;">操　　作</th>
                                            </tr>
                                            </thead>
                                            <tbody role="alert" aria-live="polite" aria-relevant="all">
                                            @foreach($admins as $admin)
                                                <tr class="gradeX odd">
                                                    <td>{{ $admin->id }}</td>
                                                    <td>{{ $admin->name }}</td>
                                                    <td>{{ $admin->realname }}</td>
                                                    <td>{{ $admin->phone }}</td>
                                                    <td>{{ $admin->email }}</td>
                                                    <td>{{ $admin->email }}</td>
                                                    <td>
                                                        <a class="btn btn-primary btn-xs" href="{{ url('admin/role/edit',['id' => $admin->id]) }}"><i class="fa fa-pencil" style="font-size:18px;"></i></a>
                                                        <a class="btn btn-danger btn-xs" href="javascript:void(0);" onclick="del('{{ url('admin/role/delete') }}',{{ $admin->id }},'{{ csrf_token() }}')"><i class="fa  fa-trash-o" style="font-size:18px;"></i></a>
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