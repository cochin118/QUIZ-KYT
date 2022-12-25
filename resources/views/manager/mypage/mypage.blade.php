@extends('layouts.manager')

@section('content')
<div class="container">
    <div>
        <button type="button" class="btn btn-primary" 
            onclick="location.href='{{ url('/manager/home') }}' ">
            戻る
        </button>
    </div>
    <div class="row justify-content-center">
    <h2 class="text-center mt-5">アカウント情報</h2>

    <table class="table table-hover w-75 mt-5">
    <thead>
        <tr class="table-info">
            <th scope="col">　指導者番号</th>
            <th scope="col">　氏名</th>
            <th scope="col">メールアドレス</th>
            <th scope="col">　最終更新日時</th>
            <th scope="col">　編集</th>
            <th scope="col">　削除</th>
            
        </tr>
    </thead>

        <tbody>  
            <tr>
                <td class="align-middle">　{{ $manager->man_num }} </td>
                <td class="align-middle">　{{ $manager->name }} </td>
                <td class="align-middle">  {{ $manager->email }}</td>
                <td class="align-middle">  {{ $manager->updated_at }}</td>
                <td class="align-middle">
                <a href="{{ route('manager.mypage.edit', ['id' =>$manager->id]) }}">
                    <button type="button" class="btn btn-warning">編集</button></a></td>
                
                <td class="align-middle"> 
                    <form action="{{ route('manager/mypage/mypage/delete', ['id'=>$manager->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-dell">削除</button>
                    </form>    
                </td>
                
                
            </tr>
        </tbody>
        
    </table>

 


    @yield('index')
</div>
@endsection

@section('btn-dell')
<script>
$(function (){
    $(".btn-dell").click(function(){
        if(confirm("本当に退会しますか？")){
            // そのままsubmit処理を実行（※削除）
        }else{
            // キャンセル
            return false;
        }
    });
});
</script>
@endsection