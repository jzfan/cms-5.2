@extends('frontend.layout')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			@forelse ($articles as $article)
			<div class="panel panel-default">
				<div class="panel-body">
					<img src="/img/page_img/{{ $article->
					page_img }}" class='img-responsive center-block'>
					<h3 class="text-center">{{ $article->title }}</h3>
					<p>{!! $article->content !!}</p>
					<p>
						分类: 
                    @forelse ($article->categories as $category)
						<span>{{ $category->name }}</span>
						@empty
                    @endforelse
					</p>
					<p>来源：{{ $article->source }}</p>
					<p>编辑：{{ $article->provider }}</p>
					<p>{{ $article->created_at }}</p>
				</div>
			</div>
			@empty
@endforelse
{!! $articles->links() !!}
		</div>
	</div>
</div>
@stop