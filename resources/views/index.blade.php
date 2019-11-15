
@extends('home-master');
@section('content')
@section('title',$seo->seotitle)
@section('description',$seo->seodescription)
@section('keywords',$seo->seokeyword)
<!-- main carousel -->
<div class="container-fluid pad-0">
	<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

		<div class="carousel-inner home-carousel-bg">
			
			@foreach($carousel as $key => $c)
			<div class="{{ $key == 0 ? 'carousel-item active home-carousel-image' : 'carousel-item home-carousel-image' }}">
				<img class="d-block w-100" src="{{asset('public/uploads/'.$c->image)}}" alt="{{$c->imagedescription}}">
			</div>
			@endforeach

		</div>
		<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>

</div>


<!-- notice events section -->
<div class="container padding-tb">
	<div class="row">
		<div class="col-md-6">
			<div class="container-fluid">

				<div class="container-fluid pad-0 home-notice-title">
					<h4><i class="fa fa-file"></i>notice board</h4>
				</div>

				<div class="row">
					@foreach($notice as $n)
							<div class="col-md-3 home-notice-date">
								<h6>
								<?php
								$time = strtotime($n->noticedate);

								$newformat = date('M j',$time);

								echo $newformat; ?>
								</h6>
							</div>
							<div class="col-md-9 home-notice-body">
								<h5>{{$n->title}}</h5>
								<p>{!!$n->description!!}</p>
							</div>
							@endforeach
					
				</div>
				<div class="container-fluid home-upcoming-btn">
					<button type="button" class="btn btn-view1"><a href="{{url('/notice')}}">View all</a></button>
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="container-fluid">
				<div class="container-fluid pad-0 home-upcoming">
					<h4><i class="fa fa-file"></i>upcoming events</h4>
				</div>
				<div class="row">
					@foreach($event as $e)
							<div class="col-md-3 home-notice-date">
								<h6>
								<?php
								$time = strtotime($e->noticedate);

								$newformat = date('M j',$time);

								echo $newformat; ?>
								</h6>
							</div>
							<div class="col-md-9 home-notice-body">
								<h5>{{$e->title}}</h5>
								<p>{!!$e->description!!}</p>
							</div>
							@endforeach
						</div>
			</div>
			<div class="container-fluid home-upcoming-btn">
				<button type="button" class="btn btn-view1"><a href="{{url('/notice')}}">View all</a></button>
			</div>

		</div>

	</div>
</div>




<!-- home-today -->
<div class="container-fuild padding-tb home-today">
	<h6>today's thought</h6>
	<div class="home-thought-border"></div>
	<p>"It is not the strongest of the species that survives, nor the most intelligent, but the one most responsive to change."</p>
	<h4>charles darwin</h4>

</div>



<!-- home-views -->
<div class="container padding-tb">
	<div class="container-fluid home-views">
		<h4>views of our students</h4>
	</div>
	<div class="row">
		@foreach($blog as $b)
		<div class="col-md-4">
			<div class="container-fluid home-image-1">
				<img class="img-fluid" src="{{asset('public/uploads/'.$b->image)}}">
			</div>	
			<div class="container-fluid home-detail">
				<p>{{$b->summary}}</p>
			</div>
			<div class="container-fluid home-upcoming-btn">
				<button type="button" class="btn btn-view1"><a href="{{url('/blogs/'.$b->slug)}}">View</a></button>	
			</div>
		</div>
		@endforeach
	</div>
	<div class="container-fluid home-upcoming-btn padding-tb">
		<button type="button" class="btn btn-view1"><a href="{{url('/blogs')}}">View All</a></button>
	</div>
</div>






<!-- home-message -->
<div class="container-fluid padding-tb home-message">
	<div class="home-message1">
		<h4>message from school's management</h4>
	</div>
	<div class="container home-message-prin">
		<div class="row">
			@foreach($message as $m)
			<div class="col-md-6">
				<div class="home-message-image1 mx-auto d-block">
					<img class="img-fluid" src="{{asset('public/uploads/'.$m->image)}}">
				</div>
				<div class="home-message2">
					<h5>{!!$m->title!!}</h5>
					<p>{!!$m->summary!!}</p>
				</div>
				<div class="container-fluid home-upcoming-btn">
					<a href="{{url('/message/'.$m->slug)}}"><button type="button" class="btn btn-view1">read all</button></a>	
				</div>
			</div>
			@endforeach
		</div>
	</div>

</div>





<!-- home-frame -->
<div class="container padding-tb">
	<div class="row">
		@foreach($gallery as $g)
		<div class="col-md-3">
			<div class="home-frame">
				<img class="img-fluid" src="{{asset('public/uploads/'.$g->image)}}">
			</div>
		</div>
		@endforeach
	</div>
	<div class="container-fluid home-upcoming-btn home-gallery-button">
		<button type="button" class="btn btn-view1"><a href="{{url('/gallery')}}">View all</a></button>
	</div>	
</div>




<!-- home-admission -->
<div class="container-fluid padding-tb home-admission">
	<div class="row">
		<div class="col-md-6">
			<div class="container">
				<h5>learn about admission procedure</h5>
			</div>
		</div>

		<div class="col-md-6">
			<div class="container home-upcoming-btn">
				<a href="{{url('/about')}}"><button type="button" class="btn btn-view1">View all</button></a>
			</div>

		</div>
	</div>
</div>

@endsection


