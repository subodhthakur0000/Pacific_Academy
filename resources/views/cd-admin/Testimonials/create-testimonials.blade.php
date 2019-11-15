@extends('cd-admin.admin')
@section('content')
<section class="content">
  <div class="row">
    <section class="content-header">
      <h1>
        Testimonials
        <small>Details</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-home"></i> Home</a></li>
        <li class="active"><a href="{{url('/testimonial')}}">Testimonials</a></li>
        <li class="active"><a href="{{url()->current()}}">Create Testimonial</a></li>
      </ol>
    </section><br>
        <div class="col-md-12">
         <div class="box">
          <div class="box-header">
            <h3 class="box-title">Create Testimonial</h3>
          </div>
          <form action="{{url('/storetestimonials')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Attestant Name</label>
                  <input type="text" class="form-control ui-datepicker" id="exampleInputEmail1" name="name" placeholder="Enter Name | maximum length 100 characters" value="{{old('name')}}" >
                  <div class="text text-danger">{{ $errors->first('name') }}</div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Description</label>
                  <textarea id="summernote" placeholder="Enter Description| maximum lenght 600 characters" name="description" >{{old('description')}}</textarea>
                  <div class="text text-danger">{{ $errors->first('description') }}</div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Status</label><br>
                  <input type="radio" name="status" checked value="Active"> Active &nbsp; &nbsp; &nbsp; &nbsp;
                  <input type="radio" name="status" value="Inactive"> Inactive
                </div>
                <div>
                  <button type="submit" class="btn btn-info" name="insert">Create </button>
                </div>
              </form>
              <a href="{{URL()->previous()}}"><button type="button" class="btn btn-default pull-right" data-dismiss="modal">Back</button></a>
            </div>

          </div>
    </div>
  </section> 


  @endsection