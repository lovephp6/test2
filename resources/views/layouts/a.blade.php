@extends('layouts.head')
@section('contents')

<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- BEGIN ROW  -->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <span class="label label-primary">　　角色管理　　</span>　
                        <span class="label label-danger"><a href="{{ url('admin/school/add') }}" style="color:#FFF;">　　添加角色　　</a></span>
                        <span class="tools pull-right">
                   <a href="javascript:;" class="fa fa-chevron-down"></a>
                   <a href="javascript:;" class="fa fa-times"></a>
                   </span>
                    </header>
                    <div class="panel-body">

                    </div>
                </section>
            </div>
        </div>
        <!-- END ROW  -->
    </section>
</section>
<!-- END SECTION -->

@stop