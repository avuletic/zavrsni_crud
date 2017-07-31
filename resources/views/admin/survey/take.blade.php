@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-4 ">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <span class="flow-text">{{ $survey->title }}</span></h3>
                    </div>
                </div>
                <body>

                @foreach ($questions as $question)

                    <div class="panel panel-default">
                        <div class="panel-heading">{{ $question->question_text }}</div>
                        <div class="panel-body">
                            {{--@foreach ($question_answers as $question_answer)--}}

                            @if($question->question_type == 'textarea')
                                <div class="form-group">
                                    <label for="comment">Odgovor:</label>
                                    <textarea class="form-control" rows="5" id="comment"></textarea>
                                </div>

                            @elseif($question->question_type =='checkbox')
                                {{--{{print_r($answers)}}--}}
                                {{--{{var_dump($answers)}}--}}

                              @foreach ($answers as $answer) {
                                {{$answer->answer}};
                                }
                                @endforeach


                                    {{--{{ Form::checkbox('answer[]', $answer->id, in_array($answer->id, $answer)) }}
                                    {{ Form::label('answer', $answer->answer) }}<br>--}}



                            {{--@elseif($question->question_type =='radio')
                                <div class="radio">
                                    <label><input type="radio" name="optradio">Option 1</label>
                                </div>--}}
                            @endif
                                {{--@endforeach--}}
                        </div>
                    </div>
                @endforeach
                </body>

            </div>
        </div>
    </div>

@endsection

