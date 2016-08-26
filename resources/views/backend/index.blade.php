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
			<div class="box-body">
			@forelse ($article['list'] as $a)
			<h4>
				{{ $a->title }}
				<small class="pull-right">{{ $a->created_at }}</small>
			</h4>
			<hr>
				@empty
				无
			@endforelse
		</div>
		</div>
		<!-- /.box -->
	</div>
		<div class="col-md-4 col-sm-6 col-xs-12">
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title">最近用户</h3>
				<!-- /.box-tools -->
			</div>
			<div class="box-body">
			@forelse ($user['list'] as $u)
			<h4>
					{{ $u->name }}
				<small class="pull-right">{{ $u->created_at }}</small>
			</h4>
			<hr>
				@empty
				无
			@endforelse
			</div>

		</div>
		<!-- /.box -->
	</div>
		<div class="col-md-4 col-sm-6 col-xs-12">
		<div class="box box-danger">
			<div class="box-header with-border">
				<h3 class="box-title">最近视频</h3>
				<!-- /.box-tools -->
			</div>
			<div class="box-body">
			@forelse ($video['list'] as $v)
					<div class="col-sm-6">
						<h4>
							{{ $v->original_name }}
						</h4>
						<p>
							{{ $v->created_at }}
						</p>
						
					</div>
					<div class="col-sm-6">
					<img src='/image/small/{{ $v->thumb }}'>
					</div>
					<hr class="col-md-12">
				@empty
				
 					无
			@endforelse
</div>
		</div>
		<!-- /.box -->
	</div>
</div>
@stop