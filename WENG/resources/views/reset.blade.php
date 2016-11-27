@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row" style="margin-top:80px;">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">變更密碼</div>

                <div class="panel-body">
                    @if(Session::has('message'))

                    <div class="text-danger">

                      {{ Session::get('message') }}
                    </div>
                    @endif
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/profile/reset') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="mypassword" class="col-md-4 control-label">舊密碼</label>

                            <div class="col-md-6">
                                <input id="mypassword" type="password" class="form-control" name="mypassword" required autofocus>

                                @if ($errors->has('mypassword'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mypassword') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">新密碼</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">確認密碼</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success btn-sm">重設密碼</button> |
                                <a href="/profile" class="btn btn-default btn-sm">
                                    取消
                                </a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
