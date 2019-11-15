<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Validation;
use App\Traits\Imagetrait;
use DB;
use App\Message;
use Carbon\Carbon;


class MessageController extends Controller
{
   		use Validation;
	    use Imagetrait;

        public function index()
	    {
	         $data = Message::all();
	        return view('cd-admin.Management_Message.message',compact('data'));
	    }


	     public function create()
		    {
		         return view ('cd-admin.Management_Message.create-message');
		    }

		public function store()
	    {
	        $a=[];
	        $test = $this->messagevalidation();
	        $a['created_at'] = Carbon::now('Asia/Kathmandu');
       		$a['image'] = $this->imageupload($test['image']);
        	$a['slug'] = str_slug($test['title']);
	        $merge = array_merge($test,$a);
	        DB::table('messages')->insert($merge);
	        return redirect('/managementmessage')->with('success','Inserted Successfully');
	    }

	    public function edit($slug)
	    {
	        $data = DB::table('messages')->where('slug',$slug)->get()->first();
	        return view('cd-admin.Management_Message.edit-message',compact('data'));
	    }

	     public function update($slug)
	    {
	        $a = [];
	        $test = $this->messageupdatevalidation();
	        $a['updated_at'] = Carbon::now();
	        $a['image'] = $this->imageupload($test['image']);
        	$a['slug'] = str_slug($test['title']);
	        $merge = array_merge($test,$a);

	        $imageunlink = DB::table('messages')->where('slug',$slug)->get()->first();
			if(file_exists('public/uploads'.$imageunlink->image))
			{
				unlink('public/uploads'.$test->imageunlink);
			}

	        DB::table('messages')->where('slug',$slug)->update($merge);
	        return redirect('/managementmessage')->with('success','Updated Successfully');
	    }

	     public function updatestatus($slug)
	    {
	      $a = [];
	      $data = DB::table('messages')->where('slug',$slug)->get()->first();
	      if($data->status=='Active')
	      {
	        $a['status'] = 'Inactive';
	      }
	      else
	      {
	        $a['status'] = 'Active'; 
	      }
	      DB::table('messages')->where('slug',$slug)->update($a);
	      return redirect('/managementmessage')->with('success','Status Updated Successfully');

	     }

	      public function destroy($slug)
		  {
		  	$imageunlink = DB::table('messages')->where('slug',$slug)->get()->first();
			if(file_exists('public/uploads'.$imageunlink->image))
			{
				unlink('public/uploads'.$test->imageunlink);
			}
		    DB::table('messages')->where('slug',$slug)->delete();
		    return redirect('/managementmessage')->with('error','Deleted Successfully');
		  }
}
