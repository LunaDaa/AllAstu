@extends('layouts.app')

@section('content')
<style type="text/css">
	th,td{
		padding: 1%;
	}
</style>
<div id="main">

    <!-- Main component for a primary marketing message or call to action -->

    <div class="jumbotron">
    	<ul class="navbar-nav">
    		<a  class="ml-auto" href="{{url('postEvent')}}">Post Event</a>
    	</ul>
        
         <table style="width: 100%">
         	<tr>
         		<th>Name</th>
         		<th>type</th>
         		<th>Time left</th>
         		<th>Deadline</th>
         	</tr>
         	<p style="display: none">{{ $currentdate=date("Y")."-".date("m")."-".date("d")}}<!-- get current date -->
         	{{$datetime2 = strtotime($currentdate)}}</p>

            @if($active_tab=='all')
            <!-- all -->
               @foreach($event_for_all as $all)
                    <p style="display: none">
                        {{ $datetime1 = strtotime($all->deadline)}}   </br>           
                        {{$secs = $datetime1 - $datetime2}}
                        {{$months = $secs / 2592000}}
                        {{$days = $secs / 86400}}
                    </p>    
                    
                        

                     

                    <tr style="padding: 10%">
                    <td>{{$all->name}}</td>
                    <td>{{$all->type}}</td>
                    <td>
                        @if($months>=1)
                            {{$intmonth=intval($months)}}months,
                            @if(is_float($months))

                              {{($months-$intmonth)*30}}days
                            @endif  
                        
                        @else
                            {{$days}}days
                        @endif                      

                    </td>
                    <td>{{$all->deadline}}</td>
                    </br>
                    </tr>   
                @endforeach
            <!-- school -->
                 @foreach($event_for_school as $s)
                    <p style="display: none">
                        {{ $datetime1 = strtotime($s->deadline)}}   </br>           
                        {{$secs = $datetime1 - $datetime2}}
                        {{$months = $secs / 2592000}}
                        {{$days = $secs / 86400}}
                    </p>    
                    
                        

                     

                    <tr style="padding: 10%">
                    <td>{{$s->name}}</td>
                    <td>{{$s->type}}</td>
                    <td>
                        @if($months>=1)
                            {{$intmonth=intval($months)}}months,
                            @if(is_float($months))

                              {{($months-$intmonth)*30}}days
                            @endif  
                        
                        @else
                            {{$days}}days
                        @endif                      

                    </td>
                    <td>{{$s->deadline}}</td>
                    </br>
                    </tr>   
                @endforeach
            <!-- dept -->
                @foreach($event_for_dept as $dept)
                    <p style="display: none">
                        {{ $datetime1 = strtotime($dept->deadline)}}   </br>           
                        {{$secs = $datetime1 - $datetime2}}
                        {{$months = $secs / 2592000}}
                        {{$days = $secs / 86400}}
                    </p>    
                    
                        

                     

                    <tr style="padding: 10%">
                    <td>{{$dept->name}}</td>
                    <td>{{$dept->type}}</td>
                    <td>
                        @if($months>=1)
                            {{$intmonth=intval($months)}}months,
                            @if(is_float($months))

                              {{($months-$intmonth)*30}}days
                            @endif  
                        
                        @else
                            {{$days}}days
                        @endif                      

                    </td>
                    <td>{{$dept->deadline}}</td>
                    </br>
                    </tr>   
                @endforeach
            <!-- section -->
                @foreach($event_for_section as $sec)
                    <p style="display: none">
                        {{ $datetime1 = strtotime($sec->deadline)}}   </br>           
                        {{$secs = $datetime1 - $datetime2}}
                        {{$months = $secs / 2592000}}
                        {{$days = $secs / 86400}}
                    </p>    
                    
                        

                     

                    <tr style="padding: 10%">
                    <td>{{$sec->name}}</td>
                    <td>{{$sec->type}}</td>
                    <td>
                        @if($months>=1)
                            {{$intmonth=intval($months)}}months,
                            @if(is_float($months))

                              {{($months-$intmonth)*30}}days
                            @endif  
                        
                        @else
                            {{$days}}days
                        @endif                      

                    </td>
                    <td>{{$sec->deadline}}</td>
                    </br>
                    </tr>   
                @endforeach
            <!-- coureses -->
                @foreach($event_for_courses as $cr)
                    <p style="display: none">
                        {{ $datetime1 = strtotime($cr->deadline)}}   </br>           
                        {{$secs = $datetime1 - $datetime2}}
                        {{$months = $secs / 2592000}}
                        {{$days = $secs / 86400}}
                    </p>    
                    
                        

                     

                    <tr style="padding: 10%">
                    <td>{{$cr->name}}</td>
                    <td>{{$cr->type}}</td>
                    <td>
                        @if($months>=1)
                            {{$intmonth=intval($months)}}months,
                            @if(is_float($months))

                              {{($months-$intmonth)*30}}days
                            @endif  
                        
                        @else
                            {{$days}}days
                        @endif                      

                    </td>
                    <td>{{$cr->deadline}}</td>
                    </br>
                    </tr>   
                @endforeach
            @elseif($active_tab=='school')
                @foreach($event_for_school as $s)
                    <p style="display: none">
                        {{ $datetime1 = strtotime($s->deadline)}}   </br>           
                        {{$secs = $datetime1 - $datetime2}}
                        {{$months = $secs / 2592000}}
                        {{$days = $secs / 86400}}
                    </p>    
                    
                        

                     

                    <tr style="padding: 10%">
                    <td>{{$s->name}}</td>
                    <td>{{$s->type}}</td>
                    <td>
                        @if($months>=1)
                            {{$intmonth=intval($months)}}months,
                            @if(is_float($months))

                              {{($months-$intmonth)*30}}days
                            @endif  
                        
                        @else
                            {{$days}}days
                        @endif                      

                    </td>
                    <td>{{$s->deadline}}</td>
                    </br>
                    </tr>   
                @endforeach
            @elseif($active_tab=='dept')
                @foreach($event_for_dept as $dept)
                    <p style="display: none">
                        {{ $datetime1 = strtotime($dept->deadline)}}   </br>           
                        {{$secs = $datetime1 - $datetime2}}
                        {{$months = $secs / 2592000}}
                        {{$days = $secs / 86400}}
                    </p>    
                    
                        

                     

                    <tr style="padding: 10%">
                    <td>{{$dept->name}}</td>
                    <td>{{$dept->type}}</td>
                    <td>
                        @if($months>=1)
                            {{$intmonth=intval($months)}}months,
                            @if(is_float($months))

                              {{($months-$intmonth)*30}}days
                            @endif  
                        
                        @else
                            {{$days}}days
                        @endif                      

                    </td>
                    <td>{{$dept->deadline}}</td>
                    </br>
                    </tr>   
                @endforeach
            @elseif($active_tab=='section')
                @foreach($event_for_section as $sec)
                    <p style="display: none">
                        {{ $datetime1 = strtotime($sec->deadline)}}   </br>           
                        {{$secs = $datetime1 - $datetime2}}
                        {{$months = $secs / 2592000}}
                        {{$days = $secs / 86400}}
                    </p>    
                    
                        

                     

                    <tr style="padding: 10%">
                    <td>{{$sec->name}}</td>
                    <td>{{$sec->type}}</td>
                    <td>
                        @if($months>=1)
                            {{$intmonth=intval($months)}}months,
                            @if(is_float($months))

                              {{($months-$intmonth)*30}}days
                            @endif  
                        
                        @else
                            {{$days}}days
                        @endif                      

                    </td>
                    <td>{{$sec->deadline}}</td>
                    </br>
                    </tr>   
                @endforeach
            @else
                @foreach($event_for_courses as $cr)
                    @if($active_tab==$cr->posted_for)
                        <p style="display: none">
                            {{ $datetime1 = strtotime($cr->deadline)}}   </br>           
                            {{$secs = $datetime1 - $datetime2}}
                            {{$months = $secs / 2592000}}
                            {{$days = $secs / 86400}}
                        </p>    
                        
                            

                         

                        <tr style="padding: 10%">
                        <td>{{$cr->name}}</td>
                        <td>{{$cr->type}}</td>
                        <td>
                            @if($months>=1)
                                {{$intmonth=intval($months)}}months,
                                @if(is_float($months))

                                  {{($months-$intmonth)*30}}days
                                @endif  
                            
                            @else
                                {{$days}}days
                            @endif                      

                        </td>
                        <td>{{$cr->deadline}}</td>
                        </br>
                        </tr> 
                    @endif      
                @endforeach
            @endif


            <!-- @foreach($events as $e)
                <p style="display: none">
                    {{ $datetime1 = strtotime($e->deadline)}}	</br>			
                    {{$secs = $datetime1 - $datetime2}}
    			    {{$months = $secs / 2592000}}
    				{{$days = $secs / 86400}}
    			</p>	
    			
    				

                 

                <tr style="padding: 10%">
                <td>{{$e->name}}</td>
                <td>{{$e->type}}</td>
                <td>
                	@if($months>=1)
                	    {{$intmonth=intval($months)}}months,
                	    @if(is_float($months))

                	      {{($months-$intmonth)*30}}days
                	    @endif  
                	
                	@else
                	    {{$days}}days
                    @endif            	        

                </td>
                <td>{{$e->deadline}}</td>
                </br>
              </tr>   
         @endforeach -->

         </table>

    </div> 	
</div>    

@endsection