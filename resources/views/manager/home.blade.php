@extends('layouts.manager')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <h1 class="text-center mt-5">指導者画面</h1>
        
        <div class="row justify-content-center">
        <div class="col-3">
            <button type="button" class="btn btn-primary btn-lg w-100 p-3 mt-4" 
                onclick="location.href='{{ url('/manager/quiz/quiz_home') }}' ">
                問題　情報</button></div></div>
        <div class="row justify-content-center">
        <div class="col-3">
            <button type="button" class="btn btn-primary btn-lg w-100 p-3 mt-4" 
                onclick="location.href='{{ url('/manager/member/member_list') }}' ">
                学習者　情報</button></div></div>
        <div class="row justify-content-center">
        <div class="col-3">
            <button type="button" class="btn btn-primary btn-lg w-100 p-3 mt-4" 
                onclick="location.href='{{ url('/manager/manager/manager_list') }}' ">
                指導者　情報</button></div></div>
        <div class="row justify-content-center">
        <div class="col-3">
            <button type="button" class="btn btn-primary btn-lg w-100 p-3 mt-4" 
                onclick="location.href='{{ url('/manager/mypage/mypage') }}' ">
                アカウント　情報</button></div></div>
        
        
    </div>
    
</div>
@endsection
