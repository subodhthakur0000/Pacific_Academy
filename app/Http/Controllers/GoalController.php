<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Validation;
use DB;
use App\Goal;
use Carbon\Carbon;

class GoalController extends Controller
{
    use Validation;

    public function index()
    {
         $data = Goal::all();
        return view('cd-admin.About.Our_Goal.goal',compact('data'));
    }

    public function create()
    {
         return view ('cd-admin.About.Our_Goal.create-goal');
    }

    public function store()
    {
        $a=[];
        $test = $this->goalvalidation();
        $a['created_at'] = Carbon::now('Asia/Kathmandu');
        $a['slug'] = str_slug($test['title']);
        $merge = array_merge($test,$a);
        DB::table('goals')->insert($merge);
        return redirect('/goal')->with('success','Inserted Successfully');
    }

    public function edit($slug)
    {
        $data = DB::table('goals')->where('slug',$slug)->get()->first();
        return view('cd-admin.About.Our_Goal.edit-goal',compact('data'));
    }

    public function update($slug)
    {
        $a = [];
        $test = $this->goalupdatevalidation();
        $a['updated_at'] = Carbon::now();
        $a['slug'] = str_slug($test['title']);
        $merge = array_merge($test,$a);
        DB::table('goals')->where('slug',$slug)->update($merge);
        return redirect('/goal')->with('success','Updated Successfully');
    }

    public function updatestatus($slug)
    {
      $a = [];
      $data = DB::table('goals')->where('slug',$slug)->get()->first();
      if($data->status=='Active')
      {
        $a['status'] = 'Inactive';
      }
      else
      {
        $a['status'] = 'Active'; 
      }
      DB::table('goals')->where('slug',$slug)->update($a);
      return redirect('/goal')->with('success','Status Updated Successfully');

     }

     public function destroy($slug)
    {
        DB::table('goals')->where('slug',$slug)->delete();
        return redirect('/goal')->with('error','Deleted Successfully');
    }
}
