<div class="form-group {{ $errors->has('question_text') ? 'has-error' : ''}}">
    {!! Form::label('question_text', 'Question Text', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('question_text', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('question_text', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('question_type') ? 'has-error' : ''}}">
    {!! Form::label('question_type', 'Question Type', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('question_type', ['textarea' => 'Text','checkbox' => 'Checkbox','radio' => 'Radio Button']) !!}
        {{--{!! Form::textarea('question_type', null, ['class' => 'form-control']) !!}--}}
        {!! $errors->first('question_type', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('survey_id') ? 'has-error' : ''}}">
    {!! Form::label('survey_id', 'Survey Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('survey_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('survey_id', '<p class="help-block">:message</p>') !!}
    </div>

</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
