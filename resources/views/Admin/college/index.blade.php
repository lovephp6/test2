@extends('layouts.table_s')
@section('contents')


    <section id="main-content">
        <section class="wrapper site-min-height">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <span class="label label-primary"><a href="{{ url('admin/college/index') }}" style="color:#FFF;">　　院系设置　　</a></span>　
                            <span class="label label-danger"><a data-toggle="modal" href="#myModal2" style="color:#FFF;">　　添加院系　　</a></span>
                            <span class="tools pull-right">
                           <a href="javascript:;" class="fa fa-chevron-down"></a>
                           <a href="javascript:;" class="fa fa-times"></a>
                           </span>
                        </header>
                        <div class="panel-body">
                            <div class="adv-table">
                                <div id="example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                    <div class="row-fluid">
                                        @foreach($colleges as $college)
                                        <div style="margin-bottom: 20px;margin-left:10px;padding:5px;width:100px;float:left;border:solid 1px #999;border-radius: 10px; text-align: center;">
                                            <div class="delbtn" style="text-align:right;display: block;float:right;">
                                                {{--<span ><a data-toggle="modal" href="{{ url('admin/hotel/edit', ['id' => $college->id]) }}" class="fa fa-pencil"></a></span>--}}
                                                <span><a href="javascript:void();" onclick="del('{{ url('admin/college/delete') }}',{{ $college->id }},'{{ csrf_token() }}')" class="fa fa-times"></a></span>
                                            </div>
                                            <div style="margin-bottom: 18px;">
                                                <input type="text" onchange="changename(this,'{{ url('admin/college/edit') }}', {{ $college->id }}, '{{ csrf_token() }}')" value="{{ $college->school_name }}" style="width:100%;border:none;text-align:center;">
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            @include('layouts.notice')
            <div class="modal fade in" id="myModal2" aria-hidden="false" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">添加院系</h4>
                        </div>
                        <form action="{{ url('admin/college/add') }}" method="post">
                            {{ csrf_field() }}
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-sm-3 control-label" style="margin-top:6px;font-weight: bold;">院系名称：</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputEmail1" placeholder="请输入院系名称" name="school_name">
                                        {{--<p class="help-block">Example block-level help text here.</p>--}}
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-warning" type="submit"> 保存</button>
                                <button data-dismiss="modal" class="btn btn-default" type="button">取消</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>
    </section>
    <!-- END SECTION -->

    <script>
        $('.showbtn').mouseover(function(){
            $(this).children('div').children('div').eq(0).css('display', 'block');
        });

        $('.showbtn').mouseout(function(){
            $(this).children('div').children('div').eq(0).css('display', 'none');
        });

        function changename(dudu,url, id, token){
        var schoolname = dudu.value;
            $.post(url, {'id' : id, 'schoolname' : schoolname, '_token' : token}, function(data){
                layer.alert(data.message);
            });
        }
    </script>

@stop