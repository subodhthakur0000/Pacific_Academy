<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Validation;
use DB;
use App\Notice;
use Carbon\Carbon;

class NoticeController extends Controller
{
    use Validation;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Notice::paginate(10);
        return view('cd-admin.Notices_and_Events.view-notice',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('cd-admin.Notices_and_Events.add-notice');
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
        $test = $this->noticevalidation();
        $a['created_at'] = Carbon::now('Asia/Kathmandu');
        $a['slug'] = str_slug($test['title']);
        $merge = array_merge($test,$a);
        DB::table('notices')->insert($merge);
        return redirect('/notices')->with('success','Inserted Successfully');
        
    }

    public function edit($slug)
    {
        $data = DB::table('notices')->where('slug',$slug)->get()->first();
        return view('cd-admin.Notices_and_Events.edit-notice',compact('data'));
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
        $test = $this->noticeupdatevalidation();
        $a['updated_at'] = Carbon::now();
        $a['slug'] = str_slug($test['title']);
        $merge = array_merge($test,$a);
        DB::table('notices')->where('slug',$slug)->update($merge);
        return redirect('/notices')->with('success','Updated Successfully');
    }

    public function updatestatus($slug)
    {

      $a = [];
      $data = DB::table('notices')->where('slug',$slug)->get()->first();
      if($data->status=='Active')
      {
        $a['status'] = 'Inactive';
      }
      else
      {
        $a['status'] = 'Active'; 
      }
      DB::table('notices')->where('slug',$slug)->update($a);
      return redirect('/notices')->with('success','Status Updated Successfully');

     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        DB::table('notices')->where('slug',$slug)->delete();
        return redirect('/notices')->with('error','Deleted Successfully');
    }
}
