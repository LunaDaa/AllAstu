@extends('layouts.napp')

@section('content')

    <div id="main">
        <div class="jumbotron">
            <div class="card" style="text-align: center;">
                <div class="card-header">{{ __('Upload file') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('uploadFile') }}" enctype="multipart/form-data" >
                        @csrf
                        
                        <div class="form-group row">
                            <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('File') }}</label>

                            <div class="col-md-6">
                                <input id="file" type="file" class="form-control @error('file') is-invalid @enderror" name="file" value="{{ old('file') }}" required autocomplete="file" autofocus>

                                @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="course" class="col-md-4 col-form-label text-md-right">{{ __('Course') }}</label>

                            <div class="col-md-6">
                                <select id="course" type="text" class="form-control @error('course') is-invalid @enderror" name="course" value="{{ old('course') }}" autocomplete="course" autofocus>
                                    @if(count($course)>0)
                                       @foreach($course as $course)
                                          <option value="{{$course->course_id}}">{{$course->course_id}}</option>
                                       @endforeach
                                    @endif
                                
                                </select>
                                @error('course')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="catagory" class="col-md-4 col-form-label text-md-right">{{ __('Catagory') }}</label>

                            <div class="col-md-6">
                                <select id="catagory" type="text" class="form-control @error('catagory') is-invalid @enderror" name="catagory" value="{{ old('catagory') }}" required autocomplete="catagory">
                                
                                @if(count($catagory)>0)
                                   @foreach($catagory as $catagory)
                                      <option value="{{$catagory->name}}">{{$catagory->name}}</option>
                                   @endforeach
                                @endif      

                                @error('catagory')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description (optional)') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" autocomplete="description" autofocus>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="posted_for" class="col-md-4 col-form-label text-md-right">{{ __('Posted for') }}</label>

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
                                    {{ __('Upload') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
