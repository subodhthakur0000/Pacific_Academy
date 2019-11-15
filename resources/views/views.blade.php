
@extends('home-master')
@section('title',$blog->seotitle)
@section('description',$blog->seodescription)
@section('keywords',$blog->seokeyword)
@section('content')
<div class="container padding-tb">
	<div class="row">
		<div class="col-md-8">
			<div class="views-image">
				<img class="img-fluid" src="{{asset('public/uploads/'.$blog->image)}}">
				</div>
				<h3 >{{$blog->title}}</h3>
			<h6>
		     	<?php
					$time = strtotime($blog->created_at);
					$newformat = date('M j',$time);
					echo $newformat; 
					?>			
			</h6>
			<p class="mb-0" style="text-align: justify;">{!!$blog->description!!}</p>
				<blockquote class="blockquote text-center">
					<footer class="blockquote-footer">{!!$blog->name!!}</footer>
				</blockquote>
			
		</div>

		<div class="col-md-4">
			<h2>Blogs</h2>

			<ul>
			@php($data = \App\Blog::orderBy('created_at','desc')->where('status','Active')->get())
				@foreach($data as $d)				
				<li><a href="{{url('/blogs/'.$d->slug)}}">{!!str_limit($d->title,$limits='100')!!}</a></li>
				@endforeach				
			</ul>
		</div>
	</div>
	
</div>

@endsection

