@extends('layouts.admin')

@section('content')
<div class="container">
    <div>
        <button type="button" class="btn btn-primary" 
            onclick="location.href='{{ url('/admin/quiz/title/title_list') }}' ">
            戻る
        </button>
    </div>
    <div class="row justify-content-center">
        <h2 class="text-center">問題集詳細</h2>
    </div>

    <div>
    <div class="row justify-content-center mt-2">
        <ul class="list-group w-50">
        <span class="border border-info rounded">
            <li class="list-group-item list-group-item-secondary">・問題集名</li>
            <li class="list-group-item">　{{  $title->title }}</li>
            <li class="list-group-item list-group-item-secondary">・説明</li>
            <li class="list-group-item">　{{  $title->description }}</li></span>
    </div>
   
    <div class="row justify-content-center">
    <table class="table table-hover w-75 mt-5">
    <thead>
        <tr class="table-info">
            <th scope="col">　　問題画像　</th>
            <th scope="col">　問題名</th>
            <th scope="col">　分類カテゴリ</th>
            <th scope="col">最終更新日時　</th>
            <th scope="col">　詳細</th>
        </tr>
    </thead>
        @foreach($title -> quizzes as $quiz)
        @foreach($quiz -> categories as $category)

        <tbody>  
            <tr>
                
                <th scope="row" class="align-middle">
                    <img class="rounded mx-auto d-block mt-2"height="100" width="150"
                         src="{{asset('storage/images/'.$quiz->pictures)}}"></th>
                <th scope="row" class="align-middle">{{  $quiz->name }}</th>
                <td scope="row" class="align-middle">　{{  $category->name }}</td>
                <th scope="row" class="align-middle">{{ $quiz->updated_at }}</th>

                <td class="align-middle">
                    <a href="{{ route('admin.quiz.title.q_check', ['id' =>$quiz->id]) }}">    
                    <button type="button" class="btn btn-success">詳細</button>                
                </td>

            </tr>
        </tbody>
        @endforeach
        @endforeach

    </table>    




    @yield('index')
</div>
@endsection
