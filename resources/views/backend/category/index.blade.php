@extends('backend.layout')

@section('content-header')
	@include('backend.content-header', ['title' => '分类', 'add_link'=>'/backend/category/create'])
@stop

@section('content')
<div class="row">
@forelse ($categories as $category)
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box" data-id='{{ $category->id }}'>
            <span class="info-box-icon bg-{{ $bg[$category->id%7] }}" data-icon='{{ $category->icon }}'><i id='info-icon' class="{{ strstr($category->icon, '-', true).' '.$category->icon }}"></i></span>
            <div class="info-box-content">
            <table class="info-box-text">
            <tr>
              <td width="80%">
                
                <span id='info-name'>{{ $category->name }}</span>
              </td>
<td width="10%">
                <a href='#' class='edit-link'><i class="fa fa-edit"></i>&nbsp;&nbsp;&nbsp;&nbsp;</a>
  
</td>
<td width="10%">
  
                <form action='/backend/category/{{ $category->id }}' method="post">
                    <input type="hidden" name="_method" value="delete"/>
                    {!! csrf_field() !!}
                    <button type='submit' class='btn btn-link' onclick='return confirm("真的要删除吗？")'>
                      <i class="fa fa-trash text-danger"></i>
                    </button>
                </form>
</td>

            </tr>
                </table>
              <span class="info-box-text" id='info-desc'>{{ $category->description }}</span>
              <span class="info-box-number">{{ round( $category->articles()->count() / $total * 100 ) }}<small>%</small>&nbsp;&nbsp;&nbsp;&nbsp;{{ $category->articles()->count() }}<small>个</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        @empty
@endforelse
  </div>
<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="createModalLabel">新增分类</h4>
      </div>
      <div class="modal-body">
        <form id='form-add' action='/backend/category' method="post" class="form-horizontal">
        {!! csrf_field() !!}
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">名称</label>
                  <div class="col-sm-10">
                    <input type="text" name='name' class="form-control" id="inputName" placeholder="请输入...">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputIcon" class="col-sm-2 control-label">图标</label>
                  <div class="col-sm-10">
                    <input type="text" name='icon' class="form-control" id="inputIcon" placeholder="请输入...">
                    <br>
<p class='alert alert-info'><i class="icon fa fa-info"></i> 提示!
                     <a href="/backend/help/icon" target="_blank">点击查看各种图标</a>，选择输入图标名称。（ 比如："fa-fire" ）
</p>
                  </div>
                </div>               
                <div class="form-group">
                  <label for="inputDescription" class="col-sm-2 control-label">描叙</label>
                  <div class="col-sm-10">
                    <input type="text" name='id' class="form-control" id="inputDescription" placeholder="请输入...">
                  </div>
                </div>              
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="button" id='submit-btn' class="btn btn-warning">提交</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="createModalLabel">编辑分类</h4>
      </div>
      <div class="modal-body">
        <form id='form-edit' action='/backend/category/:ID' method="post" class="form-horizontal">
        <input type="hidden" name="_method" value='put'>
        {!! csrf_field() !!}
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">名称</label>
                  <div class="col-sm-10">
                    <input type="text" name='name' class="form-control" id="inputName" placeholder="请输入...">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputIcon" class="col-sm-2 control-label">图标</label>
                  <div class="col-sm-10">
                    <input type="text" name='icon' class="form-control" id="inputIcon" placeholder="请输入...">
                    <br>
<p class='alert alert-info'><i class="icon fa fa-info"></i>提示!
                     <a href="/backend/help/icon" target="_blank">点击查看各种图标</a>，选择输入图标名称。（ 比如："fa-fire" ）
</p>
                  </div>
                </div>               
                <div class="form-group">
                  <label for="inputDescription" class="col-sm-2 control-label">描叙</label>
                  <div class="col-sm-10">
                    <input type="text" name='description' class="form-control" id="inputDescription" placeholder="请输入...">
                  </div>
                </div>              
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="button" id='submit-btn2' class="btn btn-warning">提交</button>
      </div>
    </div>
  </div>
</div>
@stop

@section('js')
<script type="text/javascript">
//新增
  $('#add-link').on('click', function(e){
    e.preventDefault();
    $('#createModal').modal();
  });
  $('#submit-btn').on('click', function(){
    $('#createModal').modal('hide');
    $('#form-add').submit();
  });
//编辑
  $('.edit-link').on('click', function(e){
    e.preventDefault();
    var form = $('#form-edit');
    var category = $(this).closest('.info-box');
    var name = category.find('#info-name').text();
    var desc = category.find('#info-desc').text();
    var icon = category.find('.info-box-icon').data('icon');
    var id = category.data('id');
    console.log(icon);
    form.find('#inputName').val(name);
    form.find('#inputDescription').val(desc);
    form.find('#inputIcon').val(icon);
    var url = form.attr('action').replace(':ID', id);
    form.attr('action', url);

    $('#editModal').modal();
  });
  $('#submit-btn2').on('click', function(){
    $('#editModal').modal('hide');
    $('#form-edit').submit();
  });
</script>
@stop