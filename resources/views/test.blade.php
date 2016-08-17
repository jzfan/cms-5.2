
@extends('backend.layout')

@section('content')
    <h2>Gallery Show</h2>


    <form class='dropzone' action='/backend/test/upload' method="POST" id='addImages'>
        {{ csrf_field() }}
    </form>
    <a href='/gallery' class='btn btn-primary'>BACK</a>
@stop

@section('js')
    <script type="text/javascript">
    Dropzone.options.addImages = {
        maxFilesize : 2,
        acceptedFiles: 'image/*',
        success: function(response){
        	console.log(response);
    };
    </script>
@stop