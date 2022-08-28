<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\student;
use App\department;
use App\announcment;
use App\student_course;

use App\material;

use App\school;

use App\question;
use App\answer;

use App\event;

use App\course;
use App\user;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    /*public function user_data(){
        //loged in user
        $user=auth()->user();
        $id=$user->id;
        //loged in student
        $student=student::where('id',$id)->first();
        $section=$student->section;
        //loged in student dept--and--section
        $dept=$user->dept_id;
        $department=department::where('dept_id',$dept)->first();
        $school=$department->school_id;
        // courses
           //student id froms tudent table
        $student_id=$student->student_id; 
           //list of course_instructors the student take form student_course table
        $student_course=student_course::where('student_id',$student_id)->get();
           
    }*/
    public function index($at)
    {   
        //loged in user
        $user=auth()->user();
        $id=$user->id;
        //loged in student
        $student=student::where('id',$id)->first();
        $section=$student->section;
        //loged in student dept--and--section
        $dept=$user->dept_id;
        //$department=department::where('dept_id',$dept)->first();
        //$school=$department->school_id;
        $school=department::where('dept_id',$dept)->first()->school_id;

        //announcments
                //posted_by stores id of users that posted, so the ff will retrieve the first name and last name of the posted_by by joining announcments table and users table
        $posted_by_names=DB::table('announcments')
                         ->join ('users','users.id','=','announcments.posted_by')
                         ->get('first_name','last_name'); 
        $ann_for_all=DB::table('announcments')
                         ->join ('users','users.id','=','announcments.posted_by')
                         ->where('posted_for','all')
                         ->get();                 

        //for all
       // $ann_for_all=announcment::where('posted_for','all')->get();
        //from school
        $ann_for_school=announcment::where('posted_for',$school)->get();
        //from dept
        $ann_for_dept=announcment::where('posted_for',$dept)->get(); //loading
        //from section
        $ann_section=$dept.'_'.$section;
        $ann_for_section=announcment::where('posted_for',$ann_section)->get();//loading
        //echo $ann_section;
        //from courses
           //student id froms tudent table
        $student_id=$student->student_id; 
           //list of course_instructors the student take form student_course table
        $student_course=student_course::where('student_id',$student_id)->get();
                //to get list of courses the sudent takes(course id)
        /*student_courses..(student id).....instructor_course_id
        instructor_course....course_id
        courses....name*/
        $inst_cr=DB::table('student_courses')
                    ->join('instructor_courses','student_courses.instructor_course_id','=','instructor_courses.instructor_course_id')
                    ->join('courses','courses.course_id','=','instructor_courses.course_id')
                    ->where('student_courses.student_id', $student_id)
                    ->get();

       /* $cr_n=DB::table($inst_cr) 
                ->join('courses','$inst_cr.course_id','=','courses.course_id')
                ->get('name');  */         

                    
           //list of announcments on the course insturactors from announcment table  

       $ann_for_courses = DB::table('announcments')
                       ->join('student_courses','student_courses.instructor_course_id', '=', 'announcments.posted_for')
                       ->where('student_courses.student_id', $student_id)
                       ->get();

                    
      //mark active tabs and sidebars
                       //$activetab='announcment';
  
                                    
         

        return view('index.announcment')->with('user',$user)->with('section',$section)->with('school',$school)->with('ann_for_all',$ann_for_all)->with('st',$inst_cr)->with('ann_for_school',$ann_for_school)->with('ann_for_dept',$ann_for_dept)->with('ann_for_section',$ann_for_section)->with('ann_for_courses',$ann_for_courses)
        //active tab
        ->with('active_tab',$at)
        ->with('active_menu','announcment');
    }

    public function file($active_tab){
        //logged in user
        $user=Auth()->user();
        $id=$user->id;

        //logged in student id
        $student=student::where('id',$id)->first();
        //logged in student dept and school
        $dept=$user->dept_id;
        $school=department::where('dept_id',$dept)->first()->school_id;
        //section
        $section=$student->section;
        //logged in student courses
          //student id
          $student_id=$student->student_id;
          //list of courses the student takes
                 //will be done later together
          //....for sidebar
           $inst_cr=DB::table('student_courses')
                    ->join('instructor_courses','student_courses.instructor_course_id','=','instructor_courses.instructor_course_id')
                    ->join('courses','courses.course_id','=','instructor_courses.course_id')
                    ->where('student_courses.student_id', $student_id)
                    ->get();
       // return $school;
        

        
        //All
        $material_for_all=material::where('posted_for','all')->get();
        //school

        $material_for_school=material::where('posted_for',$school)->get();
        //dept
        $material_for_dept=material::where('posted_for',$dept)->get();
        //section
        $mat_section=$dept.'_'.$section;
        $material_for_section=material::where('posted_for',$mat_section)->get();
        //courses
        $material_for_courses=DB::table('materials')
                            ->join('student_courses','student_courses.instructor_course_id','=','materials.posted_for')
                            ->where('student_courses.student_id',$student_id)->get();



                            /*$imagick = new imagick('sample.pdf[0]'); // 0 specifies the first page of the pdf

$imagick->setImageFormat('jpg'); // set the format of the output image
header('Content-Type: image/jpeg'); // set the header for the browser to understand
echo $imagick; // display the image*/


        return view('index.file')->with('material_for_all',$material_for_all)->with('material_for_school',$material_for_school)->with('material_for_dept',$material_for_dept)->with('material_for_section',$material_for_section)->with('material_for_courses',$material_for_courses)->with('school',$school)->with('user',$user)->with('section',$section)->with('st',$inst_cr)
        ->with('active_tab',$active_tab)
        ->with('active_menu','file');
    }

    public function q_a($active_tab){
      /*for the side bar*/
      //logged in user
        $user=Auth()->user();
        $id=$user->id;

        //logged in student id
        $student=student::where('id',$id)->first();
        //logged in student dept and school
        $dept=$user->dept_id;
        $school=department::where('dept_id',$dept)->first()->school_id;
        //section
        $section=$student->section;
        //logged in student courses
          //student id
          $student_id=$student->student_id;
         $inst_cr=DB::table('student_courses')
                    ->join('instructor_courses','student_courses.instructor_course_id','=','instructor_courses.instructor_course_id')
                    ->join('courses','courses.course_id','=','instructor_courses.course_id')
                    ->where('student_courses.student_id', $student_id)
                    ->get();


      /*for the sidebar*/

      //all
      $question_for_all=question::where('posted_for','all')->get();
      //school
      $question_for_school=question::where('posted_for',$school)->get();
      //dept
      $question_for_dept=question::where('posted_for',$dept)->get();
                                                                     
      $q_a_section=$dept.'_'.$section;
      //section
      $question_for_section=question::where('posted_for',$q_a_section)->get();

      //courses
      $question_for_courses=DB::table('questions')
                            ->join('student_courses','student_courses.instructor_course_id','=','questions.posted_for')
                            ->where('student_courses.student_id',$student_id)->get();

        //$question=question::All();//->OrderBy('vote');
        $question=question::orderBy('created_at', 'desc')->get();


        //$answer=answer::All();//->OrderBy('vote');
        $answer=answer::orderby('vote','asc')->get();//not shure if this is working

        return view('index.q&a')->with('question_for_all',$question_for_all)->with('question_for_school',$question_for_school)->with('question_for_dept',$question_for_dept)->
        with('question_for_section',$question_for_section)->with('question_for_courses',$question_for_courses)->with('question',$question)
        ->with('answer',$answer)
        //for the sidebar
        ->with('school',$school)->with('user',$user)->with('section',$section)->with('st',$inst_cr)
        //to send active tab to te view
        ->with('active_tab',$active_tab)
        ->with('active_menu','q_a');
    }
    public function question($q_id){

      /*for the side bar*/
      //logged in user
        $user=Auth()->user();
        $id=$user->id;

        //logged in student id
        $student=student::where('id',$id)->first();
        //logged in student dept and school
        $dept=$user->dept_id;
        $school=department::where('dept_id',$dept)->first()->school_id;
        //section
        $section=$student->section;
        //logged in student courses
          //student id
          $student_id=$student->student_id;
        //logged in student courses
         $inst_cr=DB::table('student_courses')
                    ->join('instructor_courses','student_courses.instructor_course_id','=','instructor_courses.instructor_course_id')
                    ->join('courses','courses.course_id','=','instructor_courses.course_id')
                    ->where('student_courses.student_id', $student_id)
                    ->get();


      /*for the sidebar*/
        $question=question::where('question_id',$q_id)->first();
        $answers=answer::where('question_id',$q_id)->get();
        
        return view('index.question')->with('question',$question)->with('answers',$answers)
        //for the sidebar
        ->with('school',$school)->with('user',$user)->with('section',$section)->with('st',$inst_cr)
        ->with('active_menu','q_a');
    }

    public function event($active_tab){

    /*for the side bar*/
      //logged in user
        $user=Auth()->user();
        $id=$user->id;

        //logged in student id
        $student=student::where('id',$id)->first();
        //logged in student dept and school
        $dept=$user->dept_id;
        $school=department::where('dept_id',$dept)->first()->school_id;
        //section
        $section=$student->section;
        //logged in student courses
          //student id
          $student_id=$student->student_id;
        //logged in student courses
         $inst_cr=DB::table('student_courses')
                    ->join('instructor_courses','student_courses.instructor_course_id','=','instructor_courses.instructor_course_id')
                    ->join('courses','courses.course_id','=','instructor_courses.course_id')
                    ->where('student_courses.student_id', $student_id)
                    ->get();


      /*for the sidebar*/
      $currentdate=date("Y")."-".date("m")."-".date("d");
      //all
      $event_for_all=event::where('posted_for','all')->where('deadline','>',$currentdate)->get();
      //school
      $event_for_school=event::where('posted_for',$school)->where('deadline','>',$currentdate)->get();
      //dept
      $event_for_dept=event::where('posted_for',$dept)->where('deadline','>',$currentdate)->get();
      //section
      $event_sec=$dept.$section;
      $event_for_section=event::where('posted_for',$event_sec)->where('deadline','>',$currentdate)->get();
      //courses
      $event_for_courses=DB::table('events')
                         ->join('student_courses','student_courses.instructor_course_id','=','events.posted_for')
                         ->where('student_courses.student_id',$student_id)
                         ->where('deadline','>',$currentdate)->get();


        $event=event::orderBy('deadline', 'asc')->get();

        return view('index.event')->with('event_for_all',$event_for_all)->with('event_for_school',$event_for_school)->with('event_for_dept',$event_for_dept)->with('event_for_section',$event_for_section)->with('event_for_courses',$event_for_courses)
        ->with('events',$event)
        //for the sidebar
        ->with('school',$school)->with('user',$user)->with('section',$section)->with('st',$inst_cr)
        //to send active tab to te view
        ->with('active_tab',$active_tab)
        ->with('active_menu','event');
    }


    //view filter function
    public function filter(){
      //schools
      $school=school::All('school_id','name');
      //department
      $dept=department::All('dept_id','name');
      //section
      //course
      $course=course::All('course_id','name');
      //instructor
      /*$instructor=user::where('role',1)->get('id','first_name','last_name');*///this didnt work for some reason...get(first_name','last_name')..works but when the id is added it stops woeking
      $instructor=user::where('role',1)->get();


      return view('index.try')->with('school',$school)->with('dept',$dept)->with('course',$course)->with('instructor',$instructor);
    }

    //thumbnail
    public function thumbnail(){
      exec("convert input.pdf image.jpg");
      echo 'image-0.jpg';
      return response()->file('image-0.jpg');
    }

    public function viewdds(){
       //schools
      $school=school::All('school_id','name');
      return view('index.dds')->with('school',$school);
    }


    function fetch(Request $request)
    {
     $select = $request->get('select');
     $value = $request->get('value');
     $dependent = $request->get('dependent');
     $data = DB::table($dependent.'s')
       ->where($select, $value)
       // ->groupBy($dependent)
       ->get();
     $output = '<option value="">Select '.ucfirst($dependent).'</option>';
     foreach($data as $row)
     {
      $output .= '<option value="'.$row->dept_id.'">'.$row->name.'</option>';
     }
     echo $output;
    }
    
}
