@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <h1 class="text-center mt-5">管理者用画面</h1>
   
        
        <div class="row justify-content-center">
        <div class="col-3">
            <button type="button" class="btn btn-primary btn-lg w-100 p-3 mt-5" 
                onclick="location.href='{{ url('/admin/quiz/quiz_home') }}' ">
                問題　情報</button></div></div>
        <div class="row justify-content-center">
        <div class="col-3">
            <button type="button" class="btn btn-primary btn-lg w-100 p-3 mt-4" 
                onclick="location.href='{{ url('/admin/member') }}' ">
                学習者　情報</button></div></div>
        <div class="row justify-content-center">
        <div class="col-3">
            <button type="button" class="btn btn-primary btn-lg w-100 p-3 mt-4" 
                onclick="location.href='{{ url('/admin/manager') }}' ">
                指導者　情報</button></div></div>
        <!-- <div class="row justify-content-center">
        <div class="col-3">
            <button type="button" class="btn btn-primary btn-lg w-100 p-3 mt-4" 
                onclick="location.href='{{ url('/admin/admin_list') }}' ">
                アカウント</button></div></div> -->
        
        

        <!-- <div class="row justify-content-center">
        <div class="col-3">
            <button type="button" class="btn btn-primary btn-lg w-100 p-3 mt-4" 
                onclick="location.href='{{ url('/admin/test') }}' ">
                test</button></div></div> -->

    </div>
    
</div>
@endsection
