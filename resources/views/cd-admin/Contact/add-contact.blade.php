@extends('cd-admin.admin')
@section('content')
<section class="content-header">
  <h1>
    Contact
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('/dashboard')}}"><i class="fa fa-envelope"></i> Home</a></li>
    <li class="active"><a href="{{url('/contact')}}">Contact</a></li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <!-- quick email widget -->
        <div class="box box-info">
          <div class="box-header">
            <i class="fa fa-envelope"></i>
            <h3 class="box-title">Add Contact</h3>
          </div>
          <div class="box-body">
            <form action="{{url('/storecontact')}}" method="post">
              @csrf
              <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{old('name')}}">
                <div class="text text-danger">{{ $errors->first('name') }}</div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Enter Email" value="{{old('email')}}">
                <div class="text text-danger">{{ $errors->first('email') }}</div>
              </div>
              <div class="form-group">
                <input type="number" class="form-control" name="mobilenumber" placeholder="Enter Mobile Number" value="{{old('mobilenumber')}}">
                <div class="text text-danger">{{ $errors->first('mobilenumber') }}</div>
              </div>
              <div>
                <textarea class="textarea" placeholder="Message" name="message" 
                style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{old('message')}}</textarea>
                <div class="text text-danger">{{ $errors->first('message') }}</div>
              </div>
              <input type="hidden" class="form-control" name="status"  value="Not Replied">
              <div class="box-footer clearfix">
              <button type="submit" class="pull-right btn btn-default" id="sendEmail">Send
              <i class="fa fa-arrow-circle-right"></i></button>
            </div>
            </form>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>
 @endsection