@extends('layouts.admin')

@section('content')
<div class="container">
    <div>
        <button type="button" class="btn btn-primary" 
            onclick="history.back()">
            戻る
        </button>
    </div>
    <div class="row justify-content-center">
    <h2 class="text-center">学習者情報編集</h2>
    </div>
    
    <div>
    <form action="{{ route('admin.member.edit.update',$user->id) }}"  
    enctype="multipart/form-data"  method="PUT">
           
    @method('PUT')
    @csrf
   
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('編集情報') }}</div>
                
                <div class="card-body">
                <fieldset>
                
                

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('氏名') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                                name="name" value="{{ old('name',$user->name) }}" 
                                required autocomplete="name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('メールアドレス') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                name="email" value="{{ old('email')?: $user->email }}" 
                                required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{__(' メールアドレスが正しくありません。 ') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex justify-content-end pt-3">
                            <button type="submit" class="btn btn-warning">
                                {{ __('更新') }}
                            </button>
                        </div>
                </fieldset>
        </form>
    </div>
</div>

</div>
@endsection

