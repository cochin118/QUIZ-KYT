@extends('layouts.admin')

@section('content')
<div class="container">
    <div>
        <button type="button" class="btn btn-primary" 
            onclick="location.href='{{ url('/admin/home') }}' ">
            戻る
        </button>
    </div>
    <div class="row justify-content-center">
    <h2 class="text-center">管理者情報</h2>

    <table class="table table-hover w-75 mt-5">
    <thead>
        <tr class="table-info">
            
            <th scope="col">　氏名</th>
            <th scope="col">メールアドレス</th>
            <th scope="col">　最終更新日時</th>
            <th scope="col">　修正</th>
            <!-- <th scope="col">　削除</th> -->
        </tr>
    </thead>
        @foreach($admins as $admin)
        <tbody>  
            <tr>
                <td class="align-middle">　{{ $admin->name }} </td>
                <td class="align-middle">  {{ $admin->email }}</td>
                <td class="align-middle">  {{ $admin->updated_at }}</td>
                
                <td class="align-middle">
                    <a href="{{ route('admin.admin.edit', ['id' =>$admin->id]) }}">
                        <button type="button" class="btn btn-warning">編集</button></a></td>
                
                
            </tr>
        </tbody>
        @endforeach
    </table>

    


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