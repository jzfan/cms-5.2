@extends('backend.layout')

@section('css')
<!-- include summernote css/js-->
<link href="//cdn.bootcss.com/summernote/0.8.1/summernote.css" rel="stylesheet">
@stop

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
<div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">新增文章</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action='/admin/article' method="post" enctype ="multipart/form-data">
                	{!! csrf_field() !!}
                  <div class="box-body">
                    <div class="form-group">
                      <label for="title">标题</label>
                      <input type="text" class="form-control" id="title" name='title' placeholder="输入标题...">
                    </div>
                    <div class="form-group">
                      <label for="summary">概要</label>
                      <input type="text" class="form-control" id="summary" name='summary' placeholder="输入概要...">
                    </div>
                    <div class="form-group">
                      <label for="page_img">页头图片</label>
                      <input type="file" id="page_img" name='page_img'>
                      <p class="help-block">上传合适的图片作为文章页头.</p>
                    </div>
                  </div>
                    <div class="form-group">
<textarea id="summernote" name='content'>{{ old('content', '') }}</textarea>
                    </div>
					<div class="form-group">
                      <label>类别</label>
                      <select class="form-control" name='category'>
                      @foreach($categories as $c)
                        <option value='{{ $c->id }}'>{{ $c->name }}</option>
                      @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="source">来源</label>
                      <input type="text" class="form-control" id="source" name='source' placeholder="输入来源...">
                    </div>
                    <div class="form-group">
                      <label for="provider">提供者</label>
                      <input type="text" class="form-control" id="provider" name='provider' placeholder="输入提供者...">
                    </div>


                  <!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">提交</button>
                  </div>
                </form>
              </div>

		</div>
	</div>
</div>
@stop

@section('js')
<script src="//cdn.bootcss.com/summernote/0.7.1/summernote.min.js"></script>
<script src="//cdn.bootcss.com/summernote/0.8.1/lang/summernote-zh-CN.min.js"></script>
<script type="text/javascript">

  $('#summernote').summernote({
  	minHeight: 300,
  	lang: 'zh-CN'
  });
</script>
@stop