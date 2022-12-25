@extends('layouts.admin')

@section('content')
<div class="container">
    <div>
        <button type="button" class="btn btn-primary" 
            onclick="location.href='{{ url('/admin/quiz/quiz/q_create') }}' ">
            戻る
        </button>
    </div>
    <div>
        <h2 class="text-center">新規問題作成</h2>
        <h3 class="text-center">プレビュー</h3>
    </div>

    <div class="row justify-content-center">
        <div class="card w-75 ">
            <h3 class="card-header">「 問題集名 」</h3>
        <div class="card-body">

        <h4>Q. 「問題名」</h4>
        <h5 class="mt-3">　　以下の写真から考えられる危険な個所を選びなさい</h4>
        <div class="picture">
            <img class="rounded mx-auto d-block mt-4"
            height="300" width="550"
            src="/image/tearai.jpg"> 
            </v-img>   
        </div>

        <div class="form-check">
          <div class="row">
            <div class="col-6">
              <input type="radio" class="btn-check" name="options-outlined" id="choices-1" autocomplete="off">
              <label class="btn btn-outline-primary w-100 p-3 mt-4" for="choices-1">選択肢１</label>
            </div>
            <div class="col-6">
              <input type="radio" class="btn-check" name="options-outlined" id="choices-2" autocomplete="off">
              <label class="btn btn-outline-primary w-100 p-3 mt-4" for="choices-2">選択肢２</label>
            </div>
            </div>
            <div class="row">
            <div class="col-6">
              <input type="radio" class="btn-check" name="options-outlined" id="choices-3" autocomplete="off">
              <label class="btn btn-outline-primary w-100 p-3 mt-3" for="choices-3">選択肢３</label>
            </div>
            <div class="col-6">
              <input type="radio" class="btn-check" name="options-outlined" id="choices-4" autocomplete="off">
              <label class="btn btn-outline-primary w-100 p-3 mt-3" for="choices-4">選択肢４</label>
            </div>
            </div>
        </div>

        <div class="row justify-content-center">
        <div class="col-4">
          <button type="button" class="btn btn-primary btn-lg w-100 p-3 mt-4"
            data-bs-toggle="modal"data-bs-target="#staticBackdrop">
            回答</button>
        </div>
        </div>
        <!-- <div class="row justify-content-center">
        <div class="col-4">
          <a href="#" class="btn btn-primary btn-lg w-100 p-3 mt-4">回答</a>
        </div> -->
      
      
    

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">解説</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
            <h3 class="text-center text-danger font-weight-bold">✖不正解<h3>
            <h4 class="text-center text-dark font-weight-bold">正解は「　　　」<h4>

            <div class="row justify-content-center mt-4">
            <div class="card border-success w-80 ">
              <h5 class="text-center font-weight-bold mt-4">
                解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説  
                解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説解説
              <h5>
            </div>
            </div>


          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-primary" 
              onclick="location.href='{{ url('/admin/quiz/quiz/q_list') }}' ">　登録　</button>
          </div>
        </div>
      </div>
    </div>


</div>
@endsection
<!-- <style>

.btn-check {
  margin-top: 5 !important;
}
</style> -->
