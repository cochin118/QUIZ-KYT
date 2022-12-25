<?php

namespace App\Http\Controllers;

use App\Models\Title;
use App\Models\Quiz;
use App\Models\Category;
use Illuminate\View\View;  
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
 
class TitleController extends Controller  
{
    protected function title_create_admin(Request $request)
    {
        $inputs=$request->validate([
            'title' => ['required', 'string', 'max:15'],
            'description' => ['required', 'string', 'max:20'],
        ]);
        
        $title = new Title();
        $title->title = $inputs['title'];
        $title->description = $inputs['description'];
        $title->save();

        return redirect ("admin/quiz/title/title_list");
    }

    protected function title_list_admin(Request $request): View 
    {
        $titles = Title::all();  
        return view("admin/quiz/title/title_list", ["titles" => $titles]);      
    }

    public function title_sort_admin(){

        $titles = Title::paginate(5);
        return view('admin/quiz/title/title_list',compact('titles'));
    }    

    protected function q_set_admin(Request $request,$id) 
    {
        $title = Title::find($id);
        $category_id = $request->category_id;
        $quiz_id = $title->quiz_id;

        if($category_id){
            $quizzes = Quiz::all();
            $categories = Category::find($category_id);
        }else{
            $quizzes = Quiz::all();
            $quiz_id = $title->quiz_id;
            $categories = Category::all();
        }
        return view('admin/quiz/title/q_set', compact('title'),["quizzes" => $quizzes,"categories" => $categories]);
            // "admin/quiz/title/q_set", compact('title'), ["quizzes" => $quizzes,"categories" => $categories]);      
    }

    /**
    * 出題の更新
    * 
    * @param \Illuminate\Http\Response $request
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    protected function set_admin(Request $request,$id) 
    {
        $title = Title::find($id);
        $quizzes = Quiz::all();
        $quiz_id = Quiz::all();
        $title->quizzes()->detach($quiz_id);
        foreach($quizzes as $quiz){
            $quiz_id = $request->quizid;
            $title->quizzes()->syncWithoutDetaching($quiz_id);
            $title->save();
    
        }

        // return redirect ("admin/quiz/title/title_list");
        return back()->with('message', '出題する問題を保存しました');
    }


    protected function q_set_search_admin(Request $request,$id) 
    {
        $title = Title::find($id);
        $category_id = $request->category_id;
        if(0!==$category_id){
            $quizzes = Quiz::all();
            $category = Category::find(1);
            $category_id = $request->input('category_id');
        }else{
            $quizzes = Quiz::all();
            $categories = Category::all();
        }
        return view('admin/quiz/title/q_set', compact('title'), compact('category'),["quizzes" => $quizzes,"categories" => $categories]);
            // "admin/quiz/title/q_set", compact('title'), ["quizzes" => $quizzes,"categories" => $categories]);      
    }



    // protected function q_set_admin(Request $request,$id) 
    // {
    //     $title = Title::find($id);
    //     $quizzes = Quiz::all();
    //     $categories = Category::all();
    //     $category_id = $request->input('category_id');
    //     return view('admin/quiz/title/q_set', compact('title'),["quizzes" => $quizzes,"categories" => $categories]);
    //         // "admin/quiz/title/q_set", compact('title'), ["quizzes" => $quizzes,"categories" => $categories]);      
    // }

    // protected function q_set_search_admin(Request $request,$id) 
    // {
    //     $title = Title::find($id);
    //     $quizzes = Quiz::all();
    //     $categories = Category::all();
    //     $query = Quiz::query();
    //     $category_id = $request->input('category_id');
    //     if (isset($category_id)) {
    //         $query->where('id', $category_id);
    //     }
    //     $quizzes = $query->orderBy('category_id', 'asc')->paginate(15);
    //     $category = new Category;

    //     return view('admin/quiz/title/q_set_search', compact('title'),["quizzes" => $quizzes,"categories" => $categories]);
    // }



    /**
    * 確認画面の表示&カテゴリ標示
    * 
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function title_q_check_admin($id)
    {
        $quiz = Quiz::find($id);        
        return view('admin/quiz/title/q_check', compact('quiz'));
    }
    /**
    * 編集画面の表示
    * 
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function title_edit_admin($id)
    {
        $title = Title::find($id);

        return view('admin/quiz/title/title_edit', compact('title'));
    }

    /**
    * 編集画面の更新
    * 
    * @param \Illuminate\Http\Response $request
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function title_update_admin(Request $request,$id)
    {
        $data=$request->validate([
            'title'=>'required|max:15',
            'description'=>'required|max:20',
        ]);

        $title = Title::find($id);
        $title->title = $request->title;     
        $title->description = $request->description;     
        $title->save();
   
        return redirect ("admin/quiz/title/title_list");

    }
    public function title_delete_admin(Request $request,$id)
    {
         // 削除対象レコードを検索
         $title = Title::find($id);
         $title-> delete();
         $quizzes = Quiz::all();
         $quiz_id = $title->quiz_id; 
         // 削除
         $title->quizzes()->detach($quiz_id);
         // リダイレクト
         return redirect ("admin/quiz/title/title_list");
    }

    // /**
    // * 編集画面の表示
    // * 
    // * @param int $id
    // * @return \Illuminate\Http\Response
    // */
    // public function check_admin($id)
    // {
    //     $title = Title::find($id);
    //     $quizzes = Quiz::all();
    //     $categories = Category::all();
    //     $quiz_id = Quiz::all();


    //     return view('admin/quiz/title/check', compact('title'), ["quizzes" => $quizzes,"categories" => $categories]);
    // }
    
    /**
    * 編集画面の表示
    * 
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function check_admin($id)
    {
        $title = Title::find($id);
        $quizzes = Quiz::all();
        $categories = Category::all();
        $quiz_id = Quiz::all();


        return view('admin/quiz/title/check', compact('title'), ["quizzes" => $quizzes,"categories" => $categories]);
    }
    // public function sort_check_admin($id){
    //     $title = Title::find($id);

    //     $quizzes = Quiz::paginate(5);
    //     return view('admin/quiz/title/check', compact('title'), ["quizzes" => $quizzes,"categories" => $categories]);
    // }    

    protected function title_create_manager(Request $request)
    {
        $inputs=$request->validate([
            'title' => ['required', 'string', 'max:15'],
            'description' => ['required', 'string', 'max:20'],
        ]);
        
        $title = new Title();
        $title->title = $inputs['title'];
        $title->description = $inputs['description'];
        $title->save();

        return redirect ("manager/quiz/title/title_list");
    }

    protected function title_list_manager(Request $request): View 
    {
        $titles = Title::all();  
        return view("manager/quiz/title/title_list", ["titles" => $titles]);      
    }

    public function title_sort_manager(){

        $titles = Title::paginate(5);
        return view('manager/quiz/title/title_list',compact('titles'));
    }    

    protected function q_set_manager(Request $request,$id) 
    {
        $title = Title::find($id);
        $category_id = $request->category_id;
        $quiz_id = $title->quiz_id;

        if($category_id){
            $quizzes = Quiz::all();
            $categories = Category::find($category_id);
        }else{
            $quizzes = Quiz::all();
            $quiz_id = $title->quiz_id;
            $categories = Category::all();
        }
        return view('manager/quiz/title/q_set', compact('title'),["quizzes" => $quizzes,"categories" => $categories]);
            // "manager/quiz/title/q_set", compact('title'), ["quizzes" => $quizzes,"categories" => $categories]);      
    }

    /**
    * 出題の更新
    * 
    * @param \Illuminate\Http\Response $request
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    protected function set_manager(Request $request,$id) 
    {
        $title = Title::find($id);
        $quizzes = Quiz::all();
        $quiz_id = Quiz::all();
        $title->quizzes()->detach($quiz_id);
        foreach($quizzes as $quiz){
            $quiz_id = $request->quizid;
            $title->quizzes()->syncWithoutDetaching($quiz_id);
            $title->save();
    
        }

        // return redirect ("manager/quiz/title/title_list");
        return back()->with('message', '出題する問題を保存しました');
    }


    protected function q_set_search_manager(Request $request,$id) 
    {
        $title = Title::find($id);
        $category_id = $request->category_id;
        if(0!==$category_id){
            $quizzes = Quiz::all();
            $category = Category::find(1);
            $category_id = $request->input('category_id');
        }else{
            $quizzes = Quiz::all();
            $categories = Category::all();
        }
        return view('manager/quiz/title/q_set', compact('title'), compact('category'),["quizzes" => $quizzes,"categories" => $categories]);
            // "manager/quiz/title/q_set", compact('title'), ["quizzes" => $quizzes,"categories" => $categories]);      
    }



    // protected function q_set_manager(Request $request,$id) 
    // {
    //     $title = Title::find($id);
    //     $quizzes = Quiz::all();
    //     $categories = Category::all();
    //     $category_id = $request->input('category_id');
    //     return view('manager/quiz/title/q_set', compact('title'),["quizzes" => $quizzes,"categories" => $categories]);
    //         // "manager/quiz/title/q_set", compact('title'), ["quizzes" => $quizzes,"categories" => $categories]);      
    // }

    // protected function q_set_search_manager(Request $request,$id) 
    // {
    //     $title = Title::find($id);
    //     $quizzes = Quiz::all();
    //     $categories = Category::all();
    //     $query = Quiz::query();
    //     $category_id = $request->input('category_id');
    //     if (isset($category_id)) {
    //         $query->where('id', $category_id);
    //     }
    //     $quizzes = $query->orderBy('category_id', 'asc')->paginate(15);
    //     $category = new Category;

    //     return view('manager/quiz/title/q_set_search', compact('title'),["quizzes" => $quizzes,"categories" => $categories]);
    // }



    /**
    * 確認画面の表示&カテゴリ標示
    * 
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function title_q_check_manager($id)
    {
        $quiz = Quiz::find($id);        
        return view('manager/quiz/title/q_check', compact('quiz'));
    }
    /**
    * 編集画面の表示
    * 
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function title_edit_manager($id)
    {
        $title = Title::find($id);

        return view('manager/quiz/title/title_edit', compact('title'));
    }

    /**
    * 編集画面の更新
    * 
    * @param \Illuminate\Http\Response $request
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function title_update_manager(Request $request,$id)
    {
        $data=$request->validate([
            'title'=>'required|max:15',
            'description'=>'required|max:20',
        ]);

        $title = Title::find($id);
        $title->title = $request->title;     
        $title->description = $request->description;     
        $title->save();
   
        return redirect ("manager/quiz/title/title_list");

    }
    public function title_delete_manager(Request $request,$id)
    {
         // 削除対象レコードを検索
         $title = Title::find($id);
         $title-> delete();
         $quizzes = Quiz::all();
         $quiz_id = $title->quiz_id; 
         // 削除
         $title->quizzes()->detach($quiz_id);
         // リダイレクト
         return redirect ("manager/quiz/title/title_list");
    }

    // /**
    // * 編集画面の表示
    // * 
    // * @param int $id
    // * @return \Illuminate\Http\Response
    // */
    // public function check_manager($id)
    // {
    //     $title = Title::find($id);
    //     $quizzes = Quiz::all();
    //     $categories = Category::all();
    //     $quiz_id = Quiz::all();


    //     return view('manager/quiz/title/check', compact('title'), ["quizzes" => $quizzes,"categories" => $categories]);
    // }
    
    /**
    * 編集画面の表示
    * 
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function check_manager($id)
    {
        $title = Title::find($id);
        $quizzes = Quiz::all();
        $categories = Category::all();
        $quiz_id = Quiz::all();


        return view('manager/quiz/title/check', compact('title'), ["quizzes" => $quizzes,"categories" => $categories]);
    }
    // public function sort_check_manager($id){
    //     $title = Title::find($id);

    //     $quizzes = Quiz::paginate(5);
    //     return view('manager/quiz/title/check', compact('title'), ["quizzes" => $quizzes,"categories" => $categories]);
    // }    





}