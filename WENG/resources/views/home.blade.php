
@extends('layouts.app')
@section('content')
<style>

  *{

    /*border: 1px solid black;*/
    position: relative;
  }

</style>
<script >

  $(function(){
    onload();
    function onload(){

      $.get('/api/home', function(resp){

        for( var index in resp ){

          var obj = resp[index];
          // $('#tbody').append('<tr><td class=" col-md-1 col-sm-3 visible-lg">'+  obj.id +'</td><td class="col-md-2 col-sm-3">'+  obj.title +'</td><td class="col-md-1 col-sm-3  visible-lg">'+  obj.author +'</td><td class="col-md-3 col-sm-3">'+ obj.article +'</td><td class="col-sm-1 col-sm-3" >'+ obj.created_at +'</td><td class="col-md-5 col-sm-3"><button type="button" class="btn btn-sm btn-default">'+ obj.status +'</button></td></tr>');

          // console.log(obj);
          // setTimeout(onload,100);
          if (  obj.status == '處理中'){

            // var status
            var status = '<span class="label label-danger" style="font-size: 5px;padding: 5px;margin-left:10px;">'+ obj.status +'</span> ';
            var master = '';
          }
          else {

            // var status
            var status = '<span class="label label-success" style="font-size: 5px;padding: 5px;margin-left:10px;">'+ obj.status +'</span> ';
            var master = '<span class="label label-default" style="font-size: 5px;padding: 5px;margin-left:10px;">'+ obj.master +'</span> ';

          }
          // $('#p_body').empty();

          $('#p_body').append('<div style=" border: solid 1px #ccc;padding: 20px 25px 20px 25px; margin-bottom: 10px;" class="col-md-12"  > <h4 style="width: 100% ;position: relative;">'+ obj.name + status + master +'</h4><h5>'+ obj.updated_at +'  </h5><h3>'+ obj.title +'  </h3></div>');
        }
      });



    }

    $('#bug-form').submit(function(event){
      var title = $('#title').val();
      var article = $('#article').val();
      event.preventDefault();
      $.post('/home',{
        'title' : title,
        'article' : article
      },function (resp) {
        console.log(resp);
        onload();

        $('.anno').append('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>已新增一筆維修</div>');
        $('#p_body').empty();
      });
      $('#title').val('');
      $('#article').val('');
      $('#title').focus();
    });

    $.ajaxSetup({

      headers: {

        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });


  });



</script>



<div class="container">
    <div class="row" style="margin-top:80px;">
        <div class="col-md-7 col-md-offset-2">
            <div class="panel panel-default" style="border: 0px; border-radius: 10px;">
                <div class="panel-heading" style="background-color: rgb(41,43,55); color: white;" >新增維修</div>

                <div class="panel-body">

                  <form class="form-horizontal" id="bug-form" >
                    <h4>標題</h4><input class="form-control " name="title" id="title" required autofocus>
                    <h4>內文</h4><textarea class="form-control" name="article" rows="4" cols="40" id="article" required ></textarea >
                    <button id="submit" type="submit" class="btn btn-default" style="margin-top: 20px; border: 0px; background-color: rgb(94,189,199);color: white;">新增</button>
                  </form>
                </div>
            </div>
        </div>

        <div class="col-md-3 anno">
            <div class="panel panel-default">
                <div class="panel-heading"  style="background-color: rgb(41,43,55); color: white;">公告</div>

                <div class="panel-body" id="anno" >

                    <h4>{{ $anno->article }}</h4>
                    <h5>{{ $anno->created_at }}</h5>

                </div>

            </div>

            @if( $err!= null )

              <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>{{ $err }}</div>

            @endif


        </div>



    </div>


    <!-- <div class="row">
        <div class="col-md-8 col-md-offset-2 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading"  style="background-color: rgb(41,43,55); color: white;">狀態</div>

                <div class="panel-body">
                    <table class="table" id="list-table" style="padding: 50px;">
                      <thead id="thead">
                        <tr>
                          <th class="visible-lg">#</th>
                          <th>標題</th>
                          <th class="visible-lg">作者</th>
                          <th>內文</th>
                          <th>時間</th>
                          <th>狀態<th>

                        </tr>
                      </thead>
                      <tbody id="tbody">

                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> -->


    <div class="row">
        <div class="col-md-7 col-md-offset-2 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading"  style="background-color: rgb(41,43,55); color: white;">狀態</div>

                <div class="panel-body" id="p_body"  style="position: relative">

                <!-- @{{notifydata}} -->
                <!-- <example></example> -->
                  <!-- <ul>
                    <li v-for="item in items" style="list-style: none;margin-left: -40px;">
                      <div class="name">


                        <div style=" border: solid 1px #ccc;padding: 20px 25px 20px 25px; margin-bottom: 10px;" class="col-md-12"  >
                          <h4 style="width: 100% ;position: relative;">@{{item.name}}
                            <span class="label label-danger  " style="font-size: 5px;padding: 5px;">@{{item.status}}</span>
                            <span class="label label-default " style="font-size: 5px;padding: 5px;">@{{item.master}}</span>
                          </h4>
                          <h5>@{{item.updated_at}}</h5>
                          <h3>@{{item.title}}</h3>
                        </div>

                      </div>
                    </li>
                  </ul> -->

                </div>


                <script>
                    // var apiurl = {
                    //   messages: 'http://localhost:81/api/home'
                    // };
                    // var vm2 = new Vue({
                    //   el: '#p_body',
                    //   data: {
                    //     items: []
                    //   },
                    //   ready: function vue(){
                    //     $.ajax({
                    //       url: apiurl.messages,
                    //       success: function(res){
                    //       vm2.items=res
                    //       }
                    //     });
                    //   }
                    // });

                </script>
            </div>
        </div>
    </div>

</div>
@endsection
