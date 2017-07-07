@extends('layouts.table_s')
@section('contents')
    <style>
        .form_line_height{
            line-height: 40px !important;
        }
    </style>

    <section id="main-content">
        <section class="wrapper site-min-height">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <span class="label label-primary"><a href="{{ url('admin/college/index') }}" style="color:#FFF;">　　院系设置　　</a></span>　
                            <span class="label label-danger"><a href="{{ url('admin/college/add') }}" style="color:#FFF;">　　添加院系　　</a></span>
                            <span class="tools pull-right">
                           <a href="javascript:;" class="fa fa-chevron-down"></a>
                           <a href="javascript:;" class="fa fa-times"></a>
                           </span>
                        </header>
                        <div class="panel-body">
                            <div class="adv-table">
                                @include('layouts.notice')
                                <div id="example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                    <div class="row-fluid">
                                        <center>
                                        <form method="post" action="">
                                        <table class="table table-bordered text-center" style="width:60%;">
                                            {{ csrf_field() }}
                                            <tr >
                                                <td class="form_line_height">学院名称</td>
                                                <td> <input class="form-control in_bgw" type="text" name="school_name" value="2222" style="width:70%;"></td>
                                                <td class="form_line_height">专业名称</td>
                                                <td> <input class="form-control in_bgw" type="text" name="major_name" value="2222" style="width:70%;"></td>
                                            </tr>
                                            <tr>
                                                <td class="form_line_height">专业类型</td>
                                                <td>
                                                    <input class="form-control in_bgw" type="text" name="major_type" value="2222" style="width:70%;">
                                                </td>
                                                <td class="form_line_height">学　　制</td>
                                                <td><input class="form-control in_bgw" type="text" name="major_date" value="2222" style="width:70%;"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="5"><button class="btn btn-info">保存</button></td>
                                            </tr>
                                        </table>
                                        </form>
                                        </center>
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