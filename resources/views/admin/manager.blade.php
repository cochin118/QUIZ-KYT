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
    <h2 class="text-center">指導者一覧</h2>

    <div class="row justify-content-center">
        <div class="col-3">
            <button type="button" class="btn btn-primary w-100 p-3 mt-4" 
                onclick="location.href='{{ url('/admin/manager/create') }}' ">
                新規指導者作成</a>
        </div> 
    </div> 

    <table class="table table-hover w-75 mt-5">
    <thead>
        <tr class="table-info">
            <th scope="col">　指導者番号</th>
            <th scope="col">　氏名</th>
            <th scope="col">メールアドレス</th>
            <th scope="col">　最終更新日時</th>
            <th scope="col">　修正</th>
            <th scope="col">　削除</th>
        </tr>
    </thead>
        @foreach($managers as $manager)
        <tbody>  
            <tr>
                <th class="align-middle">　　{{ $manager->man_num }} </th>
                <td class="align-middle">　{{ $manager->name }} </td>
                <td class="align-middle">  {{ $manager->email }}</td>
                <td class="align-middle">  {{ $manager->updated_at }}</td>
                
                <td class="align-middle">
                    <a href="{{ route('admin.manager.edit', ['id' =>$manager->id]) }}">
                        <button type="button" class="btn btn-warning">編集</button></a></td>
                
                <td class="align-middle"> 
                    <form action="{{ route('admin/manager/delete', ['id'=>$manager->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-dell">削除</button>
                    </form>    
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
    <ul class="pagination justify-content-center mt-4">
    {{ $managers->links() }}
    </ul>

    


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