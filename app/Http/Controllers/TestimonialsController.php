<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Validation;
use DB;
use App\Testimonials;
use Carbon\Carbon;

class TestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use Validation;
    public function index()
    {
        $data = Testimonials::paginate(10);
        return view('cd-admin.Testimonials.testimonials',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view ('cd-admin.Testimonials.create-testimonials');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $a=[];
        $test = $this->testimonialsvalidation();
        $a['created_at'] = Carbon::now('Asia/Kathmandu');
        $a['slug'] = str_slug($test['name']);
        $merge = array_merge($test,$a);
        DB::table('testimonials')->insert($merge);
        return redirect('/testimonial')->with('success','Inserted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $data = DB::table('testimonials')->where('slug',$slug)->get()->first();
        return view('cd-admin.Testimonials.edit-testimonials',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($slug)
    {
        $a = [];
        $test = $this->testimonialsupdatevalidation();
        $a['updated_at'] = Carbon::now();
        $a['slug'] = str_slug($test['name']);
        $merge = array_merge($test,$a);
        DB::table('testimonials')->where('slug',$slug)->update($merge);
        return redirect('/testimonial')->with('success','Updated Successfully');
    }

    public function updatestatus($slug)
    {
      $a = [];
      $data = DB::table('testimonials')->where('slug',$slug)->get()->first();
      if($data->status=='Active')
      {
        $a['status'] = 'Inactive';
      }
      else
      {
        $a['status'] = 'Active'; 
      }
      DB::table('testimonials')->where('slug',$slug)->update($a);
      return redirect('/testimonial')->with('success','Status Updated Successfully');

     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
         DB::table('testimonials')->where('slug',$slug)->delete();
        return redirect('/testimonial')->with('error','Deleted Successfully');
    }
}
