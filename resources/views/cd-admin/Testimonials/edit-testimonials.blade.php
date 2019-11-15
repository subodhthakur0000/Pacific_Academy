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
        <li class="active"><a href="{{url()->current()}}">Edit Testimonial</a></li>
      </ol>
    </section><br>
        <div class="col-md-12">
         <div class="box">
          <div class="box-header">
            <h3 class="box-title">Edit Testimonial</h3>
          </div>
          <form action="{{url('/updatetestimonials',$data->slug)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Attestant Name</label>
                  <input type="text" class="form-control ui-datepicker" id="exampleInputEmail1" name="name" placeholder="Enter Title" value="{{$data->name}}" >
                  <div class="text text-danger">{{ $errors->first('name') }}</div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Description</label>
                  <textarea id="summernote" placeholder="Enter Description" name="description" >{{$data->description}}</textarea>
                  <div class="text text-danger">{{ $errors->first('description') }}</div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Status</label><br>
                  <input type="radio" name="status" <?php echo $data->status=='Active'?'checked':''?> value="Active"> Active &nbsp; &nbsp; &nbsp; &nbsp;
                  <input type="radio" name="status" <?php echo $data->status=='Inactive'?'checked':''?> value="Inactive"> Inactive
                </div>

                <div>
                  <button type="submit" class="btn btn-info" name="insert">Update</button>
                </div>
              </form>
              <a href="{{URL()->previous()}}"><button type="button" class="btn btn-default pull-right" data-dismiss="modal">Back</button></a>
            </div>

          </div>
    </div>
  </section> 


  @endsection