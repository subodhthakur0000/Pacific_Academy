<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Validation;
use DB;
use App\Career;
use Carbon\Carbon;

class CareerController extends Controller
{
    use Validation;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data = Career::paginate(10);
        return view('cd-admin.Career.career',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view ('cd-admin.Career.create-career');
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
        $test = $this->careervalidation();
        $a['created_at'] = Carbon::now('Asia/Kathmandu');
        $a['slug'] = str_slug($test['title']);
        $merge = array_merge($test,$a);
        DB::table('careers')->insert($merge);
        return redirect('/careers')->with('success','Inserted Successfully');
    }

   
    public function edit($slug)
    {
        $data = DB::table('careers')->where('slug',$slug)->get()->first();
        return view('cd-admin.Career.edit-career',compact('data'));
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
        $test = $this->careerupdatevalidation();
        $a['updated_at'] = Carbon::now();
        $a['slug'] = str_slug($test['title']);
        $merge = array_merge($test,$a);
        DB::table('careers')->where('slug',$slug)->update($merge);
        return redirect('/careers')->with('success','Updated Successfully');
    }

    public function updatestatus($slug)
    {
      $a = [];
      $data = DB::table('careers')->where('slug',$slug)->get()->first();
      if($data->status=='Active')
      {
        $a['status'] = 'Inactive';
      }
      else
      {
        $a['status'] = 'Active'; 
      }
      DB::table('careers')->where('slug',$slug)->update($a);
      return redirect('/careers')->with('success','Status Updated Successfully');

     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        DB::table('careers')->where('slug',$slug)->delete();
        return redirect('/careers')->with('error','Deleted Successfully');
    }
}
