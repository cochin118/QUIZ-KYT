<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\Manager; 
use App\Models\User;  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function index_manager()
    {
        $manager = Auth::user();
        return view('manager/mypage/mypage', ['manager' => $manager]);
    }

    /**
    * 編集画面の表示
    * 
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function edit_manager_info($id)
    {
        $manager = Manager::find($id);
        return view('manager.mypage.edit', compact('manager'));
    }
    /**
     * 編集画面の更新
    * 
    * @param \Illuminate\Http\Response $request
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function update_manager_info(Request $request,$id)
    {
        $inputs=$request->validate([
            
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],     //修正
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $manager = Manager::find($id);
        
        $manager->name = $inputs['name'];   
        $manager->email = $inputs['email'];    
        $manager->password = Hash::make($inputs['password']);
        $manager->save();

        return redirect ("manager/mypage/mypage");
    }

    //削除機能
    public function delete_manager_info($id)
    {
        // 削除対象レコードを検索
        $manager = Manager::find($id);
        // 削除
        $manager-> delete();
        // リダイレクト
        return redirect ("/");
    }


    public function index_user()
    {
        $user = Auth::user();
        return view('mypage/mypage', ['user' => $user]);
    }

    /**
    * 編集画面の表示
    * 
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function edit_user_info($id)
    {
        $user = User::find($id);
        return view('mypage.edit', compact('user'));
    }
    /**
     * 編集画面の更新
    * 
    * @param \Illuminate\Http\Response $request
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function update_user_info(Request $request,$id)
    {
        $inputs=$request->validate([
            
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],     //修正
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::find($id);
        
        $user->name = $inputs['name'];   
        $user->email = $inputs['email'];    
        $user->password = Hash::make($inputs['password']);
        $user->save();

        return redirect ("mypage/mypage");
    }

    //削除機能
    public function delete_user_info($id)
    {
        // 削除対象レコードを検索
        $user = User::find($id);
        // 削除
        $user-> delete();
        // リダイレクト
        return redirect ("/");
    }

}
