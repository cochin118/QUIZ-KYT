@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <button type="button" class="btn btn-primary" 
            onclick="location.href='{{ url('/home') }}' ">
            戻る
        </button>
    </div>

    
    @if(session('message'))
    <div class="row justify-content-center mt-3">
        <div class="alert alert-warning col-3 mt-2 text-center border-warning">{{session('message')}}</div></div>
    @endif


    </div>
    <div class="row justify-content-center">
    <h2 class="text-center">問題集選択画面</h2>
    </div>

    <div class="row justify-content-center mt-5">
    <table class="table  table-hover mt-5 w-75">
    <thead>
        <tr class="table-info">
        <th scope="col">問題集名</th>
        <th scope="col">説明文</th>
        <th scope="col"></th>
        </tr>
    </thead>
    @foreach($titles as $titles)

        <tbody>  
            <tr>
                <th scope="row" class="align-middle">{{ $titles->title }}</th>
                <td class="align-middle">  {{ $titles->description }} </td>
                <td class="align-middle">
                <a href="{{ route('quiz', ['title_id' =>$titles->id]) }}">
                    <button type="button" class="btn btn-warning">開始</button></a></td>
            </tr>
        </tbody>
        @endforeach
    </table>
</div>

@endsection