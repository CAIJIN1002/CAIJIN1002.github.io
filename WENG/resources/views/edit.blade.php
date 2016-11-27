
@extends('layouts.app')
@section('content')

<script >
  $(function(){

    $.ajaxSetup({

      headers: {

        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });


    // $('#form-edit').submit(function(event){
    //
    //   var title = $('#title').val();
    //   var article = $('#article').val();
    //   var id = $('#form-edit').data('id');
    //
    //   event.preventDefault();
    //
    //   console.log(title+article+id);
    //   // console.log('/profile/edit/'+ id);
    //
    //   $.post('/profile/edit/'+ id, {
    //
    //     'title': title,
    //     'article': article,
    //
    //   },function(res){
    //
    //     console.log(res);
    //     //
    //     location.href="/profile";
    //   });
    //
    //
    // });


  });
</script>


<div class="container">
    <div class="row" style="margin-top:80px;">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">修改</div>

                <div class="panel-body">

                  @if(Session::has('message') )

                    <div class="text-danger">

                      {{ Session::get('message') }}
                    </div>
                  @endif
                  <form class="form-horizontal" role="form" method="POST" action="{{ url('/profile/edit/'.$id ) }}" >
                      {{ csrf_field() }}

                      <input type="hidden" name="token" value="{{ $token }}">

                      <div class="form-group{{ $errors->has('titel') ? ' has-error' : '' }}">
                          <label for="title" class="col-md-4 control-label">標題</label>

                          <div class="col-md-6">
                              <input id="title" type="text" value="{{ $edit->title }}" class="form-control" name="title" required autofocus>

                              @if ($errors->has('title'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('title') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('article') ? ' has-error' : '' }}">
                          <label for="article" class="col-md-4 control-label">內文</label>

                          <div class="col-md-6">
                              <textarea id="article" type="text" value="{{ $edit->article }}"  rows="8" class="form-control" name="article" required>{{ $edit->article }}</textarea>

                              @if ($errors->has('article'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('article') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>


                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              <button type="submit" class="btn btn-primary">
                                  儲存
                              </button>
                          </div>
                      </div>

                  </form>

            </div>
        </div>
    </div>
</div>
@endsection
