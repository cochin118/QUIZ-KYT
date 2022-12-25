<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\quiz_titleController;
use App\Http\Controllers\category_quiz_titleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;

use App\Models\Quiz;
use App\Models\AnswerHistory;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/admin/home', [App\Http\Controllers\admin\HomeController::class, 'index'])->name('admin/home');

Route::view('/manager/login', 'manager/login');
Route::post('/manager/login', [App\Http\Controllers\manager\LoginController::class, 'login']);
Route::view('/manager/logout', 'admmin/logout'); //山口追記
Route::get('/manager/logout', [App\Http\Controllers\LoginController::class, 'index']) -> name('manager/logout'); //山口追記
Route::post('/manager/logout', [App\Http\Controllers\manager\LoginController::class, 'logout']); //山口追記
Route::view('/manager/register', 'manager/register');
Route::post('/manager/register', [App\Http\Controllers\manager\RegisterController::class, 'register']);
Route::view('/manager/home', 'manager/home')->middleware('auth:manager');

Route::view('/admin/login', 'admin/login');
Route::post('/admin/login', [App\Http\Controllers\admin\LoginController::class, 'login']);
Route::view('/admin/logout', 'admmin/logout'); //山口追記
Route::get('/admin//logout', [App\Http\Controllers\LoginController::class, 'index']) -> name('admin/logout'); //山口追記
Route::post('/admin/logout', [App\Http\Controllers\admin\LoginController::class, 'logout']); //山口追記
Route::view('/admin/register', 'admin/register');
Route::post('/admin/register', [App\Http\Controllers\admin\RegisterController::class, 'register']);
Route::view('/admin/home', 'admin/home')->middleware('auth:admin');

Route::view('/manager/passwords/email', 'manager/passwords/email');
Route::get('/manager/passwords/email', [App\Http\Controllers\manager\ForgotPasswordController::class, 'sendResetLinkEmail']);
Route::view('/manager/passwords/reset/{token}', [App\Http\Controllers\manager\ResetPasswordController::class,'showResetForm']);
Route::get('/manager/passwords/reset', [App\Http\Controllers\manager\ResetPasswordController::class, 'reset']);


//学習者画面設定
Route::view('/home/titles', 'titles');
Route::get('/home/titles', [quiz_titleController::class, 'getTitles']); //練習中　
Route::view('/home/titles/title/{title_id}', 'quiz')->name('quiz');
Route::get('/home/titles/title/{title_id}', [quiz_titleController::class, 'gettitle_id'])->name('quiz');
Route::view('/home/titles/title/2/{title_id}', 'quiz2')->name('quiz2');
Route::get('/home/titles/title/2/{title_id}', [quiz_titleController::class, 'gettitle_id2'])->name('quiz2');
Route::view('/check/{id}', 'check/{id}');// 利用者:編集ページ表示
Route::get('/check/{id}', [quiz_titleController::class, 'check'])->name('check'); // 利用者:編集ページDB
Route::view('/check2/{id}', 'check2/{id}');// 利用者:編集ページ表示
Route::get('/check2/{id}', [quiz_titleController::class, 'check2'])->name('check2'); // 利用者:編集ページDB
Route::view('/result/{id}', 'result/{id}');// 利用者:編集ページ表示
Route::get('/result/{id}', [quiz_titleController::class, 'get_result'])->name('result'); // 利用者:編集ページDB
Route::post('/result_delete/{id}',[quiz_titleController::class,'result_home'])->name('result.home'); // 利用者:削除機能
Route::post('/home/quiz/answer', [AnswerHistoryController::class, 'postanshis']);

//履歴
Route::view('/member/anshis/{id}', 'member/anshis/{id}');// 利用者:編集ページ表示
Route::get('/member/anshis/{id}', [AnswerController::class, 'get_answer_user'])->name('mypage.anshis'); // 利用者:編集ページDB
// Route::get('/member/anshis', [AnswerController::class, 'sort_answer_user']);

//マイページ
Route::view('/mypage/mypage', 'mypage/mypage');
Route::get('/mypage/mypage', [MypageController::class, 'index_user']);
Route::view('/mypage/mypage/edit/{id}', 'mypage/mypage/edit/{id}');// 利用者:編集ページ表示
Route::get('/mypage/mypage/edit/{id}', [MypageController::class, 'edit_user_info'])->name('mypage.edit'); // 利用者:編集ページDB
Route::get('/mypage/mypage/edit/update/{id}', [MypageController::class, 'update_user_info'])->name('mypage.edit.update');  // 利用者:更新
Route::post('/mypage/mypage/delete/{id}',[MypageController::class,'delete_user_info'])->name('mypage.delete'); // 利用者:削除機能


//指導者画面設定
//難易度

//クイズ
Route::view('/manager/quiz/quiz_home', 'manager/quiz/quiz_home')->middleware('auth:manager');
//問題集
Route::view('/manager/quiz/title/title_list', '/manager/quiz/title/title_list')->middleware('auth:manager');
Route::get('manager/quiz/title/title_list',[TitleController::class, 'title_list_manager'])->middleware('auth:manager');
Route::get('manager/quiz/title/title_list',[TitleController::class, 'title_sort_manager'])->middleware('auth:manager');
Route::view('manager/quiz/title/title_create', 'manager/quiz/title/title_create')->middleware('auth:manager');
Route::post('manager/quiz/title/title_create',[TitleController::class, 'title_create_manager'])->name('manager.quiz.title.title_create')->middleware('auth:manager');
Route::view('/manager/quiz/title/title_edit/{id}', 'manager/quiz/title/title_edit/{id')->middleware('auth:manager');
Route::get('/manager/quiz/title/title_edit/{id}', [TitleController::class, 'title_edit_manager'])->name('manager.quiz.title.title_edit')->middleware('auth:manager');
Route::post('/manager/quiz/title/edit/title_update/{id}', [TitleController::class, 'title_update_manager'])->name('manager.quiz.title.edit.title_update');
Route::get('/manager/quiz/title/edit/title_update/{id}', [TitleController::class, 'title_update_manager'])->name('manager.quiz.title.edit.title_update');
Route::post('/manager/quiz/title/title_delete/{id}',[TitleController::class,'title_delete_manager'])->name('manager.quiz.title.title_delete');
Route::get('/manager/quiz/title/check/{id}', [TitleController::class, 'check_manager'])->name('manager.quiz.title.check')->middleware('auth:manager');

Route::view('manager/quiz/title/q_set/{id}', 'manager/quiz/title/q_set/{id}')->middleware('auth:manager');
Route::get('manager/quiz/title/q_set/{id}',[TitleController::class, 'q_set_manager'])->name('manager.quiz.title.q_set')->middleware('auth:manager');
Route::view('manager/quiz/title/q_set_search/{id}', 'manager/quiz/title/q_set_searhc/{id}')->middleware('auth:manager');
Route::get('manager/quiz/title/q_set_search/{id}',[TitleController::class, 'q_set_search_manager'])->name('manager.quiz.title.q_set_search')->middleware('auth:manager');
Route::view('/manager/quiz/title/q_check/{id}', 'manager/quiz/title/q_check/{id}')->middleware('auth:manager');
Route::get('/manager/quiz/title/q_check/{id}', [TitleController::class, 'title_q_check_manager'])->name('manager.quiz.title.q_check')->middleware('auth:manager');
Route::post('/manager/quiz/title/set_manager/{id}', [TitleController::class, 'set_manager'])->name('manager.quiz.title.set_manager');
Route::get('/manager/quiz/title/set_manager/{id}', [TitleController::class, 'set_manager'])->name('manager.quiz.title.set_manager');

//絞り込みカテゴリ
Route::view('manager/quiz/category/category_list', 'manager/quiz/category/category_list')->middleware('auth:manager');
Route::get('manager/quiz/category/category_list',[CategoryController::class,'getCategory_manager'])->middleware('auth:manager'); 
Route::get('/manager/quiz/category/category_list', [CategoryController::class, 'Category_sort_manager'])->middleware('auth:manager');
Route::view('manager/quiz/category/category_create', 'manager/quiz/category/category_create')->middleware('auth:manager');
Route::post('manager/quiz/category/category_create',[CategoryController::class, 'Category_create_manager'])->name('manager.category.category_create')->middleware('auth:manager');
Route::view('/manager/quiz/category/edit/{id}', 'manager/quiz/category/edit/{id}')->middleware('auth:manager');
Route::get('/manager/quiz/category/edit/{id}', [CategoryController::class, 'edit_manager'])->name('manager.quiz.category.edit')->middleware('auth:manager');
Route::get('/manager/quiz/category/edit/update/{id}', [CategoryController::class, 'update_manager'])->name('manager.quiz.category.edit.update');
Route::post('/manager/quiz/category/delete/{id}',[CategoryController::class,'delete_manager'])->name('manager.quiz.category.delete'); // 管理者:削除機能
Route::view('manager/quiz/category/category_create_preview', 'manager/quiz/category/category_create_preview')->middleware('auth:manager');

//問題
Route::view('manager/quiz/quiz/q_list', 'manager/quiz/quiz/q_list')->middleware('auth:manager');
Route::get('manager/quiz/quiz/q_list', [QuizController::class, 'getquiz_list_manager'])->middleware('auth:manager'); 
Route::get('manager/quiz/quiz/q_list', [QuizController::class, 'quiz_list_manager_sort'])->middleware('auth:manager');
Route::view('manager/quiz/quiz/q_create', 'manager/quiz/quiz/q_create')->middleware('auth:manager');
Route::post('/manager/quiz/quiz/q_create',[QuizController::class, 'create_manager'])->name('manager.quiz.quiz.q_create')->middleware('auth:manager');
Route::get('/manager/quiz/quiz/q_create', [CategoryController::class, 'getCategory_quizcreate_manager'])->name('manager.quiz.quiz.q_create')->middleware('auth:manager');
Route::view('/manager/quiz/quiz/q_check/{id}', 'manager/quiz/quiz/q_check/{id}')->middleware('auth:manager');
Route::get('/manager/quiz/quiz/q_check/{id}', [QuizController::class, 'q_check_manager'])->name('manager.quiz.quiz.q_check')->middleware('auth:manager');
Route::view('/manager/quiz/quiz/q_edit/{id}', 'manager/quiz/quiz/q_edit/{id}')->middleware('auth:manager');
Route::get('/manager/quiz/quiz/q_edit/{id}', [QuizController::class, 'q_edit_manager'])->name('manager.quiz.quiz.q_edit')->middleware('auth:manager');
Route::post('/manager/quiz/quiz/edit/q_update/{id}', [QuizController::class, 'q_update_manager'])->name('manager.quiz.quiz.edit.q_update');
Route::get('/manager/quiz/quiz/edit/q_update/{id}', [QuizController::class, 'q_update_manager'])->name('manager.quiz.quiz.edit.q_update');
Route::view('/manager/quiz/quiz/q_category_edit/{id}', 'manager/quiz/quiz/q_category_edit/{id}')->middleware('auth:manager');
Route::get('/manager/quiz/quiz/q_category_edit/{id}', [QuizController::class, 'q_category_edit_manager'])->name('manager.quiz.quiz.q_category_edit')->middleware('auth:manager');
Route::post('/manager/quiz/quiz/edit/q_category_update/{id}', [QuizController::class, 'q_category_update_manager'])->name('manager.quiz.quiz.edit.q_category_update');
Route::get('/manager/quiz/quiz/edit/q_category_update/{id}', [QuizController::class, 'q_category_update_manager'])->name('manager.quiz.quiz.edit.q_category_update');
Route::post('/manager/quiz/quiz/q_delete/{id}',[QuizController::class,'q_delete_manager'])->name('manager.quiz.quiz.q_delete'); // 管理者:削除機能
Route::view('manager/quiz/quiz/q_create_preview', 'manager/quiz/quiz/q_create_preview')->middleware('auth:manager');

//学習者
Route::view('/manager/member/member_list', 'manager/member/member_list')->middleware('auth:manager');
Route::get('/manager/member/member_list', [UserController::class, 'getUser_manager'])->middleware('auth:manager');
Route::get('/manager/member/member_list', [UserController::class, 'User_sort_manager'])->middleware('auth:manager');
Route::view('/manager/member/member_list/edit/{id}', 'manager/member/member_list/edit/{id}')->middleware('auth:manager');// 利用者:編集ページ表示
Route::get('/manager/member/member_list/edit/{id}', [UserController::class, 'edit_manager'])->name('manager.member.edit')->middleware('auth:manager'); // 利用者:編集ページDB
Route::get('/manager/member/member_list/edit/update/{id}', [UserController::class, 'update_manager'])->name('manager.member.edit.update');  // 利用者:更新
Route::post('/manager/member/member_list/delete/{id}',[UserController::class,'delete_manager'])->name('manager/member/member_list/delete'); // 利用者:削除機能

Route::view('/manager/member/anshis/{id}', 'manager/member/anshis/{id}')->middleware('auth:manager');// 利用者:編集ページ表示
Route::get('/manager/member/anshis/{id}', [AnswerController::class, 'get_answer_manager'])->name('manager.member.anshis')->middleware('auth:manager'); // 利用者:編集ページDB

//指導者
Route::view('/manager/manager/manager_list', 'manager/manager/manager_list');
Route::get('/manager/manager/manager_list', [ManagerController::class, 'getmanager_manager'])->middleware('auth:manager');
Route::get('/manager/manager/manager_list', [ManagerController::class, 'Manager_sort_manager'])->middleware('auth:manager');

//マイページ
Route::view('/manager/mypage/mypage', 'manager/mypage/mypage')->middleware('auth:manager');
Route::get('/manager/mypage/mypage', [MypageController::class, 'index_manager'])->middleware('auth:manager');
Route::view('/manager/mypage/mypage/edit/{id}', 'manager/mypage/mypage/edit/{id}')->middleware('auth:manager');// 利用者:編集ページ表示
Route::get('/manager/mypage/mypage/edit/{id}', [MypageController::class, 'edit_manager_info'])->name('manager.mypage.edit')->middleware('auth:manager'); // 利用者:編集ページDB
Route::get('/manager/mypage/mypage/edit/update/{id}', [MypageController::class, 'update_manager_info'])->name('manager.mypage.edit.update');  // 利用者:更新
Route::post('/manager/mypage/mypage/delete/{id}',[MypageController::class,'delete_manager_info'])->name('manager/mypage/mypage/delete'); // 利用者:削除機能


//管理者画面設定
//test
Route::view('/admin/test', 'admin/test')->middleware('auth:admin');
Route::get('admin/test', [QuizController::class, 'quiz_setlist'])->middleware('auth:admin'); 

//クイズ
Route::view('/admin/quiz/quiz_home', 'admin/quiz/quiz_home')->middleware('auth:admin');

//問題集
Route::view('/admin/quiz/title/title_list', '/admin/quiz/title/title_list')->middleware('auth:admin');
Route::get('admin/quiz/title/title_list',[TitleController::class, 'title_list_admin'])->middleware('auth:admin');
Route::get('admin/quiz/title/title_list',[TitleController::class, 'title_sort_admin'])->middleware('auth:admin');
Route::view('admin/quiz/title/title_create', 'admin/quiz/title/title_create')->middleware('auth:admin');
Route::post('admin/quiz/title/title_create',[TitleController::class, 'title_create_admin'])->name('admin.quiz.title.title_create')->middleware('auth:admin');
Route::view('/admin/quiz/title/title_edit/{id}', 'admin/quiz/title/title_edit/{id')->middleware('auth:admin');
Route::get('/admin/quiz/title/title_edit/{id}', [TitleController::class, 'title_edit_admin'])->name('admin.quiz.title.title_edit')->middleware('auth:admin');
Route::post('/admin/quiz/title/edit/title_update/{id}', [TitleController::class, 'title_update_admin'])->name('admin.quiz.title.edit.title_update');
Route::get('/admin/quiz/title/edit/title_update/{id}', [TitleController::class, 'title_update_admin'])->name('admin.quiz.title.edit.title_update');
Route::post('/admin/quiz/title/title_delete/{id}',[TitleController::class,'title_delete_admin'])->name('admin.quiz.title.title_delete');
Route::get('/admin/quiz/title/check/{id}', [TitleController::class, 'check_admin'])->name('admin.quiz.title.check')->middleware('auth:admin');

Route::view('admin/quiz/title/q_set/{id}', 'admin/quiz/title/q_set/{id}')->middleware('auth:admin');
Route::get('admin/quiz/title/q_set/{id}',[TitleController::class, 'q_set_admin'])->name('admin.quiz.title.q_set')->middleware('auth:admin');
Route::view('admin/quiz/title/q_set_search/{id}', 'admin/quiz/title/q_set_searhc/{id}')->middleware('auth:admin');
Route::get('admin/quiz/title/q_set_search/{id}',[TitleController::class, 'q_set_search_admin'])->name('admin.quiz.title.q_set_search')->middleware('auth:admin');
Route::view('/admin/quiz/title/q_check/{id}', 'admin/quiz/title/q_check/{id}')->middleware('auth:admin');
Route::get('/admin/quiz/title/q_check/{id}', [TitleController::class, 'title_q_check_admin'])->name('admin.quiz.title.q_check')->middleware('auth:admin');
Route::post('/admin/quiz/title/set_admin/{id}', [TitleController::class, 'set_admin'])->name('admin.quiz.title.set_admin');
Route::get('/admin/quiz/title/set_admin/{id}', [TitleController::class, 'set_admin'])->name('admin.quiz.title.set_admin');

// Route::get('admin/quiz/title/check/{id}',[TitleController::class, 'sort_check_admin'])->middleware('auth:admin');

//絞り込みカテゴリ
Route::view('admin/quiz/category/category_list', 'admin/quiz/category/category_list')->middleware('auth:admin');
Route::get('admin/quiz/category/category_list',[CategoryController::class,'getCategory_admin'])->middleware('auth:admin'); 
Route::get('/admin/quiz/category/category_list', [CategoryController::class, 'Category_sort_admin'])->middleware('auth:admin');

Route::view('admin/quiz/category/category_create', 'admin/quiz/category/category_create')->middleware('auth:admin');
Route::post('admin/quiz/category/category_create',[CategoryController::class, 'Category_create_admin'])->name('admin.category.category_create')->middleware('auth:admin');
Route::view('/admin/quiz/category/edit/{id}', 'admin/quiz/category/edit/{id}')->middleware('auth:admin');
Route::get('/admin/quiz/category/edit/{id}', [CategoryController::class, 'edit_admin'])->name('admin.quiz.category.edit')->middleware('auth:admin');
Route::get('/admin/quiz/category/edit/update/{id}', [CategoryController::class, 'update_admin'])->name('admin.quiz.category.edit.update');
Route::post('/admin/quiz/category/delete/{id}',[CategoryController::class,'delete_admin'])->name('admin.quiz.category.delete'); // 管理者:削除機能

Route::view('admin/quiz/category/category_create_preview', 'admin/quiz/category/category_create_preview')->middleware('auth:admin');


//問題
Route::view('admin/quiz/quiz/q_list', 'admin/quiz/quiz/q_list')->middleware('auth:admin');
Route::get('admin/quiz/quiz/q_list', [QuizController::class, 'getquiz_list_admin'])->middleware('auth:admin'); 
Route::get('admin/quiz/quiz/q_list', [QuizController::class, 'quiz_list_admin_sort'])->middleware('auth:admin');

Route::view('admin/quiz/quiz/q_create', 'admin/quiz/quiz/q_create')->middleware('auth:admin');
Route::post('/admin/quiz/quiz/q_create',[QuizController::class, 'create_admin'])->name('admin.quiz.quiz.q_create')->middleware('auth:admin');
Route::get('/admin/quiz/quiz/q_create', [CategoryController::class, 'getCategory_quizcreate_admin'])->name('admin.quiz.quiz.q_create')->middleware('auth:admin');

Route::view('/admin/quiz/quiz/q_check/{id}', 'admin/quiz/quiz/q_check/{id}')->middleware('auth:admin');
Route::get('/admin/quiz/quiz/q_check/{id}', [QuizController::class, 'q_check_admin'])->name('admin.quiz.quiz.q_check')->middleware('auth:admin');

Route::view('/admin/quiz/quiz/q_edit/{id}', 'admin/quiz/quiz/q_edit/{id}')->middleware('auth:admin');
Route::get('/admin/quiz/quiz/q_edit/{id}', [QuizController::class, 'q_edit_admin'])->name('admin.quiz.quiz.q_edit')->middleware('auth:admin');
Route::post('/admin/quiz/quiz/edit/q_update/{id}', [QuizController::class, 'q_update_admin'])->name('admin.quiz.quiz.edit.q_update');
Route::get('/admin/quiz/quiz/edit/q_update/{id}', [QuizController::class, 'q_update_admin'])->name('admin.quiz.quiz.edit.q_update');

Route::view('/admin/quiz/quiz/q_category_edit/{id}', 'admin/quiz/quiz/q_category_edit/{id}')->middleware('auth:admin');
Route::get('/admin/quiz/quiz/q_category_edit/{id}', [QuizController::class, 'q_category_edit_admin'])->name('admin.quiz.quiz.q_category_edit')->middleware('auth:admin');
Route::post('/admin/quiz/quiz/edit/q_category_update/{id}', [QuizController::class, 'q_category_update_admin'])->name('admin.quiz.quiz.edit.q_category_update');
Route::get('/admin/quiz/quiz/edit/q_category_update/{id}', [QuizController::class, 'q_category_update_admin'])->name('admin.quiz.quiz.edit.q_category_update');
Route::post('/admin/quiz/quiz/q_delete/{id}',[QuizController::class,'q_delete_admin'])->name('admin.quiz.quiz.q_delete'); // 管理者:削除機能

Route::view('admin/quiz/quiz/q_create_preview', 'admin/quiz/quiz/q_create_preview')->middleware('auth:admin');


//指導者
Route::view('/admin/manager', 'admin/manager');
Route::get('/admin/manager', [ManagerController::class, 'getmanager'])->middleware('auth:admin');
Route::get('/admin/manager', [ManagerController::class, 'Manager_sort'])->middleware('auth:admin');

Route::view('/admin/manager/create', 'admin/manager/create')->middleware('auth:admin');
Route::post('/admin/manager/create',[ManagerController::class, 'create_manager'])->name('admin.manager.create')->middleware('auth:admin');

Route::view('/admin/manager/edit/{id}', 'admin/manager/edit/{id}')->middleware('auth:admin');// 管理者:編集ページ表示
Route::get('/admin/manager/edit/{id}', [ManagerController::class, 'edit'])->name('admin.manager.edit')->middleware('auth:admin'); // 管理者:編集ページDB
Route::get('/admin/manager/edit/update/{id}', [ManagerController::class, 'update'])->name('admin.manager.edit.update');  // 管理者:更新

Route::post('/admin/manager/delete/{id}',[ManagerController::class,'delete'])->name('admin/manager/delete'); // 管理者:削除機能

//管理者
Route::view('/admin/admin_list', 'admin/admin_list');
Route::get('/admin/admin_list', [AdminController::class, 'getAdmin'])->middleware('auth:admin');

Route::view('/admin/admin/edit/{id}', 'admin/admin/edit/{id}')->middleware('auth:admin');// 管理者:編集ページ表示
Route::get('/admin/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.admin.edit')->middleware('auth:admin'); // 管理者:編集ページDB
Route::get('/admin/admin/edit/update/{id}', [AdminController::class, 'update'])->name('admin.admin.edit.update');  // 管理者:更新

// Route::post('/admin/manager/delete/{id}',[AdminController::class,'delete'])->name('admin/manager/delete'); // 管理者:削除機能


//学習者
Route::view('/admin/member', 'admin/member')->middleware('auth:admin');
Route::get('/admin/member', [UserController::class, 'getUser'])->middleware('auth:admin');
Route::get('/admin/member', [UserController::class, 'User_sort'])->middleware('auth:admin');

Route::view('/admin/member/edit/{id}', 'admin/member/edit/{id}')->middleware('auth:admin');// 利用者:編集ページ表示
Route::get('/admin/member/edit/{id}', [UserController::class, 'edit'])->name('admin.member.edit')->middleware('auth:admin'); // 利用者:編集ページDB
Route::get('/admin/member/edit/update/{id}', [UserController::class, 'update'])->name('admin.member.edit.update');  // 利用者:更新

Route::post('/admin/member/delete/{id}',[UserController::class,'delete'])->name('admin/member/delete'); // 利用者:削除機能

Route::view('/admin/member/anshis/{id}', 'admin/member/anshis/{id}')->middleware('auth:admin');// 利用者:編集ページ表示
Route::get('/admin/member/anshis/{id}', [AnswerController::class, 'get_answer_admin'])->name('admin.member.anshis')->middleware('auth:admin'); // 利用者:編集ページDB




    