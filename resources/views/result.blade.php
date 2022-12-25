@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center mt-5">

        <div class="row justify-content-center">
            <div class="col-3">
            <form action="{{ route('result.home', ['id' =>$user->id]) }}" method="POST">
            @csrf
                <button type="submit" class="btn btn-primary btn-lg w-100 p-3 mt-5">
                    ホームへ</button></a>
            </form> 
            </div>
        </div>



        <div class="card mt-5 w-50">
            <div class="card-header">                
                <h2 class="text-center">結果発表</h2>
            </div>

        <div class="card-body">
            <fieldset>
            <div class="mt-2 mb-3">
                <h4 class="text-center">{{ $title -> title  }}</h4>
            </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">問題番号</th>
                        <th scope="col">問題名　　　　　　　　　　　　　　</th>
                        <th scope="col">正誤　　</th>
                        </tr>
                    </thead>
                    @foreach($results as $result)
                    <tbody>
                        <tr>
                        <td>　Q.{{ $result -> num  }}</td>
                        <td>{{ $result -> quiz -> name  }}</td>
                        <td>{{ $result -> result  }}</td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>

            </fieldset>
        </div>

        </div>
    </div>

    @yield('index')
</div>
@endsection