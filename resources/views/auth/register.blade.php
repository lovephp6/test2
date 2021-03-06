@extends('layouts.head')
@section('contents')
    <section id="main-content">
        <section class="wrapper site-min-height">
            <!-- BEGIN ROW  -->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <span class="label label-primary"><a href="{{ url('admin/admin/index') }}" style="color:#FFF;">　　管理员列表　　</a></span>　
                            <span class="label label-danger"><a href="{{ url('/register') }}" style="color:#FFF;">　　添加管理员　　</a></span>
                            <span class="tools pull-right">
                       <a href="javascript:;" class="fa fa-chevron-down"></a>
                       <a href="javascript:;" class="fa fa-times"></a>
                       </span>
                        </header>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-1 control-label" style="text-align: right;font-weight: bold;">登录帐号</label>
                                    <div class="col-md-5">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('realname') ? ' has-error' : '' }}">
                                    <label for="realname" class="col-md-1 control-label" style="text-align: right;font-weight: bold;">真实姓名</label>

                                    <div class="col-md-5">
                                        <input id="realname" type="text" class="form-control" name="realname" value="{{ old('realname') }}" required autofocus>

                                        @if ($errors->has('realname'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('realname') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-1 control-label" style="text-align: right;font-weight: bold;">密码</label>

                                    <div class="col-md-5">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" class="col-md-1 control-label" style="text-align: right;font-weight: bold;">确认密码</label>

                                    <div class="col-md-5">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('rolename') ? ' has-error' : '' }}">
                                    <label for="rolename" class="col-md-1 control-label" style="text-align: right;font-weight: bold;">角色名</label>

                                    <div class="col-md-5">
                                        <select data-placeholder="请选择权限组" name="rolename" class="chosen-select form-control" required="" aria-required="true">
                                           @foreach($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                                           @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-1 control-label" style="text-align: right;font-weight: bold;">邮箱</label>

                                    <div class="col-md-5">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <label for="phone" class="col-md-1 control-label" style="text-align: right;font-weight: bold;">手机号</label>

                                    <div class="col-md-5">
                                        <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <button type="submit" class="btn btn-primary">
                                            添 加
                                        </button>
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