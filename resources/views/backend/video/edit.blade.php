@extends('backend.layout')

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
<div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">编辑焦点图</h3>
                </div>
                <form role="form" action='/backend/video/{{ $video->id }}' method="post" enctype ="multipart/form-data">
                  <input type="hidden" name="_method" value='put'>
                	{!! csrf_field() !!}
                  <div class="box-body">
                    <div class="form-group">
                      <label for="title">标题</label>
                      <input type="text" class="form-control" id="title" name='title' placeholder="输入标题..." value='{{ old("title", $video->title) }}'>
                    </div>
                    <div class="form-group">
                      <label for="link">链接</label>
                      <input type="text" class="form-control" id="link" name='link' placeholder="输入概要..." value='{{ old("link", $video->link) }}'>
                    </div>
                    <div class="form-group">
                      <label>原图片</label>
                      <img src='{{ $video->img }}'>
                    </div>
                    <div class="form-group">
                      <label for="img">更新图片</label>
                      <input type="file" id="img" name='img'>
                    </div>
                  </div>
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">提交</button>
                  </div>
                </form>
		</div>
	</div>
</div>
  </div>
@stop