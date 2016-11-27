@extends('layouts.app')
@section('content')

<script >
  $(function(){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });


    $('.btn-delect').click(function(){

      if( confirm('確定要刪除這筆資料嗎'+ $(this).data('id')) ){

        location.href="/announcement/delect/"+$(this).data('id');
      }
    });

    $('.btn-edit').click(function(){

      location.href="/announcement/"+$(this).data('id');

    });

  });
</script>


<div class="container">
  <div class="row" style="margin-top:80px;">
      <div class="col-md-6 col-md-offset-3">
          <div class="panel panel-default" >
              <div class="panel-heading"  style="background-color: rgb(41,43,55);color: white;">新增公告</div>
              <div class="panel-body">
                @if(Session::has('message'))
                  <div class="text-danger">
                    {{ Session::get('message') }}
                  </div>
                @endif
                <form class="form-horizontal" action="{{ url('announcement') }}" method="post">
                  {{ csrf_field() }}

                  <input type="hidden" name="token" value="{{ $token }}">

                  <table class="table">
                    <tbody>

                      <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <tr>
                          <td>
                            <label for="title" class="col-md-6 control-label">標題</label>
                          </td>
                          <td>
                            <input id="title" type="text" name="title" class="form-control"  required autofocus>
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
                            <label for="article" class="col-md-6 control-label">內文</label>
                          </td>
                          <td>
                            <textarea id="article" type="text" name="article" row="8" class="form-control"  required></textarea>
                            @if ($errors->has('article'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('article') }}</strong>
                                </span>
                            @endif
                          </td>
                        </tr>
                      </div>
                      <tr>
                        <td> <button type="submit" name="button" vlaue="新增" class="btn btn-sm btn-success" >新增</button> </td>
                        <td></td>
                      </tr>

                    </tbody>
                  </table>
                </form>
              </div>
          </div>
      </div>
  </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"  style="background-color: rgb(41,43,55);color: white;">現有公告</div>
                <div class="panel-body">

                  <table class="table">
                    <thead>
                      <tr>
                        <th class="col-md-1 visible-lg">#</th>
                        <th class="col-sm-5 col-md-3">標題</th>
                        <th class="col-sm-3">內文</th>
                        <!-- <th>作者</th> -->
                        <th>時間</th>
                        <th class="col-md-1 col-sm-1">修改</th>
                        <th class="col-md-1 col-sm-1">刪除</th>
                      </tr>

                    </thead>
                    <tbody>
                      @foreach( $Anno as $Annos )
                      <tr>
                        <td class="col-md-1 visible-lg"> {{ $Annos->id }}</td>
                        <td> {{ $Annos->title }} </td>
                        <td class="col-sm-3"> {{ $Annos->article }} </td>
                        <!-- <td> {{ $Annos->author }} </td> -->
                        <td> {{ $Annos->created_at }} </td>
                        <td class="col-md-1 col-sm-1"><button data-id="{{ $Annos->id }}" class="btn btn-success btn-sm btn-edit">修改</button></td>
                        <td class="col-md-1 col-sm-1"><button data-id="{{ $Annos->id }}" class="btn btn-danger btn-sm btn-delect">刪除</button></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
