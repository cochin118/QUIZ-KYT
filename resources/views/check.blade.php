@extends('layouts.app')
@section('content')


<div class="container">


    <form action="{{route('quiz2',$title->id)}}" enctype="multipart/form-data"  method="PUT">           
        @method('post')
        @csrf

    <div class="row justify-content-center">
        <div class="card w-75 mt-5">
            <div class="card-body">
                <h3 class="text-center mt-4">Q.{{$number}}　{{$quiz->quizzes[$number-1]->name}}</h3>
                
                @if($cf==="正解")
                    <h1 class="text-center text-danger mt-4">正解！</h1>
                @else
                    <h1 class="text-center text-primary mt-4">不正解</h1>
                @endif
        
                <div class="row justify-content-center">
                    <div class="col picture mt-5 ms-5">
                        <img class="rounded  d-block mt-2"height="300" width="350"
                            src="{{asset('storage/images/'.$quiz->quizzes[$number-1]->pictures)}}">
                    </div>
                    <div class="col mt-5">
                    <h4 class="text-strat mt-4 ">危険な行為は、{{$data}}番の
                    </h4>
                    <h5 class="text-strat mt-4">「{{$quiz->quizzes[$number-1]->$exacto}}」です。</h5>
                        <div class="card border-success w-80 mt-4 ms-">
                            <h5 class="text-strat font-weight-bold m-3">
                            {{$quiz->quizzes[$number-1]->description }}<h5>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-5">
                    <div class="col-3">
                        <button  type="submit" class="btn btn-primary w-100 p-3">次の問題</button></a>



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

    </div>

    </from>
</div>  
@endsection