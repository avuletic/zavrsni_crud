@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <span class="flow-text">{{ $survey->title }}</span></h3>
                    </div>
                </div>
                <body>
                {!! Form::open(array('action'=>array('SurveyAnswerController@store', $survey->id))) !!}
                {{ csrf_field() }}
                @forelse ($survey->questions as $key=>$question)
                    <p class="flow-text">Pitanje {{ $key+1 }} - {{ $question->question_text }}</p>
                    @if($question->question_type === 'textarea')
                        <div class="input-field col s12">
                            <textarea id="response"  name="{{ $question->id }}[response]"></textarea>
                        </div>
                    @elseif($question->question_type === 'radio')
                        @foreach($question->answers as $key=>$value)
                            <p style="margin:0px; padding:0px;">
                                <input type="radio" id="answer" name="{{ $question->id }}[answer_id]" value="{{$value->id}}" />
                                <label for="answer{{$key}}">{{ $value['answer'] }}</label>
                            </p>
                        @endforeach
                    @elseif($question->question_type === 'checkbox')
                        @foreach($question->answers as $key=>$value)
                            <p style="margin:0px; padding:0px;">
                                <input type="checkbox" id="answers" name="{{ $question->id }}[answer_id]" value="{{$value->id}}" />
                                <label for="answer{{$key}}">{{ $value['answer'] }}</label>
                            </p>
                        @endforeach
                    @endif
                    <div class="divider" style="margin:10px 10px;"></div>
                @empty
                    <span class='flow-text center-align'>Nothing to show</span>
                @endforelse
                {{ Form::submit('Submit Survey') }}
                {!! Form::close() !!}
                </body>

            </div>
        </div>
    </div>

@endsection

