<?php

namespace App\Http\Controllers;

use App\Models\User;  
use App\Models\Quiz;  
use App\Models\Title;  
use App\Models\Category;  
use Illuminate\View\View;  
use Illuminate\Http\Request;
 
class UserController extends Controller  
{
    public function getUser_manager(): View  
    {
       $users = User::all();  
       return view("manager/member/member_list", ["users" => $users]);  
    }
    public function User_sort_manager(){

        $users = User::paginate(5);
        
        return view('manager/member/member_list',compact('users'));
    }
    /**
     * 編集画面の表示
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit_manager($id)
    {
        $user = User::find($id);  
        return view('manager.member.edit', compact('user'));
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
            'name'=>'required|max:255',
            'email'=>'required|max:255',
        ]);

        $user = User::find($id);
        
        $user->name = $request->name;
        $user->email = $request->email;       

        $user->save();

        return redirect ("manager/member/member_list");
    }

    public function delete_manager($id)//削除機能
    {
        // 削除対象レコードを検索
        $user = User::find($id);
        // 削除
        $user-> delete();
        // リダイレクト
        return redirect ("manager/member/member_list");
    }

    
    public function getUser(): View  
    {
       $users = User::all();  
       return view("admin/member", ["users" => $users]);  
    }
    public function User_sort(){

        $users = User::paginate(5);
        
        return view('admin/member',compact('users'));
    }
    

    /**
     * 編集画面の表示
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);  
        return view('admin.member.edit', compact('user'));
    }
    /**
     * 編集画面の更新
     * 
     * @param \Illuminate\Http\Response $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        $data=$request->validate([
            'name'=>'required|max:255',
            'email'=>'required|max:255',
        ]);

        $user = User::find($id);
        
        $user->name = $request->name;
        $user->email = $request->email;       

        $user->save();

        return redirect ("admin/member");
    }

    public function delete($id)//削除機能
    {
        // 削除対象レコードを検索
        $user = User::find($id);
        // 削除
        $user-> delete();
        // リダイレクト
        return redirect ("admin/member");
    }

    /**
     * 履歴画面の表示
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function anshis_admin($id)
    {
        $user = User::find($id);
        $titles = Title::all();
        $quizzes = Quiz::all();
        $categories = Category::all();

        return view('admin.member.anshis', compact('user'), ["quizzes" => $quizzes,"quizzes" => $quizzes,"categories" => $categories]);
    }


    /**
     * 履歴画面の表示
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function anshis_manager($id)
    {
        $user = User::find($id);
        $titles = Title::all();
        $quizzes = Quiz::all();
        $categories = Category::all();

        return view('manager.member.anshis', compact('user'), ["quizzes" => $quizzes,"quizzes" => $quizzes,"categories" => $categories]);
    }


}