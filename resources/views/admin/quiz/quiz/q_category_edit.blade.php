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
        <h2 class="text-center mt-2">カテゴリ変更</h2>
    </div>

    <div class="row justify-content-center">
        <div class="card w-50 ">
            <h5 class="card-header m-2">変更情報</h5>
        <div class="card-body">

    <form action="{{ route('admin.quiz.quiz.edit.q_category_update',$quiz->id) }}"  
    enctype="multipart/form-data"  method="PUT">
           
    @method('post')
    @csrf

    <div class="row ">
    @foreach($quiz -> categories as $category)
    <h5 class="ms-5 mt-3" >現在のカテゴリ：{{  $category->name }}</h5>
    
    @endforeach
    </div>

    <label for="exampleFormControlFile1"class="ms-5 mt-3" >分類カテゴリ</label>
            <div class="dropdown">
                <select class="form-group ms-5 mt-2"  id="id" name="id" data-toggle="dropdown" >
                @foreach($categories as $category)

                @if ($category->id == $quiz->category_id)
                    <option value="{{ $category->id }}" selected>{{ $category->id }}</option>
                @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif


                    
                @endforeach

                </select>
            </div>
            

    

        <div class="card-footer mt-5">
            <div class="d-flex justify-content-end pt-1">
                <button type="submit" class="btn btn-warning">
                {{ __('変更') }}
                </button>
            </div>
        </div>

        </div>
        </div>
    </div>
        
    @if(session('message'))
    <div class="row justify-content-center mt-3">
        <div class="alert alert-warning col-3 mt-2 text-center border-warning">{{session('message')}}</div></div>
    @endif

    
</div>
@endsection
