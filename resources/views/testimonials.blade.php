
@extends('home-master')
@section('title',$seo->seotitle)
@section('description',$seo->seodescription)
@section('keywords',$seo->seokeyword)
@section('content')

<div class="container testimonials-some">
	<h2>Some of the Testimonials</h2>

	<div class="container">
		<div class="row">
			@foreach($testimonials as $t)
			<div class="col-md-4" style="margin-top: 20px;">
				<blockquote class="blockquote text-center">
					<p class="mb-0" style="text-align: justify;">{!!$t->description!!}</p>
					<footer class="blockquote-footer">{!!$t->name!!}</footer>
				</blockquote>
			</div>
			@endforeach
		</div>
	</div>
</div>

@endsection

