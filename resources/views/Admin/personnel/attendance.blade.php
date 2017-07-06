@extends('layouts.head')
@section('contents')

    <section id="main-content">
        <section class="wrapper site-min-height">
            <!-- BEGIN ROW  -->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <span class="label label-primary"><a href="{{ url('admin/personnel/payroll') }}" style="color:#FFF;">　　工 资 表　　</a></span>　
                            <span class="label label-danger"><a href="{{ url('admin/personnel/attendance') }}" style="color:#FFF;">　　出勤录入　　</a></span>
                            <span class="tools pull-right">
                       <a href="javascript:;" class="fa fa-chevron-down"></a>
                       <a href="javascript:;" class="fa fa-times"></a>
                       </span>
                        </header>
                        <div class="panel-body">
                            <div class="col-sm-12">
                                @include('layouts.notice')
                                <div class="ibox float-e-margins">
                                    <div class="ibox-content">
                                        <form method="post" action="" class="form-horizontal" id="form-admin-add" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <div class="col-md-1"></div>
                                                <label class="col-sm-1 control-label" for="exampleInputEmail2">选择月份</label>
                                                <div class="col-sm-3">
                                                    <input type="text" id="LAY_demorange_s" name="wages_month" value="{{ date('Y-m', time()) }}" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group"  id="mid">
                                                <div class="col-md-1"></div>
                                                <label class="col-sm-1 control-label">选择员工</label>
                                                <div class="col-sm-3">
                                                    <select class="chosen-select form-control" size="1" name="name" id="tid" required="">
                                                        <option value="">请选择员工</option>
                                                        @foreach($staffs as $staff)
                                                        <option style="color:#f00" value="{{ $staff->staff_name }}">{{ $staff->staff_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-1"></div>
                                                <label class="col-sm-1 control-label">考勤天数</label>
                                                <div class="col-sm-3">
                                                    <input type="text" name="kao_days" class="form-control" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-1"></div>
                                                <label class="col-sm-1 control-label">出勤天数</label>
                                                <div class="col-sm-3">
                                                    <input type="text" name="chu_days" class="form-control" required="">
                                                </div>
                                            </div>

                                            <div class="hr-line-dashed"></div>
                                            <div class="form-group">
                                                <div class="col-sm-4 col-sm-offset-2">
                                                    <button class="btn btn-primary" type="submit">录入</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- END ROW  -->
        </section>
    </section>
    <!-- END SECTION -->

@stop