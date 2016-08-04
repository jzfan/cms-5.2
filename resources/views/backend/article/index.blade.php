@extends('backend.layout')

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Hover Data Table</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
					<div class="row">
						<div class="col-sm-6"></div>
						<div class="col-sm-6"></div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
								<thead>
									<tr role="row">
										<th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="id: activate to sort column descending" aria-sort="ascending">id</th>
										<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="标题: activate to sort column ascending">标题</th>
										<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="概要: activate to sort column ascending">概要</th>
										<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="来源: activate to sort column ascending">来源</th>
										<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="提供者: activate to sort column ascending">提供者</th>
									</tr>
								</thead>
								<tbody>
@foreach ($articles as $a)
									<tr role="row" class="odd">
										<td class="sorting_1">{{ $a->id }}</td>
										<td>{{ $a->title }}</td>
										<td>{{ $a->summary }}</td>
										<td>{{ $a->source }}</td>
										<td>{{ $a->provider }}</td>
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
	</div>
</div>
@stop