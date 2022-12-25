<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;  
use App\Models\Title;  
use App\Models\Quiz; 
use App\Models\Answer; 
use App\Models\User; 
use App\Models\Result; 
use Illuminate\Support\Facades\Auth;


class quiz_titleController extends Controller
{
    public function getTitles()
    {
        $titles = Title::all();
        return view("titles", ["titles" => $titles]);  
    }

    public function getQuiz($quiz_id)
    {
        $quiz = Quiz::find($quiz_id);
        return [
            "id" => $quiz->id,
            "pictures" => $quiz->pictures,
            "answer1" => $quiz->answer1,
            "answer2" => $quiz->answer2,
            "answer3" => $quiz->answer3,
            "answer4" => $quiz->answer4
        ];
    }
    public function gettitle_id($title_id)
    {
        $title = Title::find($title_id);
        $quiz = Title::with('quizzes')->find($title_id);
        $number = 0;

        $quizcount = $quiz->quizzes->count();

        if($quizcount==0){
            $titles = Title::all();
            return back()->with('message', '問題が設定されていませんでした');;
        }

         return view("quiz",compact('title','number') ,["quiz" => $quiz]);
    }

    public function check(Request $request,$id)
    {
        $title_id = $request->title;
        $number = $request->number; 
        $title = Title::find($title_id);      
        $quiz = Title::with('quizzes')->find($title_id);
        $number++;
        $check = $request->choice;
        $data = $request->answer;

        if($data==="1"){
            $exacto="answer1";
        }elseif($data==="2"){
            $exacto="answer2";
        }elseif($data==="3"){
            $exacto="answer3";
        }elseif($data==="4"){
            $exacto="answer4";
        }

        if($data===$check){
            $cf="正解";
        }else{
            $cf="不正解";
        }

        $user = Auth::user();
        $answer = new Answer();
        $answer->answer = $cf;
        $answer->user_id = $user->id;
        $answer->title_id = $title_id;
        $answer->quiz_id = $request->quiz;
        $answer->save();

        $result = new Result();
        $result->result = $cf;
        $result->num = $request->number+1;      
        $result->user_id = $user->id;
        $result->title_id = $title_id;
        $result->quiz_id = $request->quiz;
        $result->save();

        $quizcount = $quiz->quizzes->count();

        if($number==$quizcount){
                $user = Auth::user();
                $int = $user->id;
                $title_id = $request->title;
                $title = title::find($title_id);
                $results = Result::whereHas('user', function($query)use ($int){
                    $results = Result::paginate(1);
                    $query->where('id', '=', $int);
                })->get();
        
                return view('result', compact('user','title'), ["results" => $results]);
        }else{
            return view("check",compact('title','number','data','check','cf','exacto') ,["quiz" => $quiz]);
        }
    }


    public function gettitle_id2(Request $request,$id)
    {
        $title_id = $request->title;
        $number = $request->number; 
        $title = Title::find($title_id);      
        $quiz = Title::with('quizzes')->find($title_id);
        $user = Auth::user();

        return view("quiz2",compact('title','number') ,["quiz" => $quiz]);
        
    }

    public function get_result(Request $request,$id): View  
    {        
        $user = User::find($id);
        $int=$id;
        $title_id = $request->title;
        $title = title::find($title_id);
        $results = Result::whereHas('user', function($query)use ($int){
            $results = Result::paginate(1);
            $query->where('id', '=', $int);
        })->get();

        return view("result", compact('user','title'), ["results" => $results]);  
    }
    public function result_home(Request $request,$id): View  
    {    
        $user = User::find($id);
        $int=$id;

        $results = Result::whereHas('user', function($query)use ($int){
            $results = Result::paginate(1);
            $query->where('id', '=', $int);
        })->delete();
        $user = Auth::user();
        return view('home', ['user' => $user]);

    }
}