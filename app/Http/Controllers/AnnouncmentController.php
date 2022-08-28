<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\announcment;


/**
 * 
 */
class AnnouncmentController extends Controller
{
	
	function __construct()
	{
		# code...
		$this->middleware('auth');
	}

	function create(){

		return view('upload.postAnnouncment');
	}

	function store(Request $request){
          $announcment=new announcment;
          $announcment->title=$request->title;
          $announcment->content=$request->content;
          $announcment->posted_for=$request->posted_for;
          $user=auth()->user();
          $announcment->posted_by=$user->id;
          $announcment->deadline=$request->deadline;
          $announcment->save();
          return redirect('/home/all')->with('success','Announcment posted successfully');
	}
}

