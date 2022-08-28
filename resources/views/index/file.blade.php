@extends('layouts.app')

@section('content')
<div id="main">

    <!-- Main component for a primary marketing message or call to action -->
    
    <div class="jumbotron">
    	@if($message=Session::get('success'))
    	  <div class="alert alert-success">
    	  	<p>{{$message}}</p>
    	  </div>
    	@endif
        <ul class="navbar-nav">
        	<a class="ml-auto" href="{{url('/postFile')}}">Post File</a>
        </ul>
        
       
        <p>files</p>

        @if($active_tab=='all')
           <h2>All</h2>
           @foreach($material_for_all as $all)
              <p>{{$all->name}}</p>
              <p>{{$all->description}}</p>
           @endforeach
        

        
           <!--  -->
           <h2>School</h2>
           @foreach($material_for_school as $all)
              <p>{{$all->name}}</p>
              <p>{{$all->description}}</p>
           @endforeach
        
           <h2>department</h2>
           @foreach($material_for_dept as $all)
              <p>{{$all->name}}</p>
              <p>{{$all->description}}</p>
           @endforeach
        

       
           <h2>Section</h2>
           @foreach($material_for_section as $all)
              <p>{{$all->name}}</p>
              <p>{{$all->description}}</p>
           @endforeach
        

        
           <h2>Courses</h2>
           @foreach($material_for_courses as $all)
              <p>{{$all->name}}</p>
              <p>{{$all->description}}</p>
           @endforeach

        @elseif($active_tab=='school')
          <h2>School</h2>
           @foreach($material_for_school as $all)
              <p>{{$all->name}}</p>
              <p>{{$all->description}}</p>
           @endforeach
        @elseif($active_tab=='dept')
          <h2>department</h2>
           @foreach($material_for_dept as $all)
              <p>{{$all->name}}</p>
              <p>{{$all->description}}</p>
           @endforeach
        @elseif($active_tab=='section')
          <h2>Section</h2>
           @foreach($material_for_section as $all)
              <p>{{$all->name}}</p>
              <p>{{$all->description}}</p>
           @endforeach
        @else
        <h2>Courses</h2>
           @foreach($material_for_courses as $all)
               @if($active_tab==$all->instructor_course_id)
                  <p>{{$all->name}}</p>
                  <p>{{$all->description}}</p>
               @endif   
           @endforeach
        @endif   
        

    </div> 	
</div> 
@endsection