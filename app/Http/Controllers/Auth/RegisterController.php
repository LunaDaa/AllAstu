<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\student;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => "required_if:first_name,==,2",
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' =>['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            "year" => "required_if:role,==,2"
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        /*
        */
        /*student::create([
          'student_id' =>$data['student_id'],
          'year' => $data['year'],
          'section' =>$data['section']
        ]);*/
        /*return User::create([
            'first_name' => $data['first_name'],
            'last_name' =>$data['last_name'],
            'email' => $data['email'],
            'role'=>$data['role'],
            'dept_id'=>$data['dept_id'],
            'password' => Hash::make($data['password']),
        ]);*/
         $user=new User;
         $user->first_name=$data['first_name'];
         $user->last_name=$data['last_name'];
         $user->email=$data['email'];
         $user->role=$data['role'];
         $user->dept_id=$data['dept_id'];
         $user->password=Hash::make($data['password']);

         $user->save();

         $id=$user->id;
         
         $student =new student;
        $student->student_id =$data['student_id'];
          $student->year = $data['year'];
          $student->section =$data['section'];
          $student->id=$id;

          $student->save();

         Auth::login($user);


         /*$material->type=$request->input('type') ;
         $material->course=$request->input('course');
         $material->author=$request->input('author');
         //$material->src=$request->input('src');
        //$material->m_name=$request->input('m_name');
       
         $material->save();*/
    }
}
