<div class="form-group {{ $errors->has('answer') ? 'has-error' : ''}}">
    {!! Form::label('answer', 'Odgovor', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('answer', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('answer', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('question_id') ? 'has-error' : ''}}">
    {!! Form::label('question_id', 'Pitanje', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {{--{!! Form::number('question_id', null, ['class' => 'form-control']) !!}--}}
        {!! Form::select('question_id', $questions, null, ['class' => 'form-control']) !!}
        {!! $errors->first('question_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
