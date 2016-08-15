@extends('frontend.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        @forelse ($articles as $a)
<div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">{{ $a->title }}</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
               <h4> <img src='/img/page_img/{{ $a->page_img }}' class='margin'>
                  {{ $a->content }}</h4>

                </div><!-- /.box-body -->
              </div>
@empty
@endforelse
{!! $articles->links() !!}
        </div>
    </div>
</div>
@endsection
