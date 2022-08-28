@extends('layouts.napp')
@section('content')

<a href="/postQuestion">Post Question</a>

@if($message=Session::get('success'))
         <div class="alert alert-success">
             <p>{{$message}}</p>
         </div>
      @endif

<div class="jumbotron">
  <p style=" font-size: 40px;border-radius: 20px;display: inline;"       >{{$question->posted_by}}</p>
  <h4>{{$question->title}}</h4>
  <p>{{$question->question}}</p>
  <div style="margin-left: 80%; margin-bottom: 2%">
  	<button type="button" onclick='window.location="{{ url('q_a_vote/'.'q/'.$question->question_id.'/up') }}"' class="btn btn-primary">Up</button>
    <p>{!!$question->vote!!}</p>
  	<button type="button" onclick='window.location="{{ url('q_a_vote/'.'q/'.$question->question_id.'/down') }}"' class="btn btn-primary">Down</button>
  </div>
</div>
   @if(count($answers)>0)
      @foreach($answers as $a)
       <div class="jumbotron" style="margin-left: 5%; margin-bottom: 2%;padding: 1%;border-radius: 1%">
            <p style=" font-size: 40px;border-radius: 20px;display: inline;">{{$a->answered_by}}</p>
            <p>{!!$a->answer!!}</p>
            <div style="margin-left: 90%;">
              <button class="btn btn-primary" type="button" onclick='window.location="{{ url('q_a_vote/'.'a/'.$a->answer_id.'/up') }}"'>Up</button>
              <p>{{$a->vote}}</p>
              <button class="btn btn-primary" type="button" onclick='window.location="{{ url('q_a_vote/'.'a/'.$a->answer_id.'/down') }}"'>Down</button>
            </div>  
        </div> 
      @endforeach
   @else
   <p>No answers given yet.do you want answer?</p>
   @endif

   <form method="Post" action="{{route('postAnswer',$question->question_id)}}">
    @csrf
    <div class="form-group row">
        <label for="answer" class="col-md-4 col-form-label text-md-right">{{ __('Your Answer') }}</label>

          <div class="col-md-6">
            <textarea  id="article-ckeditor"  type="textaarea" class="form-control @error('answer') is-invalid @enderror" name="answer" value="{{ old('answer') }}" required autocomplete="answer" autofocus>
            </textarea>
            @error('answer')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
    </div>
    
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
          <button type="submit" class="btn btn-primary">
            {{ __('Answer') }}
          </button>
        </div>
    </div>
  </form>

@endsection