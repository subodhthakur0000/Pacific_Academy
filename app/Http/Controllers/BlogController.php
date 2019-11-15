<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Validation;
use App\Traits\Imagetrait;
use DB;
use App\Blog;
use Carbon\Carbon;

class BlogController extends Controller
{
		use Validation;
	    use Imagetrait;

        public function index()
	    {
	         $data = Blog::paginate(10);
	        return view('cd-admin.Blog.blog',compact('data'));
	    }


	     public function create()
		    {
		         return view ('cd-admin.Blog.create-blog');
		    }

		public function store()
	    {
	        $a=[];
	        $test = $this->blogvalidation();
	        $a['created_at'] = Carbon::now('Asia/Kathmandu');
       		$a['image'] = $this->imageupload($test['image']);
        	$a['slug'] = str_slug($test['title']);
	        $merge = array_merge($test,$a);
	        DB::table('blogs')->insert($merge);
	        return redirect('/blog')->with('success','Inserted Successfully');
	    }

	    public function edit($slug)
	    {
	        $data = DB::table('blogs')->where('slug',$slug)->get()->first();
	        return view('cd-admin.Blog.edit-blog',compact('data'));
	    }

	     public function update($slug)
	    {
	        $a = [];
	        $test = $this->blogupdatevalidation();
	        $a['updated_at'] = Carbon::now();
	        $a['image'] = $this->imageupload($test['image']);
        	$a['slug'] = str_slug($test['title']);
	        $merge = array_merge($test,$a);
	        	$imageunlink = DB::table('blogs')->where('slug',$slug)->get()->first();
				if(file_exists('public/uploads'.$imageunlink->image))
					{
						unlink('public/uploads'.$test->imageunlink);
					}
		        DB::table('blogs')->where('slug',$slug)->update($merge);
	        return redirect('/blog')->with('success','Updated Successfully');
	    }

	     public function updatestatus($slug)
	    {
	      $a = [];
	      $data = DB::table('blogs')->where('slug',$slug)->get()->first();
	      if($data->status=='Active')
	      {
	        $a['status'] = 'Inactive';
	      }
	      else
	      {
	        $a['status'] = 'Active'; 
	      }
	      DB::table('blogs')->where('slug',$slug)->update($a);
	      return redirect('/blog')->with('success','Status Updated Successfully');

	     }

	      public function destroy($slug)
		  {
		  	$imageunlink = DB::table('blogs')->where('slug',$slug)->get()->first();
			if(file_exists('public/uploads'.$imageunlink->image))
			{
				unlink('public/uploads'.$test->imageunlink);
			}
		    DB::table('blogs')->where('slug',$slug)->delete();
		    return redirect('/blog')->with('error','Deleted Successfully');
		  }
}
