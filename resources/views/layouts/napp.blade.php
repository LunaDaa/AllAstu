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
           background-color: #5F9EA0;
        }
        #filterbox{
               width: 300px;
    padding: 25px;
    border: 25px solid navy;
    margin: 25px;
        }

        .navlist{
            display: inline;
            margin:10px;
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
    

<nav class="navbar navbar-expand-lg" style="position: fixed;width: 100%;padding: 0;"  ><!-- class=flex-column let put elements in multiple lines-->
    <div class="d-flex w-100" style="background-color: white"><!-- first line of navbar due to class=d-flex w-100 -->
         <div id="navhome" >
             @guest
             @else
            <span class="nav nav-item nav-link " style="color: #818181; font-size: 23px; display: inline; cursor: pointer;">&#9776;</span>
             @endguest
        <a class="navbar-brand" style="color: black;" href="{{url('/')}}">{{ config('app.name', 'Laravel') }}</a>
        </div>
        


        <div class="navbar-collapse"><!-- inserted to position search dive in the middle//changeifpossible --></div>
@guest
@else
        <div class="navbar-collapse ">
            <ul>
                <li id="announcment" class="navlist">
                    <a active href="{{url('/home/all')}} " ><strong>Announcment</strong></a>
                </li>
                <li id="file" class="navlist" id="file">
                    <a href="{{url('/file/all')}}"><strong>File</strong></a>
                </li>
                <li id="q_a" class="navlist" id="q&a">
                    <a  href="{{url('/q&a/all')}}"><strong>Q&A</strong></a>
                </li>
                <li id="event" class="navlist" id="event">
                    <a href="{{url('/event/all')}}"><strong>Event</strong></a>
                </li>
            </ul>
        </div>

        <script type="text/javascript">
            document.getElementById('{{$active_menu}}').style.backgroundColor='#5F9EA0';
        </script>
@endguest
        <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                       <button onclick="openfilter()">Filter</button>
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
<div class="container" style=" padding-top: 3%;">
    @guest
    @else


        <div style="width: 100%;float: right;background-color: lightgray;">
    @endguest
    @yield('content')
        <div  class="footer-copyright text-center py-3">© 2019 allAstu@da</div> 
        </div>

</div>
        <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
        <script>
            CKEDITOR.replace( 'article-ckeditor' );
        </script>

        
</body>
</html>
