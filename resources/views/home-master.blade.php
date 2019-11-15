<!DOCTYPE html>
	<html>
	<head>
	<title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- font awesome css -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

		<!-- bootstrap css -->
		<link rel="stylesheet" type="text/css" href="{{asset('public/css/bootstrap.min.css')}}">

		<!-- global css -->
		<link rel="stylesheet" type="text/css" href="{{asset('public/css/style.css')}}">

		<!-- pagelevel css -->
		<link rel="stylesheet" type="text/css" href="{{asset('public/css/header.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('public/css/footer.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('public/css/home.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('public/css/about.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('public/css/teaching.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('public/css/history.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('public/css/notice.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('public/css/blog.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('public/css/gallery.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('public/css/career.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('public/css/testimonials.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('public/css/contacts.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('public/css/views.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('public/css/home-message.css')}}">


		<!-- google font css -->
		<link href="https://fonts.googleapis.com/css?family=Patua+One|Titillium+Web" rel="stylesheet">

		<!-- jquery js -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		
		{{-- bootstrap4 --}}
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</head>
@include('includes.header');
@yield('content')
@include('includes.footer');
