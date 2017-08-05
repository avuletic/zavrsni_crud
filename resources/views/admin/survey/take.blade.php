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
                @foreach ($questions as $question)

                    <div class="panel panel-default">
                        <div class="panel-heading">{{ $question->question_text }}</div>
                        <div class="panel-body">

                            @if($question->question_type == 'textarea')
                                <div class="h6">Odgovor:</div>
                                <textarea class="field" name="notes" cols="40" rows="5"></textarea>
                            @endif

                            @foreach($question->answers as $answer)
                                @if($question->question_type =='checkbox')

                                    <tr>
                                        <td>{{$answer->answer}}</td>
                                        <td style="width: 10px">
                                            <input type="checkbox" value="{{ $answer->answer }}"
                                                   name="answers[{{ $answer->id }}">
                                        </td>
                                    </tr>
                                @else

                                    <tr>
                                        <td>{{$answer->answer}}</td>
                                        <td style="width: 10px">
                                            <input type="radio" value="{{ $answer->answer }}"
                                                   name="answers[{{ $answer->id }}">
                                        </td>
                                    </tr>

                                @endif
                            @endforeach
                        </div>
                    </div>

                @endforeach
                <input class="btn" type="submit" value="Predaj anketu!">
                </body>

            </div>
        </div>
    </div>

@endsection

