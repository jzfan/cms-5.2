@extends('backend.layout')

@section('content-header')
	@include('backend.content-header', ['title' => '视频', 'add_link'=>'#add'])
@stop

@section('content')
<div class="row">

@forelse ($videos as $video)
<div class="col-xs-6 col-md-4">
  
<div class="box box-solid">
  <table class="box-header with-border">
  <tr>
    <td width="80%">
      
    <i class="fa fa-image"></i>
    <h3 class="box-title">视频{{ $video->id }}</h3>
    </td>
    <td width="10%">
      <a href="/video/{{ $video->id }}" target="_blank" class="btn btn-buttom btn-default"><i class="fa fa-eye"></i> </a>
    </td>
    <td width="10%">
    <form action='/backend/video/{{ $video->id }}' method="post">
      <input type="hidden" name="_method" value="delete"/>
      {!! csrf_field() !!}
      <button type='submit' class='btn btn-buttom pull-right btn-default delete-link'>
        <i class="fa fa-trash text-danger"></i>
      </button>
    </form>
    </td>

  </tr>
  </table><!-- /.box-header -->
  <div class="box-body">
    <h3>{{ str_limit($video->original_name, 36) }}</h3>
    <br>
    <img src="/image/medium/{{ $video->thumb }}" class='img-responsive img-rounded center-block'>
    <br>
  </div><!-- /.box-body -->
</div>
</div>
  @empty
@endforelse

<div class="col-md-12" id='add'>
{!! $videos->links() !!}
  
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
        acceptedFiles: "video/mp4, video/mkv",
        dictDefaultMessage : '上传视频',
        sending: function(file, xhr, formData){
            formData.append('_token', "{!! csrf_token() !!}");
        },
        success: function(file, response){
          $('.dz-image img').attr('src', '/image/small/'+response+'.jpg').css('width', '100%').css('height', '100%');
        }
    };
</script>
@stop