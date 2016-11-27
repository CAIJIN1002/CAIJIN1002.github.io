
@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row" style="margin-top:80px;">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">profile</div>

                <div class="panel-body">
                  <table class="table">
                    <tbody>

                      @if(Session::has('message'))
                        <div class="text-danger">
                          {{ Session::get('message') }}
                        </div>
                      @endif

                      <form class="profile-update form-horizontal " id="profile-update" role="form" method="POST" action="{{ url('/profile_admin/update_admin') }}">

                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <tr>
                          <th>#</th>
                          <td> {{ $update->id }} </td>
                        </tr>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                          <tr>
                            <th>姓名</th>
                            <td> <input type="text" id="name" class="form-control" name="name" value="{{ $update -> name }}" placeholder="王小明" required autofocus></input>
                              @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                              @endif
                            </td>
                          </tr>
                        </div>

                        <div class="form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
                          <tr>
                            <th>性別</th>
                            <td>
                              <select name="sex" id="sex">
                                @if ( $update->sex == '')
                                  <option value="男" selected>男</option>
                                　<option value="女" >女</option>
                                @endif
                                @if ( $update->sex == '男')
                                  <option value="男" selected>男</option>
                                　<option value="女" >女</option>
                                @endif
                                @if ( $update->sex == '女')
                                  <option value="男">男</option>
                                　<option value="女" selected>女</option>
                                @endif
                              </select>
                              @if ($errors->has('sex'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('sex') }}</strong>
                                </span>
                              @endif
                            </td>

                          </tr>

                          </div>

                          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <tr>
                              <tr>
                                <th>信箱</th>
                                <td> <input type="email" id="email" class="form-control" name="email" value="{{ $update -> email }}" placeholder="kinmen@kinmen.km" required>
                                @if ($errors->has('email'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('email') }}</strong>
                                  </span>
                                @endif
                              </td>
                            </tr>
                          </div>

                          <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <tr>
                              <th>地址</th>
                              <td> <input type="address" id="address" class="form-control" name="address" value="{{ $update -> address }}" placeholder="金門縣金門鄉金門村金門號" required>
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                              </td>
                            </tr>
                          </div>

                          <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                            <tr>
                              <th>手機</th>
                              <td> <input type="text" id="phone_number" class="form-control" name="phone_number"  value="{{ $update -> phone_number }}" placeholder="0912-345-678" required>
                                @if ($errors->has('phone_number'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('phone_number') }}</strong>
                                  </span>
                                @endif
                              </td>
                            </tr>
                          </div>

                          <div class="form-group{{ $errors->has('home_number') ? ' has-error' : '' }}">
                            <tr>
                              <th>家電</th>
                              <td> <input type="text" id="home_number" class="form-control" name="home_number" value="{{ $update -> home_number }}" placeholder="082-345678" required>
                                @if ($errors->has('home_number'))
                                  <span class="help-block">
                                  <strong>{{ $errors->first('home_number') }}</strong>
                                  </span>
                                @endif
                              </td>
                            </tr>
                          </div>

                          <div class="form-group">
                            <tr>
                              <td>
                                <button type="submit"  name="button" value="儲存" class="btn btn-success btn-sm">儲存</button>　

                              </td>
                              <td>
                                <a href="/profile_admin" value="取消" class="btn btn-default btn-sm">取消</button>
                              </td>
                            </tr>
                          </div>
                      </form>
                    </tbody>
                  </table>

            </div>
        </div>
    </div>
</div>
@endsection
