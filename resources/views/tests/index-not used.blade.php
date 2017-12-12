@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.topics.title')</h3>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.view')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr><th>@lang('quickadmin.topics.fields.title')</th>
                    <td>hello</td></tr>
                    </table>
                </div>
            </div>

            @if (count($topics) > 0)
                @foreach ($topics as $topic)
                {{--  href="{{ route('topics.show',[$topic->id]) }}"   --}}
                <a href="{{ route('tests.create',[$topic->id]) }}" class="btn btn-success">{{ $topic->title}}!</a>
                {{--  href="{{ route('questions.show',[$question->id]) }}"  --}}
                {{--  <p>{{ $topic->title}}</p>  --}}
                {{--  <td>{{ $topic->subject}}</td>
                                    <td>{{ $topic->title }}</td>  --}}
                @endforeach
            @endif

            <p>&nbsp;</p>

            <a href="{{ route('topics.index') }}" class="btn btn-default">@lang('quickadmin.back_to_list')</a>
        </div>
    </div>
@stop