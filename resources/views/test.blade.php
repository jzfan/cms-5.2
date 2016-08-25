
@extends('layouts.app')

@section('content')
<div class="container">
     <div class="row">
          <div class="col-md-8 col-md-offset-2">

    <h2>report </h2>

 <form action="/api/report" method="post" enctype="multipart/form-data">
     <label for="file">Filename:</label>
     <input type="file" name="file[]" /> 
     <br>
     <input type="file" name="file[]" /> 
     <br>
     name:
     <input type="text" name="name" id="input-name" /> 
     <br>
     qq:
     <input type="text" name="phone"  /> 
     <br>
     title:
     <input type="text" name="title"   /> 
     <br>
     content:
     <input type="text" name="content"   /> 
     <br />
     <input type="submit" name="submit"/>
 </form>
               
          </div>
     </div>
</div>
@stop