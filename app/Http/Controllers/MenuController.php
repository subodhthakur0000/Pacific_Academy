<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Validation;
use DB;
use App\Menu;
use Carbon\Carbon;

class MenuController extends Controller
{
    use Validation;

    public function index()
    {
         $data = Menu::all();
        return view('cd-admin.About.About_Menu.menu',compact('data'));
    }

    public function create()
    {
         return view ('cd-admin.About.About_Menu.create-menu');
    }

    public function store()
    {
        $a=[];
        $test = $this->menuvalidation();
        $a['created_at'] = Carbon::now('Asia/Kathmandu');
        $a['slug'] = str_slug($test['title']);
        $merge = array_merge($test,$a);
        DB::table('menus')->insert($merge);
        return redirect('/menu')->with('success','Inserted Successfully');
    }

    public function edit($slug)
    {
        $data = DB::table('menus')->where('slug',$slug)->get()->first();
        return view('cd-admin.About.About_Menu.edit-menu',compact('data'));
    }

    public function update($slug)
    {
        $a = [];
        $test = $this->menuupdatevalidation();
        $a['updated_at'] = Carbon::now();
        $a['slug'] = str_slug($test['title']);
        $merge = array_merge($test,$a);
        DB::table('menus')->where('slug',$slug)->update($merge);
        return redirect('/menu')->with('success','Updated Successfully');
    }

    public function updatestatus($slug)
    {
      $a = [];
      $data = DB::table('menus')->where('slug',$slug)->get()->first();
      if($data->status=='Active')
      {
        $a['status'] = 'Inactive';
      }
      else
      {
        $a['status'] = 'Active'; 
      }
      DB::table('menus')->where('slug',$slug)->update($a);
      return redirect('/menu')->with('success','Status Updated Successfully');

     }

     public function destroy($slug)
    {
        DB::table('menus')->where('slug',$slug)->delete();
        return redirect('/menu')->with('error','Deleted Successfully');
    }
}
