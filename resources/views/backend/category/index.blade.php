@extends('backend.layout')

@section('content-header')
	@include('backend.content-header', ['title' => '分类', 'add_link'=>'/admin/category/create'])
@stop

@section('content')
<div class="row">
@foreach ($categories as $category)
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-{{ $bg[$category->id%7] }}"><i class="fa {{ $category->icon }}"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">{{ $category->name }}</span>
              <span class="info-box-text">{{ $category->description }}</span>
              <span class="info-box-number">90<small>%</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
@endforeach        
</div>
@stop