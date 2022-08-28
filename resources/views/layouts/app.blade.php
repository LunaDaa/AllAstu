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
        /*#filterbox{
               width: 300px;
    padding: 25px;
    border: 25px solid navy;
    margin: 25px;
        }*/

        .navlist{
            display: inline;
            margin:10px;
        }

        .sidebar-container {
           
            height: 100%;
            width: 20%;
            left: 0;
            overflow-x: hidden;
            overflow-y: auto;
            display: inline;
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
            background-color: #5F9EA0;
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
    

<nav class="navbar navbar-expand-lg" style="position: fixed;width: 100%;padding: 0;"  ><!-- class=flex-column let put elements in multiple lines-->
    <div class="d-flex w-100" style="background-color: white"><!-- first line of navbar due to class=d-flex w-100 -->
         <div id="navhome" >
             @guest
             @else
            <span class="nav nav-item nav-link " style="color: #818181; font-size: 23px; display: inline; cursor: pointer;">&#9776;</span>
             @endguest
             <img src="storage/app/public/allastulogo.PNG" alt="llll">
             <img src="{{asset('storage/allastulogo.PNG') }}" height="30px" width="30px">
        <a class="navbar-brand" style="color: black;" href="{{url('/')}}">{{ config('app.name', 'Laravel') }}</a>
        </div>
        


        <div class="navbar-collapse"><!-- inserted to position search dive in the middle//changeifpossible --></div>
@guest
@else
        <div class="navbar-collapse ">
            <ul>
                <li id="announcment" class="navlist" id="announcment">
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
@endguest
        <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                       <!-- <button onclick="openfilter()">Filter</button> -->
                       <a href="#filterbox" data-toggle='collapse'>Filter</a>
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

       <!--  <div class="sidebar-container" id="sidebar"> -->
        <div  style="width: 20%; float: left; position: fixed;background-color: #E6E6FA; height: 100%;">
            <div class="sidebar-logo">
            </div>
            <ul class="sidebar-navigation">
            <li class="header">MY</li>
                @foreach($st as $cr)
                    <li id="{{$cr->instructor_course_id}}">
                        <a href="./{{$cr->instructor_course_id}}">
                            <i class="fa fa-home" aria-hidden="true"></i>{{$cr->name}}
                        </a>
                    </li>
                @endforeach
                <li id="section">
                    <a href="./section">
                        <i class="fa fa-tachometer" aria-hidden="true"></i> Section {{$section}}
                     </a>
                </li>
                <li id="dept">
                    <a href="./dept">
                        <i class="fa fa-tachometer" aria-hidden="true"></i> {{$user->dept_id}}
                     </a>
                </li>
                <li id="school">
                    <a href="./school">
                        <i class="fa fa-tachometer" aria-hidden="true"></i> {{$school}}
                     </a>
                </li>
                <li id="all">
                    <a href="./all">
                        <i class="fa fa-tachometer" aria-hidden="true"></i> ALL
                     </a>
                </li>
                <li class="header">OTHER</li>
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

        <div  style="width: 75.7%;float: right;background-color:#F0FFF0">
            <div class="collapse in" id="filterbox">
                <label>school</label>
                <select>
                    <option>All</option>

                </select>
                <label>Department</label>
                <select>
                    <option>All</option>
                    <option></option>
                </select>
                <label>Section</label>
                <select>
                    <option>All</option>
                    <option></option>
                </select>
                <label>Course</label>
                <select>
                    <option>All</option>
                    <option></option>
                </select>
                <label>instructor</label>
                <select>
                    <option>All</option>
                    <option></option>
                </select>
                

                <button>Go</button>
      </div> 
      <script type="text/javascript">
    /*$activetab='all';*//*string1.localeCompare(string2)*/
    document.getElementById('{{$active_tab}}').style.backgroundColor='#5F9EA0';
    document.getElementById('{{$active_menu}}').style.backgroundColor='#5F9EA0';

    /*if ('{{$active_tab}}'==='all') {
        document.getElementById('all').style.backgroundColor='#5F9EA0';

    }
    else if('{{$active_tab}}'==='school'){
        document.getElementById('school').style.backgroundColor='#5F9EA0';
        document.getElementById('all').style.backgroundColor='transparent';

    }
    else if('{{$active_tab}}'==='dept'){
        document.getElementById('dept').style.backgroundColor='#5F9EA0';
        document.getElementById('school').style.backgroundColor='transparent';
        document.getElementById('all').style.backgroundColor='transparent';

    }
    else if('{{$active_tab}}'==='section'){
        document.getElementById('section').style.backgroundColor='#5F9EA0';
        document.getElementById('dept').style.backgroundColor='transparent';
        document.getElementById('school').style.backgroundColor='transparent';
        document.getElementById('all').style.backgroundColor='transparent';

    }*/
</script>
    @endguest
    @yield('content')
        <div  class="footer-copyright text-center py-3">© 2019 allAstu@da</div> 
        </div>

</div>
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

        <script type="text/javascript">
            function openfilter(){
                document.getElementById('filterbox').style.display='block';
            }
        </script>
</body>
</html>
