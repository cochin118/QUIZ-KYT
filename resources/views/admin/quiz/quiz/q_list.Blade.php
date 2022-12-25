@extends('layouts.admin')

@section('content')
<div class="container">
    <div>
        <button type="button" class="btn btn-primary" 
            onclick="location.href='{{ url('/admin/quiz/quiz_home') }}' ">
            戻る
        </button>
    </div>
    <div class="row justify-content-center">
        <h2 class="text-center">問題一覧</h2>
    </div>

    <div class="row justify-content-center">
        <div class="col-3">
            <button type="button" class="btn btn-primary w-100 p-3 mt-5" 
                onclick="location.href='{{ url('/admin/quiz/quiz/q_create') }}' ">
                新規問題作成</a>
        </div>      
            <div class="row justify-content-center">
            <h5 class="text-center mt-4">※問題の作成により、問題集への追加が可能になります。</h5>
        </div>
        
    </div>

    
    
    <div class="row justify-content-center">
    <table class="table table-hover w-75 mt-4">
    <thead>
        <tr class="table-info">
            <th scope="col">　　問題画像　</th>
            <th scope="col">　問題名</th>
            <th scope="col">　分類カテゴリ</th>
            <th scope="col">最終更新日時　</th>
            <th scope="col">　詳細</th>
            <th scope="col">カテゴリ変更</th>
            <th scope="col">　編集</th>
            <th scope="col">　削除</th>
        </tr>
    </thead>
        @foreach($quizzes as $quiz)
        @foreach($quiz -> categories as $category)
        <tbody>  
            <tr>
                
                <th scope="row" class="align-middle">
                    <img class="rounded mx-auto d-block mt-2"height="100" width="150"
                         src="{{asset('storage/images/'.$quiz->pictures)}}"></th>
                <th scope="row" class="align-middle">{{  $quiz->name }}</td>
                <td scope="row" class="align-middle">　{{  $category->name }}</th>
                <th scope="row" class="align-middle">{{ $quiz->updated_at }}</th>

                <td class="align-middle">
                    <a href="{{ route('admin.quiz.quiz.q_check', ['id' =>$quiz->id]) }}">    
                    <button type="button" class="btn btn-success">詳細</button>                
                </td>

                <td class="align-middle">  
                <a href="{{ route('admin.quiz.quiz.q_category_edit', ['id' =>$quiz->id]) }}">
                    <button type="button" class="btn btn-info ms-3">変更</button></a></td>
                </td>


                <td class="align-middle">  
                <a href="{{ route('admin.quiz.quiz.q_edit', ['id' =>$quiz->id]) }}">
                    <button type="button" class="btn btn-warning">編集</button></a></td>
                </td>
                
                <td class="align-middle"> 
                    <form action="{{ route('admin.quiz.quiz.q_delete', ['id'=>$quiz->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-dell">削除</button>
                    </form>
                </td>
            </tr>
        </tbody>
        @endforeach
        @endforeach
    </table>    
    <ul class="pagination justify-content-center mt-4">
    {{ $quizzes->links() }}
    </ul>

    </div>

    @yield('index')
</div>
@endsection

@section('btn-dell')
<script>
$(function (){
    $(".btn-dell").click(function(){
        if(confirm("本当に削除しますか？")){
            // そのままsubmit処理を実行（※削除）
        }else{
            // キャンセル
            return false;
        }
    });
});
</script>
@endsection
