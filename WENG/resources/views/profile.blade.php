@extends('layouts.app')
@section('content')

<script >
  $(function(){


    $('.btn-delect').click(function(){
      if( confirm('你要刪除這篇文章嗎 #'+ $(this).data('id') ) ) {
        location.href= '/profile/delect/'+$(this).data('id') ;
      }
    });

    $('.btn-edit').click(function(){
      if( confirm('你要修改這篇文章嗎 #'+ $(this).data('edit') ) ) {
        location.href= '/profile/edit/'+$(this).data('edit');
      }
    });


    $('.btn-Processing').click(function(){
      if ( $(this).val() == '已完成' ){
        alert('此資料已完成');
      }
      if ( $(this).val() == '處理中' ){
        if( confirm('你完成這項工作了嗎 #'+ $(this).data('id') ) ) {
          location.href= '/profile/update/'+$(this).data('id') ;
        }
      }
    });




    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

  });
</script>


<div class="container">
  @if ($check == null)
    <div class="row" style="margin-top:80px;">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" >
                <div class="panel-heading" style="background-color: rgb(41,43,55);color: white;">個人資料</div>

                <div class="panel-body">
                  <table class="table">
                    <tbody>

                        <tr >
                          <th>#</th>
                          <td> {{ $users->id }} </td>
                        </tr>
                        <tr>
                          <th>姓名</th>

                          @if (  $users -> name  != null )

                            <td> {{ $users -> name }} </td>


                          @endif

                          @if (  $users -> name  == null )

                            <td> 尚無資料 </td>


                          @endif

                        </tr>

                        <tr>
                          <th>性別</th>

                          @if (  $users -> sex  != null )

                            <td> {{ $users -> sex }} </td>


                          @endif

                          @if (  $users -> sex  == null )

                            <td> 尚無資料 </td>


                          @endif

                        </tr>

                        <tr>
                          <th>信箱</th>

                          @if (  $users -> email  != null )

                            <td> {{ $users -> email }} </td>


                          @endif

                          @if (  $users -> email  == null )

                            <td> 尚無資料 </td>


                          @endif


                        </tr>

                        <tr>
                          <th>密碼</th>
                          <td> ****************** <a href="/profile/reset" class="btn btn-sm btn-danger">變更</a></td>
                        </tr>

                        <tr>
                          <th>地址</th>

                          @if (  $users -> address  != null )

                            <td> {{ $users -> address }} </td>


                          @endif

                          @if (  $users -> address  == null )

                            <td> 尚無資料 </td>


                          @endif

                        </tr>
                        <tr>
                          <th>手機</th>

                          @if (  $users -> phone_number  != null )

                            <td> {{ $users -> phone_number }} </td>


                          @endif

                          @if (  $users -> phone_number  == null )

                            <td> 尚無資料 </td>


                          @endif

                        </tr>
                        <tr>
                          <th>住家</th>

                          @if (  $users -> home_number  != null )

                            <td> {{ $users -> home_number }} </td>


                          @endif

                          @if (  $users -> home_number  == null )

                            <td> 尚無資料 </td>


                          @endif

                        </tr>
                        <tr>
                          <td>
                            <a href="/profile/update" value="變更會員資料" class="btn btn-primary btn-sm">變更會員資料</a>
                          </td>
                          <td>

                          </td>
                        </tr>

                    </tbody>
                  </table>

            </div>
        </div>
    </div>
@endif

    <div class="row" style="margin-top:80px;">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: rgb(41,43,55);color: white;">已新增文章</div>

                <div class="panel-body">
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="visible-lg">#</th>
                          <th>標題</th>
                          <th>內文</th>
                          <th>狀態</th>
                          <th>聯絡</th>
                          <th>刪除</th>

                        </tr>
                      </thead>
                      <tbody id="tbody">
                      @if ($check == null)
                        @foreach($profiles as $profile)

                        <tr>
                          <td class="visible-lg"> {{ $profile -> id }} </td>
                          <td class=" col-sm-2"> {{ $profile -> title }} </td>
                          <td> {{ $profile -> article }} </td>
                          <td> {{ $profile -> status }} </td>
                          <td> <button type="button" class="btn btn-sm btn-primary btn-edit" data-edit="{{ $profile -> id }}" name="button">修改</button> </td>
                          <td> <button type="button" class="btn btn-sm btn-danger btn-delect" data-id="{{ $profile -> id }}" name="button">刪除</button> </td>
                        </tr>

                        @endforeach
                      @endif
                      @if ($check == 'true')
                        @foreach($profiles as $profile)
                        <tr>
                          <td  class="visible-lg"> {{ $profile -> id }} </td>
                          <td class=" col-sm-2"> {{ $profile -> title }} </td>
                          <td> {{ $profile -> article }} </td>
                          <td>
                            @if( $profile ->status == '處理中' )
                              <button type="button" data-id="{{ $profile -> id }}" name="button" class="btn btn-default btn-sm btn-Processing" value="處理中"> 處理中</button>
                            @endif
                            @if( $profile ->status == '已完成' )
                              <a data-id="{{ $profile -> id }}" class="btn btn-default btn-sm btn-Processing" value="{{ $profile -> status}}"> 已完成 </a>
                            @endif
                          </td>



                          <td><a href="{{ url('/profile/user/'.$profile->author) }}" class="btn btn-sm btn-primary content" name="content">聯絡</a></td>
                          <td> <button type="button" class="btn btn-sm btn-danger btn-delect" data-id="{{ $profile -> id }}" name="button">刪除</button> </td>
                        </tr>

                        @endforeach
                      @endif

                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
