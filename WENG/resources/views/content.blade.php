@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row" style="margin-top:80px;margin-bottom:50px;">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" >
                <div class="panel-heading" style="background-color: rgb(41,43,55);color: white;">基本資料</div>

                <div class="panel-body">

                  <table class="table">

                    <tbody>
                      <tr>
                        <td>姓名</td>
                        <td>{{ $content->name }}</td>
                      </tr>

                      <tr>
                        <td>信箱</td>
                        <td>{{ $content->email }}</td>
                      </tr>

                      <tr>
                        <td>性別</td>
                        <td> @if( $content->sex == null) 暫無資料 @endif {{ $content->sex }}</td>
                      </tr>

                      <tr>
                        <td>地址</td>
                        <td> @if( $content->address == null) 暫無資料 @endif {{ $content->address }}</td>
                      </tr>
                      <tr>
                        <td>手機</td>
                        <td> @if( $content->phone_number == null) 暫無資料 @endif {{ $content->phone_number }}</td>
                      </tr>
                      <tr>
                        <td>家電</td>
                        <td> @if( $content->home_number == null) 暫無資料 @endif {{ $content->home_number }}</td>
                      </tr>
                      <tr>
                        <td>
                          <a href="{{ url('/profile') }}" class="btn btn-sm btn-default" >返回</a>
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

</div>
@endsection
