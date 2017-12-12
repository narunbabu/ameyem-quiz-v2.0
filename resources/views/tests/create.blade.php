@extends('layouts.app')

@section('content')
   <!-- <h3 class="page-title">@lang('quickadmin.laravel-quiz')</h3> -->
    
     <h3 class="page-title">Welocme to quiz on {{$topic->title}} from {{$topic->subject}}</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['tests.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.quiz')
        </div>
        <?php //dd($questions) ?>
    @if(count($questions) > 0)
        <div class="panel-body">
        <?php $i = 1; ?>
        <input
            type="hidden"
            name="topic_id"
            value="{{ $topic->id }}">
        @foreach($questions as $question)
            @if ($i > 1) <hr /> @endif


            <div class='col-md-12'>
            <div class="card">
            {{--  <img class="card-img-top" src="/images/pathToYourImage.png" alt="Card image cap">  --}}

            <div class="card-body">
                <h4 class="card-title"><strong>Question {{ $i }}.<br />{!! nl2br($question->question_text) !!}</strong></h4>
                
                <p class="card-text">
                 @if ($question->code_snippet != '')
                            <div class="code_snippet">{!! $question->code_snippet !!}</div>
                        @endif
                        <input
                            type="hidden"
                            name="questions[{{ $i }}]"
                            value="{{ $question->id }}">
                                <div class="col-md-6">                            
                                    @foreach($question->options as $option)
                    
                                        @if (!empty($option->option))
                                            <div class="funkyradio">
                                            <div class="funkyradio-success">
                                                <input type="radio" name="answers[{{ $question->id }}]"
                                                value="{{ $option->id }}" id="{{ $option->id }}" />
                                                <label for="{{ $option->id }}"> {{ $option->option }}</label>
                                            </div>
                                            </div>

                                        @endif
                                    @endforeach
                           
                                </div>
                </p>
                {{--  <a href="#!" class="btn btn-primary">Go somewhere</a>  --}}
            </div>
            </div>


        <?php $i++; ?>
        </div>
        @endforeach
        </div>
    @endif
    </div>

    {!! Form::submit(trans('quickadmin.submit_quiz'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
    <script src="{{ url('quickadmin/js') }}/timepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
    <script>
        $('.datetime').datetimepicker({
            autoclose: true,
            dateFormat: "{{ config('app.date_format_js') }}",
            timeFormat: "hh:mm:ss"
        });
    </script>

@stop
