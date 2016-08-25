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
								<th class="sorting">内容</th>
								<th class="sorting">图片</th>
								<th class="sorting">QQ | 电话</th>
								<th class="sorting">投诉人</th>
								<th class="sorting">查看</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($reports as $report)
							<tr role="row" class="article-tr">
								<td class="sorting_1">{{ $report->id }}</td>
								<td>{{ $report->title }}</td>
								<td>{{ str_limit($report->content, 66) }}</td>
								<td><img src='/image/small/{{ $report->image }}'></td>
								<td>{{ $report->qq_or_phone }}</td>
								<td>{{ $report->name }}</td>
								<td>
									<button class="btn btn-link view-link" data-id='{{ $report->id }}' data-toggle="modal" data-target="#myModal">
											<i class="fa fa-eye text-info"></i>
									</button>

								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					{!! $reports->links() !!}
				</div>



		</div>
	</div>
	<!-- /.box-body -->
</div>

<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
      </div>
    </div>
  </div>
</div>
@stop

@section('js')
<script>
	$('.view-link').click(function (){
		var id = $(this).attr('data-id');
		$.get('/backend/report/' + id, {}, function(m){
			$('.modal-title').html(m.title + '<small class="pull-right">' + m.created_at + '</small>');
			$('.modal-body').html(m.content + '<br><br>');
			if (m.image != ''){
				$('.modal-body').append('<img src="/image/large/' + m.image + '" ><br>');
			}
			$('.modal-body').append('<br><br><p">'+ m.name +'&nbsp;&nbsp;&nbsp;&nbsp;'+ m.qq_or_phone +'</p>');
		});
	});
</script>
@stop