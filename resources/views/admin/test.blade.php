@extends('layouts.admin')

@section('content')
<div class="container">
    <div>
        <button type="button" class="btn btn-primary" 
            onclick="location.href='{{ url('/admin/quiz/quiz_home') }}' ">
            戻る
        </button>
    </div>
    <div class="row justify-content-center mt-3">

        <h2 class="text-center">の出題問題編集</h2>
        <h2 class="text-center">問題一覧</h2>
    </div>

    <div class="row justify-content-center mt-3">
    <button type="button" class="btn btn-warning btn-lg border-dark col-2 mt-2" 
            onclick="location.href='{{ url('/admin/quiz/quiz_home') }}' ">
            保存
    </button>
    </div>
    <div class="dropdown">
        <button class="btn border-primary text-primary btn-light dropdown-toggle col-md-3 offset-md-7 mt-3 justify-content-end" 
            type="button" id="dropdownMenuButton" 
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            カテゴリを絞って問題を標示
        </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
    </div>
    </div>
    
    <div class="row justify-content-center">
    <table class="table table-hover w-75 mt-4">
    <thead>
        <tr class="table-warning">
            <th scope="col">　問題名　</th>
            <th scope="col">　分類カテゴリ</th>
            <th scope="col">最終更新日時　</th>
            <th scope="col">　詳細</th>
            <th scope="col">出題 OFF/ON</th>
            
        </tr>
    </thead>
        @foreach($quizzes as $quiz)
        <tbody>  
            <tr>
                
                <th scope="row" class="align-middle">{{ $quiz->category_id }}</th>
                <th scope="row" class="align-middle"></th>
                <th scope="row" class="align-middle">{{ $quiz->updated_at }}</th>

                <td class="align-middle">  
                    <button type="button" class="btn btn-success">詳細</button>
                </td>

                <td class="align-middle">
                <div class="form-check form-switch ms-5">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                </div>
                </td>
                
                
            </tr>
        </tbody>
        @endforeach
    </table>    
    
    </div>


</div>
@endsection


