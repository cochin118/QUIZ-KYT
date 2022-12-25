@extends('layouts.app')
@section('content')


<div class="container">

    <div>
        <button type="button" class="btn btn-primary"
        onclick="history.back()">
         戻る</button>
    </div>

    <div class="row justify-content-center">
        <div class="card w-75 mt-3">

             <h3 class="card-header">{{$quiz->title}}</h3> 

        <div class="card-body">


        <h4>Q.{{$number+1}}　{{$quiz->quizzes[$number]->name}}</h4>

        <h5 class="mt-3">  以下の画像から考えられる危険な行為を選びなさい</h4>

        <div class="picture">
        <img class="rounded mx-auto d-block mt-2"height="300" width="350"
                         src="{{asset('storage/images/'.$quiz->quizzes[$number]->pictures)}}">
        </div>

        <form action=" {{route('check',$title->id)}} " enctype="multipart/form-data"  method="PUT">
                            
        @method('post')
        @csrf

        <div class="form-check">
            <div class="row">
                <div class="col-6">
                    <input type="radio" class="btn-check" name="choice" id="choice1" value="1" autocomplete="off" required autocomplete='choice'>

                    <label class="btn btn-outline-primary w-100 p-3 mt-4" for="choice1">1.{{$quiz->quizzes[$number]->answer1}}</label>

                </div>
                <div class="col-6">
                    <input type="radio" class="btn-check" name="choice" id="choice2" value="2" autocomplete="off" >

                    <label class="btn btn-outline-primary w-100 p-3 mt-4" for="choice2">2.{{$quiz->quizzes[$number]->answer2}}</label>

                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <input type="radio" class="btn-check" name="choice" id="choice3" value=3 autocomplete="off" >

                    <label class="btn btn-outline-primary w-100 p-3 mt-3" for="choice3">3.{{$quiz->quizzes[$number]->answer3}}</label>

                </div>
                <div class="col-6">
                    <input type="radio" class="btn-check" name="choice" id="choice4" value=4 autocomplete="off" >
 
                    <label class="btn btn-outline-primary w-100 p-3 mt-3" for="choice4">4.{{$quiz->quizzes[$number]->answer4}}</label>

                </div>
            </div>
        </div> 

            <div class="row justify-content-center">
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-lg w-100 p-3 mt-4">回答</button>
                </div>
            </div>

        </div>
    </div>
</div>

    <div class=" justify-content-center w-25 mt-3">
        <input id="quiz" type="hidden" class="form-control @error('quiz') is-invalid @enderror"  
            name="quiz" value="{{ old('quiz',$quiz->quizzes[$number]->id) }}" required autocomplete="quiz">

        <input id="number" type="hidden" class="form-control @error('number') is-invalid @enderror" 
            name="number" value="{{ old('number',$number) }}" required autocomplete="number">
                    
        <input id="title" type="hidden" class="form-control @error('title') is-invalid @enderror" 
             name="title" value="{{ old('title',$title->id) }}" required autocomplete="title">

        <input id="answer" type="hidden" class="form-control @error('answer') is-invalid @enderror" 
             name="answer" value="{{ old('answer',$quiz->quizzes[$number]->answer) }}" required autocomplete="answer">

    </div>

    </from>
    </div>
</div>  
@endsection