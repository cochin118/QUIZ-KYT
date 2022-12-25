@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <button type="button" class="btn btn-primary" 
            onclick="location.href='{{ url('/home') }}' ">
            戻る
        </button>
    </div>

    <div>  
        <button type="button" class="btn btn-primary" 
            onclick="location.href='{{ url('/home/title{title_id}/quiz{quiz_id}') }}' ">
            問題
        </button>
    </div>
    <div class="row justify-content-center">
    <h2 class="text-center">問題集選択画面</h2>
    </div>

    <table class="table table-hover mt-5">
    <thead>
        <tr class="table-info">
        <th scope="col">問題集名</th>
        <th scope="col">説明文</th>
        <th scope="col"></th>
        </tr>
    </thead>
    @foreach($titles as $title)
        <tbody>  
            <tr>
                <th scope="row" class="align-middle">{{ $title->title }}</th>
                <td class="align-middle">  {{ $title->description }} </td>
                <td class="align-middle">
                    <button type="button" class="btn btn-success">開始</button></td>
            </tr>
        </tbody>
        @endforeach
    </table>
@endsection