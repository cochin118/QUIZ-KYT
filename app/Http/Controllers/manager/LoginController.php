<?php

namespace App\Http\Controllers\Manager;                       //修正

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;                        //追記

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/manager/home';                  //修正


    public function __construct()
    {
        $this->middleware('guest:manager')->except('logout'); //修正
    }


    protected function guard()                              //追記
    {                                                       //追記
        return Auth::guard('manager');                        //追記
    }       
    public function username()
    {
      return 'man_num';
    }                                                //追記
}