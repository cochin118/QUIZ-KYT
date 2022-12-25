@extends('layouts.manager')

@section('content')
<div class="container">
    <div>
        <button type="button" class="btn btn-primary" 
            onclick="location.href='{{ url('/manager/home') }}' ">
            戻る
        </button>
    </div>
    <div class="row justify-content-center">
    <h1 class="text-center mt-5">指導者用画面</h1>
        
        <div class="row justify-content-center">
        <div class="col-3">
            <button type="button" class="btn btn-primary btn-lg w-100 p-3 mt-4" 
                onclick="location.href='{{ url('/manager/quiz/title/title_list') }}' ">
                問題集 情報</button></div></div>
        <div class="row justify-content-center">
        <div class="col-3">
            <button type="button" class="btn btn-primary btn-lg w-100 p-3 mt-4" 
                onclick="location.href='{{ url('/manager/quiz/category/category_list') }}' ">
                分類カテゴリー 情報</button></div></div>
        <div class="row justify-content-center">
        <div class="col-3">
            <button type="button" class="btn btn-primary btn-lg w-100 p-3 mt-4" 
                onclick="location.href='{{ url('/manager/quiz/quiz/q_list') }}' ">
                問題 情報</button></div></div>
        
        
        
    </div>
    
</div>
@endsection
