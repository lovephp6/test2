@extends('layouts.table_s')
@section('contents')
    <div class="modal fade in" id="myModal2" aria-hidden="false" style="display: block;margin-top: 50px;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a type="button" href="{{ url('admin/hotel/index') }}" class="close" data-dismiss="modal" aria-hidden="true">×</a>
                    <h4 class="modal-title">修改房间属性</h4>
                </div>

                <div class="modal-body">
                    <form class="form-horizontal tasi-form" method="post" action="">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-sm-2 control-label" style="text-align:right;font-weight: bold;">公寓类型: </label>
                            <div class="col-sm-8">
                                <div style="margin-top:8px;">
                                    <label class="label_radio r_off" for="radio-02">
                                        <input id="radio-02" @if ($hotelMsg->hotel_type=='公寓区') ? checked : '' @endif value="公寓区" type="radio" name="hotel_type"> 公寓区
                                    </label>　　
                                    <label class="label_radio r_off" for="radio-01">
                                        <input id="radio-01"  @if ($hotelMsg->hotel_type=='别墅区') ? checked : '' @endif value="别墅区" type="radio" name="hotel_type"> 别墅区
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" style="text-align:right;font-weight: bold;">公寓类别: </label>
                            <div class="col-sm-8">
                                <div style="margin-top:8px;">
                                    <label class="label_radio r_off" for="radio-03">
                                        <input id="radio-03" @if ($hotelMsg->hotel_sex=='男生宿舍') ? checked : '' @endif value="男生宿舍" type="radio" checked="" name="hotel_sex"> 男生宿舍
                                    </label>　
                                    <label class="label_radio r_off" for="radio-04">
                                        <input id="radio-04" @if ($hotelMsg->hotel_sex=='女生宿舍') ? checked : '' @endif value="女生宿舍" type="radio" name="hotel_sex"> 女生宿舍
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" style="text-align:right;font-weight: bold;">房间编号: </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="hotel_number" value="{{ $hotelMsg->hotel_number }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" style="text-align:right;font-weight: bold;">房间类型: </label>
                            <div class="col-sm-8">
                                <select data-placeholder="房间类型" name="home_type" class="chosen-select form-control" required="" aria-required="true">
                                    <option @if ($hotelMsg->home_type=='豪华双人间') ? checked : '' @endif value="豪华双人间">豪华双人间</option>
                                    <option @if ($hotelMsg->home_type=='标准二人间') ? checked : '' @endif value="标准二人间">标准二人间</option>
                                    <option @if ($hotelMsg->home_type=='标准四人间') ? checked : '' @endif value="标准四人间">标准四人间</option>
                                    <option @if ($hotelMsg->home_type=='标准六人间') ? checked : '' @endif value="标准六人间">标准六人间</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-warning" type="submit"> 修改</button>
                            <a data-dismiss="modal" href="{{ url('admin/hotel/index') }}" class="btn btn-default" type="button">取消</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop