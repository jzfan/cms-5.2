@extends('backend.layout')

@section('content')
<div class="row">
	<div class="col-xs-12">


		<div class="box">
<div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">编辑用户</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action='/backend/user/{{ $user->id }}' method="post" enctype ="multipart/form-data">
                  <input type="hidden" name="_method" value='put'>
                	{!! csrf_field() !!}
                  <div class="box-body">
                    <div class="form-group">
                      <label for="avatar">头像</label>
                      <img src='/img/avatar/{{ $user->avatar }}' width=45 class='img-circle'>
                      <input type="text" class="form-control" id="avatar" name='avatar' placeholder="输入头像.." value='{{ old("avatar", $user->avatar) }}'>
                    </div>
                    <div class="form-group">
                      <label for="name">用户名</label>
                      <input type="text" class="form-control" id="name" name='name' placeholder="输入标题..." value='{{ old("name", $user->name) }}'>
                    </div>

                    <div class="form-group">
                    <label for="gender">性别</label>&nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="radio" name="gender" value="保密" class="flat-red" @if( $user->gender === '保密' ) checked @endif/> 保密
                      <input type="radio" name="gender" value="男" class="flat-red" @if( $user->gender === '男' ) checked @endif/> 男
                      <input type="radio" name="gender" value="女" class="flat-red" @if( $user->gender === '女' ) checked @endif/> 女
                    </div>
                  </div>
                    <div class="form-group">
                      <label for="email">用户名</label>
                      <input type="email" class="form-control" id="email" name='email' placeholder="输入标题..." value='{{ old("email", $user->email) }}'>
                    </div>

                    <div class="form-group">
                      <label for="phone">电话</label>
                      <input type="text" class="form-control" id="phone" name='phone' placeholder="输入电话.." value='{{ old("phone", $user->phone) }}'>
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
<script src="/js/icheck.js"></script>
<script>
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

</script>
@stop