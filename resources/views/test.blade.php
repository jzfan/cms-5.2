
@extends('layouts.app')

@section('content')
    <h2>report </h2>

 <form action="/api/report" method="post" enctype="multipart/form-data">
     <label for="file">Filename:</label>
     <input type="file" name="file" id="file" /> 
     <br>
     name:
     <input type="text" name="name" id="input-name" /> 
     <br>
     qq:
     <input type="text" name="qq_or_phone"  /> 
     <br>
     title:
     <input type="text" name="title"   /> 
     <br>
     content:
     <input type="text" name="content"   /> 
     <br />
     <input type="submit" name="submit"/>
 </form>

@stop