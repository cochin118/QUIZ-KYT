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
    <h2 class="text-center">指導者一覧</h2>

    <table class="table table-hover w-75 mt-5">
    <thead>
        <tr class="table-info">
            <th scope="col">　　指導者番号</th>
            <th scope="col">　氏名</th>
            <th scope="col">メールアドレス</th>
            <th scope="col">　　最終更新日時</th>
            
        </tr>
    </thead>
        @foreach($managers as $manager)
        <tbody>  
            <tr>
                <th scope="row" class="align-middle">　　　{{ $manager->man_num }} </td>
                <td class="align-middle">{{ $manager->name }} </td>
                <td class="align-middle">{{ $manager->email }}</td>
                <td class="align-middle">  {{ $manager->updated_at }}</td>
                
                
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