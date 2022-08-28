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

Route::get('/', function () {
    return view('welcome');
});

/*
//dynamic routing
Route::get('/users/{id}' ,function($id){
	return 'This is user '.$id;
});

Route::get('/users/{id}/{name}' ,function($id,$name){
    return 'This is the user '.$name.'with an id of'.$id;
});
*/
Route::get('/about',function(){
	return view('pages.about');
});

Route::get('/login','LoginController@');

//try
Route::get('/try','tryController@index');


Auth::routes();

Route::get('/home/{id}', 'HomeController@index')->name('home');
//Route::get('/home/{id}','HomeController@newindex');//new
Route::get('/file/{active_tab}','HomeController@file');
Route::get('/q&a/{active_tab}','HomeController@q_a');
Route::get('/question/{q_id}','HomeController@question');
Route::get('/event/{active_tab}','HomeController@event');
Route::get('/try','HomeController@viewdds');
Route::post('/try/fetch','HomeController@fetch')->name('try.fetch');
//post

Route::get('/postAnnouncment','AnnouncmentController@create');
Route::post('/postAnnouncment','AnnouncmentController@store')->name('postAnnouncment');
Route::get('/postQuestion','QuestionController@create');
Route::post('/postQuestion','QuestionController@store')->name('postQuestion');
Route::post('/postAnswer/{id}','QuestionController@storeAnswer')->name('postAnswer');
Route::get('/postEvent','EventController@create');
Route::get('/postFile','MaterialController@create');
Route::post('/uploadFile','MaterialController@store')->name('uploadFile');

//filter
Route::get('/filter','HomeController@filter');

//try
Route::get('/thumnail','HomeController@thumbnail');

//question and answer vote
Route::get('q_a_vote/{qa}/{id}/{type}','QuestionController@vote');
