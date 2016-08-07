@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <div class="panel-body">
                <img src="/img/page_img/{{ $article->page_img }}" class='img-responsive center-block'>
                <h3 class="text-center">{{ $article->title }}</h3>
                <p>
                    
                    {!! $article->content !!}
                </p>
                <p>
                    来源：{{ $article->source }}
                </p>
                <p>
                    编辑：{{ $article->provider }}
                </p>
                <p>
                    {{ $article->created_at }}
                    
                </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
