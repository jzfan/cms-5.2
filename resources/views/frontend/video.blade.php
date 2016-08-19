@extends('frontend.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <div class="panel-body">
                <h3 class="text-center">{{ $video->name }}</h3>
<video width="100%" controls="controls">
  <source src="/video/{{ $video->file_name }}" type="video/ogg">
Your browser does not support the video tag.
</video>

                <p>
                    {{ $video->created_at }}
                    
                </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
