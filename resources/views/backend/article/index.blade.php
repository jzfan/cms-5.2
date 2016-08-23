@extends('backend.layout')

@section('content-header')
	@include('backend.content-header', ['title' => '文章', 'add_link'=>'/backend/article/create'])
@stop

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
				<div class="box-header">
					<div class="box-tools">
						<div class="input-group">
							<input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search">
							<div class="input-group-btn">
								<button class="btn btn-sm btn-default"> <i class="fa fa-search"></i>
								</button>
							</div>
						</div>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body table-responsive">
					<table class="table table-hover">
						<thead>
							<tr role="row">
								<th class="sorting_asc">id</th>
								<th class="sorting">标题</th>
								<th class="sorting">概要</th>
								<th class="sorting">页头图片</th>
								<th class="sorting">归类</th>
								<th class="sorting">来源</th>
								<th class="sorting">提供者</th>
								<th class="sorting" colspan="2">操作</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($articles as $a)
							<tr role="row" class="article-tr">
								<td class="sorting_1">{{ $a->id }}</td>
								<td><a href='/article/{{ $a->id }}' target="_blank"> {{ $a->title }}</a></td>
								<td>{{ $a->summary }}</td>
								<td><img src='/image/small/{{ $a->page_img }}'></td>
								<td>{{ join(', ', $a->categories->lists('name')->toArray()) }}</td>
								<td>{{ $a->source }}</td>
								<td>{{ $a->provider }}</td>
								<td>
									<a href="/backend/article/{{ $a->id }}/edit" class='btn btn-link'>
										<i class="fa fa-edit"></i>
									</a>
									</td>
									<td>
										
									<form action='/backend/article/{{ $a->id }}' method="post">
										<input type="hidden" name="_method" value="delete"/>
										{!! csrf_field() !!}
										<button type='submit' class='btn btn-link delete-link'>
											<i class="fa fa-trash text-danger"></i>
										</button>
									</form>
									</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					{!! $articles->links() !!}
				</div>



		</div>
	</div>
	<!-- /.box-body -->
</div>

@stop

@section('js')
  @include('common.sweetalert.error')
  @include('common.sweetalert.session')
  @include('common.sweetalert.confirmDelete')
@stop