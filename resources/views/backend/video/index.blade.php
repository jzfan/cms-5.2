@extends('backend.layout')

@section('content-header')
	@include('backend.content-header', ['title' => '视频', 'add_link'=>'#'])
@stop

@section('content')
<div class="row">

@forelse ($videoes as $video)
<div class="col-xs-6 col-md-4">
  
<div class="box box-solid">
  <table class="box-header with-border">
  <tr>
    <td width="80%">
      
    <i class="fa fa-image"></i>
    <h3 class="box-title">视频{{ $video->id }}</h3>
    </td>
    <td width="10%">
      <i class="fa fa-eye-open"></i><a href="/video/{{ $video->id }}" target="_blank">预览</a>
    </td>
    <td width="10%">
    <form action='/backend/video/{{ $video->id }}' method="post">
      <input type="hidden" name="_method" value="delete"/>
      {!! csrf_field() !!}
      <button type='submit' class='btn btn-link pull-right delete-link'>
        <i class="fa fa-trash text-danger"></i>
      </button>
    </form>
    </td>

  </tr>
  </table><!-- /.box-header -->
  <div class="box-body">
    <h3>{{ $video->original_name }}</h3>
    <p><img src="/video/{{ $video->thumb }}" class='img-responsive img-rounded'></p>
  </div><!-- /.box-body -->
</div>
</div>
  @empty
@endforelse
<div class="col-md-12">
  
<form class='dropzone' action='/backend/upload/video' method="POST" id='add-video'>
        {{ csrf_field() }}
</form>
</div>
</div>       
@stop

@section('js')
@include('common.sweetalert.error')
@include('common.sweetalert.session')
@include('common.sweetalert.confirmDelete')
<script type="text/javascript">
Dropzone.options.addVideo = {
        acceptFields : 'videos/mp4',
        dictDefaultMessage : '上传视频',
        sending: function(file, xhr, formData){
            formData.append('_token', "{!! csrf_token() !!}");
        },
        success: function(file, response){
          $('.dz-image img').attr('src', '/video/'+response+'.jpg').css('width', '100%').css('height', '100%');
        }
    };
</script>
@stop