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
                            @if($question->question_type == 'textarea')
                                <div class="form-group">
                                    <label for="comment">Odgovor:</label>
                                    <textarea class="form-control" rows="5" id="comment"></textarea>
                                </div>
                                @elseif($question->question_type =='checkbox')

                                @foreach($answers as $answer)
                                <div class="checkbox">

                                    <label><input type="checkbox" value="">{{ $answer->answer }}</label>

                                </div>
                                @endforeach

                            @elseif($question->question_type =='radio')
                                <div class="radio">
                                    <label><input type="radio" name="optradio">Option 1</label>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
                </body>

            </div>
        </div>
    </div>

@endsection

