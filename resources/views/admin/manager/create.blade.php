@extends('layouts.admin')

@section('content')
<div class="container">
    <div>
        <button type="button" class="btn btn-primary" 
            onclick="location.href='{{ url('/admin/manager') }}' ">
            戻る
        </button>
    </div>
    <div class="row justify-content-center">
    <h2 class="text-center">新規指導者作成</h2>
    
    </div>
    
    <div>
    <form method="POST" action="{{ route('admin.manager.create') }}">
    @csrf
   
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('作成情報') }}</div>
                
                <div class="card-body">
                <fieldset>
                
                

                <div class="row mb-3">
                            <label for="man_num" class="col-md-4 col-form-label text-md-end">{{ __('指導者番号') }}</label>

                            <div class="col-md-6">
                                <input id="man_num" type="text" class="form-control @error('man_num') is-invalid @enderror" name="man_num" value="{{ old('man_num') }}" required autocomplete="man_num" autofocus>

                                @error('man_num')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ __(' 指導者番号が正しくありません ')}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('氏名') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('パスワード') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="8文字以上で入力して下さい">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{__(' パスワードが正しくありません ') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('パスワード再入力') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="d-flex justify-content-end pt-3">
                            <button type="submit" class="btn btn-primary">
                                {{ __('作成') }}
                            </button>
                        </div>
                </fieldset>
        </form>
    </div>
</div>

</div>
@endsection

