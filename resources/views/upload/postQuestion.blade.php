@extends('layouts.napp')

@section('content')
<div id="main">

    <!-- Main component for a primary marketing message or call to action -->
    <div class="jumbotron">
        <p>question and answer</p>



        <div id="form" class="card" id="ask" style="border-style: solid;">
        	<div class="card-header">Ask</div>
        		<div class="card-body" style="text-align: left;">
        			<form method="Post" action="{{route('postQuestion')}}">
        				@csrf
        				 <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="course_id" class="col-md-4 col-form-label text-md-right">{{ __('Course') }}</label>

                            <div class="col-md-6">
                                <input id="course_id" type="text" class="form-control @error('course_id') is-invalid @enderror" name="course_id" value="{{ old('course_id') }}" required autocomplete="course_id" autofocus>

                                @error('course_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="question" class="col-md-4 col-form-label text-md-right">{{ __('Question') }}</label>

                            <div class="col-md-6">
                                <textarea  id="article-ckeditor"  type="textaarea" class="form-control @error('question') is-invalid @enderror" name="question" value="{{ old('question') }}" required autocomplete="question" autofocus>
                                </textarea>
                                @error('question')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="posted_for" class="col-md-4 col-form-label text-md-right">{{ __('Post in') }}</label>

                            <div class="col-md-6">
                                <input id="posted_for" type="text" class="form-control @error('posted_for') is-invalid @enderror" name="posted_for" value="{{ old('posted_for') }}" required autocomplete="posted_for" autofocus>

                                @error('posted_for')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('post') }}
                                </button>
                            </div>
                        </div>
        	</form>
        	
        			
        	
        		
        	
        	
        </div>
    </div> 	
</div> 
@endsection