@extends('layouts.head')
@section('contents')
    <section id="main-content">
        <section class="wrapper site-min-height">
            <!-- BEGIN ROW  -->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <span class="label label-primary"><a href="{{ url('admin/role/index') }}" style="color:#FFF;">　　权限管理　　</a></span>　
                            <span class="label label-danger"><a href="{{ url('admin/role/add') }}" style="color:#FFF;">　　修改权限　　</a></span>
                            <span class="tools pull-right">
                       <a href="javascript:;" class="fa fa-chevron-down"></a>
                       <a href="javascript:;" class="fa fa-times"></a>
                       </span>
                        </header>
                        <div class="panel-body">
                            <form class="form-horizontal tasi-form" method="post" action="">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    @include('layouts.notice')
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-1 col-sm-1 control-label">权限名称: </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="name" value="{{ $permission->name }}" placeholder="请输入英文字符">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-1 col-sm-1 control-label">中文名称: </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="display_name" value="{{ $permission->display_name }}">
                                        {{--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>--}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-1 col-sm-1 control-label">描　　述: </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="description" value="{{ $permission->description }}">
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <div class="col-sm-4">
                                        <button class="btn btn-info">提　交</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
            <!-- END ROW  -->
        </section>
    </section>
@stop