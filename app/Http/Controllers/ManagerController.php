<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;
use App\Models\Manager;  
use Illuminate\View\View;  
use Illuminate\Http\Request; 
 
class ManagerController extends Controller  
{
    
    
    protected function create_manager(Request $request)
    {
        $inputs=$request->validate([
            'man_num' => ['required', 'string', 'max:255', 'unique:managers'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],     //修正
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $manager = new Manager();
        $manager->man_num = $inputs['man_num'];
        $manager->name = $inputs['name'];   
        $manager->email = $inputs['email'];    
        $manager->password = Hash::make($inputs['password']);
        $manager->save();

        return redirect ("admin/manager");
    }

public function getManager_manager(): View  
{
    $managers = Manager::all();  
    return view("manager/manager/manager_list", ["managers" => $managers]);  
}

public function getManager(): View  
{
    $managers = Manager::all();  
    return view("admin/manager", ["managers" => $managers]);  
}
public function Manager_sort(){

    $managers = Manager::paginate(5);
    return view('admin/manager',compact('managers'));
}
public function Manager_sort_manager(){

    $managers = Manager::paginate(5);
    
    return view('manager/manager/manager_list',compact('managers'));
}

/**
* 編集画面の表示
* 
* @param int $id
* @return \Illuminate\Http\Response
*/
 public function edit($id)
 {
    $manager = Manager::find($id);
    return view('admin.manager.edit', compact('manager'));
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

     $manager = Manager::find($id);
     
     $manager->name = $request->name;   
     $manager->email = $request->email;    

     $manager->save();

     return redirect ("admin/manager");
 }

//削除機能
public function delete($id)
{
     // 削除対象レコードを検索
     $manager = Manager::find($id);
     // 削除
     $manager-> delete();
     // リダイレクト
     return redirect ("admin/manager");
}
}