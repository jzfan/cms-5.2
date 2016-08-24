@extends('frontend.layout')

@section('content')
<div class="jumbotron" style="margin-top: -20px">
  <div class="container">
    <div class="row">
      <div class="col-md-4 text-center">

        <img src="/img/app.png" width="220"></div>
      <div class="col-md-6 col-md-offset-1 text-center" style="padding: 10% 0">
        <h1>APP 下载</h1>
        <a href="https://itunes.apple.com/us/app/id1147021967" class='btn btn-default btn-lg'> <i class='fa fa-apple'></i>
          iPhone
        </a>
        <a href="aaa" class='btn btn-success btn-lg'> <i class='fa fa-android'></i>
          Android
        </a>
        <a href="aaa" class='btn btn-info btn-lg'>
          <i class='fa fa-qrcode'></i>
          扫码下载
        </a>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
  <div class="col-md-12">
    
@forelse ($articles as $a)
      <div class="media">
        <div class="media-left">
            <img class="media-object" src="/image/medium/{{ $a->page_img }}">
        </div>
        <div class="media-body text-center" style="padding: 5% 0">
          <h3 class="media-heading"><a href="/article/{{ $a->id }}">{{ $a->title }}</a></h3>
          <p>{!! $a->summary !!}</p>
        </div>
      </div>
      <br>
      <hr>
      @empty
@endforelse
      <div class="media">
        <div class="media-left">
          <!-- <a href="#"> -->
            <!-- <img class="media-object" src="/image/medium/{{ $video->thumb }}"></a> -->
            <video src='/video/{{ $video->file_name }}' width="480" controls></video>
        </div>
        <div class="media-body text-center" style="padding: 5% 0">
          <h3 class="media-heading">{{ $video->original_name }}</h3>
          <p class="media-heading">{{ $video->created_at }}</p>
        </div>
      </div>
      <br>
    </div>
  </div>
</div>
@endsection