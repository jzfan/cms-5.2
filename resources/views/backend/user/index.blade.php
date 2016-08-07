@extends('backend.layout')

@section('content-header')
	@include('backend.content-header', ['title' => '用户', 'add_link' => '/register'])
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
								<th class="sorting">头像</th>
								<th class="sorting">用户名</th>
								<th class="sorting">邮箱</th>
								<th class="sorting">性别</th>
								<th class="sorting">电话</th>
								<th class="sorting" colspan="2">操作</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($users as $u)
							<tr role="row">
								<td class="sorting_1">{{ $u->id }}</td>

								<td><img src='/img/avatar/{{ $u->avatar }}' width=45 class='img-circle'></td>
								<td>{{ $u->name }}</td>
								<td>{{ $u->email }}</td>
								<td>{{ $u->gender }}</td>
								<td>{{ $u->phone }}</td>
								<td>
									<a href="/admin/user/{{ $u->id }}/edit" class='btn btn-link'>
										<i class="fa fa-edit"></i>
									</a>
									</td>
									<td>
									<form action='/admin/user/{{ $u->id }}' method="post">
										<input type="hidden" name="_method" value="delete"/>
										{!! csrf_field() !!}
										<button type='submit' class='btn btn-link' onclick='return confirm("真的要删除吗？")'>
											<i class="fa fa-trash text-danger"></i>
										</button>
									</form>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					{!! $users->links() !!}
				</div>
			</div>

		</div>
	</div>
	<!-- /.box-body -->
</div>

@stop