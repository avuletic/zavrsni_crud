@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-4 " >
                {{print_r($survey)}}
                {{--<form action="post">
                    <p>Description: {{$survey->description}}</p>
                    <div>
                        <h3>Question text: {{$survey->question_text}}</h3>
                        @if($survey->question_type == 'textarea')
                            <textarea name="" id="" cols="30" rows="10">

                </textarea>
                        @elseif($survey->question_type== 'checkbox')
                            <input type="checkbox" value="Da"/>
                        @else
                            <input type="radio" value="Da"/>
                        @endif
                    </div>
                </form>--}}
            </div>

        </div>
    </div>

@endsection

