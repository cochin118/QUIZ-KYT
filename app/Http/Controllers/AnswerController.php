<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\Answer;
use App\Models\User;
use App\Models\Quiz;
use App\Models\Category;
use App\Models\Title;
use Illuminate\View\View;  
use Illuminate\Support\Facades\Storage;


class AnswerController extends Controller
{
    public function get_answer_admin($id): View  
    {        
        $user = User::find($id);

        $int=$id;
        $answers = Answer::whereHas('user', function($query)use ($int){
            $query->where('id', '=', $int);
        })->get();


        return view("admin/member/anshis", compact('user'), ["answers" => $answers]);  
    }

    public function get_answer_manager($id): View  
    {        
        $user = User::find($id);

        $int=$id;
        $answers = Answer::whereHas('user', function($query)use ($int){
            $query->where('id', '=', $int);
        })->get();


        return view("manager/member/anshis", compact('user'), ["answers" => $answers]);  
    }

    public function get_answer_user($id): View  
    {        
        $user = User::find($id);
        $int=$id;
        $answers = Answer::whereHas('user', function($query)use ($int){
            $answers = Answer::paginate(1);
            $query->where('id', '=', $int);
        })->get();


        return view("mypage/anshis", compact('user'), ["answers" => $answers]);  
    }
    public function sort_answer_user(){

        $answers = Answer::paginate(1);
        return view('mypage/anshis',compact('answers'));
    }
    

}
