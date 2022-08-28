<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- start -->
    <title>allAstu</title>

    <style type="text/css">
        body{
            margin-left: 5px;
        }
        .sidebar-container {
            position: fixed;
            width: 0px;
            height: 100%;
            left: 0;
            overflow-x: hidden;
            overflow-y: auto;
           /* background: #1a1a1a;*/
            /*color: #fff;*/
        }

        .content-container {
            padding-top: 20px;
        }

        /*.sidebar-logo {
            padding: 10px 15px 10px 30px;
            font-size: 20px;
            background-color: #2574A9;
        }*/

        .sidebar-navigation {
            padding: 0;
            margin: 0;
            list-style-type: none;
            position: relative;
        }

        .sidebar-navigation li {
            background-color: transparent;
            position: relative;
            display: inline-block;
            width: 100%;
            line-height: 20px;
        }

        .sidebar-navigation li a {
            padding: 10px 15px 10px 30px;
            display: block;
            color: black;
        }

        .sidebar-navigation li .fa {
            margin-right: 10px;
        }

        .sidebar-navigation li a:active,
        .sidebar-navigation li a:hover,
        .sidebar-navigation li a:focus {
            text-decoration: none;
            outline: none;
        }

        .sidebar-navigation li::before {
            background-color: #2574A9;
            position: absolute;
            content: '';
            height: 100%;
            left: 0;
            top: 0;
            -webkit-transition: width 0.2s ease-in;
            transition: width 0.2s ease-in;
            width: 3px;
            z-index: -1;
        }

        .sidebar-navigation li:hover::before {
            width: 100%;
        }

        .sidebar-navigation .header {
            font-size: 12px;
            text-transform: uppercase;
            /*background-color: #151515;*/
            padding: 10px 15px 10px 30px;
        }

        .sidebar-navigation .header::before {
            background-color: transparent;
        }   
    </style>
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="css/bootstrap.css">

 <script type="text/javascript">
    $i=0; /*identifier if sidebar is opened or closed... $i=0 represents sidebar closed and $i=1 represents sidebar opened*/
  </script>   
    <!-- end -->
</head>
<body>


    <!-- navbar --> 
    

<nav class="navbar navbar-expand-lg navbar-light bg-primary flex-column jumbotron" style="padding: 0; position: fixed; width: 100%; padding: 0;" ><!-- class=flex-column let put elements in multiple lines-->
    <div class="d-flex w-100" style="background-color: white"><!-- first line of navbar due to class=d-flex w-100 -->
        <div id="navhome" >
             @guest
             @else
           
             @endguest
        <a class="navbar-brand" style="color: black;" href="{{url('/')}}">{{ config('app.name', 'Laravel') }}</a>
        </div>
        


        <div class="navbar-collapse"><!-- inserted to position search dive in the middle//changeifpossible --></div>

        <div class="collapse navbar-collapse navbar-nav mr-auto " id="navbarColor01">
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>

        <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->first_name }} {{Auth::user()->last_name}} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
        <!-- start -->

        <!-- end -->
    </div>

</nav>
<!-- content -->
<div class="container">
    <div class="bg-primary flex-column">
            <ul class="navbar-nav mr-auto w-100 ">
                <li style="display:inline;"  id="announcment">
                   nnn
                </li>
                <li style="display:inline;"  id="file">
                    mmm
                </li>
                <li style="display:inline;" id="q&a">
                    mmm
                </li>
                <li style="display:inline;"  id="event">
                   mmm
                </li>
            </ul>
        </div> 
    @yield('content')
</div>

<!-- end -->
<!--<div class="container" id="main" style="padding: 10px">
    <span class="nav nav-item nav-link" style="position: fixed; left: 0;color: #818181; font-size: 23px; cursor: pointer;" onclick="openc()">&#9776;</span>
           <div class="sidebar-container" id="sidebar">
        <div class="sidebar-logo">
            <span class="nav nav-item nav-link " style="color: #818181; font-size: 23px; display: inline;cursor: pointer;" onclick="openc()">&#9776;</span>
            <a class="navbar-brand" style="font-style: italic;color: #818181;" href="{{url('/')}}">allAstu</a>
        </div>
        <ul class="sidebar-navigation">
            <li class="header">Navigation</li>
            <li>
                <a href="#">
                    <i class="fa fa-home" aria-hidden="true"></i> Homepage
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
                 </a>
            </li>
            <li class="header">Another Menu</li>
            <li>
                <a href="#">
                    <i class="fa fa-users" aria-hidden="true"></i> Friends
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-cog" aria-hidden="true"></i> Settings
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-info-circle" aria-hidden="true"></i> Information
                </a>
            </li>
        </ul>
    </div>
    
    <div class="navbar navbar-expand-lg navbar-light bg-primary flex-column jumbotron" id="tab" style="padding: 0; position: fixed; width: 100%;">
        @guest
    @else
        <div class="d-flex w-100">
            <ul class="navbar-nav mr-auto w-100 ">
                <li class="nav-item w-25 text-center" id="announcment">
                    <a class="nav-link " href="{{url('/home')}}"><strong>Announcment</strong></a>
                </li>
                <li class="nav-item w-25 text-center" id="file">
                    <a class="nav-link" href="{{url('/file')}}"><strong>File</strong></a>
                </li>
                <li class="nav-item w-25 text-center" id="q&a">
                    <a class="nav-link" href="{{url('/q&a')}}"><strong>Q&A</strong></a>
                </li>
                <li class="nav-item w-25 text-center" id="event">
                    <a class="nav-link" href="{{url('/event')}}"><strong>Event</strong></a>
                </li>
            </ul>
        </div> 
     @endguest
    </div>
            
</div>   
-->

 <div class="footer-copyright text-center py-3">© 2019 allAstu@da</div>        


    
   

    <script type="text/javascript">
    function openNav(){
      document.getElementById('sidebar').style.width="10%";
      document.getElementById('main').style.marginLeft="10%";
      /*document.getElementById('tab').style.marginLeft="250px";
      document.getElementById('navhome').style.display="none";*/
      $i=1;
    }
     function closeNav(){
      document.getElementById('sidebar').style.width="0";
      document.getElementById('main').style.marginLeft="0";
      /*document.getElementById('tab').style.marginLeft="0";
      document.getElementById('navhome').style.display="block";*/
       $i=0;
    }
    function openc(){
      if ($i==0) {
        openNav();
      }
      else{
        closeNav();
      }
    }
</script>
    <!-- end -->
        <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
        <script>
            CKEDITOR.replace( 'article-ckeditor' );
        </script>
</body>
</html>
