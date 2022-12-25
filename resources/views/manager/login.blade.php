@extends('layouts.manager')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __(' 指導者ログイン ') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('manager/login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="man_num" class="col-md-4 col-form-label text-md-end">{{ __('指導者番号') }}</label>

                            <div class="col-md-6">
                                <input id="man_num" type="text" class="form-control @error('man_num') is-invalid @enderror" name="man_num" value="{{ old('man_num') }}" required autocomplete="man_num" autofocus>

                                @error('man_num')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{__(' 指導者番号が正しくありません ') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __(' パスワード ') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{__(' 指導者番号または、パスワードが一致しません。 ') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('ログイン状態を保持する') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ログイン') }}
                                </button>

                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
