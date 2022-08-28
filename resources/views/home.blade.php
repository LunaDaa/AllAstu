@extends('layouts.app')

@section('content')
<div id="main">

    <!-- Main component for a primary marketing message or call to action -->
    <div class="jumbotron">
      <p>{{$user->id}}</p>
                <p>name: {{$user->first_name}}</p>
                <h1>All</h1>
                
                   @foreach ($ann_for_all as $all)
                      <h2>{{$all->title}}</h2>
                      <p>{{$all->content}}</p>
                      <p>{{$all->posted_by}}</p>
                   @endforeach
                
                <h1>{{$school}}</h1>
                
                    @foreach($ann_for_school as $s)
                       <h2>{{$s->title}}</h2>
                       <p>{{$s->content}}</p>
                       <p>{{$s->posted_by}}</p>
                    @endforeach
                
                <p>department: {{$user->dept_id}}</p>
                    @foreach($ann_for_dept as $dept)
                       <h2>{{$dept->title}}</h2>
                       <p>{{$dept->content}}</p>
                       <p>{{$dept->posted_by}}</p>
                    @endforeach
                <p>section: {{$section}}</p>
                    @foreach($ann_for_section as $sec)
                       <h2>{{$sec->title}}</h2>
                       <p>{{$sec->content}}</p>
                       <p>{{$sec->posted_by}}</p>
                    @endforeach
                <p>from courses</p>
                    @foreach($course_ann as $cr)
                       <h2>{{$cr->title}}</h2>
                       <p>{{$cr->content}}</p>
                       <p>{{$cr->posted_by}}</p>
                    @endforeach    
    </div>

 </div>
@endsection
