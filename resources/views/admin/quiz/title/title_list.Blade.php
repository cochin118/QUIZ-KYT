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
        <h2 class="text-center">問題集一覧</h2>
    </div>

    <div class="row justify-content-center">
        <div class="col-3">
            <button type="button" class="btn btn-primary w-100 p-3 mt-5" 
                onclick="location.href='{{ url('/admin/quiz/title/title_create') }}' ">
                問題集作成</a>
        </div>      
        
        </div>
    </div>

    <div class="row justify-content-center mt-5">
    

    <div class="row justify-content-center">
    <table class="table table-hover w-75 mt-4">
    <thead>
        <tr class="table-info">
            <th scope="col">　　タイトル</th>
            <th scope="col">　説明</th>
            <th scope="col">最終更新日時</th>
            <th scope="col">　詳細</th>
            <th scope="col">問題設定</th>
            <th scope="col">　編集</th>
            <th scope="col">　削除</th>
        </tr>
    </thead>
    @foreach($titles as $title)

        <tbody>  
            <tr>
                
                <th scope="row" class="align-middle">{{  $title->title }}</th>
                <th scope="row" class="align-middle">{{  $title->description }}</th>
                <th scope="row" class="align-middle">{{  $title->updated_at }}</th>

                <td class="align-middle">
                <a href="{{ route('admin.quiz.title.check', ['id' =>$title->id]) }}">    
                    <button type="button" class="btn btn-success">詳細</button>                
                </td>
                <td class="align-middle">  
                <a href="{{ route('admin.quiz.title.q_set', ['id' =>$title->id]) }}">    
                    <button type="button" class="btn btn-info">設定</button></a>
                </td>
                <td class="align-middle">  
                <a href="{{ route('admin.quiz.title.title_edit', ['id' =>$title->id]) }}">
                    <button type="button" class="btn btn-warning">編集</button></a>
                </td>
                
                <td class="align-middle"> 
                    <form action="{{ route('admin.quiz.title.title_delete', ['id' =>$title->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-dell">削除</button>
                    </form>    
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>    
    <ul class="pagination justify-content-center mt-4">
    {{ $titles->links() }}
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
