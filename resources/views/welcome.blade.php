@extends('layouts.welcome')

@section('content')

<div class="container-fluid  bg-white mt-5">
    <div class="picture ">
        <img class="rounded mx-auto d-block"
        height="400" width="600"
        src="/image/kyt_top.jpg"> 
        </v-img>   
    </div>

    <div class="row justify-content-center">
    <div class="col-3">
        <button type="button" class="btn btn-primary btn-lg w-100 p-3 mt-4" 
            onclick="location.href='{{ url('/register') }}' ">
            学習者 登録</button></div>
    <div class="col-3">
        <button type="button" class="btn btn-primary btn-lg w-100 p-3 mt-4" 
            onclick="location.href='{{ url('/login') }}' ">
            学習者 ログイン</button></div>
    <div class="col-3">
        <button type="button" class="btn btn-primary btn-lg w-100 p-3 mt-4" 
            onclick="location.href='{{ url('/manager/login') }}' ">
            指導者 ログイン</button></div>
    <div class="col-3">
        <button type="button" class="btn btn-primary btn-lg w-100 p-3 mt-4" 
            onclick="location.href='{{ url('/admin/login') }}' ">
            管理者 ログイン</button></div>
    </div>
</div>
@endsection
