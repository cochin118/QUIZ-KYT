<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Category;
use App\Models\Title;
use Illuminate\View\View;  
use Illuminate\Support\Facades\Storage;


class QuizController extends Controller
{
    public function getAdmin(): View  
    {
        $admins = Admin::all();  
        return view("admin/manager", ["admins" => $admins]);  
    }
    
    public function getquiz_list_manager(): View  
    {
        $quizzes = Quiz::all();  
        return view("manager/quiz/quiz/q_list", ["quizzes" => $quizzes]);  
    }

    public function getquiz_list_admin(): View
    {
        $quizzes = Quiz::all();  
        return view("admin/quiz/quiz/q_list", ["quizzes" => $quizzes]);  
    }
    public function quiz_list_admin_sort(){

        $quizzes = Quiz::paginate(10);
        
        return view('admin/quiz/quiz/q_list',compact('quizzes'));
    }

    public function quiz_list_manager_sort(){

        $quizzes = Quiz::paginate(10);
        
        return view('manager/quiz/quiz/q_list',compact('quizzes'));
    }

    

    public function quiz_setlist(): View  
    {
        $quizzes = Quiz::all();  
        return view("admin/test", ["quizzes" => $quizzes]);  
    }


    public function getQuizzes($quiz_id)
    {
        $quizzes = Quiz::get();
        return view("quiz", ["quizzes" => $quizzes]);  
    }

    protected function create_admin(Request $request)
    {
        $category_id = $request->id;
        // $inputs=$request->validate([
        //     'id' => ['required', 'int', 'max:11'],
        // ]);
        // $category_id->category_id = $inputs['id'];

        $inputs=$request->validate([
            'pictures' => ['image', 'max:1024'],
            'name' => ['required', 'string', 'max:15'],
            'answer1' => ['required', 'string', 'max:255'],
            'answer2' => ['required', 'string', 'max:255'],
            'answer3' => ['required', 'string', 'max:255'],
            'answer4' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'int', 'max:11'],
            'description' => ['required', 'string', 'max:255'],
        ]);

        $quiz = new Quiz();
        if(request('pictures')){
            $original=request()->file('pictures')->getClientOriginalName();
            $name=date('Ymd_His').'_'.$original;
            $file=request()->file('pictures')->move('storage/images',$name);
            $quiz->pictures=date('Ymd_His').'_'.$original;
        }
        $quiz->name = $inputs['name'];
        $quiz->answer1 = $inputs['answer1'];
        $quiz->answer2 = $inputs['answer2'];
        $quiz->answer3 = $inputs['answer3'];
        $quiz->answer4 = $inputs['answer4'];
        $quiz->answer = $inputs['answer'];
        $quiz->description = $inputs['description'];
        $quiz->save();

        $quiz->categories()->syncWithoutDetaching($category_id);

        return redirect ("admin/quiz/quiz/q_list");
    }

    protected function create_manager(Request $request)
    {
        $category_id = $request->id;
        // $inputs=$request->validate([
        //     'id' => ['required', 'int', 'max:11'],
        // ]);
        // $category_id->category_id = $inputs['id'];

        $inputs=$request->validate([
            'pictures' => ['image', 'max:1024'],
            'name' => ['required', 'string', 'max:15'],
            'answer1' => ['required', 'string', 'max:255'],
            'answer2' => ['required', 'string', 'max:255'],
            'answer3' => ['required', 'string', 'max:255'],
            'answer4' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'int', 'max:11'],
            'description' => ['required', 'string', 'max:255'],
        ]);

        $quiz = new Quiz();
        if(request('pictures')){
            $original=request()->file('pictures')->getClientOriginalName();
            $name=date('Ymd_His').'_'.$original;
            $file=request()->file('pictures')->move('storage/images',$name);
            $quiz->pictures=date('Ymd_His').'_'.$original;
        }
        $quiz->name = $inputs['name'];
        $quiz->answer1 = $inputs['answer1'];
        $quiz->answer2 = $inputs['answer2'];
        $quiz->answer3 = $inputs['answer3'];
        $quiz->answer4 = $inputs['answer4'];
        $quiz->answer = $inputs['answer'];
        $quiz->description = $inputs['description'];
        $quiz->save();

        $quiz->categories()->syncWithoutDetaching($category_id);

        return redirect ("manager/quiz/quiz/q_list");
    }


    /**
    * 確認画面の表示&カテゴリ標示
    * 
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function q_check_admin($id)
    {
        $quiz = Quiz::find($id);        
        return view('admin/quiz/quiz/q_check', compact('quiz'));
    }
    
    /**
    * 確認画面の表示&カテゴリ標示
    * 
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function q_check_manager($id)
    {
        $quiz = Quiz::find($id);        
        return view('manager/quiz/quiz/q_check', compact('quiz'));
    }


    /**
    * 編集画面の表示
    * 
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function q_edit_admin($id)
    {
        $quiz = Quiz::find($id);
        $categories = Category::all();
        $category_id = $quiz->category_id;
        $quiz->categories()->syncWithoutDetaching($category_id);

        return view('admin/quiz/quiz/q_edit', compact('quiz'), ["categories" => $categories]);
    }

    /**
    * 編集画面の表示
    * 
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function q_edit_manager($id)
    {
        $quiz = Quiz::find($id);
        $categories = Category::all();
        $category_id = $quiz->category_id;
        $quiz->categories()->syncWithoutDetaching($category_id);

        return view('manager/quiz/quiz/q_edit', compact('quiz'), ["categories" => $categories]);
    }


    /**
    * 編集画面の更新
    * 
    * @param \Illuminate\Http\Response $request
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function q_update_admin(Request $request,$id)
    {
        $quiz = Quiz::find($id);
        // $category_id = $request->id;
        // $quiz->categories()->sync($category_id);

        $inputs=$request->validate([
            // 'pictures' => ['image', 'max:1024'],
            'name' => ['required', 'string', 'max:15'],
            'answer1' => ['required', 'string', 'max:255'],
            'answer2' => ['required', 'string', 'max:255'],
            'answer3' => ['required', 'string', 'max:255'],
            'answer4' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'int', 'max:11'],
            'description' => ['required', 'string', 'max:255'],
        ]);
        $path = $quiz->pictures;

        if(request('pictures')){
            \Storage::delete('storage/images/' , $path);

            $original=request()->file('pictures')->getClientOriginalName();
            $name=date('Ymd_His').'_'.$original;
            $file=request()->file('pictures')->move('storage/images',$name);
            $quiz->pictures=date('Ymd_His').'_'.$original;
        }


        // $pictures = $request->file('pictures');
        // $path = $quiz->pictures;
        // if (isset($pictures)) {
        //     Storage::disk('storage/image/')->delete($path);
        //     $path = $pictures->store('quizzes', 'pictures');
        // }
        
        // if(request('pictures')){
        //     $path = $quiz->pictures;
        //     \Storage::delete('storage/images/' , $path);
        //     $original=request()->file('pictures')->getClientOriginalName();
        //     $name=date('Ymd_His').'_'.$request;
        //     $file=request()->file('pictures')->move('storage/images',$name);
        //     $quiz->pictures=date('Ymd_His').'_'.$request;
        // }

        // $image = $request->file('pictures');
        // if(request('pictures')){
        //     // $inputs=$request->validate([
        //     //     'pictures' => ['image', 'max:1024'],]);
        //     $path = $quiz->pictures;
        //     \Storage::delete('storage/images/' , $path);
        //     // $original=$inputs->getClientOriginalName();
        //     // $name=date('Ymd_His').'_'.$original;
        //     // $file=request()->file('pictures')->move('storage/images',$name);
        //     // $quiz->pictures=date('Ymd_His').'_'.$original;
        //     $quiz = $image->move('storage/images');
        // }

        // if(request('pictures')){
        //     // $path = $quiz->pictures;
        //     // \Storage::delete('storage/images/' , $path);
        //     // $original=request()->file('pictures')->getClientOriginalName();
        //     $name=date('Ymd_His').'_'.request('pictures');
        //     $file=request()->file('pictures');
        //     $quiz=request()->file('pictures')->move('storage.images');

            // $file=request()->file('pictures')->move('storage/images'.$name);
            // $quiz = request()->store('pictures', 'storage/images');
            // $quiz->pictures=date('Ymd_His').'_'.$original;
            // $quiz->pictures=date('Ymd_His').'_'.request();
            

        //     // $name=date('Ymd_His').'_'.request();

        // //     // $file = $request->file('pictures')->move('storage/images',$name);
        // //     // $quiz->pictures=date('Ymd_His').'_'.request();
        // //     // \Storage::disk('public')->delete($path);

        // //     // $original=request()->file('pictures')->getClientOriginalName();
        // //     // $name=date('Ymd_His').'_'.$original;
        // //     // $name=date('Ymd_His').'_'.request();

        //     // $file=request()->file('pictures')->store('storage/images/',$name);
        //     // $quiz->pictures=date('Ymd_His').'_'.request();
        //     $quiz->save();
        // }

        // $quiz->answer1 = $inputs['answer1']; $request->answer1;  
        // $quiz->answer2 = $inputs['answer2'];$request->answer2; 
        // $quiz->answer3 = $inputs['answer3'];$request->answer3; 
        // $quiz->answer4 = $inputs['answer4'];$request->answer4; 
        // $quiz->answer = $inputs['answer'];$request->answer; 
        // $quiz->description = $inputs['description'];$request->description; 
        $quiz->name = $inputs['name'];
        $quiz->answer1 = $inputs['answer1']; 
        $quiz->answer2 = $inputs['answer2'];
        $quiz->answer3 = $inputs['answer3'];
        $quiz->answer4 = $inputs['answer4'];
        $quiz->answer = $inputs['answer'];
        $quiz->description = $inputs['description'];

        $quiz->save();

        return redirect ("admin/quiz/quiz/q_list");
        
    }

    /**
    * 編集画面の更新
    * 
    * @param \Illuminate\Http\Response $request
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function q_update_manager(Request $request,$id)
    {
        $quiz = Quiz::find($id);
        // $category_id = $request->id;
        // $quiz->categories()->sync($category_id);

        $inputs=$request->validate([
            // 'pictures' => ['image', 'max:1024'],
            'name' => ['required', 'string', 'max:15'],
            'answer1' => ['required', 'string', 'max:255'],
            'answer2' => ['required', 'string', 'max:255'],
            'answer3' => ['required', 'string', 'max:255'],
            'answer4' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'int', 'max:11'],
            'description' => ['required', 'string', 'max:255'],
        ]);

        if(request('pictures')){
            $path = $quiz->pictures;
            \Storage::delete('storage/images/' , $path);
            $original=request()->file('pictures')->getClientOriginalName();
            $name=date('Ymd_His').'_'.$request;
            $file=request()->file('pictures')->move('storage/images',$name);
            $quiz->pictures=date('Ymd_His').'_'.$request;
        }
        $quiz->name = $inputs['name'];
        $quiz->answer1 = $inputs['answer1']; 
        $quiz->answer2 = $inputs['answer2'];
        $quiz->answer3 = $inputs['answer3'];
        $quiz->answer4 = $inputs['answer4'];
        $quiz->answer = $inputs['answer'];
        $quiz->description = $inputs['description'];

        $quiz->save();

        return redirect ("manager/quiz/quiz/q_list");
        
    }


    /**
    * 編集画面の表示
    * 
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function q_category_edit_admin($id)
    {
        $quiz = Quiz::find($id);
        $categories = Category::all();

        return view('admin/quiz/quiz/q_category_edit', compact('quiz'), ["categories" => $categories]);
    }


    /**
    * 編集画面の表示
    * 
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function q_category_edit_manager($id)
    {
        $quiz = Quiz::find($id);
        $categories = Category::all();

        return view('manager/quiz/quiz/q_category_edit', compact('quiz'), ["categories" => $categories]);
    }

    /**
    * 編集画面の更新
    * 
    * @param \Illuminate\Http\Response $request
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function q_category_update_admin(Request $request,$id)
    {
        $quiz = Quiz::find($id);
        $category_id = $request->id;
        $quiz->categories()->sync($category_id);

        return back ();
        
    }

            /**
    * 編集画面の更新
    * 
    * @param \Illuminate\Http\Response $request
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function q_category_update_manager(Request $request,$id)
    {
        $quiz = Quiz::find($id);
        $category_id = $request->id;
        $quiz->categories()->sync($category_id);

        return back ();
        
    }



    public function q_delete_admin($id)
    {
         // 削除対象レコードを検索
         $quiz = Quiz::find($id);
         $categories = Category::all();
         $titles = Title::all();
         $category_id = $quiz->category_id; 
         $title_id = $quiz->title_id; 
         // 削除
         $quiz-> delete();
         $quiz->categories()->detach($category_id);
         $quiz->titles()->detach($title_id);
         // リダイレクト
         return redirect ("admin/quiz/quiz/q_list");
    }

    public function q_delete_manager($id)
    {
         // 削除対象レコードを検索
         $quiz = Quiz::find($id);
         $categories = Category::all();
         $titles = Title::all();
         $category_id = $quiz->category_id; 
         $title_id = $quiz->title_id; 
         // 削除
         $quiz-> delete();
         $quiz->categories()->detach($category_id);
         $quiz->titles()->detach($title_id);
         // リダイレクト
         return redirect ("manager/quiz/quiz/q_list");
    }


}
