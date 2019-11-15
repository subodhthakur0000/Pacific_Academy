@extends('home-master')
@section('title',$aboutsubmenu->seotitle)
@section('description',$aboutsubmenu->seodescription)
@section('keywords',$aboutsubmenu->seokeyword)
@section('content')


<div class="container-fluid padding-tb">
	<div class="container-fluid teaching">
			<h2>{!!$aboutsubmenu->title!!}</h2>
	</div>


	<div class="container header-teaching-1">
		<p>{!!$aboutsubmenu->description!!}</p>
	</div>
</div>



@endsection