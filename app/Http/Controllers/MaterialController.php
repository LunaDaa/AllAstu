<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\material;
use App\material_catagory;
use App\instructor_course;

class MaterialController extends Controller{
	function create(){
        $material_catagory=material_catagory::All();
        //specipic courses the instructor/user alloed to post/teachs
        //....
        $user=Auth()->user()->id;
        $course=instructor_course::where('instructor_id',$user)->get();

		return view('upload.uploadMaterial')->with('catagory',$material_catagory)->with('course',$course);
	}

	function store(Request $request){
		$material=new material;
		if($request->has('file')){
			$filename=$request->file->getClientOriginalName();
			$material->name=$filename;
			$request->file('file')->storeAs('public/materials',$filename);
			$material->src=$request->file('file')->storeAs('public/materials',$filename);
		}
        
        $material->course=$request->course;
		$material->catagory=$request->catagory;
		if($request->has('description')){
           $material->description=$request->description;
		}
		$material->posted_for=$request->posted_for;

		$user=Auth()->user();
		$material->posted_by=$user->id;

		$material->save();
		return redirect('/file/all')->with('success','Material uploaded successfully');

	}
}