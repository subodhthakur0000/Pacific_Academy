
@extends('home-master')
@section('title',$seo->seotitle)
@section('description',$seo->seodescription)
@section('keywords',$seo->seokeyword)
@section('content')


<div class="container">
	<div class="container-fluid career-vacancy">
		<h4>vacancy</h4>
	</div>
	@foreach($career as $c)
	<div class="container-fluid">
		<div class="career-grade">
		<h5>{!!$c->title!!}</h5>
		</div>
		<div class="p">
		<p>{!!$c->description!!}</p>
		</div>
	</div>
	@endforeach



</div>






@endsection


