<h1>
{{ $title }}列表
@if (isset($add_link))
<small><i class='fa fa-plus-circle text-primary'></i><a id='add-link' href='{{ $add_link }}'>新增</a></small>
@endif
</h1>
<ol class="breadcrumb">
<li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
<li class="active">Here</li>
</ol>