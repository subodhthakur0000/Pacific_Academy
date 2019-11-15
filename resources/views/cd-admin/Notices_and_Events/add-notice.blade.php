@extends('cd-admin.admin')
@section('content')
<section class="content">
  <div class="row">
    <section class="content-header">
      <h1>
        Notice and Event
        <small>Details</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-home"></i> Home</a></li>
        <li class="active"><a href="{{url('/notices')}}">Notices and Events</a></li>
        <li class="active"><a href="{{url()->current()}}">Create Notice/Event</a></li>
      </ol>
    </section><br>
        <div class="col-md-12">
         <div class="box">
          <div class="box-header">
            <h3 class="box-title">Create Notice/Event</h3>
          </div>
          <form action="{{url('/storenotice')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control ui-datepicker" id="exampleInputEmail1" name="title" placeholder="Enter Title | maximum length 100 characters" value="{{old('title')}}" >
                  <div class="text text-danger">{{ $errors->first('title') }}</div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Category</label>
                  <select class="form-control" name="category" value="{{old('category')}}">
                    <option selected disabled = "disabled"value="">Select Notice/Event</option>
                    <option  value="Notice">Notice</option>
                    <option   value="Event">Event</option>
                  </select>
                  <div class="text text-danger">{{ $errors->first('category') }}</div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Description</label>
                  <textarea id="summernote" placeholder="Enter Description| maximum lenght 600 characters" name="description" >{{old('description')}}</textarea>
                  <div class="text text-danger">{{ $errors->first('description') }}</div>
                </div>
                <div class="form-group">
                <label>Notice/Event Date:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker" name="noticedate" placeholder="Enter Notice/Event Date">
                </div>
                  <div class="text text-danger">{{ $errors->first('noticedate') }}</div>
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