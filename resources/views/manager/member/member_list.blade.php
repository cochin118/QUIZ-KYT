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
    <h2 class="text-center">利用者一覧</h2>
    </div>

    <table class="table table-hover mt-5">
    <thead>
        <tr class="table-info">
            <th scope="col">　利用者番号</th>
            <th scope="col">氏名</th>
            <th scope="col">　メールアドレス</th>
            <th scope="col">　最終更新日時</th>
            <th scope="col">利用履歴</th>
            <th scope="col">　編集</th>
            <th scope="col">　削除</th>
        </tr>
    </thead>
        @foreach($users as $user)
        <tbody>  
            <tr>
                <th scope="row" class="align-middle">　{{ $user->stu_num }}</th>
                <td class="align-middle">  {{ $user->name }} </td>
                <td class="align-middle">  {{ $user->email }}</td>
                <td class="align-middle">  {{ $user->updated_at }}</td>
                <td class="align-middle">
                <a href="{{ route('manager.member.anshis', ['id' =>$user->id]) }}">
                    <button type="button" class="btn btn-success">履歴</button></td>

                <td class="align-middle">
                <a href="{{ route('manager.member.edit', ['id' =>$user->id]) }}">
                    <button type="button" class="btn btn-warning">編集</button></a></td>
                
                <td class="align-middle"> 
                    <form action="{{ route('manager/member/member_list/delete', ['id'=>$user->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-dell">削除</button>
                    </form>    
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>

    <ul class="pagination justify-content-center mt-4">
    {{ $users->links() }}
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