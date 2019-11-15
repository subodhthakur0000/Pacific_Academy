
@extends('home-master')
@section('title',$seo->seotitle)
@section('description',$seo->seodescription)
@section('keywords',$seo->seokeyword)
@section('content')


<div class="container blog-paci">
	<h4>Pacific Academy</h4>
</div>
@foreach($blog as $b)
<div class="container-fluid pad-0 blog-pad">
	<div class="row">
		<div class="col-md-4">
			<div class="blog-image">
				<img class="img-fluid" src="{{asset('public/uploads/'.$b->image)}}">
			</div>
		</div>

		<div class="col-md-8 blog-detail">
			<h4>{{$b->title}}</h4>
		     <h6>
		     	<?php
					$time = strtotime($b->created_at);
					$newformat = date('M j',$time);
					echo $newformat; 
					?>			
			</h6>

			<p>{!!$b->summary!!}</p>

			<a href="{{url('blogs/'.$b->slug)}}"><button type="button" class="btn btn-blog">Read More</button></a>

		</div>
	</div>	
</div>
@endforeach


@endsection

