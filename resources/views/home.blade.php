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
    
@forelse ($articles as $a)
  <div class="col-md-6">
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
  </div>
      @empty
@endforelse
  </div>
</div>
<div class="jumbotron">
  <div class="container">
    <div class="row">
  @forelse ($videos as $video)
      <div class="col-md-6">
            <video  poster="/image/large/{{ $video->thumb }}" width="100%" controls>
              <source src='/video/{{ $video->file_name }}' type="video/mp4">
            </video>
            <br>
            <br>
          <h3 class="media-heading">{{ strstr($video->original_name, '.', true) }}<small class="pull-right">{{ $video->created_at }}</small></h3>
      </div>
   @empty
@endforelse
    </div>
  </div>
</div>
@endsection