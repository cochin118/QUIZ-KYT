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
        <h2 class="text-center">問題集編集</h2>
    </div>

    <div>
    <form action="{{ route('admin.quiz.title.edit.title_update',$title->id) }}"  
    enctype="multipart/form-data"  method="PUT">
           
    @method('PUT')
    @csrf

    <div class="row justify-content-center mt-5">
        <div class="card w-75 ">
            <h5 class="card-header m-3">編集情報</h5>
        <div class="card-body">

            <div class=" mt-3">
                <label for="title" class=" col-form-label text-md-end">{{ __('問題集名') }}</label>

                    <div class=" ">
                        <input id="title" type="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title',$title->title) }}" required autocomplete="title" placeholder="15文字以内で入力して下さい">

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{__('入力内容が正しくありません') }}</strong>
                                </span>
                            @enderror
                    </div>
            </div>

            <div class=" mt-3">
                <label for="description" class=" col-form-label text-md-end">{{ __('解説を入力してください') }}</label>

                    <div class=" ">
                        <input id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description',$title->description) }}" required autocomplete="title" placeholder="20文字以内で入力して下さい">

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{__('入力内容が正しくありません') }}</strong>
                                </span>
                            @enderror
                    </div>
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
