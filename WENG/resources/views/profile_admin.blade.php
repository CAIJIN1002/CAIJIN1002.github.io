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
                          <td> ****************** <a href="/profile_admin/reset_admin" class="btn btn-sm btn-danger">變更</a></td>
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
                            <a href="/profile_admin/update_admin" value="變更會員資料" class="btn btn-primary btn-sm">變更會員資料</a>
                          </td>
                          <td>

                          </td>
                        </tr>

                    </tbody>
                  </table>

            </div>
        </div>
    </div>

</div>
@endsection
