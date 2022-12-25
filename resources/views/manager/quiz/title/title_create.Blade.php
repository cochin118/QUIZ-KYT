@extends('layouts.manager')

@section('content')
<div class="container">
    <div>
        <button type="button" class="btn btn-primary" 
            onclick="location.href='{{ url('/manager/quiz/title/title_list') }}' ">
            戻る
        </button>
    </div>
    <div class="row justify-content-center">
        <h2 class="text-center">問題集作成</h2>
    </div>

    <div>
    <form method="POST" action="{{ route('manager.quiz.title.title_create') }}">
    @csrf

    <div class="row justify-content-center mt-5">
        <div class="card w-75 ">
            <h5 class="card-header m-3">新規作成</h5>
        <div class="card-body">

            <div class=" mt-3">
                <label for="title" class=" col-form-label text-md-end">{{ __('問題集名') }}</label>

                    <div class=" ">
                        <input id="title" type="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" placeholder="15文字以内で入力して下さい">

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
                        <input id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="title" placeholder="20文字以内で入力して下さい">

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
