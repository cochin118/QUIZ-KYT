<?php

 namespace App\Http\Controllers;

 use Illuminate\Http\Request;
 use App\Models\Rensyu;  

 class rensyuController extends Controller
 {
    public function getRensyu()
    {
        $titles = Rensyu::get();
        return view("rensyu", ["rensyu" => $titles]);  
    }

 } 