@extends('layouts.app')
@section('content')

<script >
  $(function(){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

  });
</script>


<div class="container">
    <div class="row" style="margin-top:100px;margin-bottom: 100px;">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">編輯公告</div>
                <div class="panel-body">

                  @if(Session::has('message'))
                    <div class="text-danger">
                      {{ Session::get('message') }}
                    </div>
                  @endif

                  <table class="table">
                    <thead>


                    </thead>
                    <tbody>
                      <form calss="form-horizontal" action="{{ url('/announcement/'.$anno->id) }}" method="post">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <tr>
                          <td> id </td>
                          <td> {{ $anno->id }} </td>
                        </tr>

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                          <tr>
                            <td>
                              <label for="title" class="col-md-4 control-label">標題</label>
                            </td>
                            <td>
                              <input id="title" type="text" name="title" value="{{ $anno->title }}" class="form-control"  required autofocus>
                              @if ($errors->has('title'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('title') }}</strong>
                                  </span>
                              @endif
                            </td>
                          </tr>
                        </div>


                        <div class="form-group{{ $errors->has('article') ? ' has-error' : '' }}">
                          <tr>
                            <td>
                              <label for="article" class="col-md-4 control-label">內文</label>
                            </td>
                            <td>
                              <textarea id="article" type="text" name="article" row="8" value="{{ $anno->article }}" class="form-control"  required>{{ $anno->article }}</textarea>
                              @if ($errors->has('article'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('article') }}</strong>
                                  </span>
                              @endif
                            </td>
                          </tr>
                        </div>




                        <tr>
                          <td>
                            <button type="submit" value="儲存" name="button" class="btn btn-success btn-sm" >儲存</button> |
                            <a href="/announcement" value="取消" name="button" class="btn btn-default btn-sm" >取消</a>
                          </td>
                          <td></td>

                        </tr>

                      </form>

                    </tbody>
                  </table>




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
