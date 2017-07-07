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
                            <span class="label label-primary"><a href="{{ url('admin/money/index') }}" style="color:#FFF;">　　学费设置　　</a></span>　
                            <span class="label label-danger"><a href="{{ url('admin/money/add') }}" style="color:#FFF;">　　添加学费　　</a></span>
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
                                            <tr>
                                                <td class="form_line_height">学院名称</td>
                                                <td colspan="3">
                                                    <select class="form-control" name="school_name" style="width:88%;" id="collegemsg">
                                                        <option>请选择学院</option>
                                                        @foreach($colleges as $college)
                                                        <option value="{{ $college->id }}">{{ $college->school_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="form_line_height">专业名称</td>
                                                <td> <input class="form-control in_bgw" type="text" name="major_name" value="2222" style="width:70%;"></td>
                                                <td class="form_line_height">专业类型</td>
                                                <td> <input class="form-control in_bgw" type="text" name="major_type" value="2222" style="width:70%;"></td>
                                            </tr>
                                            <tr>
                                                <td class="form_line_height">学　　制</td>
                                                <td>
                                                    <select class="form-control" name="major_date" style="width:70%;">
                                                        <option>一年</option>
                                                        <option>三年</option>
                                                    </select>
                                                </td>
                                                <td class="form_line_height">学　　年</td>
                                                <td>
                                                    <input class="form-control in_bgw" type="text" name="payment_period" value="2222" style="width:70%;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="form_line_height">学　　费</td>
                                                <td> <input class="form-control in_bgw" type="text" name="tuition_standard" value="2222" style="width:70%;"></td>
                                                <td class="form_line_height">技 能 费</td>
                                                <td> <input class="form-control in_bgw" type="text" name="skill_money" style="width:70%;"></td>
                                            </tr>
                                            <tr>
                                                <td class="form_line_height">学 籍 费</td>
                                                <td><input class="form-control in_bgw" type="text" name="school_money" style="width:70%;"></td>
                                                <td class="form_line_height">军 训 费</td>
                                                <td><input class="form-control in_bgw" type="text" name="military_money" style="width:70%;"></td>
                                            </tr>
                                            <tr>
                                                <td class="form_line_height">被 服 费</td>
                                                <td> <input class="form-control in_bgw" type="text" name="bedding_money" style="width:70%;"></td>
                                                <td class="form_line_height">置 装 费</td>
                                                <td><input class="form-control in_bgw" type="text" name="clothing_money" style="width:70%;"></td>
                                            </tr>
                                            <tr>
                                                <td class="form_line_height">教 材 费</td>
                                                <td><input class="form-control in_bgw" type="text" name="book_money" style="width:70%;"></td>
                                                <td class="form_line_height">保 险 费</td>
                                                <td> <input class="form-control in_bgw" type="text" name="safe_money" style="width:70%;"></td>
                                            </tr>
                                            <tr>
                                                <td class="form_line_height">证 书 费</td>
                                                <td><input class="form-control in_bgw" type="text" name="certtifate_money" style="width:70%;"></td>
                                                <td class="form_line_height">合　　计</td>
                                                <td><input class="form-control in_bgw" type="text" name="zatotal_money" style="width:70%;"></td>
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

    <script>
        $('#collegemsg').change(function(){
            var college = $('#collegemsg option:selected').val();
            alert(college);
        });
    </script>

@stop