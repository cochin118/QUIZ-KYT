@extends('layouts.admin')

@section('content')
<div class="container">
    <div>
        <button type="button" class="btn btn-primary" 
            onclick="location.href='{{ url('/admin/admin_list') }}' ">
            戻る
        </button>
    </div>
    <div class="row justify-content-center">
    <h2 class="text-center">管理者情報編集</h2>
    
    </div>
    
    <div>
    <form action="{{ route('admin.admin.edit.update',$admin->id) }}"  
    enctype="multipart/form-data"  method="PUT">
           
    @method('PUT')
    @csrf
   
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('編集情報') }}</div>
                
                <div class="card-body">
                <fieldset>
                
                

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('氏名') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                                name="name" value="{{ old('name',$admin->name) }}" 
                                required autocomplete="name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
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

