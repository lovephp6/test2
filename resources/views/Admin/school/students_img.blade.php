@extends('layouts.head')
@section('contents')

    <section id="main-content">
        <section class="wrapper site-min-height">
            <!-- BEGIN ROW  -->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <a href="{{ url('admin/school/index') }}"><span class="label label-primary">　　学籍管理　　</span>　</a>
                            <span class="label label-danger"><a href="{{ url('admin/school/add') }}" style="color:#FFF;">　　学籍档案　　</a></span>　
                            <span class="label label-danger"><a href="{{ url('admin/school/add') }}" style="color:#FFF;">　　上传附件　　</a></span>
                            <span class="tools pull-right">
                       <a href="javascript:;" class="fa fa-chevron-down"></a>
                       <a href="javascript:;" class="fa fa-times"></a>
                       </span>
                        </header>
                        <div class="panel-body">
                            <form class="form-inline" role="form" action="" method="post" enctype="multipart/form-data">
                                <div class="text-center">学生编号：<input type="text" class="form-control" name="student_num" id="student_num" style="width:200px;"></div>
                                <div class="col-md-12" style="height:600px;">
                                    <div class="demo">
                                        <div id="uploader">
                                            <div class="queueList">
                                                <div id="dndArea" class="placeholder">
                                                    <div id="filePicker"></div>
                                                    <p>或将照片拖到这里，单次最多可选10张</p>
                                                </div>
                                            </div>
                                            <div class="statusBar" style="display:none;">
                                                <div class="progress">
                                                    <span class="text">0%</span>
                                                    <span class="percentage"></span>
                                                </div><div class="info"></div>
                                                <div class="btns">
                                                    <div id="filePicker2"></div><div class="uploadBtn">开始上传</div>
                                                </div>
                                            </div>
                                        </div>
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


@endsection