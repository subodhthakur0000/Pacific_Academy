<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carousel;
use App\Traits\Validation;
use App\Traits\Imagetrait;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use DB;

class CarouselController extends Controller
{
    use Validation;
    use Imagetrait;

    public function index()
    {
        $data = Carousel::orderby('created_at','desc')->get();
        return view('cd-admin.Carousel.carousel',compact('data'));
    }

    public function create()
    {
        return view('cd-admin.Carousel.create-carousel');
    }

    public function store()
    {
        $a=[];
        $test=$this->carouselvalidation();
        $a['created_at'] = Carbon::now('Asia/Kathmandu');
        $a['image'] = $this->imageupload($test['image']);
        $a['slug'] = str_slug($test['title']);
        $merge = array_merge($test,$a);
        DB::table('carousels')->insert($merge);
        return redirect('/carousel')->with('success','Inserted Successfully');
    }

    public function updatestatus($slug)
    {
      $a = [];
      $data = DB::table('carousels')->where('slug',$slug)->get()->first();
      if($data->status=='Active')
      {
        $a['status'] = 'Inactive';
      }
      else
      {
        $a['status'] = 'Active'; 
      }
      DB::table('carousels')->where('slug',$slug)->update($a);
      return redirect('/carousel')->with('success','Status Updated Successfully');

     }

     public function destroy($slug)
    {
      $imageunlink = DB::table('carousels')->where('slug',$slug)->get()->first();
      if(file_exists('public/uploads'.$imageunlink->image))
      {
        unlink('public/uploads'.$test->imageunlink);
      }
        DB::table('carousels')->where('slug',$slug)->delete();
        return redirect('/carousel')->with('error','Deleted Successfully');
    }
}
