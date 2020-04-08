<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Artist Management</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('homeaset/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700">
    <link rel="stylesheet" href="{{ asset('homeaset/fonts/font-awesome.min.css') }}">

    <style>
        body{
            background-color: #F0F8FF;
            display: block;
        }
        footer{
            /*position: absolute;*/
            position: fixed;
            bottom: 0;
            color: white;
            width: 100%;
        }
        .container-content{
            padding-top:150px;
            padding-bottom:200px;
        }
        .container ul li{
            margin-right:10px;
        }
    </style>

</head>
<body id="page-top">
<div>
    <!-- navbar -->
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('home') }}" style="font-size: 30px;">Artist.id</a>   
            </div>         
            <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
            
        </div>
    </nav>
    <!-- akhir navbar-->
</div>


    @yield('content')

    <footer class="bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <span class="copyright">Copyright&nbsp;© Brand 2020</span>                    
                </div>
                <div class="col-md-5">
                    <span class="copyright">INFORMATION SECURITY AND ASSURANCE KP B</span>
                    <span class="copyright">Group 15</span>
                </div>
            </div>
        </div>
    </footer>
    <!-- Scripts -->
    <script src="{{ asset('homeaset/js/jquery.min.js') }}"></script>
    <script src="{{ asset('homeaset/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="{{ asset('homeaset/js/script.min.js') }}"></script>
@yield('footer_script')
</body>
</html>
