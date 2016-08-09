@extends('backend.layout')

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
<div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">新增焦点图</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action='/backend/slider' method="post" enctype ="multipart/form-data">
                	{!! csrf_field() !!}
                  <div class="box-body">
                    <div class="form-group">
                      <label for="title">标题</label>
                      <input type="text" class="form-control" id="title" name='title' placeholder="输入标题...">
                    </div>
                    <div class="form-group">
                      <label for="link">链接</label>
                      <input type="text" class="form-control" id="link" name='link' placeholder="请输入链接地址...">
                    </div>
                    <div class="form-group">
                      <label for="img">图片</label>
                      <input type="file" id="img" name='img'>
                      <p class="help-block">上传合适的图片作为焦点图.</p>
                    </div>
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
