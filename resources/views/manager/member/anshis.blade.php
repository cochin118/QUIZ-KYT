@extends('layouts.manager')

@section('content')
<div class="container">
    <div>
        <button type="button" class="btn btn-primary" 
            onclick="location.href='{{ url('/manager/member/member_list') }}' ">
            戻る
        </button>
        <div class="row justify-content-center">
    <h2 class="text-center">解答履歴</h2>
    </div>

    <div class="row justify-content-center mt-2">
        <ul class="list-group w-25">
        <span class="border border-info rounded">
            <li class="list-group-item list-group-item-secondary">・学習者番号</li>
            <li class="list-group-item">　 {{$user->stu_num}} </li>
            <li class="list-group-item list-group-item-secondary">・氏名</li>
            <li class="list-group-item">　 {{$user->name}} </li></span>
    </div>


    <div class="row justify-content-center">
    <table class="table table-hover w-75 mt-5">
    <thead>
        <tr class="table-info">
            <th scope="col">　問題集名</th>
            <th scope="col">問題名</th>
            <th scope="col">解答結果</th>
            <th scope="col">解答日時</th>
        </tr>
    </thead>
        @foreach($answers as $answer)
        <tbody>  
            <tr>
                <td class="align-middle">  {{ $answer -> title -> title }} </td>
                <td class="align-middle">  {{ $answer -> quiz -> name  }}</td>
                <td class="align-middle">  {{ $answer -> answer  }}</td>
                <td class="align-middle">  {{ $answer -> updated_at  }}</td>
                <td class="align-middle">
            </tr>
        </tbody>
        @endforeach
    </table>
    </div>

    @yield('index')
</div>
@endsection