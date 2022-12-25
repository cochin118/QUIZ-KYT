@extends('layouts.app')
@section('content')

    <div class="row justify-content-center">
        <h1 class="text-center"></h1>
    </div>
            <div class="row justify-content-center">
                <div class="col-3">
                    <button type="button" class="btn btn-primary btn-lg w-100 p-3 mt-5" 
                        onclick="location.href='{{ url('home/titles') }}' ">
                        問題開始</button>
                     
                    <a href="{{ route('mypage.anshis', ['id' =>$user->id]) }}">
                    <button type="button" class="btn btn-primary btn-lg w-100 p-3 mt-5">
                        解答履歴</button></a>

                    <button type="button" class="btn btn-primary btn-lg w-100 p-3 mt-5" 
                        onclick="location.href='{{ url('mypage/mypage') }}' ">
                        アカウント情報</button>
                    
                        

                </div>
            </div>
 @endsection
