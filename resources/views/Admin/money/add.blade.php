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
                                                    <select class="form-control" name="school_name" style="width:88%;" id="collegemsg" onchange="coll('{{ url('admin/money/getmajor') }}','{{ csrf_token() }}')">
                                                        <option>请选择学院</option>
                                                        @foreach($colleges as $college)
                                                        <option value="{{ $college->id }}">{{ $college->school_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="form_line_height">专业名称</td>
                                                <td>
                                                    <select class="form-control" name="major_name" style="width:70%;" id="majormsg" onchange="xue('{{ url('admin/money/getxuezhi') }}','{{ csrf_token() }}')">
                                                        <option>请选择专业</option>
                                                    </select>
                                                </td>
                                                <td class="form_line_height">专业类型</td>
                                                <td>
                                                    <select class="form-control" name="major_type" style="width:70%;" id="">
                                                        <option>请选择类型</option>
                                                        <option>短期培训</option>
                                                        <option>学历制</option>
                                                    </select>
                                            </tr>
                                            <tr>
                                                <td class="form_line_height">学　　制</td>
                                                <td>
                                                    <select class="form-control" name="major_date" style="width:70%;" id="xuezhi">
                                                        <option>请选择学制</option>
                                                    </select>
                                                </td>
                                                <td class="form_line_height">学　　年</td>
                                                <td>
                                                    <select class="form-control" name="payment_period" style="width:70%;">
                                                        <option value="1">第一年</option>
                                                        <option value="2">第二年</option>
                                                        <option value="3">第三年</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="form_line_height">学　　费</td>
                                                <td> <input class="form-control in_bgw" type="text" name="tuition_standard" value="0" id="money1" onblur="jisuan()" style="width:70%;"></td>
                                                <td class="form_line_height">技 能 费</td>
                                                <td> <input class="form-control in_bgw" type="text" name="skill_money" value="0" id="money2" onblur="jisuan()" style="width:70%;"></td>
                                            </tr>
                                            <tr>
                                                <td class="form_line_height">学 籍 费</td>
                                                <td><input class="form-control in_bgw" type="text" name="school_money" value="0" id="money3" onblur="jisuan()" style="width:70%;"></td>
                                                <td class="form_line_height">军 训 费</td>
                                                <td><input class="form-control in_bgw" type="text" name="military_money" value="0" id="money4" onblur="jisuan()" style="width:70%;"></td>
                                            </tr>
                                            <tr>
                                                <td class="form_line_height">被 服 费</td>
                                                <td> <input class="form-control in_bgw" type="text" name="bedding_money" value="0" id="money5" onblur="jisuan()" style="width:70%;"></td>
                                                <td class="form_line_height">置 装 费</td>
                                                <td><input class="form-control in_bgw" type="text" name="clothing_money" value="0" id="money6" onblur="jisuan()" style="width:70%;"></td>
                                            </tr>
                                            <tr>
                                                <td class="form_line_height">教 材 费</td>
                                                <td><input class="form-control in_bgw" type="text" name="book_money" value="0" id="money7" onblur="jisuan()" style="width:70%;"></td>
                                                <td class="form_line_height">保 险 费</td>
                                                <td> <input class="form-control in_bgw" type="text" name="safe_money" value="0" id="money8" onblur="jisuan()" style="width:70%;"></td>
                                            </tr>
                                            <tr>
                                                <td class="form_line_height">证 书 费</td>
                                                <td><input class="form-control in_bgw" type="text" name="certtifate_money" value="0" id="money9" onblur="jisuan()" style="width:70%;"></td>
                                                <td class="form_line_height">合　　计</td>
                                                <td><input class="form-control in_bgw" type="text" name="zatotal_money" value="0" id="tolmoney" onblur="jisuan()" style="width:70%;"></td>
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
        function coll(url, token){
            var college_id = $('#collegemsg option:selected').val();
            $.post(url, { 'college_id' : college_id, '_token' : token }, function(data){
               for (var i=0; i<data.length; i++){
                    var major = data[i];
                   $("#majormsg").append("<option value='" + major.id + "'>" + major.major_name + "</option>");
               }

            });
            $("select[id$=majormsg] > option").remove();
            $("#majormsg").append($("<option></option>").val("-1").html("请选择专业"));
        }
        function xue(url, token) {
            var major_id = $('#majormsg option:selected').val();
            $.post(url, { 'major_id' : major_id, '_token' : token }, function(data){
                for (var i=0; i<data.length; i++){
                    var major = data[i];
                    $("#xuezhi").append("<option value='" + major.id + "'>" + major.major_date + "</option>");
                }
            });
            $("select[id$=xuezhi] > option").remove();
            $("#xuezhi").append($("<option></option>").val("-1").html("请选择学制"));
        }
    </script>

    <script>
        function jisuan(){
            var num1 = $('#money1').val() || 0;
            var num2 = $('#money2').val() || 0;
            var num3 = $('#money3').val() || 0;
            var num4 = $('#money4').val() || 0;
            var num5 = $('#money5').val() || 0;
            var num6 = $('#money6').val() || 0;
            var num7 = $('#money7').val() || 0;
            var num8 = $('#money8').val() || 0;
            var num9 = $('#money9').val() || 0;
            var result = parseFloat(num1)+parseFloat(num2)+parseFloat(num3)+parseFloat(num4)+parseFloat(num5)+parseFloat(num6)+parseFloat(num7)+parseFloat(num8)+parseFloat(num9);
            $('#tolmoney').val(result);
        }
    </script>

@stop