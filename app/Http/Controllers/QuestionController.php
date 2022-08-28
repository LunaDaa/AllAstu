<?php

namespace App\Http\Controllers;

use App\question;
use Illuminate\Http\Request;
use App\answer;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("upload.postQuestion");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $question=new question;
        $question->title=$request->title;
        $question->question=$request->question;
        $question->course_id=$request->course_id;
        $question->posted_for=$request->posted_for;
        $question->posted_by=Auth()->user()->id;

        $question->save();

        return redirect('/q&a/all')->with('success','Question posted successfully.') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(question $question)
    {
        //
    }
    public function vote($qa,$id,$type){
        if($qa=='q'){
            $thequestion=question::where('question_id',$id)->first();
            $thevote=$thequestion->vote;
            if ($type=='up') {
                # code...
                 $thenewvote=$thevote+1;
            }
            else{
                if($thevote==0){
                    return redirect('question/'.$id);
                }
                $thenewvote=$thevote-1;
            }
            $thequestion->vote=$thenewvote;
            $thequestion->save();
            return redirect('question/'.$id);
        }
        else{
           $theanswer=answer::where('answer_id',$id)->first();
           $thevote=$theanswer->vote;
           $q_id=$theanswer->question_id;//for the redirect
           if($type=='up'){
            $thenewvote=$thevote+1;
           }
           else{
            if($thevote==0){
                return redirect('question/'.$q_id);
            }
            $thenewvote=$thevote-1;
           }
           $theanswer->vote=$thenewvote;
           $theanswer->save();

           return redirect('question/'.$q_id);

        }
        

    }
    public function storeAnswer(Request $request,$id){
         $answer=new answer;
         $answer->answer=$request->answer;
         $answer->question_id=$id;
         $answer->answered_by=Auth()->user()->id;

         $answer->save();
         return redirect('/question/'.$id)->with('success','your answer is posted successfully');
     }
}
