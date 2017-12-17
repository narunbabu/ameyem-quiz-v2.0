@extends('layouts.app')

@section('content')
{{--  <div class="main">
      <div class="container-fluid">  --}}


          

            {{--  <a href="{{ route('tests.index') }}" class="btn btn-success">Take a new quiz!</a>  --}}
            @include('partials.quizsummary')
            @include('partials.quizselect')
    {{--  </div>  --}}


{{--  </div>
</div>  --}}
@endsection
