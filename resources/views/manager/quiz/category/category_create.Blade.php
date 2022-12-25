@extends('layouts.manager')

@section('content')
<div class="container">
    <div>
        <button type="button" class="btn btn-primary" 
            onclick="location.href='{{ url('/manager/quiz/category/category_list') }}' ">
            戻る
        </button>
    </div>
    <div class="row justify-content-center">
        <h2 class="text-center">分類カテゴリ作成</h2>
    </div>

    <div>
    <form method="POST" action="{{ route('manager.category.category_create') }}">
    @csrf

    <div class="row justify-content-center mt-5">
        <div class="card w-75 ">
            <h5 class="card-header m-3">新規作成</h5>
        <div class="card-body">

            <div class="row m-3">
                <label for="name" class="col-md-3 col-form-label text-md-end">{{ __('カテゴリ名') }}</label>

                    <div class="col-md-7 ">
                        <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="15文字以内で入力して下さい">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{__('入力内容が正しくありません') }}</strong>
                                </span>
                            @enderror
                    </div>
            </div>
        </div>
        <div class="card-footer mt-4">
        <div class="col-md-8 offset-md-10">
            <button type="submit" class="btn btn-primary">
            {{ __('作成') }}
            </button>
        </div>
        </div>
    
    
        </form>
    </div>  
</div>
    
</div>
@endsection
