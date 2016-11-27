
@extends('layouts.app')
@section('content')

<script >
  $(function(){

    $.getJSON('api/home', function(res){

      for( var index in res ){

        var obj = res[index];
        $('#tbody').append('<tr><td>'+ obj.id +'</td><td>'+  obj.title +'</td><td>'+ obj.author +'</td><td>'+ obj.article +'</td></tr>');

        console.log(obj);
      }



    });

  });
</script>


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">admin</div>

                <div class="panel-body">
                  You are admin user!
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>id</th>
                          <th>title</th>
                          <th>author</th>
                          <th>article</th>

                        </tr>
                      </thead>
                      <tbody id="tbody">

                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
