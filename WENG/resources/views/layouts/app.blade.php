<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- <link href="{{asset('frame/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"> -->

    <link href="{{asset('frame/css/freelancer.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->

    <!-- <link href="{{asset('frame/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"> -->

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.28/vue.min.js"></script>

    <!-- Scripts -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToke' => csrf_token(),
        ]);?>
    </script>

    <style>

      *{
        // border: 1px solid black;
        line-height: 25px;
        font-family: '微軟正黑體';
        box-sizing: border-box;

      }
      h1,h2,h3,h4,h5{

        font-weight: 500;
      }

      .dropdown-menu>li>a:focus, .dropdown-menu>li>a:hover{

        background-color: rgba(0,0,0,0.5);

      }
      .navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:focus, .navbar-default .navbar-nav>.open>a:hover{

        background-color: rgb(41,43,55);
      }
      .dropdown-menu>li>a{
        color: white;
      }
      .navbar-nav>li>.dropdown-menu{
        background-color: rgb(41,43,55);
      }
      .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{

        padding: 10px 0px 10px 0px;
      }

    </style>
</head>
<body style="background-color: rgb(243,244,246); ">
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top" style="width: 100%; position:fixed;background-color: rgb(42,62,80); ">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/home') }}" style="color: white;">
                        WENG
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>



                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}" style="color: white;">登入</a></li>
                            <li><a href="{{ url('/register') }}" style="color: white;">註冊</a></li>
                        @else

                        @if ( $check == null )
                          <li> <a style="color: white;"  href="/profile">個人資訊</a> </li>
                        @endif
                        @if ( $check == true )
                          <li> <a style="color: white;"  href="/profile_admin">個人資訊</a> </li>
                        @endif
                        @if ( $check == 'true' )
                          <li><a style="color: white;" href="{{ url('/user') }}">使用者管理</a></li>
                          <li><a style="color: white;" href="{{ url('/profile') }}">文章管理</a></li>
                          <li><a style="color: white;" href="{{ url('/announcement') }}">公告管理</a></li>
                        @endif


                            <li class="dropdown">
                                <a style="color: white;" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li >
                                        <a  style="color: white;" href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>

                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        

        @yield('content')





    </div>

    <footer class="text-center" style="width:100%;">

        <div class="footer-below" >
            <div class="container" >
                <div class="row" >
                    <div class="col-lg-12">
                        Copyright &copy; WENG 2016
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <script src="/js/app.js"></script>

</body>
</html>
