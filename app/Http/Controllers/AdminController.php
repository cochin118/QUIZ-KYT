<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\View\View;  
use Illuminate\Http\Request;
 
class AdminController extends Controller  
{
   public function getAdmin(): View  
   {
       $admins = Admin::all();  
       return view("admin/admin_list", ["admins" => $admins]);  
   } 

       /**
     * 編集画面の表示
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('admin.admin.edit', compact('admin'));
    }
    /**
     * 編集画面の更新
     * 
     * @param \Illuminate\Http\Response $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request,$id)
    // {
        
        // $data=$request->validate([
        //     'stu_num'=>'required|max:255',
        //     'name'=>'required|max:255',
        //     'email'=>'required|max:255',
        // ]);

    //     $admin = Admin::find($id);
        
    //     $admin->name = $request->name;      

    //     $admin->save();

    //     return redirect ("admin/admin_list");
    // }

   //削除機能
//    public function delete($id)
//    {
//         // 削除対象レコードを検索
//         $admin = Admin::find($id);
//         // 削除
//         $admin-> delete();
//         // リダイレクト
//         return redirect ("admin/manager");
//    }
}