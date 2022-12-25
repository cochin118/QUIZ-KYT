@extends('layouts.manager')

@section('content')
<div class="container">
    <div>
        <button type="button" class="btn btn-primary" 
            onclick="location.href='{{ url('/manager/quiz/quiz_home') }}' ">
            戻る
        </button>
    </div>
    <div class="row justify-content-center">
        <h2 class="text-center">分類カテゴリ 一覧</h2>
        
    </div>

    <div class="row justify-content-center">
        <div class="col-3">
            <button type="button" class="btn btn-primary w-100 p-3 mt-5" 
                onclick="location.href='{{ url('/manager/quiz/category/category_create') }}' ">
                新規カテゴリ作成</a>
        </div>      
        
        
    </div>
    <!-- <div class="row justify-content-center">
        <h5 class="text-center mt-4">※カテゴリの作成により、問題の絞り込みが可能になります。</h5>
    </div> -->
    
    
    <div class="row justify-content-center">
    <table class="table table-hover w-50 mt-5">
    <thead>
        <tr class="table-info">
            <th scope="col">　　　カテゴリ名　</th>
            <th scope="col">　　　最終更新日時　</th>
            <th scope="col">　編集</th>
        </tr>
    </thead>
    @foreach($categories as $category)
        <tbody>  
            <tr>
                
                <th scope="row" class="align-middle">　{{ $category->name }} </th>
                <th scope="row" class="align-middle">{{ $category->updated_at }}</th>
                <td class="align-middle">
                    <a href="{{ route('manager.quiz.category.edit', ['id' =>$category->id]) }}">
                        <button type="button" class="btn btn-warning">編集</button></a></td>
                </tr>
        </tbody>
        @endforeach
    </table>    
    <ul class="pagination justify-content-center mt-4">
    {{ $categories->links() }}
    </ul>

    @yield('index')
    </div>


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