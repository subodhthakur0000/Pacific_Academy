<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use DB;
use Carbon\Carbon;
use App\Traits\Validation;

class FrontendController extends Controller
{
    use Validation;
    public function index(){
    	$carousel = DB::table('carousels')->where('status','Active')->get();
    	$notice = DB::table('notices')->orderBy('created_at','desc')->where('status','Active')->where('category','Notice')->take(2)->get();
    	$event = DB::table('notices')->orderBy('created_at','desc')->where('status','Active')->where('category','Event')->take(2)->get();
        $gallery = DB::table('galleries')->orderBy('created_at','desc')->where('status','Active')->take(4)->get();
        $message = DB::table('messages')->where('status','Active')->take(2)->get();
        $blog = DB::table('blogs')->orderBy('created_at','desc')->where('status','Active')->take(3)->get();
        $seo = DB::table('seos')->where('pagetitle','Home')->get()->first();

        return view('index',compact('carousel','notice','event','gallery','message','blog','seo'));
    }

    public function message($slug){
        $message = DB::table('messages')->where('slug',$slug)->get()->first();
        return view('home-message',compact('message'));
    }

    public function notice(){
    	$notice = DB::table('notices')->orderBy('created_at','desc')->where('status','Active')->get();
        $seo = DB::table('seos')->where('pagetitle','Notice')->get()->first();
    	return view('notice',compact('notice','seo'));
    }

    public function about(){
         $about =  DB::table('abouts')->where('status','Active')->get()->first();
         $goal = DB::table('goals')->orderBy('created_at','desc')->where('status','Active')->take(2)->get();
         $seo = DB::table('seos')->where('pagetitle','About')->get()->first();
    	return view('about',compact('about','goal','seo'));
    }

    public function aboutsubmenu($slug){
         $aboutsubmenu = DB::table('menus')->where('slug',$slug)->get()->first();
        return view('aboutsubmenu',compact('aboutsubmenu'));
    }

    public function gallery(){
        $gallery = DB::table('galleries')->orderBy('created_at','desc')->where('status','Active')->get();
        $seo = DB::table('seos')->where('pagetitle','Gallery')->get()->first();
    	return view('gallery',compact('gallery','seo'));
    }

    public function blogs(){
        $blog = DB::table('blogs')->orderBy('created_at','desc')->where('status','Active')->get();
        $seo = DB::table('seos')->where('pagetitle','Blog')->get()->first();
    	return view('blog',compact('blog','seo'));
    }

    public function blogsview($slug){
        $blog = DB::table('blogs')->where('slug',$slug)->get()->first();
        return view('views',compact('blog'));
    }

    public function career(){
        $career = DB::table('careers')->orderBy('created_at','desc')->where('status','Active')->get();
        $seo = DB::table('seos')->where('pagetitle','Career')->get()->first();
    	return view('career',compact('career','seo'));
    }

    public function testimonials(){
     $testimonials =  DB::table('testimonials')->orderBy('created_at','desc')->where('status','Active')->get();
     $seo = DB::table('seos')->where('pagetitle','Testimonials')->get()->first();
     return view('testimonials',compact('testimonials','seo'));
    }

    public function contacts(){
        $seo = DB::table('seos')->where('pagetitle','Contacts')->get()->first();
    	return view('contacts',compact('seo'));
    }

    public function storecontacts(){
        $a=[];
        $test=$this->contactvalidation();
        $a['created_at'] = Carbon::now('Asia/Kathmandu');
        $merge = array_merge($test,$a);
        DB::table('contacts')->insert($merge);
        return redirect('/contacts')->with('success','Message Sent Successfully');
    }
}
