@extends('backend.layout')

@section('content-header')
	@include('backend.content-header', ['title' => '统计'])
@stop

@section('content')
<div class="row">
	<div class="col-md-4 col-sm-6 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon bg-aqua"> <i class="fa fa-file"></i>
			</span>
			<div class="info-box-content">
				<span class="info-box-text">文章</span>
				<span class="info-box-number">30天内：{{ $article['last30Days'] }}</span>
				<span class="info-box-number">总计：&nbsp;&nbsp;&nbsp;&nbsp;{{ $article['total'] }}</span>
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<div class="col-md-4 col-sm-6 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon bg-green"> <i class="fa fa-user"></i>
			</span>
			<div class="info-box-content">
				<span class="info-box-user">用户</span>
				<span class="info-box-number">30天内：{{ $user['last30Days'] }}</span>
				<span class="info-box-number">总计：&nbsp;&nbsp;&nbsp;&nbsp;{{ $user['total'] }}</span>
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<div class="col-md-4 col-sm-6 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon bg-red">
				<i class="fa fa-film"></i>
			</span>
			<div class="info-box-content">
				<span class="info-box-film">视频</span>
				<span class="info-box-number">30天内：{{ $video['last30Days'] }}</span>
				<span class="info-box-number">总计：&nbsp;&nbsp;&nbsp;&nbsp;{{ $video['total'] }}</span>
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<div class="col-md-4 col-sm-6 col-xs-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">最近文章</h3>
				<!-- /.box-tools -->
			</div>
			@forelse ($article['list'] as $a)
				<div class="box-body">{{ $a->title }}</div>
				@empty
				
				<div class="box-body">无</div>
			@endforelse
		</div>
		<!-- /.box -->
	</div>
		<div class="col-md-4 col-sm-6 col-xs-12">
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title">最近用户</h3>
				<!-- /.box-tools -->
			</div>
			@forelse ($user['list'] as $u)
				<div class="box-body">{{ $u->name }}</div>
				@empty
				
				<div class="box-body">无</div>
			@endforelse

		</div>
		<!-- /.box -->
	</div>
		<div class="col-md-4 col-sm-6 col-xs-12">
		<div class="box box-danger">
			<div class="box-header with-border">
				<h3 class="box-title">最近视频</h3>
				<!-- /.box-tools -->
			</div>
			@forelse ($video['list'] as $v)
				<div class="box-body">
					<div class="col-sm-6">
						{{ $v->original_name }}
						
					</div>
					<div class="col-sm-6">
					<img src='/image/small/{{ $v->thumb }}'>
					</div>
					</div>
				@empty
				
				<div class="box-body">无</div>
			@endforelse

		</div>
		<!-- /.box -->
	</div>
</div>
@stop