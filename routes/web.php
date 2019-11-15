<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Frontend
Route::get('/', 'FrontendController@index');
Route::get('/message/{slug}', 'FrontendController@message');
Route::get('/notice', 'FrontendController@notice');
Route::get('/about', 'FrontendController@about');
Route::get('/aboutsubmenu/{slug}', 'FrontendController@aboutsubmenu');
Route::get('/gallery', 'FrontendController@gallery');
Route::get('/blogs', 'FrontendController@blogs');
Route::get('/blogs/{slug}', 'FrontendController@blogsview');
Route::get('/career', 'FrontendController@career');
Route::get('/testimonials', 'FrontendController@testimonials');
Route::get('/contacts', 'FrontendController@contacts');
Route::post('/storecontacts', 'FrontendController@storecontacts');



// Backend
Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware'=> 'auth'] , function(){

Route::get('/logout','HomeController@logout');
Route::get('/viewadmin','HomeController@viewadmin');
Route::get('/addadmin', 'HomeController@addadmin');
Route::post('/storeadmin', 'HomeController@storeadmin');
Route::DELETE('/deleteadmin/{id}', 'HomeController@deleteadmin');


 Route::get('/admin',function(){
 	return view('cd-admin.admin');
 });


//Notices and Events
 Route::get('/notices','NoticeController@index');
 Route::get('/createnotice','NoticeController@create');
 Route::post('/storenotice','NoticeController@store');
 Route::get('/editnotice/{slug}','NoticeController@edit');
 Route::post('/updatenotice/{slug}','NoticeController@update');
 Route::post('/updatenoticestatus/{slug}','NoticeController@updatestatus');
 Route::DELETE('/deletenotice/{slug}','NoticeController@destroy');


 //Gallery
 Route::get('/galleries','GalleryController@index');
 Route::get('/creategallery','GalleryController@create');
 Route::post('/storegallery','GalleryController@store');
 Route::post('/updategallerystatus/{slug}','GalleryController@updatestatus');
 Route::DELETE('/deletegallery/{slug}','GalleryController@destroy');


//Career
 Route::get('/careers','CareerController@index');
 Route::get('/createcareer','CareerController@create');
 Route::post('/storecareer','CareerController@store');
 Route::get('/editcareer/{slug}','CareerController@edit');
 Route::post('/updatecareer/{slug}','CareerController@update');
 Route::post('/updatecareerstatus/{slug}','CareerController@updatestatus');
 Route::DELETE('/deletecareer/{slug}','CareerController@destroy');

 //Testimonials
 Route::get('/testimonial','TestimonialsController@index');
 Route::get('/createtestimonials','TestimonialsController@create');
 Route::post('/storetestimonials','TestimonialsController@store');
 Route::get('/edittestimonials/{slug}','TestimonialsController@edit');
 Route::post('/updatetestimonials/{slug}','TestimonialsController@update');
 Route::post('/updatetestimonialsstatus/{slug}','TestimonialsController@updatestatus');
 Route::DELETE('/deletetestimonials/{slug}','TestimonialsController@destroy');


//Contacts
Route::get('/contact', 'ContactController@index');
Route::get('/addcontact', 'ContactController@insertform');
Route::post('/storecontact', 'ContactController@store');
Route::DELETE('/deletecontact/{id}', 'ContactController@delete');
Route::post('/replystore/{id}', 'ContactController@replystore');
Route::get('/sentmessage', 'ContactController@sentmessage');
Route::get('/replymessage/{id}', 'ContactController@replyform');
Route::DELETE('/deletereply/{id}', 'ContactController@deletereply');

//Blog
 Route::get('/blog','BlogController@index');
 Route::get('/createblog','BlogController@create');
 Route::post('/storeblog','BlogController@store');
 Route::get('/editblog/{slug}','BlogController@edit');
 Route::post('/updateblog/{slug}','BlogController@update');
 Route::post('/updateblogstatus/{slug}','BlogController@updatestatus');
 Route::DELETE('/deleteblog/{slug}','BlogController@destroy');

//Management_Message
 Route::get('/managementmessage','MessageController@index');
 Route::get('/createmessage','MessageController@create');
 Route::post('/storemessage','MessageController@store');
 Route::get('/editmessage/{slug}','MessageController@edit');
 Route::post('/updatemessage/{slug}','MessageController@update');
 Route::post('/updatemessagestatus/{slug}','MessageController@updatestatus');
 Route::DELETE('/deletemessage/{slug}','MessageController@destroy');

 //Carousel
 Route::get('/carousel','CarouselController@index');
 Route::get('/createcarousel','CarouselController@create');
 Route::post('/storecarousel','CarouselController@store');
 Route::post('/updatecarouselstatus/{slug}','CarouselController@updatestatus');
 Route::DELETE('/deletecarousel/{slug}','CarouselController@destroy');

 //About
 Route::get('/abouts','AboutController@index');
 Route::get('/createabout','AboutController@create');
 Route::post('/storeabout','AboutController@store');
 Route::get('/editabout/{slug}','AboutController@edit');
 Route::post('/updateabout/{slug}','AboutController@update');
 Route::post('/updateaboutstatus/{slug}','AboutController@updatestatus');
 Route::DELETE('/deleteabout/{slug}','AboutController@destroy');

 //Our Goal
 Route::get('/goal','GoalController@index');
 Route::get('/creategoal','GoalController@create');
 Route::post('/storegoal','GoalController@store');
 Route::get('/editgoal/{slug}','GoalController@edit');
 Route::post('/updategoal/{slug}','GoalController@update');
 Route::post('/updategoalstatus/{slug}','GoalController@updatestatus');
 Route::DELETE('/deletegoal/{slug}','GoalController@destroy');


 //About Menu
 Route::get('/menu','MenuController@index');
 Route::get('/createmenu','MenuController@create');
 Route::post('/storemenu','MenuController@store');
 Route::get('/editmenu/{slug}','MenuController@edit');
 Route::post('/updatemenu/{slug}','MenuController@update');
 Route::post('/updatemenustatus/{slug}','MenuController@updatestatus');
 Route::DELETE('/deletemenu/{slug}','MenuController@destroy');

//Dashboard
Route::get('/dashboard','DashboardController@index');
Route::post('/storequickmail','DashboardController@store');
Route::get('/viewquickmail','DashboardController@viewquick');
Route::DELETE('/deletequick/{id}','DashboardController@deletequick');

// SEO-Section
Route::get('/viewseo','SeoController@index');
Route::get('/addseo','SeoController@insertform');
Route::post('/storeseo','SeoController@store');
Route::get('/editseo/{id}','SeoController@edit');
Route::post('/updateseo/{id}', 'SeoController@update');
Route::DELETE('/deleteseo/{id}','SeoController@delete');


});

