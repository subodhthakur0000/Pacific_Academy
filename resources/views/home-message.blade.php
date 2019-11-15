
@extends('home-master')
@section('title',$message->seotitle)
@section('description',$message->seodescription)
@section('keywords',$message->seokeyword)
@section('content')


<div class="container padding-tb">
	<div class="home-message-image ">
		<img class="img-fluid" src="{{asset('public/uploads/'.$message->image)}}">
	</div>
</div>

<div class="container Message-title">
	<h2>{{$message->title}}</h2>
</div>

<div class="home-message-border"></div>

<div class=" container home-message-para">
	<p>{!!$message->description!!}</p>
</div>

@endsection
