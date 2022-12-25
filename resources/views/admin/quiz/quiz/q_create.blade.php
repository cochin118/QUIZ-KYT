@extends('layouts.admin')

@section('content')
<div class="container">
    <div>
        <button type="button" class="btn btn-primary" 
            onclick="location.href='{{ url('/admin/quiz/quiz/q_list') }}' ">
            戻る
        </button>
    </div>
    <div class="row justify-content-center">
        <h2 class="text-center mt-2">新規問題作成</h2>
    </div>

    <div class="row justify-content-center">
        <div class="card w-75 ">
            <h5 class="card-header m-2">新規作成</h5>
        <div class="card-body">
    
    <form enctype="multipart/form-data" method="POST" action="{{ route('admin.quiz.quiz.q_create') }}">
    @csrf

        <div class="mt-3">
            <label for="exampleFormControlInput3">問題名</label>
            <div class="input-group mt-1">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="15文字以内で入力してください" 
                    name="name" value="{{ old('name') }}" required autocomplete="name">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ __(' 入力内容が正しくありません ')}}</strong>
                    </span>
                    @enderror
            </div>
        </div>


        <div class="mt-3">       
        <label for="exampleFormControlFile1">分類カテゴリ</label>
        </div>
            <div class="dropdown mt-1">
                <select class="form-group @error('id') is-invalid @enderror" id="id" name="id"  required autocomplete='id'>
                    <!-- <option value="null">{{ __(' 分類カテゴリを選択してください ') }}</otion> -->
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
                </select>
                
                @error('id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ __(' カテゴリが正しく選択されていません ')}}</strong>
                        </span>
                @enderror
                
            </div>


            <div class="mt-3">
            <label for="pictures">画像選択</label>
            </div>

                <input class="mt-1 form-control-file "  required autocomplete='pictures'
                    type="file" accept='image/*' id="pictures" name="pictures" onchange="previewImage(this);">
                    @error('pictures')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ __(' 画像が正しく選択されていません ')}}</strong>
                        </span>
                    @enderror

            <p  class="mt-2">
                画像プレビュー<br>
                <img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="  
                    class=" d-block mt-1"height="100" width="150">
            </p>
            <script>
                function previewImage(obj)
                {
                    var fileReader = new FileReader();
                    fileReader.onload = (function() {
                        document.getElementById('preview').src = fileReader.result;
                    });
                    fileReader.readAsDataURL(obj.files[0]);
                }
            </script>


            <div class="mt-3">
                <label for="exampleFormControlInput3">選択肢</label>

                <div class="input-group mt-1">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">選択肢１</span>
                    </div>
                    <input id="answer1" type="text" class="form-control @error('answer1') is-invalid @enderror" placeholder="選択肢１を入力してください" 
                        name="answer1" value="{{ old('answer1') }}" required autocomplete="answer1">
                    @error('answer1')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ __(' 選択肢１の入力内容が正しくありません ')}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="input-group mt-2">
                <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">選択肢２</span>
                    </div>
                    <input id="answer2" type="text" class="form-control @error('answer2') is-invalid @enderror" placeholder="選択肢２を入力してください" 
                        name="answer2" value="{{ old('answer2') }}" required autocomplete="answer2">
                    @error('answer2')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ __(' 選択肢２の入力内容が正しくありません ')}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="input-group mt-2">
                <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">選択肢３</span>
                    </div>
                    <input id="answer3" type="text" class="form-control @error('answer3') is-invalid @enderror" placeholder="選択肢３を入力してください" 
                        name="answer3" value="{{ old('answer3') }}" required autocomplete="answer3">
                    @error('answer3')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ __(' 選択肢３の入力内容が正しくありません ')}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="input-group mt-2">
                <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">選択肢４</span>
                    </div>
                    <input id="answer4" type="text" class="form-control @error('answer4') is-invalid @enderror" placeholder="選択肢４を入力してください" 
                        name="answer4" value="{{ old('answer4') }}" required autocomplete="answer4">
                    @error('answer4')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ __(' 選択肢４の入力内容が正しくありません ')}}</strong>
                        </span>
                    @enderror
                </div>

            <div class="form-group mt-3">
                <label for="radio01" class="col-md-4 col-form-label text-md-right">正解の選択肢</label>
            <div class="col-md-6">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="answer" name="answer" value="1" required autocomplete='answer' {{ old('answer') == '1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="answer">選択肢１</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="answer"  name="answer" value="2" {{ old('answer') == '2' ? 'checked' : '' }}>
                    <label class="form-check-label" for="answer">選択肢２</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="answer"  name="answer" value="3" {{ old('answer') == '3' ? 'checked' : '' }}>
                    <label class="form-check-label" for="answer">選択肢３</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="answer"  name="answer" value="4" {{ old('answer') == '4' ? 'checked' : '' }}>
                    <label class="form-check-label" for="answer">選択肢４</label>
                </div>
            </div>
            </div>


            <div class="form-group  mt-3">
                <label for="exampleFormControlTextarea1">解説を入力してください</label>
                <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror mt-1" 
                    name="description" required autocomplete="description" rows="3">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ __(' 解説の入力内容が正しくありません ')}}</strong>
                        </span>
                    @enderror

            </div>
      </div>
      </div>
    

        <div class="card-footer">
            <div class="d-flex justify-content-end pt-1">
                <button type="submit" class="btn btn-primary">
                {{ __('作成') }}
                </button>
            </div>
        </div>


    
</div>
@endsection
