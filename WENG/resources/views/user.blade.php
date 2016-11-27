
@extends('layouts.app')
@section('content')

@if( $check == 'true')

<script >
  $(function(){

    $('.btn-delect').click(function(){

      if ( $(this).data('admin') == true ){

        alert('無法刪除管理者');

      }
      else
        if( confirm('你要刪除這個使用者嗎 #'+ $(this).data('id')) ) {

          location.href= '/user/delect/'+$(this).data('id');
        }




    });

  });
</script>



<div class="container">
    <div class="row" style="margin-top:80px;">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"  style="background-color: rgb(41,43,55);color: white;">新增管理者</div>

                <div class="panel-body">
                  <form class="form-horizontal" role="form" method="POST" action="{{ url('/user') }}">
                      {{ csrf_field() }}

                      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                          <label for="name" class="col-md-4 control-label">姓名</label>

                          <div class="col-md-6">
                              <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                              @if ($errors->has('name'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('name') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                          <label for="email" class="col-md-4 control-label">信箱</label>

                          <div class="col-md-6">
                              <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                              @if ($errors->has('email'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('email') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                          <label for="password" class="col-md-4 control-label">密碼</label>

                          <div class="col-md-6">
                              <input id="password" type="password" class="form-control" name="password" required>

                              @if ($errors->has('password'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('password') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="password-confirm" class="col-md-4 control-label">密碼確認</label>

                          <div class="col-md-6">
                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              <button type="submit" class="btn btn-primary">
                                  註冊
                              </button>
                          </div>
                      </div>
                  </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"  style="background-color: rgb(41,43,55);color: white;">現有使用者</div>

                <div class="panel-body">
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="visible-lg">#</th>
                          <th>名稱</th>
                          <th class="visible-lg">信箱</th>
                          <th>狀態</th>
                          <th>動作</th>

                        </tr>
                      </thead>
                      <tbody id="tbody">
                        @foreach($users as $user)
                        <tr>
                          <td class="visible-lg"> {{ $user -> id }} </td>
                          <td  > {{ $user -> name }} </td>
                          <td  class="visible-lg"> {{ $user -> email }} </td>
                          @if( $user -> admin == 'true' )
                            <td> <a href="#" class="btn btn-default btn-sm">管理者</a> </td>
                          @endif
                          @if( $user -> admin == null )
                            <td> <a class="btn btn-default btn-sm">使用者</a> </td>
                          @endif

                          <td><button type="button" name="button" data-admin="{{ $user->admin }}" data-id=" {{ $user -> id }} " class="btn btn-sm btn-delect btn-danger"> 刪除使用者 </button> </td>


                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endif


@endsection
