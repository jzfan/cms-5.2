@extends('backend.layout')

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">

			<div class="box">
				<div class="box-header">
					<h3 class="box-title">文章列表</h3>
					&nbsp;&nbsp;&nbsp;
					<a href='/admin/article/create'> <i class="fa fa-plus"></i>
						<span>新增</span>
					</a>

<!-- 					<div class="box-tools">
						<div class="input-group">
							<input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search">
							<div class="input-group-btn">
								<button class="btn btn-sm btn-default"> <i class="fa fa-search"></i>
								</button>
							</div>
						</div>
					</div> -->
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
								<th class="sorting">操作</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($articles as $a)
							<tr role="row" class="article-tr">
								<td class="sorting_1">{{ $a->id }}</td>
								<td>{{ $a->title }}</td>
								<td>{{ $a->summary }}</td>
								<td><img src='/img/page_img/{{ $a->page_img }}' width=100></td>
								<td>{{ join(', ', $a->categories->lists('name')->toArray()) }}</td>
								<td>{{ $a->source }}</td>
								<td>{{ $a->provider }}</td>
								<td>
									<a href="/admin/article/{{ $a->id }}/edit">
										<i class="fa fa-edit"></i>
										<span>修改</span>
									</a>
									<form action='/admin/article/{{ $a->id }}' method="post">
										<input type="hidden" name="_method" value="delete"/>
										{!! csrf_field() !!}
										<button type='submit' onclick='return confirm("真的要删除吗？")'>
											<i class="fa fa-trash"></i>
											<span>删除</span>
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
	</div>
	<!-- /.box-body -->
</div>

@stop