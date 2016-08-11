@extends('backend.layout')

@section('content-header')
	@include('backend.content-header', ['title' => '焦点图', 'add_link'=>'/backend/slider/create'])
@stop

@section('content')
<div class="row">

@forelse ($sliders as $slider)
<div class="col-xs-6 col-md-4">
  
<div class="box box-solid">
  <table class="box-header with-border">
  <tr>
    <td width="80%">
      
    <i class="fa fa-image"></i>
    <h3 class="box-title">图{{ $slider->id }}</h3>
    </td>
    <td width="10%">
      
    <a href="/backend/slider/{{ $slider->id }}/edit" class='btn btn-link edit-link'><i class='fa fa-edit pull-right'></i></a>
    </td>
    <td width="10%">
    <form action='/backend/slider/{{ $slider->id }}' method="post">
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
    <h3>{{ $slider->title }}</h3>
    <p><img src="{{ $slider->img }}" class='img-responsive img-rounded'></p>
    <p>{{ $slider->link }}</p>
  </div><!-- /.box-body -->
</div>
</div>
  @empty
@endforelse
</div>       
@stop

@section('js')
@include('common.sweetalert.error')
@include('common.sweetalert.session')
@include('common.sweetalert.confirmDelete')
@stop