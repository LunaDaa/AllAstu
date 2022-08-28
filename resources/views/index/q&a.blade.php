@extends('layouts.app')

@section('content')
<div id="main">

    <!-- Main component for a primary marketing message or call to action -->
    @if($message=Session::get('success'))
          <div class="alert alert-success">
            <p>{{$message}}</p>
          </div>
        @endif
    
        <a href="/postQuestion">Ask question</a>

        @if($active_tab=='all')
            <!-- all -->
            @foreach($question_for_all as $all)
                <div class="jumbotron">
                    <a href="/question/{{$all->question_id}}">
                        <p style=" font-size: 40px;border-radius: 20px;display: inline;"       >{{$all->posted_by}}</p>
                        <h4 style="color: black">{{$all->title}}</h4>
                        <p>{!!$all->question!!}</p>
                        @foreach($answer as $a)

                            @if($all->question_id==$a->question_id)
                                <div  style="margin: 30px">
                                      <p style=" font-size: 40px;border-radius: 20px;display: inline;">{{$a->answered_by}}</p> 
                                <p>{!!$a->answer!!}</p>
                                </div>
                            @endif 
                
                        @endforeach   
                    </a>
                </div>    
            @endforeach
            <!-- school -->
            @foreach($question_for_school as $s)
                <div class="jumbotron">
                    <a href="/question/{{$all->question_id}}">
                        <p style=" font-size: 40px;border-radius: 20px;display: inline;"       >{{$s->posted_by}}</p>
                        <h4 style="color: black">{{$s->title}}</h4>
                        <p>{!!$s->question!!}</p>
                        @foreach($answer as $a)

                            @if($s->question_id==$a->question_id)
                                <div  style="margin: 30px">
                                      <p style=" font-size: 40px;border-radius: 20px;display: inline;">{{$a->answered_by}}</p> 
                                <p>{{$a->answer}}</p>
                                </div>
                            @endif 
                
                        @endforeach   
                    </a>
                </div>
            @endforeach
            <!-- dept -->
            @foreach($question_for_dept as $dept)
                    <div class="jumbotron">
                        <a href="/question/{{$dept->question_id}}">
                            <p style=" font-size: 40px;border-radius: 20px;display: inline;"       >{{$dept->posted_by}}</p>
                            <h4 style="color: black">{{$dept->title}}</h4>
                            <p>{!!$dept->question!!}</p>
                            @foreach($answer as $a)

                                @if($dept->question_id==$a->question_id)
                                    <div  style="margin: 30px">
                                          <p style=" font-size: 40px;border-radius: 20px;display: inline;">{{$a->answered_by}}</p> 
                                    <p>{{$a->answer}}</p>
                                    </div>
                                @endif 
                    
                            @endforeach   
                        </a>
                    </div>    
                @endforeach
            <!-- section -->
            @foreach($question_for_section as $sec)
                <div class="jumbotron">
                    <a href="/question/{{$sec->question_id}}">
                        <p style=" font-size: 40px;border-radius: 20px;display: inline;"       >{{$sec->posted_by}}</p>
                        <h4 style="color: black">{{$sec->title}}</h4>
                        <p>{!!$sec->question!!}</p>
                        @foreach($answer as $a)

                            @if($sec->question_id==$a->question_id)
                                <div  style="margin: 30px">
                                      <p style=" font-size: 40px;border-radius: 20px;display: inline;">{{$a->answered_by}}</p> 
                                <p>{{$a->answer}}</p>
                                </div>
                            @endif 
                
                        @endforeach   
                    </a>
                </div>    
            @endforeach
            <!-- courses -->
            @foreach($question_for_courses as $cr)
                <div class="jumbotron">
                    <a href="/question/{{$cr->question_id}}">
                        <p style=" font-size: 40px;border-radius: 20px;display: inline;"       >{{$cr->posted_by}}</p>
                        <h4 style="color: black">{{$cr->title}}</h4>
                        <p>{!!$cr->question!!}</p>
                        @foreach($answer as $a)

                            @if($cr->question_id==$a->question_id)
                                <div  style="margin: 30px">
                                      <p style=" font-size: 40px;border-radius: 20px;display: inline;">{{$a->answered_by}}</p> 
                                <p>{{$a->answer}}</p>
                                </div>
                            @endif 
                
                        @endforeach   
                    </a>  
                </div>    
            @endforeach
        @elseif($active_tab=='school')
            @foreach($question_for_school as $s)
                <div class="jumbotron">
                    <a href="/question/{{$s->question_id}}">
                        <p style=" font-size: 40px;border-radius: 20px;display: inline;"       >{{$s->posted_by}}</p>
                        <h4 style="color: black">{{$s->title}}</h4>
                        <p>{!!$s->question!!}</p>
                        @foreach($answer as $a)

                            @if($s->question_id==$a->question_id)
                                <div  style="margin: 30px">
                                      <p style=" font-size: 40px;border-radius: 20px;display: inline;">{{$a->answered_by}}</p> 
                                <p>{{$a->answer}}</p>
                                </div>
                            @endif 
                
                        @endforeach   
                    </a>
                </div>    
            @endforeach
        @elseif($active_tab=='dept')
                @foreach($question_for_dept as $dept)
                    <div class="jumbotron">
                        <a href="/question/{{$dept->question_id}}">
                            <p style=" font-size: 40px;border-radius: 20px;display: inline;"       >{{$dept->posted_by}}</p>
                            <h4 style="color: black">{{$dept->title}}</h4>
                            <p>{!!$dept->question!!}</p>
                            @foreach($answer as $a)

                                @if($dept->question_id==$a->question_id)
                                    <div  style="margin: 30px">
                                          <p style=" font-size: 40px;border-radius: 20px;display: inline;">{{$a->answered_by}}</p> 
                                    <p>{{$a->answer}}</p>
                                    </div>
                                @endif 
                    
                            @endforeach   
                        </a>
                    </div>    
                @endforeach
        @elseif($active_tab=='section')
            @foreach($question_for_section as $sec)
                <div class="jumbotron">
                    <a href="/question/{{$sec->question_id}}">
                        <p style=" font-size: 40px;border-radius: 20px;display: inline;"       >{{$sec->posted_by}}</p>
                        <h4 style="color: black">{{$sec->title}}</h4>
                        <p>{!!$sec->question!!}</p>
                        @foreach($answer as $a)

                            @if($sec->question_id==$a->question_id)
                                <div  style="margin: 30px">
                                      <p style=" font-size: 40px;border-radius: 20px;display: inline;">{{$a->answered_by}}</p> 
                                <p>{{$a->answer}}</p>
                                </div>
                            @endif 
                
                        @endforeach   
                    </a>
                </div>    
            @endforeach
        @else
            @foreach($question_for_courses as $cr)
                @if($active_tab==$cr->posted_for)
                    <div class="jumbotron">
                        <a href="/question/{{$cr->question_id}}">
                            <p style=" font-size: 40px;border-radius: 20px;display: inline;"       >{{$cr->posted_by}}</p>
                            <h4 style="color: black">{{$cr->title}}</h4>
                            <p>{!!$cr->question!!}</p>
                            @foreach($answer as $a)

                                @if($cr->question_id==$a->question_id)
                                    <div  style="margin: 30px">
                                          <p style=" font-size: 40px;border-radius: 20px;display: inline;">{{$a->answered_by}}</p> 
                                    <p>{{$a->answer}}</p>
                                    </div>
                                @endif 
                    
                            @endforeach   
                        </a>
                    </div>    
                @endif    
            @endforeach
        @endif

        <!-- @foreach($question as $q)
        <a href="/question/{{$q->question_id}}">
            <div>
                <p style=" font-size: 40px;border-radius: 20px;display: inline;"       >{{$q->posted_by}}</p>
            <h4 style="color: black">{{$q->title}}</h4>
            <p>{!!$q->question!!}</p>
            @foreach($answer as $a)

                @if($q->question_id==$a->question_id)
                    <div  style="margin: 30px">
                          <p style=" font-size: 40px;border-radius: 20px;display: inline;">{{$a->answered_by}}</p> 
                    <p>{{$a->answer}}</p>
                    </div>
                @endif 
            
           @endforeach
        </div>
        </a>
        @endforeach
 -->


        

</div> 
@endsection