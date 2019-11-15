@extends('home-master')
@section('title',$seo->seotitle)
@section('description',$seo->seodescription)
@section('keywords',$seo->seokeyword)
@section('content')

<div class="container padding-tb">
			<div class="row">
				<div class="col-md-6">
					<div class="container-fluid">

						<div class="container-fluid pad-0 home-notice-title">
							<h4><i class="far fa-calendar-alt"></i>notice board</h4>
						</div>

						<div class="row">
							@foreach($notice as $n)
							@if($n->category=='Notice')
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
							@endif
							@endforeach
						</div>
						
					</div>
				</div>

				<div class="col-md-6">
					<div class="container-fluid">
						<div class="container-fluid pad-0 home-upcoming">
							<h4><i class="far fa-calendar-alt"></i>upcoming events</h4>
						</div>
						<div class="row">
							@foreach($notice as $n)
							@if($n->category=='Event')
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
							@endif
							@endforeach
						</div>

					</div>
					

				</div>
				
			</div>
		</div>

@endsection