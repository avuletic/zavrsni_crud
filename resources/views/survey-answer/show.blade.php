@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">SurveyAnswer {{ $surveyanswer->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/survey-answer') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/survey-answer/' . $surveyanswer->id . '/edit') }}" title="Edit SurveyAnswer"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['surveyanswer', $surveyanswer->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete SurveyAnswer',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $surveyanswer->id }}</td>
                                    </tr>
                                    <tr><th> Question Id </th><td> {{ $surveyanswer->question_id }} </td></tr><tr><th> Answer Id </th><td> {{ $surveyanswer->answer_id }} </td></tr>><tr><th> Response </th><td> {{ $surveyanswer->response }} </td></tr><tr><th> User Id </th><td> {{ $surveyanswer->user_id }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
