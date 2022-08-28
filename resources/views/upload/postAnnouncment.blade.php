@extends('layouts.napp')
@section('content')

<div id="main">
	<div class="jumbotron">
        <div class="card" style="text-align: center;">
            <div class="card-header">{{ __('Announcment') }}</div>
            <div class="card-body">
		        <form method="POST" action="{{ route('postAnnouncment') }}">
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
                            <label for="content" class="col-md-4 col-form-label text-md-right">{{ __('Content') }}</label>

                            <div class="col-md-6">
                                <input id="content" type="text" class="form-control @error('content') is-invalid @enderror" name="content" value="{{ old('content') }}" required autocomplete="content" autofocus>

                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Posted For') }}</label>

                            <div class="col-md-6">
                                <select id="posted_for" type="text" class="form-control @error('posted_for') is-invalid @enderror" name="posted_for" value="{{ old('posted_for') }}" required autocomplete="posted_for" autofocus>
                                    <option>All</option>
                                    <option>cse</option>
                                </select>
                                @error('posted_for')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="deadline" class="col-md-4 col-form-label text-md-right">{{ __('Deadline') }}</label>

                            <div class="col-md-6">
                                {{ $currentdate=date("Y")."-".date("m")."-".date("d")}}
                                <input id="deadline" type="date" min={{$currentdate}} class="form-control @error('deadline') is-invalid @enderror" name="deadline" value="{{ old('deadline') }}" required autocomplete="deadline" autofocus>

                                @error('deadline')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('postAnnouncment') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>    
            </div>    
	</div>
</div>

@endsection