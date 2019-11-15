@extends('home-master')
@section('title',$seo->seotitle)
@section('description',$seo->seodescription)
@section('keywords',$seo->seokeyword)
@section('content')

<div class="container gallery-intro">
	<h4>a look into our environment</h4>
	<div class="row">
		@foreach($gallery as $g)
		<div class="col-md-3">
			<div class="gallery-image">
				<img class="img-fluid" src="{{asset('public/uploads/'.$g->image)}}">
			</div>
		</div>
		@endforeach
	</div>
</div>

@endsection