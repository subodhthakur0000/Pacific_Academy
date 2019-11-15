	<body>


		<!-- subheader -->
		<div class="container subheader-padding">
			<div class="row">
				<div class="col-md-6">
					<div class="home-subheader-logo">
						<img class="img-fluid" src="{{asset('public/images/logo.jpg')}}">
					</div>
				</div>

				<div class="col-md-6">
					<div class="home-subheader-text">
						<h4>pacific academy</h4>
						<p>"achieve the best"</p>
					</div>
				</div>
			</div>
		</div>




		<!-- header -->
		<div class="container-fluid header-bg">
			<nav class="container navbar navbar-expand-lg navbar-light">

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
					<ul class="navbar-nav mx-auto header-menu">
						<li class="nav-item active">
							<a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
						</li>
						
						
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="{{url('/about')}}" id="navbarDropdownMenuLink"  aria-haspopup="true" aria-expanded="false">
								About <!-- dropdownlink -->
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								@php( $aboutsubmenu = \App\Menu::orderBy('created_at','desc')->where('status','Active')->get())
								@foreach($aboutsubmenu as $asm)
								<a class="dropdown-item" href="{{url('/aboutsubmenu/'.$asm->slug)}}">{{$asm->title}}</a>
								@endforeach
							</div>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="{{url('notice')}}">notice & events</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{url('/blogs')}}">Blogs</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{url('gallery')}}">gallery</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{url('/career')}}">career</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{url('/testimonials')}}">testimonials</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{url('/contacts')}}">contacts</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>