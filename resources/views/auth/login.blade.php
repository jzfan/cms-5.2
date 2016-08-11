@extends('frontend.layout')

@section('content')
<div class="login-box">
      <div class="login-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
          {{ csrf_field() }}
          <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
            <input type="email" class="form-control" placeholder="Email" name='email' value='{{ old("email") }}'>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          @if ($errors->has('email'))
                <span class="help-block"> <strong>{{ $errors->first('email') }}</strong>
                </span>
        @endif
          </div>
          <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
            <input type="password" class="form-control" placeholder="Password" name='password'>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @if ($errors->has('password'))
                <span class="help-block"> <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
          </div>
<div class="row">
            <div class="col-xs-8">    
              <div class="checkbox icheck">
                <label class="">
                  <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> 记住我
                </label>
              </div>                        
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">登录</button>
            </div><!-- /.col -->
          </div>
        </form>

        <div class="social-auth-links text-center">
        <a class="btn btn-link" href="{{ url('/password/reset') }}">忘记密码？</a>
        <a class="btn btn-link" href="{{ url('/register') }}">注册</a>

      </div><!-- /.login-box-body -->
    </div>
    </div>
@endsection