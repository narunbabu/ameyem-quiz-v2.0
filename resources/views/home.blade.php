@extends('layouts.app')

@section('content')
{{--  <div class="main">
      <div class="container-fluid">  --}}


          
    {{--  <div class="row">  --}}
        <div class="col-md-10">
        {{--  <div class="col-6">  --}}
            <div class="panel panel-default">
                <div class="panel-heading"><b>Welcome! Here are some numbers about AmeyemQuiz.</b></div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 text-center">
                            <h1>{{ $questions }}</h1>
                            questions in our database
                        </div>
                        <div class="col-md-3 text-center">
                            <h1>{{ $users }}</h1>
                            users registered
                        </div>
                        <div class="col-md-3 text-center">
                            <h1>{{ $quizzes }}</h1>
                            quizzes taken
                        </div>
                        <div class="col-md-3 text-center">
                            <h1>{{ number_format($average, 2) }} / 10</h1>
                            average score
                        </div>
                    </div>
                </div>
            </div>
            {{--  <a href="{{ route('tests.index') }}" class="btn btn-success">Take a new quiz!</a>  --}}
            <h2>Take a new quiz on...</h2>
            <div class="card-group">
            @if (count($topics) > 0)
                <form>
                    @foreach ($subjects as $subject)     
                    {{--  <div class="form-group">  --}}
                        <div class="form-group col-lg-3 col-md-6 text-center">           
                            {{--  <div class="jumbotron">  --}}
                            <div class="card card-inverse" style="background-color: #cdf; border-color: #333;height:300px">
                                <div class="card-header">
                                    AmeyemQuiz
                                </div>
                                <div class="card-block">
                                    <h3 class="card-title"><strong>{{ $subject}}</strong></h3>
                                
                                        {{--  <h3 class="card-title"><strong>{{ $subject}}</strong></h3>  --}}
                                            
                                            {{--  <div class="d-flex  flex-column">

                                                @foreach ($topics as $topic)
                                                <p class="lead">
                                                    @if ($topic->subject==$subject)
                                                        <a href="{{ route('tests.index',['id'=>$topic->id]) }}" class="btn btn-primary btn-lg">{{ $topic->title}}</a>
                                                    @endif
                                                </p>
                                                @endforeach   
                                            </div>   --}}
                                            <div class="list-group list-group-flush">
                                                @foreach ($topics as $topic)
                                                
                                                    @if ($topic->subject==$subject)
                                                        {{--  <div class="list-group-item list-group-item-action list-group-item-primary">  --}}
                                                        <a href="{{ route('tests.index',['id'=>$topic->id]) }}" 
                                                        class="list-group-item list-group-item-action list-group-item-primary">
                                                        {{ $topic->title}}</a>
                                                        {{--  </div>  --}}
                                                    @endif
                                                
                                                @endforeach  
                                            </div>


                                </div>
                                {{--  <div class="card-footer">
                                    Email: quiz@ameyem.com
                                </div>  --}}
                            </div>{{-- Card div end--}}
                        </div>
                    @endforeach
                </form>
            @endif
        </div>
    {{--  </div>  --}}


{{--  </div>
</div>  --}}
@endsection
