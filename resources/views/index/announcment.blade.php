@extends('layouts.app')

@section('content')
<div id="main">

    <!-- Main component for a primary marketing message or call to action -->
    <div class="" >
            <!-- Right Side Of Navbar -->
      <ul class="navbar-nav">
        <a class=" ml-auto" href="{{url('/postAnnouncment')}}">Post Announcment</a>
      </ul>
      
      @if($message=Session::get('success'))
         <div class="alert alert-success">
             <p>{{$message}}</p>
         </div>
      @endif
      @if($active_tab=='all')
           <h1>All</h1>
                  @if($ann_for_all!=null)
                   @foreach ($ann_for_all as $all)
                   <div class="jumbotron">
                    <p align="center">{{$all->created_at}}</p>
                      <h2>{{$all->title}}</h2>
                      <p>{{$all->content}}</p>
                      <p align="right">{{$all->first_name}} {{$all->last_name}}</p>
                   </div>   
                   @endforeach
                  @endif
                
                <h1>{{$school}}</h1>
                  @if($ann_for_school!=null)
                    @foreach($ann_for_school as $s)
                    <div class="jumbotron">
                      <p align="center">{{$all->created_at}}</p>
                       <h2>{{$s->title}}</h2>
                       <p>{{$s->content}}</p>
                       <p align="right">{{$s->posted_by}}</p>
                     </div>
                    @endforeach
                  @endif
                <h1>{{$user->dept_id}}</h1>
                  @if($ann_for_dept!=null)
                    @foreach($ann_for_dept as $dept)
                    <div class="jumbotron">
                      <p align="center">{{$all->created_at}}</p>
                       <h2>{{$dept->title}}</h2>
                       <p>{{$dept->content}}</p>
                       <p align="right">{{$dept->posted_by}}</p>
                     </div>
                    @endforeach
                  @endif  
                <h1>section {{$section}}</h1>
                  @if($ann_for_section!=null)
                    @foreach($ann_for_section as $sec)
                    <div class="jumbotron">
                      <p align="center">{{$all->created_at}}</p>
                       <h2>{{$sec->title}}</h2>
                       <p>{{$sec->content}}</p>
                       <p align="right">{{$sec->posted_by}}</p>
                     </div>
                    @endforeach
                  @endif  
                <h1>From courses</h1>
                  @if($ann_for_courses!=null)
                    @foreach($ann_for_courses as $cr)
                    <div class="jumbotron">
                      <p align="center">{{$all->created_at}}</p>
                       <h2>{{$cr->title}}</h2>
                       <p>{{$cr->content}}</p>
                       <p align="right">{{$cr->posted_by}}</p>
                     </div>
                    @endforeach
                  @endif      

      @elseif($active_tab=='section')
           <h1>section {{$section}}</h1>
                  @if($ann_for_section!=null)
                    @foreach($ann_for_section as $sec)
                    <div class="jumbotron">
                      <p align="center">{{$all->created_at}}</p>
                       <h2>{{$sec->title}}</h2>
                       <p>{{$sec->content}}</p>
                       <p align="right">{{$sec->posted_by}}</p>
                     </div>
                    @endforeach
                  @endif  
      @elseif($active_tab=='school')
             <h1>{{$school}}</h1>
                  @if($ann_for_school!=null)
                    @foreach($ann_for_school as $s)
                    <div class="jumbotron">
                      <p align="center">{{$s->created_at}}</p>
                       <h2>{{$s->title}}</h2>
                       <p>{{$s->content}}</p>
                       <p align="right">{{$s->posted_by}}</p>
                     </div>
                    @endforeach
                  @endif
      @elseif($active_tab=='dept')
            <h1>{{$user->dept_id}}</h1>
                  @if($ann_for_dept!=null)
                    @foreach($ann_for_dept as $dept)
                    <div class="jumbotron">
                      <p align="center">{{$dept->created_at}}</p>
                       <h2>{{$dept->title}}</h2>
                       <p>{{$dept->content}}</p>
                       <p align="right">{{$dept->posted_by}}</p>
                     </div>
                    @endforeach
                  @endif 
      @else
            @foreach($ann_for_courses as $cr)
                    <div class="jumbo tron">
                      @if($active_tab==$cr->instructor_course_id)
                           <p align="center">{{$cr->created_at}}</p>
                       <h2>{{$cr->title}}</h2>
                       <p>{{$cr->content}}</p>
                       <p align="right">{{$cr->posted_by}}</p>
                     </div>
                      @endif
          @endforeach                         
      @endif

                
    </div>

 </div>
@endsection
