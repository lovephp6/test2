@extends('layouts.table_s')
@section('contents')
    <style>
        .font_st {
            color: #FFF;
            font-weight: bold;
        }
    </style>
    <section id="main-content">
        <section class="wrapper site-min-height">
            <!-- BEGIN ROW  -->
            <div class="row">
                @include('layouts.notice')
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <span class="label label-primary">　　房间管理　　</span>　
                            <span class="label label-danger"><a  data-toggle="modal" href="#myModal2" style="color:#FFF;">　　添加房间　　</a></span>
                            <span class="tools pull-right">
                   <a href="javascript:;" class="fa fa-chevron-down"></a>
                   <a href="javascript:;" class="fa fa-times"></a>
                   </span>
                        </header>
                        <div class="panel-body">
                            {{ isset($hotelMsg) ? dd($hotelMsg) : '' }}
                            <span>别墅区（男）</span>
                            <hr>
                            @foreach($villa_mans as $villa_man)
                           <div class="col-md-1 showbtn" ondblclick="showcount({{ $villa_man->id }},'{{ csrf_token() }}')">
                                <div style="width:100%;height:80px;background-color: #00a2d4;margin-bottom: 20px;border-radius: 5px;">
                                    <div class="delbtn" style="display: none;float:right;">
                                        <span ><a data-toggle="modal" href="{{ url('admin/hotel/edit', ['id' => $villa_man->id]) }}" class="fa fa-pencil"></a></span>
                                        <span><a href="javascript:;" onclick="del('{{ url('admin/hotel/delete') }}',{{ $villa_man->id }},'{{ csrf_token() }}')" class="fa fa-times"></a></span>
                                    </div>
                                    <div class="text-center">
                                        <span></span><br>
                                        <span class="font_st">{{ $villa_man->hotel_number }}</span><br>
                                        <span class="font_st">{{ $villa_man->home_type }}</span><br>
                                        {{--<span class="font_st">一人</span>--}}
                                    </div>
                                </div>
                           </div>
                            @endforeach
                        </div>
                        <div class="panel-body">
                            <span>别墅区（女）</span>
                        <hr>
                            @foreach($villa_womans as $villa_woman)
                                <div class="col-md-1 showbtn">
                                    <div style="width:100%;height:80px;background-color: #ed00f1;margin-bottom: 20px;border-radius: 5px;">
                                        <div class="delbtn" style="display: none;float:right;">
                                            <span ><a data-toggle="modal" href="{{ url('admin/hotel/edit', ['id' => $villa_woman->id]) }}" class="fa fa-pencil"></a></span>
                                            <span><a href="javascript:;" onclick="del('{{ url('admin/hotel/delete') }}',{{ $villa_woman->id }},'{{ csrf_token() }}')" class="fa fa-times"></a></span>
                                        </div>
                                        <div class="text-center">
                                            <span></span><br>
                                            <span class="font_st">{{ $villa_woman->hotel_number }}</span><br>
                                            <span class="font_st">{{ $villa_woman->home_type }}</span><br>
                                            {{--<span class="font_st">一人</span>--}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="panel-body">
                        <span>公寓区（女）</span>
                        <hr>
                            @foreach($hotel_mans as $hotel_man)
                                <div class="col-md-1 showbtn">
                                    <div style="width:100%;height:80px;background-color: #ed00f1;margin-bottom: 20px;border-radius: 5px;">
                                        <div class="delbtn" style="display: none;float:right;">
                                            <span ><a data-toggle="modal" href="{{ url('admin/hotel/edit', ['id' => $hotel_man->id]) }}" class="fa fa-pencil"></a></span>
                                            <span><a href="javascript:;" onclick="del('{{ url('admin/hotel/delete') }}',{{ $hotel_man->id }},'{{ csrf_token() }}')" class="fa fa-times"></a></span>
                                        </div>
                                        <div class="text-center">
                                            <span></span><br>
                                            <span class="font_st">{{ $hotel_man->hotel_number }}</span><br>
                                            <span class="font_st">{{ $hotel_man->home_type }}</span><br>
                                            {{--<span class="font_st">一人</span>--}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="panel-body">
                        <span>公寓区（女）</span>
                        <hr>
                            @foreach($hotel_womans as $hotel_woman)
                                <div class="col-md-1 showbtn">
                                    <div style="width:100%;height:80px;background-color: #00a2d4;margin-bottom: 20px;border-radius: 5px;">
                                        <div class="delbtn" style="display: none;float:right;">
                                            <span ><a data-toggle="modal" href="{{ url('admin/hotel/edit', ['id' => $hotel_woman->id]) }}" class="fa fa-pencil"></a></span>
                                            <span><a href="javascript:;" onclick="del('{{ url('admin/hotel/delete') }}',{{ $hotel_woman->id }},'{{ csrf_token() }}')" class="fa fa-times"></a></span>
                                        </div>
                                        <div class="text-center">
                                            <span></span><br>
                                            <span class="font_st">{{ $hotel_woman->hotel_number }}</span><br>
                                            <span class="font_st">{{ $hotel_woman->home_type }}</span><br>
                                            {{--<span class="font_st">一人</span>--}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>
            </div>
            <!-- END ROW  -->
        </section>
    </section>
    <div class="modal fade in" id="myModal2" aria-hidden="false" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="false">×</button>
                    <h4 class="modal-title">添加房间</h4>
                </div>

                <div class="modal-body">
                    <form class="form-horizontal tasi-form" method="post" action="{{ url('admin/hotel/add') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-sm-2 control-label" style="text-align:right;font-weight: bold;">公寓类型: </label>
                            <div class="col-sm-8">
                                <div style="margin-top:8px;">
                                    <label class="label_radio r_off" for="radio-02">
                                        <input id="radio-02" value="公寓区" type="radio" checked="" name="hotel_type"> 公寓区
                                    </label>　　
                                    <label class="label_radio r_off" for="radio-01">
                                        <input id="radio-01" value="别墅区" type="radio" name="hotel_type"> 别墅区
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" style="text-align:right;font-weight: bold;">公寓类别: </label>
                            <div class="col-sm-8">
                                <div style="margin-top:8px;">
                                    <label class="label_radio r_off" for="radio-03">
                                        <input id="radio-03" value="男生宿舍" type="radio" checked="" name="hotel_sex"> 男生宿舍
                                    </label>　
                                    <label class="label_radio r_off" for="radio-04">
                                        <input id="radio-04" value="女生宿舍" type="radio" name="hotel_sex"> 女生宿舍
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" style="text-align:right;font-weight: bold;">房间编号: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="hotel_number" value="{{ old('hotel_number') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" style="text-align:right;font-weight: bold;">房间类型: </label>
                            <div class="col-sm-8">
                                <select data-placeholder="房间类型" name="home_type" class="chosen-select form-control" required="" aria-required="true">
                                    <option value="豪华双人间">豪华双人间</option>
                                    <option value="标准二人间">标准二人间</option>
                                    <option value="标准四人间">标准四人间</option>
                                    <option value="标准六人间">标准六人间</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-warning" type="submit"> 添加</button>
                            <button data-dismiss="modal" class="btn btn-default" type="button">取消</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION -->


    <div class="modal fade in student_home" aria-hidden="false" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close close_stu" data-dismiss="modal" aria-hidden="false">×</button>
                    <h4 class="modal-title">添加房间</h4>
                </div>

                <div class="modal-body">
                    <span class="renshu"></span>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.showbtn').mouseover(function(){
            $(this).children('div').children('div').eq(0).css('display', 'block');
        });

        $('.showbtn').mouseout(function(){
            $(this).children('div').children('div').eq(0).css('display', 'none');
        });

        $('.close_stu').click(function(){
            $('.student_home').css('display', 'none');
        });
        function showcount(id, token)
        {
            $.post('{{ url('admin/hotel/show') }}', { 'id' : id, '_token' : token }, function(data){
                var msg = $.parseJSON(data);
                $('.student_home').css('display', 'block');
                $('.renshu').text(msg['student_count']);
//                alert(msg['student_count']);
            });

        }
    </script>

@stop