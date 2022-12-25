@extends('layouts.admin')

@section('content')
<div class="container">
    <div>
        <button type="button" class="btn btn-primary" 
            onclick="history.back() ">
            戻る
        </button>
    </div>
    <div class="row justify-content-center">
        <h2 class="text-center">分類カテゴリ編集</h2>
    </div>

    <div>
    <form action="{{ route('admin.quiz.category.edit.update',$category->id) }}"  
    enctype="multipart/form-data"  method="PUT">
           
    @method('PUT')
    @csrf

    <div class="row justify-content-center mt-5">
        <div class="card w-75 ">
            <h5 class="card-header m-3">編集情報</h5>
        <div class="card-body">

            <div class="row m-3 mt-5">
                <label for="name" class="col-md-3 col-form-label text-md-end">{{ __('カテゴリ名') }}</label>

                    <div class="col-md-7 ">
                        <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name',$category->name) }}" required autocomplete="name" placeholder="15文字以内で入力して下さい">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{__('入力内容が正しくありません') }}</strong>
                                </span>
                            @enderror
                    </div>
                    <h5 class="text-center text-danger">注：15字以内で入力してください。</h5>
            </div>
            
        </div>
        <div class="card-footer mt-4">
        <div class="col-md-8 offset-md-10">
            <button type="submit" class="btn btn-warning">
            {{  __('更新') }}
            </button>
        </div>
        </div>
    
    
        </form>
    </div>  
</div>
    
    


    
      
    

    
</div>
@endsection
