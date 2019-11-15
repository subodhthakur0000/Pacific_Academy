
@extends('home-master')
@section('title',$seo->seotitle)
@section('description',$seo->seodescription)
@section('keywords',$seo->seokeyword)
@section('content')

<div class="container contacts-intro">
	<h1>Contacts</h1>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-6">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.099773904256!2d85.33122631465558!3d27.683310982801874!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19bfee42f241%3A0x1dec82c6abfb77d8!2sPACIFIC+ACADEMY!5e0!3m2!1sen!2snp!4v1527066171188" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>

		<div class="col-md-6">
			
			<form method="post" action="{{url('/storecontacts')}}">
				@csrf
				<div class="form-group">
					<input type="text" class="form-control" id="name" name="name"aria-describedby="emailHelp" placeholder="Enter Your Name" value="{{old('name')}}">
					<div class="text text-danger">{{ $errors->first('name') }}</div>
				</div>
				<div class="form-group">
					<input type="email" class="form-control" id="email" name="email"aria-describedby="emailHelp" placeholder="Enter Your Email" value="{{old('email')}}">
                <div class="text text-danger">{{ $errors->first('email') }}</div>
				</div>
				<div class="form-group">
					<input type="phone" class="form-control" id="phone" aria-describedby="emailHelp"  name="mobilenumber" placeholder="Enter Mobile Number" value="{{old('mobilenumber')}}">
                <div class="text text-danger">{{ $errors->first('mobilenumber') }}</div>
				</div>
				<div class="form-group">
					<textarea name="message"class="form-control" id="exampleFormControlTextarea1" rows="9" cols="20" placeholder="Type Your Message">{{old('message')}}</textarea>
					<div class="text text-danger">{{ $errors->first('message') }}</div>
				</div>
				<input type="hidden" class="form-control" name="status"  value="Not Replied">
				<div class="col-auto my-1">
					<button type="submit" class="btn btn-primary">Send</button>
				</div>
			</form>

		</div>
	</div>
</div>



@endsection

