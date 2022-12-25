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
        <h2 class="text-center">出題設定</h2>
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

    <div class="row justify-content-center mt-3">
    <button type="button" class="btn btn-warning btn-lg border-dark col-2 mt-2" 
            onclick="location.href='{{ url('/admin/quiz/quiz_home') }}' ">
            保存
    </button>
    </div>

    <div class="dropdown">
    <select class="rounded border-primary col-md-3 offset-md-7 mt-3 justify-content-end form-group @error('id') is-invalid @enderror" id="id" name="id"  required autocomplete='id'>

    @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
    </select>
    </div>

    <div class="form-group row">
        <label class="col-sm-2">商品カテゴリ</label>
            <div class="col-sm-3">
                <select name="categoryId" class="form-control" value="{{ $category->id }}">
                    <option value="">未選択</option>

                    @foreach($categories as $id => $category_name)
                        <option value="{{ $id }}">
                            {{ $category_name }}
                        </option>  
                    @endforeach
                </select>
            </div>
        </div>

    
        @if (!empty($quizzes))
    <div class="row justify-content-center">
    <table class="table table-hover w-75 mt-4">
    <thead>
        <tr class="table-info">
            <th scope="col">　　問題画像　</th>
            <th scope="col">　分類カテゴリ</th>
            <th scope="col">最終更新日時　</th>
            <th scope="col">　詳細</th>
            <th scope="col">出題 OFF/ON</th>
        </tr>
    </thead>
        @foreach($quizzes as $quiz)
        @foreach($quiz -> categories as $category)
        <tbody>  
            <tr>
                
                <th scope="row" class="align-middle">
                    <img class="rounded mx-auto d-block mt-2"height="100" width="150"
                         src="{{asset('storage/images/'.$quiz->pictures)}}"></th>
                <th scope="row" class="align-middle">{{  $category->name }}</th>
                <th scope="row" class="align-middle">{{ $quiz->updated_at }}</th>

                <td class="align-middle">
                    <a href="{{ route('admin.quiz.title.q_check', ['id' =>$quiz->id]) }}">    
                    <button type="button" class="btn btn-success">詳細</button>                
                </td>

                <td class="align-middle">

                
                <div class="form-check form-switch ms-4">
                    <input class="form-check-input" type="checkbox" id="quizid" name="quizid" value="{{ $quiz->id }}">
                </div>
                </td>
            </tr>
        </tbody>
        @endforeach
        @endforeach
    </table>    
    @endif



    @yield('index')
</div>
@endsection
