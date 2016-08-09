@extends('backend.layout')

@section('content-header')
	@include('backend.content-header', ['title' => '管理员', 'add_link' => '#'])
@stop

@section('content')
<div class="row">
@foreach ($admins as $admin)
<div class="col-md-3">
	<div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="/img/avatar/{{ $admin->user->avatar }}" alt="User profile picture">

              <h3 class="profile-username text-center">{{ $admin->user->name }}</h3>

              <p class="text-muted text-center">注册时间: {{ $admin->user->created_at }}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>性别：</b> <a class="pull-right">{{ $admin->user->gender }}</a>
                </li>
                <li class="list-group-item">
                  <b>邮箱</b> <a class="pull-right">{{ $admin->user->email }}</a>
                </li>
                <li class="list-group-item">
                  <b>电话</b> <a class="pull-right">{{ $admin->user->phone }}</a>
                </li>
              </ul>
<form action='/backend/admin/{{ $admin->id }}' method="post">
<input type="hidden" name="_method" value='delete'>
{!! csrf_field() !!}
              <button type='submit' class="btn btn-primary btn-block" @if($admin->id === 1) disabled @endif onclick='return confirm("真的要删除吗？")'>
              <i class="fa fa-trash"></i>        	
              	<b>取消权限</b>
              </button>
</form>
            </div>
            <!-- /.box-body -->
          </div>
</div>
@endforeach
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">添加管理员</h4>
      </div>
      <div class="modal-body">
      <div class="alert alert-info alert-dismissible">
                <h4><i class="icon fa fa-info"></i> 提示!</h4>
                请输入用户的 email 或者 ID . 
              </div>

        <form id='form-add' action='/backend/admin' method="post" class="form-horizontal">
        {!! csrf_field() !!}
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label">邮箱</label>

                  <div class="col-sm-10">
                    <input type="email" name='email' class="form-control" id="inputEmail" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputId" class="col-sm-2 control-label">ID</label>

                  <div class="col-sm-10">
                    <input type="text" name='id' class="form-control" id="inputId" placeholder="用户id">
                  </div>
                </div>              
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="button" id='submit-btn' class="btn btn-danger">提交</button>
      </div>
    </div>
  </div>
</div>

@stop

@section('js')
<script type="text/javascript">
	$('#add-link').on('click', function(e){
		e.preventDefault();
		$('#myModal').modal();
	});
	$('#submit-btn').on('click', function(){
		$('#myModal').modal('hide');
		$('#form-add').submit();
	});
</script>
@stop