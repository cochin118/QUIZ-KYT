<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\View\View;  
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
 
class CategoryController extends Controller  
{
    public function getCategory_admin(): View  
    {
       $categories = Category::all();  
       return view("admin/quiz/category/category_list", ["categories" => $categories]);  
    }
    public function getCategory_manager(): View  
    {
       $categories = Category::all();  
       return view("manager/quiz/category/category_list", ["categories" => $categories]);  
    }

    public function Category_sort_admin(){

        $categories = Category::paginate(5);
        
        return view('admin/quiz/category/category_list',compact('categories'));
    }
    public function Category_sort_manager(){

        $categories = Category::paginate(5);
        
        return view('manager/quiz/category/category_list',compact('categories'));
    }


    protected function Category_create_admin(Request $request)
    {
        $inputs=$request->validate([
            'name' => ['required', 'string', 'max:15',],
        ]);
        
        $category = new Category();
        $category->name = $inputs['name'];
        $category->save();

        return redirect ("admin/quiz/category/category_list");
    }

    protected function Category_create_manager(Request $request)
    {
        $inputs=$request->validate([
            'name' => ['required', 'string', 'max:15',],
        ]);
        
        $category = new Category();
        $category->name = $inputs['name'];
        $category->save();

        return redirect ("manager/quiz/category/category_list");
    }

    /**
    * 編集画面の表示
    * 
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function edit_admin($id)
    {
        $category = Category::find($id);
        return view('admin/quiz/category/edit', compact('category'));
    }

        /**
    * 編集画面の表示
    * 
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function edit_manager($id)
    {
        $category = Category::find($id);
        return view('manager/quiz/category/edit', compact('category'));
    }

    /**
    * 編集画面の更新
    * 
    * @param \Illuminate\Http\Response $request
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function update_admin(Request $request,$id)
    {
        $data=$request->validate([
            'name'=>'required|max:15',
        ]);

        $category = Category::find($id);
        $category->name = $request->name;     
        $category->save();
   
        return redirect ("admin/quiz/category/category_list");
    }

    /**
    * 編集画面の更新
    * 
    * @param \Illuminate\Http\Response $request
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function update_manager(Request $request,$id)
    {
        $data=$request->validate([
            'name'=>'required|max:15',
        ]);

        $category = Category::find($id);
        $category->name = $request->name;     
        $category->save();
   
        return redirect ("manager/quiz/category/category_list");
    }

    public function delete_admin($id)
    {
         // 削除対象レコードを検索
         $category = Category::find($id);
         // 削除
         $category-> delete();
         // リダイレクト
         return redirect ("admin/quiz/category/category_list");
    }

    public function delete_manager($id)
    {
         // 削除対象レコードを検索
         $category = Category::find($id);
         // 削除
         $category-> delete();
         // リダイレクト
         return redirect ("manager/quiz/category/category_list");
    }

    public function getCategory_quizcreate_admin(): View  
    {
       $categories = Category::all();  
       return view("admin/quiz/quiz/q_create", ["categories" => $categories]);  
    }

    public function getCategory_quizcreate_manager(): View  
    {
       $categories = Category::all();  
       return view("manager/quiz/quiz/q_create", ["categories" => $categories]);  
    }


    public function getCategory_quizedit_admin(): View  
    {
       $categories = Category::all();  
       return view("admin/quiz/quiz/q_edit", ["categories" => $categories]);  
    }
    public function getCategory_quizedit_manager(): View  
    {
       $categories = Category::all();  
       return view("manager/quiz/quiz/q_edit", ["categories" => $categories]);  
    }




}