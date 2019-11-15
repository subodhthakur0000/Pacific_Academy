@extends('home-master')
@section('title',$seo->seotitle)
@section('description',$seo->seodescription)
@section('keywords',$seo->seokeyword)
@section('content')

<div class="container">
	<div class="container-fluid padding-tb school-overview">
		<h4>{{$about->title}}</h4>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="container-fluid about-school-image">
				<img class="img-fluid" src="{{asset('public/uploads/'.$about->image)}}">
			</div>
		</div>
		<div class="col-md-6 about-school-description">
			<p>{!!$about->description!!}</p>
		</div>
	</div>

</div>



<div class="container padding-tb">
	<div class="row">
		@foreach($goal as $g)
		<div class="col-md-6 about-aim">
			<h5>{{$g->title}}</h5>
			<ul class="about-aim-points">
				<p>{!!$g->description!!}</p>
			</ul>
		</div>
	</div>
</div>


@endsection